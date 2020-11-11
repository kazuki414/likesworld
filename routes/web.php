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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// 本番環境用
// ProductionならHTTPSに変更
if (app()->environment('production')) {
    URL::forceScheme('https');
  }

// ようこそ
Route::get('/hello','App\Http\Controllers\HelloController@index');

// inputページ
Route::get('/auth/top','App\Http\Controllers\InputController@top')->middleware('auth')->name('top');
Route::post('/auth/check','App\Http\Controllers\InputController@check')->middleware('auth')->name('check');
Route::post('/auth/submit','App\Http\Controllers\InputController@submit')->middleware('auth')->name('submit');
Route::post('/auth/update','App\Http\Controllers\InputController@update')->middleware('auth')->name('update');

// マイペーじ
Route::get('/auth/profile/mypage','App\Http\Controllers\ProfileController@mypage')->middleware('auth')->name('mypage');

