<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ShortUrlController::class,'index'])->name('home');
Route::post('/shortend',[ShortUrlController::class,'store'])->name('shortend.url');
Route::get('/{shortCode}',[ShortUrlController::class,'redirect'])->name('redirect.url');

