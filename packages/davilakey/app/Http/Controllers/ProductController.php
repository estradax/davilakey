<?php

namespace App\Http\Controllers;

use App\Http\Facades\ProductService;
use App\Http\Facades\ProductServiceClient;
use App\Models\Product;
use Google\Protobuf\GPBEmpty;
use Illuminate\Http\Request;
use Pb\Product\ProductCreateRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        list($response, $status) = ProductServiceClient::FindAll(new GPBEmpty())->wait();
        if ($status->code !== \Grpc\STATUS_OK) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $products = $response->getData();

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

        $productRequest = new ProductCreateRequest();
        $productRequest->setName($request->name);
        $productRequest->setDescription($request->description);
        $productRequest->setPrice($request->price);

        list(, $status) = ProductServiceClient::Create($productRequest)->wait();
        if ($status->code !== \Grpc\STATUS_OK) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return redirect()->route('product.create');
    }
}
