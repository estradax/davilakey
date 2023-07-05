<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;
use App\Http\Services\ProductService as Service;

class ProductService extends Facade {
    protected static function getFacadeAccessor()
    {
        return Service::class;
    }
}
