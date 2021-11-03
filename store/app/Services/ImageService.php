<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        $file = $imageFile;
        $fileName = uniqid(rand() . '_');
        $extension = $file->extension();
        $fileNameToStore = $fileName . '.' . $extension;
        $resizedImage = InterventionImage::make($file)->resize(1280, 851)->encode();
        Storage::put('public/'. $folderName . '/' . $fileNameToStore, $resizedImage);
        return  $fileNameToStore;
    }
}
