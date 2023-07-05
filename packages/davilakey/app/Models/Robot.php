<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;

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
