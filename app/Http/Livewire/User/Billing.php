<?php

namespace App\Http\Livewire\User;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Modules\Plans\Entities\Plan;

class Billing extends Component
{
    public Collection $plans;

    public int $currentPlan;

    public bool $showSwitchModal = false;

    public bool $showCancelModal = false;

    public function mount ()
    {
        $this->plans = Plan::all();

        $this->currentPlan = auth()->user()->plan_id ?? 1;
    }

    public function setPayment($paymentMethod)
    {
        $user = auth()->user();

        try {
            if ($user->subscribed()) {

                $user->updateDefaultPaymentMethod($paymentMethod);

            } else {

                $plan = Plan::find($this->currentPlan);

                $user->newSubscription('default', $plan->key)->create($paymentMethod);

                $user->plan_id = $plan->id;

                $user->trial_ends_at = null;

                $user->save();

                session()->remove('flash');

                return redirect()->route('settings.billing')->with(['alert' => 'Successfully updated your billing info', 'type' => 'success']);

            }
        } catch (\Exception $exception) {

            info('Something went wrong submitting your billing info');

            return redirect()->route('settings.billing')->with(['alert' => 'Something went wrong submitting your billing info', 'type' => 'error']);

        }

        $this->notify('Successfully updated your billing info');

    }

    public function cancel ()
    {
        auth()->user()->subscription()->cancelNow();

        return redirect()->route('settings.billing')->with(['alert' => 'Successfully cancelled your subscription', 'type' => 'warning']);
    }
    public function switch ()
    {

        $user = auth()->user();

        try {
            $plan = Plan::find($this->currentPlan);

            $user->subscription()->swap($plan->key);

            $user->plan_id = $plan->id;

            $user->save();

        } catch (\Exception $exception) {

        }

        $this->showSwitchModal = false;

        $this->notify('Successfully switched your plan');
    }

    public function render()
    {
        return view('livewire.user.billing', [
            'subscribed' => auth()->user()->subscribed(),
            'intent' => auth()->user()->createSetupIntent(),
            'plan' => auth()->user()->plan()->first(),
        ]);
    }
}
