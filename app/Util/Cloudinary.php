<?php

namespace App\Util;

use Cloudinary\Transformation\Resize;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary as CloudinaryEngine;

class Cloudinary {
    public static function scaleTo(string $publicId, int $w, int $h) {
        return CloudinaryEngine::getImage($publicId)
            ->resize(Resize::scale()->width($w)->height($h));
    }
}
