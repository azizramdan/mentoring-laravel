<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->category;
        $search = $request->search;
        $sort = $request->sort;
        $sortOrder = $request->sort_order;

        $products = Product::where('stock', '>', 0)
            ->with(['category']);

        if ($category) {
            $products->where('category_id', $category);
        }

        if ($search) {
            $products->where('name', 'LIKE', "%$search%");
        }

        if ($sort) {
            if ($sort == 'price' || $sort == 'stock') {
                $products->orderBy($sort, $sortOrder);
            } elseif ($sort == 'terlaris') {
                $products->withCount([
                    'orders' => function ($query) {
                        $query->where('status', Order::STATUS_SELESAI);
                    }
                ])
                ->orderBy('orders_count', $sortOrder);
            }
        }

        $products = $products->paginate(9);

        return view('landingpage', compact('products'));
    }
}
