<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'hero_badge' => 'Technical Partner · MVP · AI Products',
            'hero_title' => 'I turn ideas into products that work.',
            'hero_subtitle' => 'A technical partner for non-technical founders. I build your MVP, ship fast, and stay as your engineer, with AI applied where it truly matters.',
            'hero_cta_primary_label' => 'Chat WhatsApp',
            'hero_cta_primary_url' => 'https://wa.me/6281234567890',
            'hero_cta_secondary_label' => 'View Portfolio',
            'hero_cta_secondary_url' => '#portfolio',
            'hero_image' => '',
            'cta_title' => 'Have an idea ready to build?',
            'cta_subtitle' => 'Tell me about your project. We will start with a short 20-minute conversation, no commitment required.',
            'cta_button_label' => 'Start Now',
            'cta_button_url' => 'https://wa.me/6281234567890',
        ];

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
