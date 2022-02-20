@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('/storage/' . $product->image) }}" class="card-img-top" alt="thumbnail">
            <div class="card-body">
                <small>#{{ $product->category->name }}</small>
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description ?? '-' }}</p>
                <h6><b>Rp. {{ number_format($product->price) }}</b></h6>
                <h6>Stok: {{ $product->stock }}</h6>
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