<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the main gallery page.
     */
    public function index()
    {
        // Demo gallery albums
        $albums = [
            [
                'id' => 1,
                'title' => 'Everest Region',
                'image_count' => 45,
                'cover_image' => '/images/gallery/everest-album.jpg',
                'description' => 'Breathtaking views from the world\'s highest mountains',
                'date' => '2023-10-15'
            ],
            [
                'id' => 2,
                'title' => 'Annapurna Circuit',
                'image_count' => 38,
                'cover_image' => '/images/gallery/annapurna-album.jpg',
                'description' => 'Diverse landscapes and traditional villages',
                'date' => '2023-09-22'
            ],
            [
                'id' => 3,
                'title' => 'Cultural Moments',
                'image_count' => 52,
                'cover_image' => '/images/gallery/culture-album.jpg',
                'description' => 'Local traditions and festivals',
                'date' => '2023-11-05'
            ],
            [
                'id' => 4,
                'title' => 'Wildlife & Nature',
                'image_count' => 32,
                'cover_image' => '/images/gallery/wildlife-album.jpg',
                'description' => 'Flora and fauna of the Himalayas',
                'date' => '2023-08-18'
            ],
            [
                'id' => 5,
                'title' => 'Trekking Team',
                'image_count' => 28,
                'cover_image' => '/images/gallery/team-album.jpg',
                'description' => 'Our guides and happy trekkers',
                'date' => '2023-12-10'
            ],
            [
                'id' => 6,
                'title' => 'Sunrise & Sunsets',
                'image_count' => 41,
                'cover_image' => '/images/gallery/sunrise-album.jpg',
                'description' => 'Magical mountain light',
                'date' => '2023-10-30'
            ]
        ];

        // Demo featured images
        $featuredImages = [
            '/images/gallery/featured1.jpg',
            '/images/gallery/featured2.jpg',
            '/images/gallery/featured3.jpg',
            '/images/gallery/featured4.jpg',
            '/images/gallery/featured5.jpg',
            '/images/gallery/featured6.jpg',
            '/images/gallery/featured7.jpg',
            '/images/gallery/featured8.jpg',
        ];

        return view('pages.gallery', compact('albums', 'featuredImages'));
    }

    /**
     * Display a specific album.
     */
    public function album($albumId)
    {
        // Demo album data
        $albums = [
            1 => [
                'title' => 'Everest Region',
                'description' => 'A collection of breathtaking images from various treks in the Everest region, including Everest Base Camp, Gokyo Lakes, and the Three Passes trek.',
                'cover_image' => '/images/gallery/everest-album.jpg',
                'images' => [
                    ['src' => '/images/gallery/everest1.jpg', 'caption' => 'Sunrise over Mount Everest from Kala Patthar'],
                    ['src' => '/images/gallery/everest2.jpg', 'caption' => 'Tengboche Monastery with Ama Dablam in background'],
                    ['src' => '/images/gallery/everest3.jpg', 'caption' => 'The Hillary Suspension Bridge near Namche'],
                    ['src' => '/images/gallery/everest4.jpg', 'caption' => 'Yak caravan on the trail to Everest Base Camp'],
                    ['src' => '/images/gallery/everest5.jpg', 'caption' => 'Prayer flags at Gorak Shep'],
                    ['src' => '/images/gallery/everest6.jpg', 'caption' => 'Sherpa village in Khumjung'],
                    ['src' => '/images/gallery/everest7.jpg', 'caption' => 'Glacial moraine near Lobuche'],
                    ['src' => '/images/gallery/everest8.jpg', 'caption' => 'Evening light on Nuptse'],
                ]
            ],
            2 => [
                'title' => 'Annapurna Circuit',
                'description' => 'Images from the classic Annapurna Circuit trek showcasing diverse landscapes from subtropical forests to high altitude desert.',
                'cover_image' => '/images/gallery/annapurna-album.jpg',
                'images' => [
                    ['src' => '/images/gallery/annapurna1.jpg', 'caption' => 'Thorong La Pass at sunrise'],
                    ['src' => '/images/gallery/annapurna2.jpg', 'caption' => 'Manang village with Annapurna range'],
                    ['src' => '/images/gallery/annapurna3.jpg', 'caption' => 'Muktinath Temple'],
                    ['src' => '/images/gallery/annapurna4.jpg', 'caption' => 'Mountain View Hotel in Tatopani'],
                ]
            ]
        ];

        // Check if album exists
        if (!array_key_exists($albumId, $albums)) {
            abort(404, 'Album not found');
        }

        $album = $albums[$albumId];

        return view('pages.gallery.album', compact('album'));
    }
}