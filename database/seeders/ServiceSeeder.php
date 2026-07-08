<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Build my MVP',
                'slug' => 'build-my-mvp',
                'icon' => 'fa-solid fa-rocket',
                'description' => 'From idea to a launched iOS and Android app in 4-8 weeks. Features are scoped upfront, with installable TestFlight or APK builds delivered every few days so you can test the progress directly on your device.',
            ],
            [
                'title' => 'Add AI to my product',
                'slug' => 'add-ai-to-my-app',
                'icon' => 'fa-solid fa-robot',
                'description' => 'Seamlessly integrate LLMs (like GPT/Claude) into Flutter or React Native for native-feeling AI chat, smart search, and automated workflows, building intelligent, scalable mobile solutions.',
            ],
            [
                'title' => 'Rescue my codebase',
                'slug' => 'rescue-codebase',
                'icon' => 'fa-solid fa-screwdriver-wrench',
                'description' => 'Inherited a messy mobile project? I audit the architecture, untangle complicated state management, fix UI jank, and help you ship App Store and Play Store updates safely again.',
            ],
            [
                'title' => 'Technical partner',
                'slug' => 'technical-partner',
                'icon' => 'fa-solid fa-handshake',
                'description' => 'Ongoing app engineering, AI feature roadmap planning, and a technical thought partner to help navigate store review guidelines and product decisions. Reserved monthly hours, no surprises.',
            ],
        ];

        foreach ($items as $i => $item) {
            Service::updateOrCreate(
                ['slug' => $item['slug']],
                $item + ['sort_order' => $i, 'is_active' => true],
            );
        }
    }
}
