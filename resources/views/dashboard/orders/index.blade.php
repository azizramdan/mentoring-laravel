@extends('dashboard.layout.app')

@section('title', 'List Orders')

@section('header', 'List Orders')

@section('breadcrumb')
<li class="breadcrumb-item active">Orders</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Buyer</th>
                    <th scope="col">Product</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>Rp. {{ number_format($order->total) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="/dashboard/orders/{{ $order->id }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">{{ $orders->links() }}</div>
    </div>
</div>
@endsection