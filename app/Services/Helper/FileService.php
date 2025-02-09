<?php

namespace App\Services\Helper;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function upload(UploadedFile $file): string
    {
        $name = time() . '.' . $file->extension();
        $path = 'uploads';
        Storage::disk('public')->putFileAs($path, $file, $name);
        return Storage::disk('public')->url($path . '/' . $name);
    }
}
