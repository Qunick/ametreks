<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrekController;
use App\Http\Controllers\GalleryController;
// use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\GreetingCardController;

// Route::prefix('admin')
//     ->name('admin.')
//     ->middleware(['auth', 'admin'])
//     ->group(function () {

//         Route::get('/dashboard', [DashboardController::class, 'index'])
//             ->name('dashboard');

//         Route::get('/bookings', function () {
//         return view('admin.bookings.index');
//     })->name('bookings.index');
    
//     Route::get('/bookings/create', function () {
//         return view('admin.bookings.create');
//     })->name('bookings.create');

//     // Tours
//     Route::get('/tours', function () {
//         return view('admin.tours.index');
//     })->name('tours.index');
    
//     Route::get('/tours/create', function () {
//         return view('admin.tours.create');
//     })->name('tours.create');

//     // Blogs
//     Route::get('/blogs', function () {
//         return view('admin.blogs.index');
//     })->name('blogs.index');

//     // Reviews
//     Route::get('/reviews', function () {
//         return view('admin.reviews.index');
//     })->name('reviews.index');
//     Route::post('toggle', [
//     App\Http\Controllers\Admin\SettingController::class,
//     'toggle'
// ])->name('admin.settings.toggle');


// });
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');


// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Treks Routes
Route::prefix('treks')->group(function () {
    Route::get('/', [TrekController::class, 'index'])->name('treks.index');
    Route::get('/{trek}', [TrekController::class, 'show'])->name('treks.show');
    Route::get('/category/{category}', [TrekController::class, 'category'])->name('treks.category');
    
});
Route::view('/popular-routes','pages.dropdown.trek-routes')->name('trek-routes');
// Gallery Routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{album}', [GalleryController::class, 'album'])->name('gallery.album');

// Booking Routes
Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/confirmation', [BookingController::class, 'confirmation'])->name('booking.confirmation');
});

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// About Page
Route::view('/about-us', 'pages.about-us')->name('about');
Route::view('/ame-teams', 'pages.ame-teams')->name('teams');
Route::view('/show', 'pages.treks.show')->name('trek.show');
Route::view('/customize-your-plan','pages.customize-your-trek')->name('customizePlan');


// Blog Routes (if needed)
Route::prefix('blog')->group(function () {
    Route::get('/', function () {
        return view('pages.blog.index');
    })->name('blog.index');
    
    Route::get('/{slug}', function ($slug) {
        return view('pages.blog.show', compact('slug'));
    })->name('blog.show');
});

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);



////////



Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Bookings
    Route::resource('bookings', BookingController::class)->only([
        'index', 'show', 'update'
    ]);
    Route::post('/bookings/export', [BookingController::class, 'export'])
        ->name('bookings.export');

    // Destinations
    Route::resource('destinations', DestinationController::class);
    Route::post('/destinations/bulk-action', [DestinationController::class, 'bulkAction'])
        ->name('destinations.bulk-action');

    // Tours
    Route::resource('tours', TourController::class);

    // Blogs (view only for now)
    Route::view('/blogs', 'admin.blogs.index')->name('blogs.index');

    // Reviews
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/reviews/bulk-action', [ReviewController::class, 'bulkAction'])
        ->name('reviews.bulk-action');

    // Users
    Route::resource('users', UserController::class);
    Route::post('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])
        ->name('users.toggle-status');

    // 🔧 SETTINGS
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::post('/settings/toggle', [SettingController::class, 'toggle'])
        ->name('settings.toggle');

    Route::post('/settings/social-media', [SettingController::class, 'updateSocialMedia'])
        ->name('settings.social-media');

    Route::post('/settings/faq', [SettingController::class, 'updateFaq'])
        ->name('settings.faq');

    Route::post('/settings/awards', [SettingController::class, 'updateAwards'])
        ->name('settings.awards');

    Route::post('/settings/reset', [SettingController::class, 'resetToDefaults'])
        ->name('settings.reset');
Route::post('/greeting-card', [GreetingCardController::class, 'store'])
    ->name('greeting-card.store');

});

