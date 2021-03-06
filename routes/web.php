<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
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
    return view('welcome');
});
Route::get('/list', 'BoardController@list')->name('list'); // listing

Route::get('/write', [BoardController::class, 'write'])->name('write');
Route::post('/store', [BoardController::class, 'store'])->name('store'); // insert

Route::get('/detail/{bid}', 'BoardController@detail')->name('detail'); // go detail

Route::get('/detail/{bid}/rewrite', 'BoardController@rewrite')->name('rewrite'); // go rewrite view
Route::post('/detail/update', 'BoardController@update')->name('update'); // do rewrite

Route::get('/delete/{bid}', 'BoardController@delete')->name('delete'); // delete

Route::get('/detail/{bid}/download/{aid}', 'BoardController@download')->name('download');
