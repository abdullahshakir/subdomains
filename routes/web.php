<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Models\Domain;

// Route::get('welcome1_page', function () {
//     return view('welcome');
// });

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
    $name = [];
    $data = Domain::with('views')->get();
    foreach($data as $key => $domain)
    {
        Route::domain($domain['name'])->group(function () use ($domain) {
            foreach($domain['views'] as $view)
            {
                Route::group(['prefix' => 'admin'], function () use ($view) {
                Route::get($view['url'], function () use ($view) {
                    return view($view['name']);
                });
            });
            }
        });
    }

    // $views = [];
    // foreach(Domain::with('views')->get() as $domain);
    // {
    //     Route::prefix($domain['name'], function () use ($domain) {
    //         foreach($domain['views'] as $view)
    //         {
    //             return $view;
    //             Route::get('/', function () use ($view) {
    //                 return $view['view'];
    //             });
    //         }
    //     });
    // }

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
