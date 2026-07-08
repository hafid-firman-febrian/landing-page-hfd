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
                'icon' => '🚀',
                'description' => 'Dari ide ke produk yang diluncurkan dalam 4–8 minggu. Rincian fitur di awal, demo yang bisa diklik tiap beberapa hari.',
            ],
            [
                'title' => 'Add AI to my product',
                'slug' => 'add-ai',
                'icon' => '🤖',
                'description' => 'AI chat, smart search, Q&A dokumen, otomasi. GPT & Claude diintegrasikan ke stack Laravel / Next.js Anda.',
            ],
            [
                'title' => 'Rescue my codebase',
                'slug' => 'rescue-codebase',
                'icon' => '🛠️',
                'description' => 'Mewarisi codebase berantakan? Saya audit, perbaiki bagian berbahaya, dan buat Anda kembali bisa rilis fitur dengan aman.',
            ],
            [
                'title' => 'Technical partner',
                'slug' => 'technical-partner',
                'icon' => '🤝',
                'description' => 'Engineering berkelanjutan, roadmap AI, dan partner berpikir yang bisa Anda ajak diskusi. Jam bulanan tercadang, tanpa kejutan.',
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
