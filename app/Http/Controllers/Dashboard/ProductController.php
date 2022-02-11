<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'description')->get();

        return view('dashboard.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        Product::create($validated);

        return redirect('/dashboard/products')->with('success', 'Berhasil menambah produk baru');
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update($validated);

        return redirect('/dashboard/products')->with('success', 'Berhasil mengubah produk');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/dashboard/products')->with('success', 'Berhasil hapus produk');
    }
}
