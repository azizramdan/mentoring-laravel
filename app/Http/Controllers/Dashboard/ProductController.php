<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'description', 'category_id')
            ->with('category')
            ->get();

        return view('dashboard.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('dashboard.products.create', [
            'categories' => $categories,
        ]);
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
            'product' => $product->load('category')
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => $categories,
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
