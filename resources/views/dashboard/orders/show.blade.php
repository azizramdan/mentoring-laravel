@extends('dashboard.layout.app')

@section('title', 'Detail Order')

@section('header', 'Detail Order')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard/orders">Order</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <img src="{{ asset('/storage/' . $order->product->image) }}" class="img-thumbnail" width="300px" >
        <div>Nama produk: {{ $order->product->name }}</div>
        <div>Kategori: {{ $order->product->category->name }}</div>
        <div>Harga: Rp. {{ number_format($order->product->price) }}</div>
        <div>Jumlah: {{ $order->qty }}</div>
        <div>Total bayar: Rp. {{ number_format($order->total) }}</div>

        <div>Nama pembeli: {{ $order->user->name }}</div>
        <div>Alamat: {{ $order->address }}</div>
        <div>Status order: {{ $order->status }}</div>

        <form action="/dashboard/orders/{{ $order->id }}" method="post" class="mt-5">
            @csrf
            @method('patch')

            @if ($order->status == 'dibayar')
            <button class="btn btn-primary">Proses order</button>
            @endif

            @if ($order->status == 'diproses')
            <button class="btn btn-primary">Kirim order</button>
            @endif
        </form>
    </div>
</div>
@endsection