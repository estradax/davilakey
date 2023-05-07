<?php

namespace App\Media;

use Cloudinary\Asset\Image;
use Cloudinary\Cloudinary;

class CloudinaryMedia {

    protected Cloudinary $cloudinary;

    public function __construct(Cloudinary $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

    public function image(string $s): Image
    {
        return $this->cloudinary->image($s);
    }
}
