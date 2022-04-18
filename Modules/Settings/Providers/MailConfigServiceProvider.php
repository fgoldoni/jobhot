<?php

namespace Modules\Settings\Providers;

use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Settings\Entities\Setting;

class MailConfigServiceProvider extends ServiceProvider
{
    public function boot(Factory $cache, Setting $setting)
    {
        if (Schema::hasTable('settings')) {
            $settings = $cache->rememberForever('settings', function () use ($setting) {
                return $setting->pluck('value', 'name')->all();
            });

            //$cache->forget('settings');

            config()->set('settings', $settings);
        }

        config()->set('mail.default', config('settings.mail_driver'));
        config()->set('mail.mailers.smtp.host', config('settings.mail_host'));
        config()->set('mail.mailers.smtp.port', config('settings.mail_port'));
        config()->set('mail.mailers.smtp.encryption', config('settings.mail_encryption'));
        config()->set('mail.mailers.smtp.username', config('settings.mail_username'));
        config()->set('mail.mailers.smtp.password', config('settings.mail_password'));

        config()->set('mail.mailers.sendmail.path', config('settings.sendmail_path'));
        config()->set('mail.mailers.log.channel', config('settings.log_channel'));

        config()->set('mail.mailers.from.address', config('settings.mail_from'));
        config()->set('mail.mailers.from.name', config('settings.mail_name'));

        config()->set('services.mailgun.domain', config('settings.mailgun_domain'));
        config()->set('services.mailgun.secret', config('settings.mailgun_secret'));
        config()->set('services.mailgun.endpoint', config('settings.mailgun_endpoint'));

        config()->set('services.postmark.token', config('settings.postmark_token'));

        config()->set('services.ses.key', config('settings.ses_key'));
        config()->set('services.ses.secret', config('settings.ses_secret'));
        config()->set('services.ses.region', config('settings.ses_region'));

        config()->set('mail.from.address', config('settings.mail_from'));
        config()->set('mail.from.name', config('settings.mail_name'));

        config()->set('mail.reply_to.address', config('settings.mail_reply_to'));
        config()->set('mail.reply_to.name', config('settings.mail_name'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
