<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index() : object {
        $products = Product::get();

        // return response()->json(new ProductResource($products));
        return response()->json(ProductResource::collection($products));
    }
}
