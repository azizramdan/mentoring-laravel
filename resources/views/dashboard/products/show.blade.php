@extends('dashboard.layout.app')

@section('title', 'Detail Produk')

@section('header', 'Detail Produk')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard/products">Produk</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">ID</div>
                    <div class="col">{{ $product->id }}</div>
                </div>
                <div class="row">
                    <div class="col-2">Name</div>
                    <div class="col">{{ $product->name }}</div>
                </div>
                <div class="row">
                    <div class="col-2">Price</div>
                    <div class="col">{{ $product->price }}</div>
                </div>
                <div class="row">
                    <div class="col-2">Description</div>
                    <div class="col">{{ $product->description }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection