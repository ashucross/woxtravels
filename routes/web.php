<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FlightController;
use  App\Http\Controllers\AttractionController;
use  App\Http\Controllers\CarrentalController;
use  App\Http\Controllers\InsuranceController;
use  App\Http\Controllers\StayController;
use  App\Http\Controllers\VisaController;
use  App\Http\Controllers\StaticController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [FlightController::class, 'index'])->name('flight');

Route::get('/my-tips', [StaticController::class, 'mytips'])->name('my-tips');
Route::get('/about-us', [StaticController::class, 'aboutus'])->name('about-us');
Route::get('/contact-us', [StaticController::class, 'contactus'])->name('contact-us');
Route::get('/faq', [StaticController::class, 'faq'])->name('faq');
Route::get('/career', [StaticController::class, 'career'])->name('career');
Route::get('/terms-conditions', [StaticController::class, 'termsconditions'])->name('terms-conditions');
Route::get('/privacy-policy', [StaticController::class, 'privacypolicy'])->name('privacy-policy');

Route::get('/airport-list', [FlightController::class, 'airport'])->name('search-airport');
Route::post('/flight-search', [FlightController::class, 'flightSearch'])->name('flight-search');
Route::get('/flight-search', [FlightController::class, 'flightList'])->name('flight-list');
Route::get('/flightList/details/', [FlightController::class, 'flightDetails'])->name('flightDetails');
Route::get('/flightReview', [FlightController::class, 'flightReview'])->name('flightReview');
Route::post('flight/booking', [FlightController::class, 'bookingFlight'])->name('booking');
// Route::post('/flight_order', [FlightController::class, 'flight_order'])->name('flight_order');

Route::get('/hotel', [StayController::class, 'index'])->name('hotel');
Route::post('/search_hotel', [StayController::class, 'search_hotel'])->name('search_hotel');
Route::get('/hotelDetails', [StayController::class, 'hotelDetails'])->name('hotelDetails');
Route::get('/book_now', [StayController::class, 'book_now'])->name('book_now');
Route::get('/loadMoredata', [StayController::class, 'loadMoredata'])->name('loadMoredata');
Route::get('/getSuggestionitems', [StayController::class, 'getSuggestionitems'])->name('getSuggestionitems');

Route::get('/packages', [AttractionController::class, 'index'])->name('packages');
Route::get('/package-list/{destination}', [AttractionController::class, 'packageList'])->name('packages-list');
Route::get('/package/{city}/{package}', [AttractionController::class, 'details'])->name('packages');

Route::get('/visa', [VisaController::class, 'index'])->name('visa');

Route::get('/insurance', [InsuranceController::class, 'index'])->name('insurance');

Route::get('/car-rentals', [CarrentalController::class, 'index'])->name('carrentals');
Route::get('/payment', [FlightController::class, 'payment'])->name('payment');





