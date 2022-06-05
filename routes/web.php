<?php

use App\Http\Controllers\AboutUs\AboutUsController;
use App\Http\Controllers\Connectivity\ConnectivityController;
use App\Http\Controllers\ContactUs\ContactUsController;
use App\Http\Controllers\Feature\FeatureController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\HeaderFooter\HeaderFooterController;
use App\Http\Controllers\Porfolio\PortfolioController;
use App\Http\Controllers\Service\ServicesController;
use App\Http\Controllers\Slider\SlidersController;
use App\Http\Controllers\TeamAndTeamMembersController;
use App\Http\Controllers\Theme\ThemesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\StaticPagesController;
use App\Http\Controllers\DomainController;

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
Route::controller(ContactUsController::class)->group(function () {
    Route::post('/create-contact', 'createContactUs')->name('create.contact');
});


Route::middleware(['auth'])->group(function () {
    Route::controller(ConnectivityController::class)->group(function () {
        Route::get('/index-connectivity', 'createForm')->name('index.connectivity');
        Route::get('/edit-connectivity/{id}', 'edit')->name('edit.connectivity')->middleware(['admin']);
        Route::get('/view-connectivity', 'view')->name('view.connectivity');
        Route::post('/create-connectivity', 'createConnectivity')->name('create.connectivity');
        Route::delete('/delete-connectivity/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-connectivity/{id}', 'update')->name('update.connectivity')->middleware(['admin']);
    });
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
