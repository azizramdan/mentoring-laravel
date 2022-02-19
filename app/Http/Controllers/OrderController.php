<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function checkout(Product $product)
    {
        $product = $product->load('category');

        return view('orders.checkout', compact('product'));
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['product.category'])
            ->paginate();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'address' => ['required', 'string'],
            'qty' => ['required', 'numeric', 'min:1'],
        ])->validate();

        $product = Product::find($validated['product_id']);

        $validated['total'] = $product->price * $validated['qty'];
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'menunggu';

        $order = Order::create($validated);
        
        return redirect('/orders/' . $order->id)->with('success', 'Berhasil membuat order');
    }

    public function show(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(404);
        }

        $order->load(['product.category']);

        return view('orders.show', compact('order'));
    }

    public function update(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(404);
        }

        $status = $order->status;

        if ($status == Order::STATUS_MENUNGGU) {
            $status = Order::STATUS_DIBAYAR;
        } elseif ($status == Order::STATUS_DIKIRIM) {
            $status = Order::STATUS_SELESAI;
        } else {
            abort(500, 'Data tidak valid');
        }

        $order->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah pesanan ke ' . $status);
    }
}
