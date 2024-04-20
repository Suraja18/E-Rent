<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\DescImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'heading' => 'Hey! We’re E-Rent.',
            'description' => '<b>We’re everyday people with an extraordinary purpose — improving people’s lives.</b> Our team is made up of thinkers, talkers, planners, makers, builders and everything in between. Together, we’re turning our passions into happier communities.'
        ]);
        About::create([
            'heading' => 'We’ve got a thing for people and their properties',
            'description' => 'When customers use our software, their communities get stronger. Our tools empower everyone in multifamily to improve their operations and maximize returns, which means they’re building better experiences for their residents.<b> When property people are happy, we’re happy. That’s why we’re HappyCo.</b>'
        ]);
        About::create([
            'heading' => '...and where we’ve been',
            'description' => 'In 2011, CEO Jindou Lee, a successful entrepreneur turned real estate investor, found himself over-leveraged when several properties he owned turned simultaneously. He needed to recoup his residents’ deposits to quickly rehab the properties and put them back on the market, but he soon discovered he had no recourse to those deposits, as his property management companies lacked sufficient documentation. The traditional paper property inspection process had failed. Jindou wanted to find a mobile solution that could provide better documentation for property inspections and streamline operations functions, but there was nothing like it on the market. So he decided to make his own. With his background in tech and design, he joined forces with his friend Andrew Mackenzie-Ross, a brilliant software developer. Together, they worked with early customers to understand how they conducted inspections, identified their pain points, and collaborated on an ideal solution. The Happy Platform quickly became the leading mobile inspection solution for property managers, with hundreds of businesses signing on in the first year.'
        ]);
        DescImage::create([
            'about_id' => 1,
            'image' => 'Images/Original/man-1.png',
        ]);
        DescImage::create([
            'about_id' => 1,
            'image' => 'Images/Original/man-2.png',
        ]);
        DescImage::create([
            'about_id' => 1,
            'image' => 'Images/Original/man-3.png',
        ]);
        DescImage::create([
            'about_id' => 1,
            'image' => 'Images/Original/man-4.png',
        ]);
        DescImage::create([
            'about_id' => 2,
            'image' => 'Images/Original/man-1.png',
        ]);
        DescImage::create([
            'about_id' => 2,
            'image' => 'Images/Original/man-4.png',
        ]);
        DescImage::create([
            'about_id' => 3,
            'image' => 'Images/Original/man-3.png',
        ]);
    }
}
