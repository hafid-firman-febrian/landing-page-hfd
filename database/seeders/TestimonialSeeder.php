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
                'quote' => 'This is my second time working with this team, and once again the result was excellent. Highly recommended.',
                'rating' => 5,
                'source_url' => null,
            ],
            [
                'name' => 'Sarah Wijaya',
                'role' => 'Product Lead',
                'quote' => 'High-quality work with strong Next.js expertise. Efficient, reliable, and very detail-oriented.',
                'rating' => 5,
                'source_url' => null,
            ],
            [
                'name' => 'Michael Tan',
                'role' => 'CTO, DocuChat',
                'quote' => 'Fantastic experience! All of our Laravel issues were resolved efficiently, with helpful improvements suggested beyond the original scope. Professional and responsive.',
                'rating' => 5,
                'source_url' => null,
            ],
            [
                'name' => 'Dewi Lestari',
                'role' => 'Founder, FieldOps',
                'quote' => 'Fast execution, smooth communication, and everything was delivered on time. Highly recommended.',
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
