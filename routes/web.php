<?php

use App\Http\Controllers\ImageController;
use App\Models\ExternalImage;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard', [
        'images' => ExternalImage::latest()->get()
    ]);
})->name('dashboard');

Route::get('/external-image/{filename}', [ImageController::class, 'show'])->name('image.display');