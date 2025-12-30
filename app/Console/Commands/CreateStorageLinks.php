<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CreateStorageLinks extends Command
{
    protected $signature = 'storage:travel-links';
    protected $description = 'Create symbolic links for travel storage directories';

    public function handle()
    {
        $this->info('Creating storage links for travel application...');

        // Create the main public storage link if it doesn't exist
        if (!File::exists(public_path('storage'))) {
            $this->call('storage:link');
        }

        // Create custom storage directories
        $directories = [
            'destinations',
            'destinations/gallery',
            'tours',
            'tours/gallery',
            'avatars',
            'settings',
            'settings/partners',
            'blog',
            'blog/featured',
            'testimonials',
        ];

        foreach ($directories as $directory) {
            $path = storage_path("app/public/{$directory}");
            
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
                $this->info("Created directory: {$directory}");
            }
        }

        // Create default images
        $this->createDefaultImages();

        $this->info('Storage setup completed successfully!');
    }

    protected function createDefaultImages()
    {
        $defaultImages = [
            'default-destination.jpg' => storage_path('app/public/destinations/default-destination.jpg'),
            'default-tour.jpg' => storage_path('app/public/tours/default-tour.jpg'),
            'default-avatar.jpg' => storage_path('app/public/avatars/default-avatar.jpg'),
            'logo.png' => storage_path('app/public/settings/logo.png'),
        ];

        foreach ($defaultImages as $source => $destination) {
            if (!File::exists($destination)) {
                // You can copy from a source directory or create placeholder
                $placeholder = imagecreatetruecolor(800, 600);
                $bgColor = imagecolorallocate($placeholder, 59, 130, 246); // Blue
                imagefill($placeholder, 0, 0, $bgColor);
                imagepng($placeholder, $destination);
                imagedestroy($placeholder);
                
                $this->info("Created placeholder: {$source}");
            }
        }
    }
}