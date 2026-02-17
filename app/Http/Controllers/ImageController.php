<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($filename)
    {
        $path = basename($filename);
        if (!Storage::disk('external')->exists($path))
            abort(404);
        return response()->file(Storage::disk('external')->path($path));
    }
}
