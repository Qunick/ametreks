<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\HomeSetting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@travel.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create sample destinations
        $destinations = [
            [
                'name' => 'Paris',
                'slug' => 'paris-france',
                'description' => 'The city of love and lights, Paris is famous for its art, fashion, and cuisine.',
                'country' => 'France',
                'city' => 'Paris',
                'latitude' => 48.8566,
                'longitude' => 2.3522,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Bali',
                'slug' => 'bali-indonesia',
                'description' => 'Tropical paradise with beautiful beaches, temples, and rich culture.',
                'country' => 'Indonesia',
                'city' => 'Denpasar',
                'latitude' => -8.4095,
                'longitude' => 115.1889,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Tokyo',
                'slug' => 'tokyo-japan',
                'description' => 'Vibrant metropolis blending tradition and modernity.',
                'country' => 'Japan',
                'city' => 'Tokyo',
                'latitude' => 35.6762,
                'longitude' => 139.6503,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($destinations as $destinationData) {
            Destination::create($destinationData);
        }

        // Create sample tours
        $tours = [
            [
                'destination_id' => 1,
                'title' => 'Paris City Tour',
                'slug' => 'paris-city-tour',
                'description' => 'Explore the iconic landmarks of Paris including Eiffel Tower, Louvre, and Notre Dame.',
                'duration_days' => 5,
                'duration_nights' => 4,
                'price' => 1200.00,
                'max_participants' => 20,
                'min_participants' => 5,
                'departure_date' => now()->addDays(30),
                'return_date' => now()->addDays(35),
                'meeting_point' => 'Charles de Gaulle Airport',
                'inclusions' => ['Accommodation', 'Breakfast', 'Tour Guide', 'Entrance Fees'],
                'exclusions' => ['Airfare', 'Travel Insurance'],
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'destination_id' => 2,
                'title' => 'Bali Beach Getaway',
                'slug' => 'bali-beach-getaway',
                'description' => 'Relax on beautiful beaches and explore Balinese culture.',
                'duration_days' => 7,
                'duration_nights' => 6,
                'price' => 1500.00,
                'discount_price' => 1350.00,
                'max_participants' => 15,
                'min_participants' => 4,
                'departure_date' => now()->addDays(45),
                'return_date' => now()->addDays(52),
                'meeting_point' => 'Ngurah Rai Airport',
                'inclusions' => ['Accommodation', 'All Meals', 'Transport', 'Activities'],
                'exclusions' => ['International Flights', 'Personal Expenses'],
                'status' => 'published',
                'is_featured' => true,
            ],
        ];

        foreach ($tours as $tourData) {
            Tour::create($tourData);
        }
    }
}