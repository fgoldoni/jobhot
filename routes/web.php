<?php

use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/impersonate/leave', [ImpersonationController::class, 'leave'])->name('impersonate.leave');
Route::get('/impersonate/take/{id}', [ImpersonationController::class, 'take'])->name('impersonate');

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/companies', function () {
    return view('companies');
})->name('companies');

Route::get('/companies/{slug}', function () {
    return view('jobs.show');
})->name('companies.company');


Route::resource('jobs', JobController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::group(['prefix' => 'teams'], function() {
    Route::put('/current-team', [TeamController::class, 'update'])->name('teams.current-team.update')->middleware(['auth']);
    Route::get('/accept/{token}', [TeamController::class, 'acceptInvite'])->name('teams.accept_invite')->middleware(['auth']);
});


/**
 * Teamwork routes
 */
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
{
    Route::get('/', [App\Http\Controllers\Teamwork\TeamController::class, 'index'])->name('teams.index');
    Route::get('create', [App\Http\Controllers\Teamwork\TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [App\Http\Controllers\Teamwork\TeamController::class, 'store'])->name('teams.store');
    Route::get('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'edit'])->name('teams.edit');
    Route::put('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'update'])->name('teams.update');
    Route::delete('destroy/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('switch/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'switchTeam'])->name('teams.switch');

    Route::get('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'show'])->name('teams.members.show');
    Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
    Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');
});

Route::get('invoice/{invoice}', function ($invoiceId) {
    return auth()->user()->downloadInvoice($invoiceId, [
        'vendor' => 'JobHot',
        'product' => 'Subscription',
    ]);
})->name('invoice');


