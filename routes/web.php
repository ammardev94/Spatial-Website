<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/portfolios', [SiteController::class, 'portfolios'])->name('portfolios');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');
Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/service/{slug}', [SiteController::class, 'serviceDetails'])->name('service.details');
Route::get('/portfolios', [SiteController::class, 'portfolios'])->name('portfolios');
Route::get('/portfolio/{slug}', [SiteController::class, 'portfolioDetails'])->name('portfolio.show');
Route::get('/workshop', [SiteController::class, 'workshop'])->name('workshop');
Route::get('/sustainability', [SiteController::class, 'sustainability'])->name('sustainability');
Route::get('/roi-calculator', [SiteController::class, 'roiCalculator'])->name('roi-calculator');
Route::post('/roi-calculator', [SiteController::class, 'storeRoiRequest'])->name('roi-calculator.store');
Route::get('/insights', [SiteController::class, 'insights'])->name('insights');
Route::get('/insights/{slug}', [SiteController::class, 'insightDetails'])->name('insights.show');
Route::get('/showroom', [SiteController::class, 'showroom'])->name('showroom');
Route::get('/partners', [SiteController::class, 'partners'])->name('partners');
Route::post('/contact-us', [SiteController::class, 'storeContact'])->name('contact.store');
Route::get('/thank-you', [SiteController::class, 'thankYou'])->name('thank-you');
Route::get('/springs-villa-contemporary-renovation',[SiteController::class, 'comming_soon']);


