<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;

Route::post('/track/page-visit', [TrackingController::class, 'pageVisit']);
Route::post('/track/page-duration', [TrackingController::class, 'pageDuration']);
Route::post('/track/page-switch', [TrackingController::class, 'pageSwitch']);
