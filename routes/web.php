<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\ApplicantController;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/form', function () {
    return view('search/form');
});

Route::post('/search',[SearchController::class,'store'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('/exam',[SearchController::class,'exam'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('/examresult',[SearchController::class,'examresult'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('/admission',[SearchController::class,'admission'])->withoutMiddleware(VerifyCsrfToken::class);

// yamamoto

// 志望理由変更呼び出し
Route::get('/edit', function () {
    return view('google/edit');
});
// 志望修正画面呼び出し
Route::post('/edit', [ApplicantController::class, 'editApplicantInfo'])->withoutMiddleware(VerifyCsrfToken::class);
// 志望理由修正
Route::post('/update', [ApplicantController::class, 'updateApplicantInfo']);
Route::post('/updateApplicantInfo', [ApplicantController::class, 'updateApplicantInfo']);

