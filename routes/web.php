<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\{
    ShowTweets
};
use App\Http\Livewire\User\UploadPhoto;

Route::get('/upload', UploadPhoto::class)->middleware('auth')->name('upload.photo');
Route::get('/tweets', ShowTweets::class)->middleware('auth')->name('tweets');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
