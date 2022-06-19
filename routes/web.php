<?php

use App\Http\Controllers\ContactUs\ContactUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Models\Domain;
use App\Models\Theme;
use App\Http\Controllers\subdomain\SubDomainController;
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
Auth::routes();

// Route::controller(ContactUsController::class)->group(function () {
//     Route::post('/create-contact', 'createContactUs')->name('create.contact');
// });

// backoffice routes end
Route::resource('sub-domain', SubDomainController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('domains', DomainController::class);
    // Route::controller(DomainController::class)->group(function () {
    //     Route::get('/index-domain', 'createForm')->name('index.domain');
    //     Route::get('/edit-domain/{id}', 'edit')->name('edit.domain')->middleware(['admin']);
    //     Route::get('/view-domain', 'view')->name('view.domain');
    //     Route::post('/create-domain', 'createDomain')->name('create.domain');
    //     Route::delete('/delete-domain/{id}', 'delete')->middleware(['admin']);
    //     Route::post('/update-domain/{id}', 'update')->name('update.domain')->middleware(['admin']);
    // });
});

$domains = Domain::with('theme')->get();
foreach ($domains as $key => $domain) {
    Route::prefix('domains/{domain}')->group(function () use ($domain) {
        foreach ($domain->sections as $section) {
            $className = "\\App\\Http\\Controllers\\{$domain->theme->name}\\{$section->controller}";
            Route::resource($section->route, app($className)::class);
        }
    });
}

// $domains = Domain::with('theme')->get();
// foreach ($domains as $key => $domain) {
//     foreach ($domain->sections as $section) {
//         $className = "\\App\\Http\\Controllers\\{$domain->theme->name}\\{$section->controller}";
//         Route::resource($section->route, app($className)::class);
//     }
// }


// $domains = Theme::with('themeSections')->get();
// foreach ($domains as $key => $domain) {
//     foreach ($domain->themeSections as $section) {
//         $className = "\\App\\Http\\Controllers\\{$domain->name}\\{$section->controller}";
//         Route::resource($section->route, app($className)::class);
//     }
// }

// Route::domain('admin.'.env('DOMAIN_ONE'))->group(function () {
//     Route::get('/', function () {
//         return view('example-test.admin.index');
//     });
// });

// Route::domain(env('DOMAIN_ONE'))->group(function () {
//     Route::get('/', function () {
//         return view('example-test.index');
//     });
// });

// Route::domain('admin.'.env('DOMAIN_TWO'))->group(function () {
//     Route::get('/', function () {
//         return view('example-net.admin.index');
//     });
// });

// Route::domain(env('DOMAIN_TWO'))->group(function () {
//     Route::get('/', function () {
//         return view('example-net.index');
//     });
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


