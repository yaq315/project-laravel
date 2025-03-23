<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adventure;

class AdventuresTableSeeder extends Seeder
{
    public function run(): void
    {
        Adventure::create([
            'name' => 'Bedouin Camp Tent',
            'description' => 'Live the authentic Bedouin experience in a tent equipped with all the amenities, with a glamorous view of the Wadi Rum desert.',
            'price' => 120.00,
            'image' => 'wadi-rum-bedouin-camp.jpg',
            'type' => 'camping', // ✅ Camping
            'max_group_size' => 10,
            'start_date' => '2025-04-04', 
            'end_date' => '2025-04-26', 
            'duration' => 3,
        ]);

        Adventure::create([
            'name' => 'Luxury Martian Dome',
            'description' => 'Enjoy a luxurious stay in a glass dome that gives you a panoramic view of the starry sky in the heart of Rum Valley.',
            'price' => 180.00,
            'image' => '12.jpg',
            'type' => 'camping', // ✅ Camping
            'max_group_size' => 7,
            'start_date' => '2025-04-09', 
            'end_date' => '2025-05-09', 
            'duration' => 2,
        ]);

        Adventure::create([
            'name' => 'Desert Panoramic Suite',
            'description' => 'A luxurious suite with modern design allows you to enjoy the beauty of the desert with the utmost comfort and luxury.',
            'price' => 200.00,
            'image' => '13.jpg',
            'type' => 'camping', // ✅ Camping
            'max_group_size' => 9,
            'start_date' => '2025-04-09',
            'end_date' => '2025-05-01', 
            'duration' => 5,
        ]);

        Adventure::create([
            'name' => 'Hot Air Balloon Ride',
            'description' => 'Get a breathtaking aerial view of the desert at sunrise.',
            'price' => 100.00,
            'image' => 'ballon.jpeg',
            'type' => 'jeep_tour', // ✅ Jeep Tour (مغامرة جوية)
            'max_group_size' => 6,
            'start_date' => '2025-04-05',
            'end_date' => '2025-05-08', 
            'duration' => 2,
        ]);

        Adventure::create([
            'name' => 'Sandboarding',
            'description' => 'Find a large dune and slide down on a sandboard for an adrenaline rush!',
            'price' => 20.00,
            'image' => 'sandboarding.jpeg',
            'type' => 'hiking', // ✅ Hiking (رياضة المغامرة على الرمال)
            'max_group_size' => 8,
            'start_date' => '2025-03-28', 
            'end_date' => '2025-05-09', 
            'duration' => 3,
        ]);

        Adventure::create([
            'name' => 'Camel Trekking',
            'description' => 'Experience the desert like the Bedouins by riding a camel through the dunes. You can do a short ride or a multi-day trek.',
            'price' => 50.00,
            'image' => 'camel.jpeg',
            'type' => 'hiking', // ✅ Hiking
            'max_group_size' => 2,
            'start_date' => '2025-04-05', 
            'end_date' => '2025-05-12', 
            'duration' => 7,
        ]);

        Adventure::create([
            'name' => 'Royal Desert Lodge',
            'description' => 'Luxury accommodation in a stylish desert cottage with special services and SUV tours.',
            'price' => 250.00,
            'image' => '14.jpg',
            'type' => 'camping', // ✅ Camping
            'max_group_size' => 5,
            'start_date' => '2025-04-05', 
            'end_date' => '2025-05-11', 
            'duration' => 3,
        ]);

        Adventure::create([
            'name' => 'Wadi Rum Sky Camp',
            'description' => 'A unique stay in a secluded place allows you to experience memorable stargazing in the calm of the desert.',
            'price' => 130.00,
            'image' => '15.jpg',
            'type' => 'camping', // ✅ Camping
            'max_group_size' => 7,
            'start_date' => '2025-03-29', 
            'end_date' => '2025-05-16', 
            'duration' => 3,
        ]);

        Adventure::create([
            'name' => 'Panoramic Desert Suite',
            'description' => 'A luxurious suite with stunning views of the desert with all the modern amenities.',
            'price' => 200.00,
            'image' => '16.jpg',
            'type' => 'camping', // ✅ Camping
            'max_group_size' => 10,
            'start_date' => '2025-04-07',
            'end_date' => '2025-04-23', 
            'duration' => 3,
        ]);

        Adventure::create([
            'name' => 'Wadi Rum Jeep Safari',
            'description' => 'An exciting off-road Jeep safari exploring the hidden gems of Wadi Rum.',
            'price' => 95.00,
            'image' => 'safari.jpg',
            'type' => 'jeep_tour', // ✅ Jeep Tour
            'max_group_size' => 6,
            'start_date' => '2025-04-10',
            'end_date' => '2025-05-10',
            'duration' => 2,
        ]);

        Adventure::create([
            'name' => 'Rock Climbing Expedition',
            'description' => 'Challenge yourself with rock climbing in Wadi Rum’s rugged mountains.',
            'price' => 110.00,
            'image' => 'img7.jpg',
            'type' => 'rock_climbing', // ✅ Rock Climbing
            'max_group_size' => 4,
            'start_date' => '2025-04-12',
            'end_date' => '2025-05-12',
            'duration' => 3,
        ]);
    }
}
