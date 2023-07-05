<?php

namespace App\Http\Controllers;

use App\Http\Facades\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['required'],
            'photo' => ['required']
        ]);

        $folderName = ProductService::createFolderName($request->name);
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
