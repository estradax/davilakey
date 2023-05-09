<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory, MediaAlly;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function specs()
    {
        return $this->hasMany(RobotSpec::class);
    }

    public function subImages()
    {
        return $this->hasMany(RobotSubImage::class);
    }
}
