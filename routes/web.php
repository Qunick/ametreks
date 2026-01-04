<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrekController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminTrekController;
use App\Http\Controllers\Admin\GreetingCardController;
use App\Http\Controllers\Auth\AuthController;

// ----------------------
// AUTH ROUTES
// ----------------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------
// PUBLIC ROUTES
// ----------------------

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Treks
Route::prefix('treks')->group(function () {
    Route::get('/', [TrekController::class, 'index'])->name('pages.treks.index');
    Route::get('/{slug}', [TrekController::class, 'show'])->name('pages.treks.show');
    Route::get('/category/{category}', [TrekController::class, 'category'])->name('pages.treks.category');
});

// Popular Trek Routes
Route::view('/popular-routes', 'pages.dropdown.trek-routes')->name('trek-routes');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{album}', [GalleryController::class, 'album'])->name('gallery.album');

// Booking
Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/confirmation', [BookingController::class, 'confirmation'])->name('booking.confirmation');
});

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// About, Teams, Customization Pages
Route::view('/about-us', 'pages.about-us')->name('about');
Route::view('/ame-teams', 'pages.ame-teams')->name('teams');
Route::view('/customize-your-plan', 'pages.customize-your-trek')->name('customizePlan');

// Blog
Route::prefix('blog')->group(function () {
    Route::get('/', function () {
        return view('pages.blog.index');
    })->name('blog.index');

    Route::get('/{slug}', function ($slug) {
        return view('pages.blog.show', compact('slug'));
    })->name('blog.show');
});

// ----------------------
// ADMIN ROUTES
// ----------------------
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Treks (Full CRUD)
        Route::resource('treks', AdminTrekController::class);
         Route::patch('/treks/{trek}/toggle', [AdminTrekController::class, 'toggle'])
            ->name('treks.toggle');

        // Bookings (index, show, update only)
        Route::resource('bookings', BookingController::class)->only(['index', 'show', 'update']);
        Route::post('/bookings/export', [BookingController::class, 'export'])->name('bookings.export');

        // Destinations
        Route::resource('destinations', DestinationController::class);
        Route::post('/destinations/bulk-action', [DestinationController::class, 'bulkAction'])
            ->name('destinations.bulk-action');

        // Blogs (view only for now)
        Route::view('/blogs', 'admin.blogs.index')->name('blogs.index');

        // Reviews
        Route::resource('reviews', ReviewController::class)->only(['index', 'destroy']);
        Route::post('/reviews/bulk-action', [ReviewController::class, 'bulkAction'])
            ->name('reviews.bulk-action');

        // Users
        Route::resource('users', UserController::class);
        Route::post('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])
            ->name('users.toggle-status');

        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
        Route::post('/settings/toggle', [SettingController::class, 'toggle'])->name('settings.toggle');
        Route::post('/settings/social-media', [SettingController::class, 'updateSocialMedia'])->name('settings.social-media');
        Route::post('/settings/faq', [SettingController::class, 'updateFaq'])->name('settings.faq');
        Route::post('/settings/awards', [SettingController::class, 'updateAwards'])->name('settings.awards');
        Route::post('/settings/reset', [SettingController::class, 'resetToDefaults'])->name('settings.reset');

        // Greeting Cards
        Route::post('/greeting-card', [GreetingCardController::class, 'store'])->name('greeting-card.store');
    });
