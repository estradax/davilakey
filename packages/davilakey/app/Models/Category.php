<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function robots()
    {
        return $this->belongsToMany(Robot::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
