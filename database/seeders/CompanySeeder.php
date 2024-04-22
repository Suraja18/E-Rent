<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'address' => 'Rupakot, Pokhara, Nepal',
            'email' => 'sssadhikari222@gmail.com',
            'phone_number' => '9867808207',
            'logo' => 'Images/Original/Logo.svg',
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d4975.64534231162!2d84.10644133352281!3d28.136971586025812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d28.13782119854006!2d84.10735170548872!5e0!3m2!1sen!2snp!4v1709878758413!5m2!1sen!2snp',
            'linkedin' => 'https://www.linkedin.comy',
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://www.instagram.com',
            'twitter' => 'https://twitter.com',
            'contact_description' => 'Connect with us, your gateway to seamless rentals. Experience personalized assistance and swift solutions. Your satisfaction is our priority – contact us, your E-Rent concierge today..',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
