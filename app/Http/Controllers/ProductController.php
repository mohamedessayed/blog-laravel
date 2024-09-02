<?php

namespace App\Http\Controllers;

use App\Models\Auther;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $authers = Auther::select('id', 'auther_name')->get();
        $categories = Category::select('id', 'category_name')->get();
        return view('product.create', ['authers' => $authers, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'product_name' => 'required|string|min:3|unique:products,product_name',
            'product_price' => 'required|integer|min:10',
            'description' => 'nullable|string|min:10',
            'product_auther' => 'required|integer|exists:authers,id',
            'product_category' => 'required|integer|exists:categories,id',
            'image' => 'required|image|mimes:jpg,bmp,png'
        ]);


        $randomName = Str::random(20) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('products', $randomName);

        Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->description,
            'auther_id' => $request->product_auther,
            'category_id' => $request->product_category,
            'product_image' => $randomName
        ]);

        return redirect()->route('product.index')->with('message', 'Creaetd Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //

        $request->validate([
            'product_name' => "required|string|min:3|unique:products,product_name,$product->id",
            'description' => 'nullable|string|min:10',
            'image' => 'nullable|image|mimes:jpg,bmp,png'
        ]);

        $imageName = $product->product_image;

        if ($request->file('image')) {
            # code...

            Storage::delete('products/'.$imageName);

            $imageName = Str::random(20) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('products', $imageName);
        }

        $product->update([
            'product_name' => $request->product_name,
            'product_description' => $request->description,
            'product_image' => $imageName
        ]);

        return redirect()->route('product.index')->with('message', 'updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        Storage::delete("products/$product->product_image");
        
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Deleted Successfully');
    }
}
