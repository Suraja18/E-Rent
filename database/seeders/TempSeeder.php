<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            $this->createUser('John', 'Doe', 1234567890, 'john@gmail.com', '2023-12-01 08:00:00', 'john789', 'Images/Variable/Users/1.PNG', '123 Elm St', 'Male', 1, '2023-12-01 08:00:00'),
            $this->createUser('Jane', 'Doe', 2345678901, 'jane@gmail.com', '2023-12-02 09:00:00', 'jane789', 'Images/Variable/Users/2.PNG', '234 Elm St', 'Female', 2, '2023-12-02 08:00:00'),
            $this->createUser('Alice', 'Smith', 3456789012, 'alice@gmail.com', '2023-12-03 10:15:00', 'alice789', 'Images/Variable/Users/3.PNG', '345 Elm St', 'Female', 1, '2023-12-03 08:00:00'),
            $this->createUser('Bob', 'Smith', 4567890123, 'bob@gmail.com', '2023-12-04 11:20:00', 'bob789', 'Images/Variable/Users/4.PNG', '456 Elm St', 'Male', 2, '2023-12-04 08:00:00'),
            $this->createUser('Charlie', 'Brown', 5678901234, 'charlie@gmail.com', '2023-12-05 12:25:00', 'charlie789', 'Images/Variable/Users/5.PNG', '567 Elm St', 'Male', 1, '2023-12-05 08:00:00'),
            $this->createUser('Dave', 'White', 6789012345, 'dave@gmail.com', '2024-01-01 08:00:00', 'dave789', 'Images/Variable/Users/6.PNG', '678 Elm St', 'Male', 2, '2024-01-01 08:00:00'),
            $this->createUser('Eve', 'White', 7890123456, 'eve@gmail.com', '2024-01-02 09:05:00', 'eve789', 'Images/Variable/Users/7.PNG', '789 Elm St', 'Female', 1, '2024-01-02 08:00:00'),
            $this->createUser('Frank', 'Gray', 8901234567, 'frank@gmail.com', '2024-01-03 10:10:00', 'frank789', 'Images/Variable/Users/8.PNG', '890 Elm St', 'Male', 2, '2024-01-03 08:00:00'),
            $this->createUser('Grace', 'Black', 9012345678, 'grace@gmail.com', '2024-01-04 11:15:00', 'grace789', 'Images/Variable/Users/9.PNG', '901 Elm St', 'Female', 1, '2024-01-04 08:00:00'),
            $this->createUser('Henry', 'Jones', 1234506789, 'henry@gmail.com', '2024-01-05 12:20:00', 'henry789', 'Images/Variable/Users/10.PNG', '102 Elm St', 'Male', 2, '2024-01-05 08:00:00'),
            $this->createUser('Isabel', 'Jones', 2345617890, 'isabel@gmail.com', NULL, 'isabel789', 'Images/Variable/Users/11.PNG', '103 Elm St', 'Female', 1, '2024-01-06 08:00:00'),
            $this->createUser('Zack', 'Noble', 1232387654, 'zack@gmail.com', NULL, 'zack789', 'Images/Variable/Users/28.PNG', '120 Elm St', 'Male', 2, '2024-04-03 08:00:00'),
            $this->createUser('Amber', 'Oak', 2343498765, 'amber@gmail.com', '2024-04-04 14:40:00', 'amber789', 'Images/Variable/Users/29.PNG', '121 Elm St', 'Female', 1, '2024-04-04 08:00:00'),
            $this->createUser('Bruce', 'Pine', 3454509876, 'bruce@gmail.com', '2024-05-01 15:45:00', 'bruce789', 'Images/Variable/Users/30.PNG', '122 Elm St', 'Male', 2, '2024-05-01 08:00:00'),
            $this->createUser('Cindy', 'Quartz', 4565610987, 'cindy@gmail.com', NULL, 'cindy789', 'Images/Variable/Users/31.PNG', '123 Elm St', 'Female', 1, '2024-05-02 08:00:00'),
            $this->createUser('Derek', 'Rock', 5676721098, 'derek@gmail.com', '2024-05-03 16:50:00', 'derek789', 'Images/Variable/Users/32.PNG', '124 Elm St', 'Male', 2, '2024-05-03 08:00:00')
        ]);

    }
    private function createUser($firstName, $lastName, $phoneNumber, $email, $emailVerifiedAt, $password, $image, $address, $gender, $roleId, $createdAt)
    {
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $phoneNumber,
            'email' => $email,
            'email_verified_at' => $emailVerifiedAt,
            'password' => bcrypt($password),
            'image' => $image,
            'address' => $address,
            'gender' => $gender,
            'roles' => $roleId,
            'active_status' => 0,
            'created_at' => $createdAt,
            'updated_at' => $createdAt
        ];
    }
}
