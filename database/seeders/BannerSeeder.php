<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'user_head' => 'RENT YOUR HOME ONLINE',
            'user_desc' => 'Find your dream home in no time!',
            'tenant_head' => 'Find your dream home in no time!',
            'tenant_desc' => 'Discover the perfect home for you and your family with our extensive listings. Start your home search today and find your dream home in no time!',
            'image_1' => 'Images/Original/Banner.png',
            'image_2' => 'Images/Original/Banner-2.png',
            'image_3' => 'Images/Original/Banner-3.png',
        ]);
    }
}
