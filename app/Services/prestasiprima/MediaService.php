<?php

namespace App\Services\prestasiprima;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class MediaService
{
    /**
     * Upload and optimize image
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
        // 1. Create filename with WebP extension
        $filename = Str::random(40) . '.webp';
        $path = $folder . '/' . $filename;

        // 2. Process Image with Intervention
        $image = Image::make($file);

        // 3. Auto-Resize (maintain aspect ratio)
        if ($width || $height) {
            $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // 4. Encode as WebP with quality optimization
        $content = (string) $image->encode('webp', $quality);

        // 5. Store in Public Disk
        Storage::disk('public')->put($path, $content);

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
