<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->category;
        $search = $request->search;

        $products = Product::where('stock', '>', 0)
            ->with('category');

        if ($category) {
            $products->where('category_id', $category);
        }

        if ($search) {
            $products->where('name', 'LIKE', "%$search%");
        }

        $products = $products->paginate(9);

        return view('landingpage', compact('products'));
    }
}
