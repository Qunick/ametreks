<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Region;
use App\Models\TrekType;

class CountryRegionSeeder extends Seeder
{
    public function run()
    {
        // Create Countries
        $nepal = Country::create([
            'name' => 'Nepal',
            'slug' => 'base-camp-trek-nepal',
            'description' => 'Trekking in Nepal offers majestic Himalayan views and diverse cultural experiences.',
            'is_active' => true,
            'order' => 1
        ]);

        $bhutan = Country::create([
            'name' => 'Bhutan',
            'slug' => 'cultural-tours-bhutan',
            'description' => 'Experience the mystical kingdom of Bhutan with its rich culture and stunning landscapes.',
            'is_active' => true,
            'order' => 2
        ]);

        $tibet = Country::create([
            'name' => 'Tibet',
            'slug' => 'pilgrimage-tours-tibet',
            'description' => 'Explore the roof of the world with spiritual journeys and breathtaking high-altitude treks.',
            'is_active' => true,
            'order' => 3
        ]);

        // Create Regions for Nepal
        $everest = Region::create([
            'country_id' => $nepal->id,
            'name' => 'Everest Region',
            'slug' => 'everest-region',
            'description' => 'Home to the world\'s highest peak, Mount Everest.',
            'is_active' => true,
            'order' => 1
        ]);

        $annapurna = Region::create([
            'country_id' => $nepal->id,
            'name' => 'Annapurna Region',
            'slug' => 'annapurna-region',
            'description' => 'Famous for the Annapurna Circuit and diverse landscapes.',
            'is_active' => true,
            'order' => 2
        ]);

        $langtang = Region::create([
            'country_id' => $nepal->id,
            'name' => 'Langtang Region',
            'slug' => 'langtang-region',
            'description' => 'Closest trekking region to Kathmandu with stunning valley views.',
            'is_active' => true,
            'order' => 3
        ]);

        // Create Trek Types for Nepal Regions
        $nepalPeakClimbing = TrekType::create([
            'country_id' => $nepal->id,
            'region_id' => $everest->id,
            'name' => 'Peak Climbing',
            'slug' => 'peak-climbing',
            'description' => 'Expeditions to climb Himalayan peaks',
            'is_active' => true,
            'order' => 1
        ]);

        $nepalBaseCamp = TrekType::create([
            'country_id' => $nepal->id,
            'region_id' => $everest->id,
            'name' => 'Base Camp Trek',
            'slug' => 'base-camp-trek',
            'description' => 'Trek to the base of majestic mountains',
            'is_active' => true,
            'order' => 2
        ]);

        // Create Trek Types for Bhutan (no regions)
        $bhutanCultural = TrekType::create([
            'country_id' => $bhutan->id,
            'name' => 'Cultural Tours',
            'slug' => 'cultural-tours',
            'description' => 'Experience Bhutanese culture and traditions',
            'is_active' => true,
            'order' => 1
        ]);

        $bhutanTrekking = TrekType::create([
            'country_id' => $bhutan->id,
            'name' => 'Trekking',
            'slug' => 'trekking',
            'description' => 'Trekking adventures in Bhutan',
            'is_active' => true,
            'order' => 2
        ]);

        // Create Trek Types for Tibet (no regions)
        $tibetPilgrimage = TrekType::create([
            'country_id' => $tibet->id,
            'name' => 'Pilgrimage Tours',
            'slug' => 'pilgrimage-tours',
            'description' => 'Spiritual journeys to sacred sites',
            'is_active' => true,
            'order' => 1
        ]);
    }
}