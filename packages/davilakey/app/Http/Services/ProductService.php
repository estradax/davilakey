<?php

namespace App\Http\Services;

use Illuminate\Support\Str;

class ProductService
{
    public function createFolderName(string $name) {
        $folderName = Str::slug($name) . '_' . now()->format('dmy-his');
        return rtrim(strtr(base64_encode($folderName), '+/', '-_'), '=');
    }
}
