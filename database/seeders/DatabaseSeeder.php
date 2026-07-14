<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! app()->environment('production')) {
            $this->call(AdminUserSeeder::class);
        }

        $this->call([
            ServiceSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
