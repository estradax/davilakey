<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class ProductServiceClient extends Facade {
    protected static function getFacadeAccessor()
    {
        return \Pb\Product\ProductServiceClient::class;
    }
}
