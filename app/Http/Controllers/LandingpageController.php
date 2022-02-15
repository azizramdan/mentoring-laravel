<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(9);

        return view('landingpage', compact('products'));
    }
}
