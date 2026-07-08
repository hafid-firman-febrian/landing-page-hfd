<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Andi Pratama',
                'role' => 'Founder, Kirana',
                'quote' => 'Ini kedua kalinya saya bekerja dengan tim ini, dan sekali lagi hasilnya luar biasa. Sangat direkomendasikan.',
                'rating' => 5,
                'source_url' => null,
            ],
            [
                'name' => 'Sarah Wijaya',
                'role' => 'Product Lead',
                'quote' => 'Pengerjaan berkualitas tinggi dengan keahlian Next.js yang kuat. Efisien, andal, dan sangat memperhatikan detail.',
                'rating' => 5,
                'source_url' => null,
            ],
            [
                'name' => 'Michael Tan',
                'role' => 'CTO, DocuChat',
                'quote' => 'Pengalaman fantastis! Semua masalah Laravel kami diselesaikan efisien, bahkan disarankan perbaikan di luar scope awal. Profesional dan responsif.',
                'rating' => 5,
                'source_url' => null,
            ],
            [
                'name' => 'Dewi Lestari',
                'role' => 'Founder, FieldOps',
                'quote' => 'Bekerja cepat, komunikasi lancar, dan semuanya selesai tepat waktu. Sangat direkomendasikan.',
                'rating' => 5,
                'source_url' => null,
            ],
        ];

        foreach ($items as $i => $item) {
            Testimonial::updateOrCreate(
                ['name' => $item['name'], 'quote' => $item['quote']],
                $item + ['sort_order' => $i, 'is_active' => true],
            );
        }
    }
}
