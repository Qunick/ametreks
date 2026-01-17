<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrekController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminTrekController;
use App\Http\Controllers\Admin\GreetingCardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminTrekTagController as TrekTagController;
use App\Http\Controllers\Admin\AdminTrekGalleryController as TrekGalleryController;
use App\Http\Controllers\Admin\AdminTrekItineraryController as TrekItineraryController;
use App\Http\Controllers\Admin\AdminTrekDepartureController as TrekDepartureController;
use App\Http\Controllers\Admin\AdminTrekInclusionController as TrekInclusionController;
use App\Http\Controllers\Admin\AdminTrekExclusionController as TrekExclusionController;
use App\Http\Controllers\Admin\AdminTrekFaqController;

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

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::post('/bookings/confirm-payment', [BookingController::class, 'confirmPayment'])->name('bookings.confirm-payment');
Route::get('/bookings/confirmation/{bookingNumber}', [BookingController::class, 'showConfirmation'])->name('bookings.confirmation');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// About, Teams, Customization Pages
Route::view('/about-us', 'pages.about-us')->name('about');
Route::view('/ame-teams', 'pages.ame-teams')->name('teams');
Route::view('/ame-blogs', 'pages.ame-blogs')->name('blogs');


Route::view('/customize-your-plan', 'pages.customize-your-trek')->name('customizePlan');
Route::get('/booking', function () {
    return view('pages.booking.booking');
})->name('booking.page');

// Blog
Route::prefix('blog')->group(function () {
    Route::get('/', function () {
        return view('pages.blog.index');
    })->name('blog.index');

    Route::get('/{slug}', function ($slug) {
        return view('pages.blog.show', compact('slug'));
    })->name('blog.show');
});

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/verify/{token}', [ReviewController::class, 'verify'])->name('reviews.verify');
Route::get('/reviews/load-more', [ReviewController::class, 'loadMore'])->name('reviews.load-more');
// ----------------------
// ADMIN ROUTES
// ----------------------
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin']) // FIXED: Removed the extra 'a' character
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Main Treks Routes (Full CRUD)
        Route::resource('treks', AdminTrekController::class);
        Route::patch('/treks/{trek}/toggle', [AdminTrekController::class, 'toggle'])
            ->name('treks.toggle');

        // Bookings (index, show, update only)
        Route::resource('bookings', AdminBookingController::class);

        Route::post('/bookings/export', [AdminBookingController::class, 'export'])->name('bookings.export');

        // Destinations
        Route::resource('destinations', DestinationController::class);
        Route::post('/destinations/bulk-action', [DestinationController::class, 'bulkAction'])
            ->name('destinations.bulk-action');

        // Blogs (view only for now)
        Route::view('/blogs', 'admin.blogs.index')->name('blogs.index');
        Route::view('/loggedin-users', 'admin.users.loggedin')->name('loggedin-users.index');
        Route::view('/guest-users', 'admin.users.guest')->name('guest-users.index');
        Route::view('/administrative-users', 'admin.company.administration')->name('administration.index');
        Route::view('/non-administrative-users', 'admin.company.non-administration')->name('non-administration.index');


        // Reviews
        Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::put('/reviews/{review}/status', [AdminReviewController::class, 'updateStatus'])->name('reviews.status');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

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
        Route::post('/greeting-card', [GreetingCardController::class, 'store'])->name('greeting-card.store');
    });

// TREK MANAGEMENT SUB-ROUTES (Move this outside the main admin group)
// These should be prefixed with 'admin/treks/'
Route::prefix('admin/treks/{trek}')
    ->name('admin.treks.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Tags Management
        Route::get('/tags', [TrekTagController::class, 'index'])->name('tags');
        Route::post('/tags', [TrekTagController::class, 'store'])->name('tags.store');
        Route::delete('/tags/{tag}', [TrekTagController::class, 'destroy'])->name('tags.destroy');

        // Images Management
        Route::get('/images', [TrekGalleryController::class, 'index'])->name('images');
        Route::post('/images', [TrekGalleryController::class, 'store'])->name('images.store');
        Route::put('/images/{image}', [TrekGalleryController::class, 'update'])->name('images.update');
        Route::delete('/images/{image}', [TrekGalleryController::class, 'destroy'])->name('images.destroy');
        Route::post('/images/reorder', [TrekGalleryController::class, 'reorder'])->name('images.reorder');

        // Itinerary Management
        Route::get('/itinerary', [TrekItineraryController::class, 'index'])->name('itinerary');
        Route::post('/itinerary', [TrekItineraryController::class, 'store'])->name('itinerary.store');
        Route::put('/itinerary/{itinerary}', [TrekItineraryController::class, 'update'])->name('itinerary.update');
        Route::delete('/itinerary/{itinerary}', [TrekItineraryController::class, 'destroy'])->name('itinerary.destroy');
        Route::post('/itinerary/reorder', [TrekItineraryController::class, 'reorder'])->name('itinerary.reorder');

        // Departure Dates Management
        Route::get('/departures', [TrekDepartureController::class, 'index'])->name('departures');
        Route::post('/departures', [TrekDepartureController::class, 'store'])->name('departures.store');
        Route::put('/departures/{departure}', [TrekDepartureController::class, 'update'])->name('departures.update');
        Route::delete('/departures/{departure}', [TrekDepartureController::class, 'destroy'])->name('departures.destroy');

        // Inclusions Management
        Route::get('/inclusions', [TrekInclusionController::class, 'index'])->name('inclusions');
        Route::post('/inclusions', [TrekInclusionController::class, 'store'])->name('inclusions.store');
        Route::delete('/inclusions/{inclusion}', [TrekInclusionController::class, 'destroy'])->name('inclusions.destroy');

        // Exclusions Management
        Route::get('/exclusions', [TrekExclusionController::class, 'index'])->name('exclusions');
        Route::post('/exclusions', [TrekExclusionController::class, 'store'])->name('exclusions.store');
        Route::delete('/exclusions/{exclusion}', [TrekExclusionController::class, 'destroy'])->name('exclusions.destroy');

         Route::get('/faq', [AdminTrekFaqController::class, 'index'])->name('faq');
    Route::post('/faq', [AdminTrekFaqController::class, 'store'])->name('faq.store');
    Route::put('/faq/{faq}', [AdminTrekFaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}', [AdminTrekFaqController::class, 'destroy'])->name('faq.destroy');
    Route::post('/faq/update-order', [AdminTrekFaqController::class, 'updateOrder'])->name('faq.update-order');
    Route::post('/faq/store-multiple', [AdminTrekFaqController::class, 'storeMultiple'])->name('faq.store-multiple');
    });