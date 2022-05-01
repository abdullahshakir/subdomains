<?php

use App\Http\Controllers\AboutUs\AboutUsController;
use App\Http\Controllers\ContactUs\ContactUsController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\Porfolio\PortfolioController;
use App\Http\Controllers\Service\ServicesController;
use App\Http\Controllers\Theme\ThemesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\StaticPagesController;
use App\Http\Controllers\DomainController;
use App\Models\Domain;

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

// backoffice routes start
Route::post('/create-about', [AboutUsController::class, 'createAbout']);
Route::post('/create-contact', [ContactUsController::class, 'createContactUs']);
Route::post('/create-portfolio', [PortfolioController::class, 'createPortfolio']);
Route::post('/create-service', [ServicesController::class, 'createService']);
Route::post('/create-gallery', [GalleryController::class, 'createGallery']);
Route::post('/create-theme', [ThemesController::class, 'createTheme']);
// backoffice routes end

Route::get('/', [StaticPagesController::class, 'homePage'])->name('home-page');

$name = [];
    $data = Domain::with('views')->get();
    foreach($data as $key => $domain)
    {
        Route::domain($domain['name'])->group(function () use ($domain) {
            foreach($domain['views'] as $view)
            {
                Route::get($view['url'], function($view) {
                    return view($view['name']);
                });
            }
        });
    }

Route::domain('admin.'.env('DOMAIN_ONE'))->group(function () {
    Route::get('/', function () {
        return view('example-test.admin.index');
    });
});

Route::domain(env('DOMAIN_ONE'))->group(function () {
    Route::get('/', function () {
        return view('example-test.index');
    });
});

Route::domain('admin.'.env('DOMAIN_TWO'))->group(function () {
    Route::get('/', function () {
        return view('example-net.admin.index');
    });
});

Route::domain(env('DOMAIN_TWO'))->group(function () {
    Route::get('/', function () {
        return view('example-net.index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
