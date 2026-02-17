<?php

namespace App\Jobs;

use App\Models\ExternalImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class ScanTempFolder implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $disk = Storage::disk('external');
        $filesOnDisk = $disk->files();
        $presentHashes = [];

        foreach ($filesOnDisk as $file) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {

                $fullPath = $disk->path($file);
                $fileHash = md5_file($fullPath);
                $presentHashes[] = $fileHash;

                ExternalImage::updateOrCreate(
                    ['hash' => $fileHash],
                    ['filename' => $file]
                );
            }
        }

        ExternalImage::whereNotIn('hash', $presentHashes)->delete();
    }
}
