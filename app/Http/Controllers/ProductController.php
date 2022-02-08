<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $products = DB::select('SELECT id, name, price, description FROM products');

        // $products = DB::table('products')->select('id', 'name', 'price', 'description')->get();

        $products = Product::select('id', 'name', 'price', 'description')->get();

        // dd($products);

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        Product::create($validated);

        // $product = new Product();
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->save();

        // Product::insert([
        //     [
        //         'name' => 'name 1',
        //         'price' => 10000,
        //         'description' => 'asdsadsad',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'name 2',
        //         'price' => 10000,
        //         'description' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'name 3',
        //         'price' => 10000,
        //         'description' => 'asdsadsad',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        return redirect('/products')->with('success', 'Berhasil menambah produk baru');
    }

    public function show($id)
    {
        // $product = DB::select('SELECT * FROM products WHERE id = ?', [$id]);

        // $product = DB::table('products')->where('id', $id)->first();

        $product = Product::where('id', $id)->first();

        // dd($product);

        return view('product.show', [
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('product.edit', [
            'product' => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $validated = $request->validated();

        Product::where('id', $id)->update($validated);

        return redirect('/products')->with('success', 'Berhasil mengubah produk');
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();

        return redirect('/products')->with('success', 'Berhasil hapus produk');
    }
}
