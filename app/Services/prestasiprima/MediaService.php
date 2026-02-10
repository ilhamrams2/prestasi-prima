<?php

namespace App\Services\prestasiprima;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class MediaService
{
    /**
     * Upload and optimize image or file
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @param int|null $width
     * @param int|null $height
     * @param int $quality
     * @return string
     */
    public static function upload($file, $folder = 'uploads', $width = 1200, $height = null, $quality = 80)
    {
        $mime = $file->getMimeType();

        // 1. IMAGE HANDLING (Convert to WebP & Compress)
        if (str_starts_with($mime, 'image/')) {
            $filename = Str::random(40) . '.webp';
            $path = $folder . '/' . $filename;

            // Process Image with Intervention
            $image = Image::make($file);

            // Auto-Resize (maintain aspect ratio)
            if ($width || $height) {
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            // Encode as WebP with quality optimization
            $content = (string) $image->encode('webp', $quality);

            // Store in Public Disk
            Storage::disk('public')->put($path, $content);

            return $path;
        }

        // 2. DOCUMENT / VIDEO HANDLING (Direct Storage)
        // Keep original extension
        $extension = $file->getClientOriginalExtension();
        $filename = Str::random(40) . '.' . $extension;

        // Store safely using stream (better for large video files)
        $path = $file->storeAs($folder, $filename, 'public');

        return $path;
    }

    /**
     * Delete image from storage
     * 
     * @param string|null $path
     * @return void
     */
    public static function delete($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
