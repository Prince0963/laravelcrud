<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datalist = Product::all();
        return view('product.index.index', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $path = "";

        if($image = $request->file('image')){
            $imageName = time() . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return view('product.show.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
      
        $path = $product->image;

        if($image = $request->file('image')){
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imageName = time() . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
        }

        $product->name = $request->name;
        $product->description = $request->description; 
        $product->image = $path;
        
        $product->update();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('products.index');
    }
}
