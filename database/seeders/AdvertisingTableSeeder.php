<?php

namespace Database\Seeders;

use App\Models\Advertising;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertising::create([
            'video_title' => 'Welcome to Easier Rentals - Discover E-Rent Today!',
            'video_description' => 'Discover the features and benefits of using E-Rent, designed to simplify your rental experience.',
            'video_link' => 'video.mov',
            'title' => 'Unlock the Door to Your Dream Home with E-Rent.',
            'description' => "Struggling to find your dream home or manage rentals smoothly? E-Rent simplifies everything!  Join our transparent and efficient platform for tenants and landlords. Find your perfect place or effortlessly manage properties with our user-friendly tools.",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
