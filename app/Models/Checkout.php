<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'total_price'
    ];

    public function robots()
    {
        return $this->belongsToMany(Robot::class);
    }
}
