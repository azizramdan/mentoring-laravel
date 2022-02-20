@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<form action="/" method="get">
    <input type="hidden" name="category" value="{{ request()->category }}">
    <input type="text" name="search" class="form-control" placeholder="Masukkan kata kunci" value="{{ request()->search }}">

    <div class="mb-3">
        <label for="sort" class="form-label">Urutkan</label>
        <select class="custom-select" name="sort">
            <option value="">Tidak di urutkan</option>
            <option value="price">Price</option>
            <option value="stock">Stock</option>
            <option value="terlaris">Terlaris</option>
        </select>
        <select class="custom-select" name="sort_order">
            <option value="">Tidak di urutkan</option>
            <option value="asc">A-Z</option>
            <option value="desc">Z-A</option>
        </select>
    </div>

    <button class="btn btn-primary">Submit</button>
</form>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
    @foreach ($products as $product)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('/storage/' . $product->image) }}" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <a href="/?category={{ $product->category_id }}">#{{ $product->category->name }}</a>
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description ?? '-' }}</p>
                <h6><b>Rp. {{ number_format($product->price) }}</b></h6>
                <h6>Stok: {{ $product->stock }}</h6>
                <h6>Terjual: {{ $product->orders_count }}</h6>
                <div class="d-grid">
                    <a href="/checkout/{{ $product->id }}" class="btn btn-primary mt-2">Beli</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-5">
    {{ $products->links() }}
</div>
@endsection