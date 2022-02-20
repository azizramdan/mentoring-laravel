@extends('dashboard.layout.app')

@section('title', 'List Produk')

@section('header', 'List Produk')

@section('breadcrumb')
<li class="breadcrumb-item active">Produk</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="text-right"><a href="/dashboard/products/create" class="btn btn-primary">Tambah</a></div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="/dashboard/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/dashboard/products/{{ $product->id }}" class="btn btn-sm btn-success">Detail</a>
                        <form action="/dashboard/products/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</div>
@endsection