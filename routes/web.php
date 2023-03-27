<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\FlightController;
use  App\Http\Controllers\AttractionController;
use  App\Http\Controllers\CarrentalController;
use  App\Http\Controllers\InsuranceController;
use  App\Http\Controllers\StayController;
use  App\Http\Controllers\VisaController;
use  App\Http\Controllers\StaticController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\EmailLoginController;
use App\Http\Controllers\PackageQueryController;
use App\Http\Controllers\Agent\AgentController;
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
Route::get('/clear-cache', function () {
	//$run = Artisan::call('config:clear');
	$run = Artisan::call('cache:clear');
	//$run = Artisan::call('config:cache');
	return 'FINISHED';
});
Route::get('site/shutdown', function () {
	return Artisan::call('down');
});

Route::get('site/live', function () {
	return Artisan::call('up');
});

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
Route::get('flight/filter', [FlightController::class, 'flightfilter'])->name('filter');
Route::get('initiate-Payment/{id}', [FlightController::class, 'inititatePayment'])->name('inititatePayment');
Route::get('flight/booking-confirmation/{id?}', [FlightController::class, 'bkConfiration'])->name('booking.confirmation');
// Route::post('/flight_order', [FlightController::class, 'flight_order'])->name('flight_order');

Route::get('/hotel', [StayController::class, 'index'])->name('hotel');
Route::post('/search_hotel', [StayController::class, 'search_hotel'])->name('search_hotel');
Route::post('/setRegion', [StayController::class, 'setRegion'])->name('setRegion');
Route::get('/hotelDetails/{id?}/{travelr?}', [StayController::class, 'hotelDetails'])->name('hotelDetails');
Route::post('/hotel/review', [StayController::class, 'book_now'])->name('book_now');
Route::post('/hotel/booking', [StayController::class, 'conf_book_now']);
Route::get('/hotel/confirm/{id}', [StayController::class, 'confirmBookingview'])->name('booking.show');
Route::get('/loadMoredata', [StayController::class, 'loadMoredata'])->name('loadMoredata');
Route::get('/getSuggestionitems', [StayController::class, 'getSuggestionitems'])->name('getSuggestionitems');
Route::post('/search_hot', [StayController::class, 'search_hot'])->name('search_hot');
Route::post('/submit_contact_form', [StayController::class, 'submit_contact_form'])->name('submit_contact_form');

Route::get('/packages', [AttractionController::class, 'index'])->name('packages');
Route::get('/package-list/{destination}', [AttractionController::class, 'packageList'])->name('packages-list');
Route::get('/package/{city}/{package}', [AttractionController::class, 'details']);

Route::get('/visa', [VisaController::class, 'index'])->name('visa');
Route::post('/visa_enquiry', [VisaController::class, 'visa_enquiry'])->name('visa_enquiry');

Route::get('/insurance', [InsuranceController::class, 'index'])->name('insurance');

Route::get('/car-rentals', [CarrentalController::class, 'index'])->name('carrentals');
Route::get('/payment', [FlightController::class, 'payment'])->name('payment');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});


Route::controller(EmailLoginController::class)->group(function () {
    Route::any('request_otp', 'requestOtp')->name('requestOtp');
    Route::post('verify-otp', 'verifyOtp')->name('verifyOtp');
});


Route::controller(PackageQueryController::class)->group(function () {
    Route::post('query/package/store', 'store')->name('query.package');
});


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard-index');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
        Route::post('/profile/update', [DashboardController::class, 'profileUpdate'])->name('profileUpdate');
        Route::post('/profile/update/image', [DashboardController::class, 'updateImage'])->name('updateImage');
    });
});


Route::prefix('agent')->name('agent.')->group(function () {
    Route::get('/login', [AgentController::class, 'index'])->name('agent-signup.index');
    Route::get('/signup', [AgentController::class, 'register'])->name('agent-signup.register');
    Route::get('/thanks', [AgentController::class, 'thank'])->name('agent-signup.thank');
    Route::post('/signup/save', [AgentController::class, 'signup'])->name('agent-signup.registerSave');
});


Route::post('/state', [AgentController::class, 'state'])->name('state');
Route::post('/city', [AgentController::class, 'city'])->name('city');
