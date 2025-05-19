<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HealthController;
// use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

// Route to display the health problems list for guest users
Route::get('/health', [HealthController::class, 'index']);
// About page route
Route::get('/health/about', [HealthController::class, 'about']);

// Route to display the create form for the authorised user (admin)
Route::get('/admin/create', [HealthController::class, 'create'])->middleware(['auth', 'can:edit']);
// Route to handles the submition form
Route::post('/admin', [HealthController::class, 'store'])->middleware(['auth', 'can:edit']);

// Route to get the  history for the authenticated user
Route::get('/history', [HistoryController::class, 'index'])->middleware('auth');
// Route to delete histories
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->middleware('auth')->name('history.destroy');

Route::get('/health/{id}', [HealthController::class, 'show']);
// Route for login display form
Route::get('/login', [AuthController::class, 'index']);
// Route to handle the login form submission
Route::post('/login', [AuthController::class, 'login']);
// Route to handle the log out
Route::post('/logout', [AuthController::class, 'logout']);

// Route to send the form data to the controller method getRecommendations()
Route::post('/health', [HealthController::class, 'getRecommendations'])->middleware('auth');
// GET route to display recommendations for the entered health problem
Route::get('/recommendations/{healthCondition}', [HealthController::class, 'showRecommendations'])
    ->name('recommendations.show')->middleware('auth');

// Routes for the registration form and to handle the registration form submision
Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);
