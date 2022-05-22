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
// backoffice routes start
    Route::controller(AboutUsController::class)->group(function () {
        Route::get('/index-about', 'createForm')->name('index.about');
        Route::get('/edit-about/{id}', 'edit')->middleware(['admin']);
        Route::get('/view-about', 'view')->name('view.about');
        Route::post('/create-about', 'createAbout')->name('create.about');
        Route::delete('/delete-about/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-about/{id}', 'update')->middleware(['admin']);
    });
    Route::controller(ContactUsController::class)->group(function () {
        Route::get('/edit-contact/{id}', 'edit');
        Route::get('/view-contact', 'view')->name('view.contact');
        Route::delete('/delete-contact/{id}', 'delete');
        Route::put('/update-contact/{id}', 'update');
    });
    Route::controller(PortfolioController::class)->group(function () {
        Route::get('/index-portfolio', 'createForm')->name('index.portfolio');
        Route::get('/edit-portfolio/{id}', 'edit');
        Route::get('/view-portfolio', 'view')->name('view.portfolio');
        Route::post('/create-portfolio', 'createPortfolio')->name('create.portfolio');
        Route::post('/delete-portfolio', 'delete');
        Route::post('/update-portfolio/{id}', 'update')->name('update.portfolio')->middleware(['admin']);
        Route::delete('/delete-portfolio/{id}', 'delete')->middleware(['admin']);
    });
    Route::controller(ServicesController::class)->group(function () {
        Route::get('/index-service', 'createForm')->name('index.service');
        Route::get('/view-service', 'view')->name('view.service');
        Route::get('/edit-service/{id}', 'edit');
        Route::post('/create-service', 'createService')->name('create.service');
        Route::post('/update-service/{id}', 'update')->name('update.service')->middleware(['admin']);
        Route::delete('/delete-service/{id}', 'delete')->middleware(['admin']);
        Route::get('/index-service-sub-services', 'createSubServiceForm')->name('index.service.sub.services');
        Route::get('/edit-sub-services/{id}', 'editSubServices')->name('edit.sub.services')->middleware(['admin']);
        Route::post('/create-sub-services', 'createSubService')->name('create.sub.services');
        Route::post('/update-sub-services/{id}', 'updateSubService')->name('update.sub.services')->middleware(['admin']);
    });
    Route::controller(GalleryController::class)->group(function () {
        Route::get('/index-gallery', 'createForm')->name('index.gallery');
        Route::get('/edit-gallery/{id}', 'edit');
        Route::get('/view-gallery', 'view')->name('view.gallery');
        Route::post('/create-gallery', 'createGallery')->name('create.gallery');
        Route::delete('/delete-gallery/{id}', 'delete')->middleware(['admin']);
        Route::put('/update-gallery/{id}', 'update');
    });
    Route::controller(ThemesController::class)->group(function () {
        Route::get('/index-theme', 'createForm')->name('index.theme');
        Route::get('/edit-theme/{id}', 'edit')->name('edit.theme')->middleware(['admin']);
        Route::get('/view-theme', 'view')->name('view.theme');
        Route::post('/create-theme', 'createTheme')->name('create.theme');
        Route::delete('/delete-theme/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-theme/{id}', 'update')->name('update.theme')->middleware(['admin']);
    });
    Route::controller(DomainController::class)->group(function () {
        Route::get('/index-domain', 'createForm')->name('index.domain');
        Route::get('/edit-domain/{id}', 'edit')->name('edit.domain')->middleware(['admin']);
        Route::get('/view-domain', 'view')->name('view.domain');
        Route::post('/create-domain', 'createDomain')->name('create.domain');
        Route::delete('/delete-domain/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-domain/{id}', 'update')->name('update.domain')->middleware(['admin']);
    });
    Route::controller(HeaderFooterController::class)->group(function () {
        Route::get('/index-footer', 'createForm')->name('index.footer');
        Route::get('/edit-footer/{id}', 'edit')->name('edit.footer')->middleware(['admin']);
        Route::get('/view-footer', 'view')->name('view.footer');
        Route::post('/create-footer', 'createFooter')->name('create.footer');
        Route::delete('/delete-footer/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-footer/{id}', 'update')->name('update.footer')->middleware(['admin']);
        Route::get('/index-header', 'createFormHeader')->name('index.header');
        Route::get('/edit-header/{id}', 'editHeader')->name('edit.header')->middleware(['admin']);
        Route::get('/view-header', 'viewHeader')->name('view.header');
        Route::post('/create-header', 'createHeader')->name('create.header');
        Route::delete('/delete-header/{id}', 'deleteHeader')->middleware(['admin']);
        Route::post('/update-header/{id}', 'updateHeader')->name('update.header')->middleware(['admin']);
    });
    Route::controller(TeamAndTeamMembersController::class)->group(function () {
        Route::get('/index-team', 'createForm')->name('index.team');
        Route::get('/edit-team/{id}', 'edit')->name('edit.team')->middleware(['admin']);
        Route::get('/view-team', 'view')->name('view.team');
        Route::post('/create-team', 'createTeam')->name('create.team');
        Route::delete('/delete-team/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-team/{id}', 'update')->name('update.team')->middleware(['admin']);
        Route::get('/index-team-members', 'createTeamMembersForm')->name('index.team.members');
        Route::get('/edit-team-members/{id}', 'editTeamMembers')->name('edit.team.members')->middleware(['admin']);
        Route::post('/create-team-members', 'createTeamMembers')->name('create.team.members');
        Route::post('/update-team-members/{id}', 'updateTeamMembers')->name('update.team.members')->middleware(['admin']);
    });
    Route::controller(SlidersController::class)->group(function () {
        Route::get('/index-slider', 'createForm')->name('index.slider');
        Route::get('/edit-slider/{id}', 'edit')->name('edit.slider')->middleware(['admin']);
        Route::get('/view-slider', 'view')->name('view.slider');
        Route::post('/create-slider', 'createSlider')->name('create.slider');
        Route::delete('/delete-slider/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-slider/{id}', 'update')->name('update.slider')->middleware(['admin']);
    });
    Route::controller(FeatureController::class)->group(function () {
        Route::get('/index-feature', 'createForm')->name('index.feature');
        Route::get('/edit-feature/{id}', 'edit')->name('edit.feature')->middleware(['admin']);
        Route::get('/view-feature', 'view')->name('view.feature');
        Route::post('/create-feature', 'createFeature')->name('create.feature');
        Route::delete('/delete-feature/{id}', 'delete')->middleware(['admin']);
        Route::post('/update-feature/{id}', 'update')->name('update.feature')->middleware(['admin']);
    });
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

//$name = [];
//    $data = Domain::with('views')->get();
//    foreach($data as $key => $domain)
//    {
//        Route::domain($domain['name'])->group(function () use ($domain) {
//            foreach($domain['views'] as $view)
//            {
//                Route::get($view['url'], function($view) {
//                    return view($view['name']);
//                });
//            }
//        });
//    }

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
