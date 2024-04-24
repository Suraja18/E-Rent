<?php

namespace Database\Seeders;

use App\Models\userRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        userRoles::create([
            'id' => 1,
            'user_roles' => 'Tenant',
            'roles' => 'Renting the House with speed and precision',
            'description' => "Actively engaging in the rental process with efficiency and accuracy. Responsible for promptly responding to rental offers, accurately submitting required documentation, and adhering to payment schedules. Tenants also participate in maintaining the property's condition and report any issues swiftly to ensure a proactive approach to repairs and maintenance. This role demands a high level of responsibility and effective communication to facilitate a smooth and speedy rental experience.",
            'image' => 'User.jpg',
            'processes_that_pay_off' => 'a user-friendly interface and responsive customer support system facilitate easy navigation and immediate resolution of any queries or issues, significantly enhancing tenant satisfaction and expediting the renting process.',
            'slug' => 'tenant',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        userRoles::create([
            'id' => 2,
            'user_roles' => 'Landlord',
            'roles' => 'Growing rentals with intelligent insights',
            'description' => "Empowered with intelligent insights that optimize rental strategies and enhance tenant relationships. Our platform leverages data analytics to provide landlords with actionable information on market trends, pricing optimization, and tenant preferences, ensuring that they make informed decisions to maximize occupancy rates and rental yields. This approach not only simplifies property management but also positions our landlords at the forefront of a competitive market, enabling them to adapt swiftly to changing market dynamics and improve their investment returns.",
            'image' => 'User.jpg',
            'processes_that_pay_off' => 'involve leveraging data-driven insights to optimize rental strategies and improve tenant satisfaction. By analyzing trends in rental rates, occupancy rates, and tenant feedback, landlords can make informed decisions that enhance property value and maximize revenue, ensuring a competitive edge in the market and a high return on investment.',
            'slug' => 'landlord',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        userRoles::create([
            'id' => 3,
            'user_roles' => 'Admin',
            'roles' => 'Elevating people and functionality of the site',
            'description' => "Overseeing the overall operations and maintenance of the site, managing user roles, ensuring data integrity, and implementing policy compliance. They are responsible for enhancing the platform's services, addressing technical issues, and facilitating communication between tenants, landlords, and internal teams. Admins play a crucial role in strategic planning and stakeholder engagement, aiming to advance the platform's market position and user satisfaction without directly participating in property rentals.",
            'image' => 'User.jpg',
            'processes_that_pay_off' => 'Implementing robust data security measures, maintaining clear communication channels between stakeholders, and continuously optimizing website functionality. These actions ensure a secure, efficient, and user-friendly platform, enhancing user satisfaction and driving operational excellence.',
            'slug' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
