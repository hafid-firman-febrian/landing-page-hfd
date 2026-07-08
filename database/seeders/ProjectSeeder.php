<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Nusantara SaaS Dashboard',
                'slug' => 'nusantara-saas-dashboard',
                'category' => 'SaaS Platform',
                'summary' => 'A multi-tenant SaaS platform for team management: billing, role-based access, and real-time analytics. Built with Laravel and Livewire, ready for thousands of users.',
                'thumbnail' => null,
                'is_flagship' => true,
            ],
            [
                'title' => 'DocuChat AI Assistant',
                'slug' => 'docuchat-ai-assistant',
                'category' => 'AI Product',
                'summary' => 'A RAG-powered document Q&A assistant. Users upload PDFs and ask questions in natural language. GPT and Claude integration with cost controls.',
                'thumbnail' => null,
                'is_flagship' => false,
            ],
            [
                'title' => 'Kirana E-Commerce',
                'slug' => 'kirana-ecommerce',
                'category' => 'E-Commerce',
                'summary' => 'An online store with Xendit payments, inventory management, and an admin panel. From zero to first transaction in 6 weeks.',
                'thumbnail' => null,
                'is_flagship' => false,
            ],
            [
                'title' => 'FieldOps Mobile',
                'slug' => 'fieldops-mobile',
                'category' => 'Web App',
                'summary' => 'A field app for operations teams: scheduling, checklists, and photo reports. An offline-first PWA.',
                'thumbnail' => null,
                'is_flagship' => false,
            ],
            [
                'title' => 'Legacy Rescue: Clinic App',
                'slug' => 'legacy-rescue-clinic',
                'category' => 'Codebase Rescue',
                'summary' => 'Audit and stabilization for a clinic app inherited from a previous developer. Critical bug fixes, security improvements, and a safer deployment process.',
                'thumbnail' => null,
                'is_flagship' => false,
            ],
        ];

        foreach ($items as $i => $item) {
            Project::updateOrCreate(
                ['slug' => $item['slug']],
                $item + ['sort_order' => $i, 'is_active' => true],
            );
        }
    }
}
