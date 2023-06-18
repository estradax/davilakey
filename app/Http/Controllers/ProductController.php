<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function edit()
    {
        return view('product.edit');
    }

    public function create()
    {
        return view('product.create');
    }

    protected function createFolderName(string $name) {
        $folderName = Str::slug($name) . '_' . now()->format('dmy-his');
        return rtrim(strtr(base64_encode($folderName), '+/', '-_'), '=');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['required'],
            'photo' => ['required']
        ]);

        $folderName = $this->createFolderName($request->name);
        $photoUrl = $request->file('photo')->store($folderName, ['disk' => 'public']);

        if (!$photoUrl) {
            dd('error: photo is not stored');
        }

        Product::create([
            'name' => $request->name,
            'price' => (double) $request->price,
            'description' => $request->description,
            'photo_url' => $photoUrl
        ]);

        return redirect()->route('product.create');
    }
}
