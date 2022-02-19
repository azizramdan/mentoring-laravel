<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'user',
            'product'
        ])
        ->paginate();

        return view('dashboard.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load([
            'user',
            'product.category'
        ]);

        return view('dashboard.orders.show', compact('order'));
    }

    public function update(Order $order)
    {
        $status = $order->status;

        if ($status == Order::STATUS_DIBAYAR) {
            $status = Order::STATUS_DIPROSES;
        } elseif ($status == Order::STATUS_DIPROSES) {
            $status = Order::STATUS_DIKIRIM;
        } else {
            abort(500, 'Data tidak valid');
        }

        $order->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah pesanan ke ' . $status);
    }
}
