<?php
namespace App\Services;

use App\Models\Country;

class NavigationService
{
    public function getNavigationData()
    {
        return Country::with([
            'regions.trekTypes.treks' => function($query) {
                $query->where('is_active', true)
                      ->orderBy('title');
            },
            'trekTypes.treks' => function($query) {
                $query->where('is_active', true)
                      ->orderBy('title');
            }
        ])
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    }

    public function getFeaturedTreks()
    {
        return \App\Models\Trek::with(['country', 'region', 'trekType'])
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('title')
            ->limit(10)
            ->get();
    }
}