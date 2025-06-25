<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login-page');
Route::post('/login', [LoginController::class, 'login'])->name('login.input');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // albums
    Route::get('/albums', [UserController::class, 'index'])->name('dashboard');
    Route::get('/albums/create', [AlbumController::class, 'create'])->name('album-create');
    Route::post('/albums/create', [AlbumController::class, 'store'])->name('album-store');
    Route::get('/albums/view/{id}', [AlbumController::class, 'show'])->name('album-view');
    Route::get('/albums/edit/{id}', [AlbumController::class, 'edit'])->name('album-edit');
    Route::delete('/albums/destroy/{id}', [AlbumController::class, 'destroy'])->name('album-destroy');
    Route::patch('/albums/edit/{id}', [AlbumController::class, 'update'])->name('album-update');

    // sales
    Route::get('/albums-sold', [AlbumController::class, 'index'])->name('albums');
    Route::get('/combined-albums-sold', [AlbumController::class, 'combined'])->name('combined-albums');

    // artists
    Route::get('/artists', [ArtistController::class, 'index'])->name('artists');
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artist-create');
    Route::post('/artists/create', [ArtistController::class, 'store'])->name('artist-store');
    Route::get('/artists/view/{id}', [ArtistController::class, 'show'])->name('artist-view');
    Route::get('/artists/edit/{id}', [ArtistController::class, 'edit'])->name('artist-edit');
    Route::delete('/artists/destroy/{id}', [ArtistController::class, 'destroy'])->name('artist-destroy');
    Route::patch('/artists/edit/{id}', [ArtistController::class, 'update'])->name('artists-update');
    Route::get('/top-artist', [ArtistController::class, 'top'])->name('top-artist');
});

Route::fallback(function() {
    return view('missing');
});