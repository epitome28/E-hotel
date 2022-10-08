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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('home', 'home');
Route::view('about', 'about');
Route::view('services', 'services');
Route::view('room', 'room');
Route::view('contact', 'contact');
Route::view('privacy', 'privacy');
Route::view('faq', 'faq');
Route::view('support', 'support');
Route::view('room-details1', 'room-details1');
Route::view('room-details2', 'room-details2');
Route::view('room-details3', 'room-details3');
Route::view('room-details4', 'room-details4');
Route::view('room-details5', 'room-details5');
Route::view('room-details6', 'room-details6');
require __DIR__.'/auth.php';
