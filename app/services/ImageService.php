<?php

namespace App\services;

use Illuminate\Http\UploadedFile;

class ImageService
{
    public function handleUpload(UploadedFile $image, $storage)
    {
        $filename = time().'.'.$image->getClientOriginalExtension();

        return $image->storeAs($storage, $filename, 'public');
    }
}
