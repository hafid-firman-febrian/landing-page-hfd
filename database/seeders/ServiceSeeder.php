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
                'description' => 'From idea to launched product in 4-8 weeks. Features are scoped upfront, with clickable demos every few days.',
            ],
            [
                'title' => 'Add AI to my product',
                'slug' => 'add-ai',
                'icon' => '🤖',
                'description' => 'AI chat, smart search, document Q&A, and automation. GPT and Claude integrated into your Laravel or Next.js stack.',
            ],
            [
                'title' => 'Rescue my codebase',
                'slug' => 'rescue-codebase',
                'icon' => '🛠️',
                'description' => 'Inherited a messy codebase? I audit it, fix the risky parts, and help you ship features safely again.',
            ],
            [
                'title' => 'Technical partner',
                'slug' => 'technical-partner',
                'icon' => '🤝',
                'description' => 'Ongoing engineering, AI roadmap planning, and a technical thought partner you can discuss product decisions with. Reserved monthly hours, no surprises.',
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
