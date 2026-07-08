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
            'hero_title' => 'Saya ubah ide jadi produk yang berjalan.',
            'hero_subtitle' => 'Partner teknis untuk founder non-teknis. Saya bangun MVP Anda, rilis cepat, dan tetap jadi engineer Anda, dengan AI di tempat yang benar-benar penting.',
            'hero_cta_primary_label' => 'Chat WhatsApp',
            'hero_cta_primary_url' => 'https://wa.me/6281234567890',
            'hero_cta_secondary_label' => 'Lihat Portofolio',
            'hero_cta_secondary_url' => '#portfolio',
            'hero_image' => '',
            'cta_title' => 'Punya ide yang siap dibangun?',
            'cta_subtitle' => 'Ceritakan proyek Anda. Kita mulai dari obrolan singkat 20 menit, tanpa komitmen.',
            'cta_button_label' => 'Mulai Sekarang',
            'cta_button_url' => 'https://wa.me/6281234567890',
        ];

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
