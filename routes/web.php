<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('albums.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'Album', 'prefix'=>'albums'], function(){
    Route::get('/','IndexController')->name('albums.index');
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/create', 'CreateController')->name('albums.create');
        Route::get('/search', 'SearchController')->name('albums.search');
        Route::post('/', 'StoreController')->name('albums.store');
        Route::post('/find', 'FindController')->name('albums.find');
        Route::get('/{album}/edit', 'EditController')->name('albums.edit');
        Route::patch('/{album}', 'UpdateController')->name('albums.update');
        Route::delete('/{album}', 'DestroyController')->name('albums.destroy');
    });
});
