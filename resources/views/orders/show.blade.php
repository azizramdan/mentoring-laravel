@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <img src="{{ asset('/storage/' . $order->product->image) }}" class="img-thumbnail" width="300px" >
        <div>Nama: {{ $order->product->name }}</div>
        <div>Kategori: {{ $order->product->category->name }}</div>
        <div>Harga: Rp. {{ number_format($order->product->price) }}</div>
        <div>Jumlah: {{ $order->qty }}</div>
        <div>Total bayar: Rp. {{ number_format($order->total) }}</div>

        <div>Alamat: {{ $order->address }}</div>
        <div>Status order: {{ $order->status }}</div>

        <form action="/orders/{{ $order->id }}" method="post">
            @csrf
            @method('patch')

            @if ($order->status == 'menunggu')
            <button class="btn btn-primary mt-5">Konfirmasi saya sudah bayar</button>
            @endif

            @if ($order->status == 'dikirim')
            <button class="btn btn-primary mt-5">Konfirmasi pesanan sudah sampai</button>
            @endif
        </form>
    </div>
</div>
@endsection