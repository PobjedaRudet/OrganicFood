<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        // If an image file is uploaded, store it under public/uploads/products and save the relative path
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $safeName = time().'_'.preg_replace('/[^A-Za-z0-9_\.\-]/', '_', $file->getClientOriginalName());
            $path = $file->move(public_path('uploads/products'), $safeName);
            // Save relative path from public directory
            $data['image'] = 'uploads/products/'.$safeName;
        }

        $product = Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $safeName = time().'_'.preg_replace('/[^A-Za-z0-9_\.\-]/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/products'), $safeName);
            $data['image'] = 'uploads/products/'.$safeName;
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
