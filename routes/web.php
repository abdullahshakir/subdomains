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
Route::controller(AboutUsController::class)->group(function () {
    Route::post('/create-about', 'createAbout')->name('create.about');
    Route::get('/edit-about/{id}', 'edit');
    Route::put('/update-about/{id}', 'update');
    Route::get('/view-about', 'view')->name('view.about');
    Route::post('/delete-about', 'delete');
});
Route::controller(ContactUsController::class)->group(function () {
    Route::post('/create-contact', 'createContactUs')->name('create.contact');
    Route::get('/edit-contact/{id}', 'edit');
    Route::put('/update-contact/{id}', 'update');
    Route::get('/view-contact', 'view')->name('view.contact');
    Route::post('/delete-contact', 'delete');
});
Route::controller(PortfolioController::class)->group(function () {
    Route::post('/create-portfolio', 'createPortfolio')->name('create.portfolio');
    Route::get('/edit-portfolio/{id}', 'edit');
    Route::put('/update-portfolio/{id}', 'update');
    Route::get('/view-portfolio', 'view')->name('view.portfolio');
    Route::post('/delete-portfolio', 'delete');
});
Route::controller(ServicesController::class)->group(function () {
    Route::get('/index-service', 'createForm')->name('index.service');
    Route::post('/create-service', 'createService')->name('create.service');
    Route::get('/edit-service/{id}', 'edit');
    Route::put('/update-service/{id}', 'update');
    Route::get('/view-service', 'view')->name('view.service');
    Route::post('/delete-service', 'delete');
});
Route::controller(GalleryController::class)->group(function () {
    Route::post('/create-gallery', 'createGallery')->name('create.gallery');
    Route::get('/edit-gallery/{id}', 'edit');
    Route::put('/update-gallery/{id}', 'update');
    Route::get('/view-gallery', 'view')->name('view.gallery');
    Route::post('/delete-gallery', 'delete');
});
Route::controller(ThemesController::class)->group(function () {
    Route::post('/create-theme', 'createTheme')->name('create.theme');
    Route::get('/edit-theme/{id}', 'edit');
    Route::put('/update-theme/{id}', 'update');
    Route::get('/view-theme', 'view')->name('view.theme');
    Route::post('/delete-theme', 'delete');
});
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
