<?php

namespace Database\Seeders;

use App\Models\policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        policy::create([
            'title' => 'Terms and Condition',
            'description' => 'This is a detailed description of the terms and conditions...',
            'slug' => Str::slug('Terms and Condition'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        policy::create([
            'title' => 'Privacy Policy',
            'description' => 'This is a detailed description of the privacy policy...',
            'slug' => Str::slug('Privacy Policy'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        policy::create([
            'title' => 'Cookie Policy',
            'description' => 'This is a detailed description of the cookie policy...',
            'slug' => Str::slug('Cookie Policy'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
