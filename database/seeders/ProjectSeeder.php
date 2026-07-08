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
                'summary' => 'Platform SaaS multi-tenant untuk manajemen tim: billing, role-based access, dan analitik real-time. Dibangun dengan Laravel + Livewire dan siap untuk ribuan pengguna.',
                'thumbnail' => null,
                'is_flagship' => true,
            ],
            [
                'title' => 'DocuChat AI Assistant',
                'slug' => 'docuchat-ai-assistant',
                'category' => 'AI Product',
                'summary' => 'Asisten Q&A dokumen berbasis RAG. Pengguna mengunggah PDF lalu bertanya dalam bahasa natural. Integrasi GPT & Claude dengan kontrol biaya.',
                'thumbnail' => null,
                'is_flagship' => false,
            ],
            [
                'title' => 'Kirana E-Commerce',
                'slug' => 'kirana-ecommerce',
                'category' => 'E-Commerce',
                'summary' => 'Toko online dengan pembayaran Xendit, manajemen stok, dan panel admin. Dari nol ke transaksi pertama dalam 6 minggu.',
                'thumbnail' => null,
                'is_flagship' => false,
            ],
            [
                'title' => 'FieldOps Mobile',
                'slug' => 'fieldops-mobile',
                'category' => 'Web App',
                'summary' => 'Aplikasi lapangan untuk tim operasional: penjadwalan, checklist, dan laporan foto. PWA yang berjalan offline-first.',
                'thumbnail' => null,
                'is_flagship' => false,
            ],
            [
                'title' => 'Legacy Rescue: Klinik App',
                'slug' => 'legacy-rescue-klinik',
                'category' => 'Codebase Rescue',
                'summary' => 'Audit dan stabilisasi aplikasi klinik warisan developer sebelumnya. Perbaikan bug kritis, keamanan, dan proses deploy yang aman.',
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
