<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Settings\Entities\Setting;

class SettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Setting::factory()->create(['name' => 'logo', 'value' => 'nmw1R9MbdQuErQ1XoeOcwFPKFWzjdxhyNdRkCxd5.svg']);
        Setting::factory()->create(['name' => 'favicon', 'value' => 'QMLeen34SJPHX1o6SUKdGnGTLiLcNiso5ao1t98R.ico']);

        Setting::factory()->create(['name' => 'color', 'value' => 'indigo']);
        Setting::factory()->create(['name' => 'dark', 'value' => 'gray']);

        Setting::factory()->create(['name' => 'title', 'value' => 'JobHot']);
        Setting::factory()->create(['name' => 'description', 'value' => 'JobHot']);
        Setting::factory()->create(['name' => 'phone', 'value' => 'phone']);
        Setting::factory()->create(['name' => 'email', 'value' => 'email']);

        Setting::factory()->create(['name' => 'mail_driver', 'value' => 'smtp']);
        Setting::factory()->create(['name' => 'mail_host', 'value' => env('MAIL_HOST', 'mail.gandi.net')]);
        Setting::factory()->create(['name' => 'mail_port', 'value' => env('MAIL_PORT', '25')]);
        Setting::factory()->create(['name' => 'mail_encryption', 'value' => env('MAIL_ENCRYPTION', 'yes')]);
        Setting::factory()->create(['name' => 'mail_username', 'value' => env('MAIL_USERNAME', 'contact@demogoldoni.com')]);
        Setting::factory()->create(['name' => 'mail_password', 'value' => env('MAIL_PASSWORD', 'contact@demogoldoni.com')]);

        Setting::factory()->create(['name' => 'mail_from', 'value' => env('MAIL_FROM_ADDRESS', 'contact@demogoldoni.com')]);
        Setting::factory()->create(['name' => 'mail_name', 'value' => env('MAIL_FROM_NAME', 'JobHot')]);
        Setting::factory()->create(['name' => 'mail_reply_to', 'value' => env('MAIL_FROM_ADDRESS', 'contact@demogoldoni.com')]);

        Setting::factory()->create(['name' => 'sendmail_path', 'value' => '/usr/sbin/sendmail -t -i']);
        Setting::factory()->create(['name' => 'log_channel', 'value' => null]);

        Setting::factory()->create(['name' => 'mailgun_domain', 'value' => null]);
        Setting::factory()->create(['name' => 'mailgun_secret', 'value' => null]);
        Setting::factory()->create(['name' => 'mailgun_endpoint', 'value' => 'api.mailgun.net']);

        Setting::factory()->create(['name' => 'postmark_token', 'value' => null]);
        Setting::factory()->create(['name' => 'postmark_message_stream_id', 'value' => null]);

        Setting::factory()->create(['name' => 'ses_key', 'value' => '']);
        Setting::factory()->create(['name' => 'ses_secret', 'value' => '']);
        Setting::factory()->create(['name' => 'ses_region', 'value' => 'us-east-1']);
        Setting::factory()->create(['name' => 'ses_token', 'value' => '']);
    }
}
