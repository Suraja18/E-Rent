<?php

namespace Database\Seeders;

use App\Models\WebRates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebRatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebRates::create([
            'images' => 'Images/Original/BestRates.svg',
            'title' => 'Best Rate',
            'paragraph' => 'You’re guaranteed to book the best rates on our homes at E-Rent.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        WebRates::create([
            'images' => 'Images/Original/RestEasy.svg',
            'title' => 'Rent Easy',
            'paragraph' => 'Search and Rent your suitable home easily...',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        WebRates::create([
            'images' => 'Images/Original/GivingBack.svg',
            'title' => 'Save Time',
            'paragraph' => 'Find your destinated home in no time.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
