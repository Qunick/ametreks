<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrekController extends Controller
{
    /**
     * Display a listing of all treks.
     */
    public function index()
    {
        // Demo trek categories
        $categories = [
            ['id' => 1, 'name' => 'Everest Region', 'count' => 12, 'image' => 'user-assets/images/productImages/everest.png'],
            ['id' => 2, 'name' => 'Annapurna Region', 'count' => 15, 'image' => '/images/categories/annapurna.jpg'],
            ['id' => 3, 'name' => 'Langtang Region', 'count' => 8, 'image' => '/images/categories/langtang.jpg'],
            ['id' => 4, 'name' => 'Manaslu Region', 'count' => 6, 'image' => '/images/categories/manaslu.jpg'],
            ['id' => 5, 'name' => 'Upper Mustang', 'count' => 4, 'image' => '/images/categories/mustang.jpg'],
            ['id' => 6, 'name' => 'Short Treks', 'count' => 10, 'image' => '/images/categories/short.jpg'],
        ];

        // Demo treks data
        $treks = [
            [
                'id' => 1,
                'title' => 'Everest Base Camp Trek',
                'slug' => 'everest-base-camp-trek',
                'region' => 'Everest Region',
                'duration' => '14 Days',
                'difficulty' => 'Moderate',
                'max_altitude' => '5,545m',
                'price' => '$1,500',
                'best_season' => ['Mar-May', 'Sep-Nov'],
                'image' => 'user-assets/images/productImages/everest.png',
                'rating' => 4.8,
                'reviews' => 124,
                'description' => 'The classic trek to the base of the world\'s highest mountain.',
                'highlights' => [
                    'Kalapatthar viewpoint for sunrise over Everest',
                    'Visit Tengboche Monastery',
                    'Experience Sherpa culture',
                    'Scenic flight to Lukla'
                ]
            ],
            [
                'id' => 2,
                'title' => 'Annapurna Circuit',
                'slug' => 'annapurna-circuit',
                'region' => 'Annapurna Region',
                'duration' => '18 Days',
                'difficulty' => 'Challenging',
                'max_altitude' => '5,416m',
                'price' => '$1,200',
                'best_season' => ['Mar-May', 'Sep-Nov'],
                'image' => '/images/treks/annapurna.jpg',
                'rating' => 4.7,
                'reviews' => 98,
                'description' => 'One of the world\'s best trekking routes through diverse landscapes.',
                'highlights' => [
                    'Thorong La Pass (5,416m)',
                    'Muktinath Temple',
                    'Manang village',
                    'Natural hot springs'
                ]
            ],
            [
                'id' => 3,
                'title' => 'Langtang Valley Trek',
                'slug' => 'langtang-valley-trek',
                'region' => 'Langtang Region',
                'duration' => '10 Days',
                'difficulty' => 'Easy',
                'max_altitude' => '4,984m',
                'price' => '$800',
                'best_season' => ['Year-round'],
                'image' => '/images/treks/langtang.jpg',
                'rating' => 4.6,
                'reviews' => 76,
                'description' => 'Beautiful valley trek close to Kathmandu with stunning mountain views.',
                'highlights' => [
                    'Kyanjin Gompa',
                    'Langtang Glacier',
                    'Tamang culture',
                    'Cheese factory visit'
                ]
            ],
            [
                'id' => 4,
                'title' => 'Manaslu Circuit Trek',
                'slug' => 'manaslu-circuit-trek',
                'region' => 'Manaslu Region',
                'duration' => '16 Days',
                'difficulty' => 'Challenging',
                'max_altitude' => '5,106m',
                'price' => '$1,400',
                'best_season' => ['Mar-May', 'Sep-Nov'],
                'image' => '/images/treks/manaslu.jpg',
                'rating' => 4.9,
                'reviews' => 45,
                'description' => 'Remote and less crowded trek around the 8th highest mountain.',
                'highlights' => [
                    'Larkya La Pass',
                    'Traditional villages',
                    'Buddhist monasteries',
                    'Wildlife spotting'
                ]
            ],
            [
                'id' => 5,
                'title' => 'Upper Mustang Trek',
                'slug' => 'upper-mustang-trek',
                'region' => 'Upper Mustang',
                'duration' => '15 Days',
                'difficulty' => 'Moderate',
                'max_altitude' => '4,200m',
                'price' => '$1,800',
                'best_season' => ['Mar-Oct'],
                'image' => '/images/treks/mustang.jpg',
                'rating' => 4.7,
                'reviews' => 52,
                'description' => 'Explore the ancient kingdom of Lo in the Himalayan rain shadow.',
                'highlights' => [
                    'Lo Manthang capital',
                    'Ancient cave dwellings',
                    'Tibetan culture',
                    'Desert landscapes'
                ]
            ],
            [
                'id' => 6,
                'title' => 'Poon Hill Trek',
                'slug' => 'poon-hill-trek',
                'region' => 'Short Treks',
                'duration' => '5 Days',
                'difficulty' => 'Easy',
                'max_altitude' => '3,210m',
                'price' => '$450',
                'best_season' => ['Year-round'],
                'image' => '/images/treks/poonhill.jpg',
                'rating' => 4.5,
                'reviews' => 120,
                'description' => 'Short and sweet trek with amazing sunrise views over the Annapurnas.',
                'highlights' => [
                    'Poon Hill sunrise',
                    'Ghandruk village',
                    'Rhododendron forests',
                    'Gurung culture'
                ]
            ]
        ];

        return view('pages.treks.index', compact('treks', 'categories'));
    }

    /**
     * Display the specified trek.
     */
    public function show($slug)
    {
        // Demo trek details
        $trek = [
            'id' => 1,
            'title' => 'Everest Base Camp Trek',
            'slug' => 'everest-base-camp-trek',
            'region' => 'Everest Region',
            'duration' => '14 Days',
            'difficulty' => 'Moderate',
            'max_altitude' => '5,545m',
            'start_point' => 'Lukla',
            'end_point' => 'Lukla',
            'price' => '$1,500',
            'best_season' => ['March to May', 'September to November'],
            'group_size' => '2-12 people',
            'image' => '/images/treks/everest-detail.jpg',
            'gallery' => [
                '/images/gallery/everest1.jpg',
                '/images/gallery/everest2.jpg',
                '/images/gallery/everest3.jpg',
                '/images/gallery/everest4.jpg'
            ],
            'rating' => 4.8,
            'reviews' => 124,
            'description' => 'The Everest Base Camp Trek is a classic Himalayan adventure that takes you to the foot of the world\'s highest mountain. This trek offers an incredible opportunity to experience Sherpa culture, visit ancient monasteries, and witness some of the most breathtaking mountain scenery on Earth.',
            'overview' => 'The trek begins with a scenic flight to Lukla and follows the Dudh Koshi River valley through pine forests, Sherpa villages, and Buddhist monasteries to reach Everest Base Camp. The highlight is the sunrise view from Kala Patthar (5,545m) with panoramic views of Everest, Lhotse, Nuptse, and other giants.',
            'itinerary' => [
                ['day' => 1, 'title' => 'Arrival in Kathmandu', 'description' => 'Hotel transfer and trek briefing'],
                ['day' => 2, 'title' => 'Fly to Lukla, trek to Phakding', 'description' => 'Scenic flight and easy trek'],
                ['day' => 3, 'title' => 'Phakding to Namche Bazaar', 'description' => 'Enter Sagarmatha National Park'],
                ['day' => 4, 'title' => 'Acclimatization day', 'description' => 'Hike to Everest View Hotel'],
                ['day' => 5, 'title' => 'Namche to Tengboche', 'description' => 'Visit Tengboche Monastery'],
                ['day' => 6, 'title' => 'Tengboche to Dingboche', 'description' => 'Views of Ama Dablam'],
                ['day' => 7, 'title' => 'Acclimatization day', 'description' => 'Hike to Nangkartshang Peak'],
                ['day' => 8, 'title' => 'Dingboche to Lobuche', 'description' => 'Memorials for climbers'],
                ['day' => 9, 'title' => 'Lobuche to Gorak Shep, visit EBC', 'description' => 'Reach Everest Base Camp'],
                ['day' => 10, 'title' => 'Kala Patthar sunrise, trek to Pheriche', 'description' => 'Best views of Everest'],
                ['day' => 11, 'title' => 'Pheriche to Namche', 'description' => 'Return trek begins'],
                ['day' => 12, 'title' => 'Namche to Lukla', 'description' => 'Final trekking day'],
                ['day' => 13, 'title' => 'Fly to Kathmandu', 'description' => 'Free day for shopping'],
                ['day' => 14, 'title' => 'Departure', 'description' => 'Airport transfer']
            ],
            'included' => [
                'Airport transfers',
                'Domestic flights (Kathmandu-Lukla-Kathmandu)',
                'Trekking permits and TIMS card',
                'Experienced guide and porters',
                'All meals during trek',
                'Tea house accommodation',
                'First aid kit and oxygen'
            ],
            'excluded' => [
                'International airfare',
                'Travel insurance',
                'Personal expenses',
                'Tips for guide and porters',
                'Alcoholic beverages'
            ],
            'faqs' => [
                ['question' => 'What is the best time for this trek?', 'answer' => 'The best seasons are spring (March-May) and autumn (September-November).'],
                ['question' => 'Do I need previous trekking experience?', 'answer' => 'No, but good physical fitness is required. Regular exercise for 2-3 months prior is recommended.'],
                ['question' => 'What is the accommodation like?', 'answer' => 'Basic but comfortable tea houses with twin sharing rooms.'],
                ['question' => 'How difficult is the trek?', 'answer' => 'Moderate difficulty. Daily walks of 5-7 hours at high altitude.']
            ]
        ];

        // Check if trek exists (demo)
        if ($slug !== 'everest-base-camp-trek') {
            abort(404, 'Trek not found');
        }

        return view('pages.treks.show', compact('trek'));
    }

    /**
     * Display treks by category.
     */
    public function category($category)
    {
        // Demo category data
        $categories = [
            'everest-region' => [
                'name' => 'Everest Region',
                'description' => 'Home to the world\'s highest peak, Mount Everest (8,848m). This region offers spectacular mountain views, rich Sherpa culture, and famous monasteries.',
                'treks' => [
                    ['id' => 1, 'title' => 'Everest Base Camp Trek', 'duration' => '14 Days', 'difficulty' => 'Moderate'],
                    ['id' => 2, 'title' => 'Everest Three Passes Trek', 'duration' => '21 Days', 'difficulty' => 'Challenging'],
                    ['id' => 3, 'title' => 'Gokyo Lakes Trek', 'duration' => '12 Days', 'difficulty' => 'Moderate'],
                ]
            ],
            'annapurna-region' => [
                'name' => 'Annapurna Region',
                'description' => 'Diverse landscapes ranging from subtropical forests to high altitude deserts around the Annapurna massif.',
                'treks' => [
                    ['id' => 4, 'title' => 'Annapurna Circuit', 'duration' => '18 Days', 'difficulty' => 'Challenging'],
                    ['id' => 5, 'title' => 'Annapurna Base Camp', 'duration' => '12 Days', 'difficulty' => 'Moderate'],
                    ['id' => 6, 'title' => 'Poon Hill Trek', 'duration' => '5 Days', 'difficulty' => 'Easy'],
                ]
            ]
        ];

        // Check if category exists
        if (!array_key_exists($category, $categories)) {
            abort(404, 'Category not found');
        }

        $categoryData = $categories[$category];

        return view('pages.treks.category', compact('categoryData'));
    }
}