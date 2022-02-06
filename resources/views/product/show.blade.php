@extends('layouts.app')

@section('title')
Detail produk
@endsection

@section('content')
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
@endsection