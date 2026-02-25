<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    public function show($filename)
    {
        $disk = Storage::disk('shared_recup');

        if (!$disk->exists($filename)) {
            abort(404);
        }

        $mimeType = $disk->mimeType($filename);

        return response()->stream(function () use ($disk, $filename) {
            $stream = $disk->readStream($filename);
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}