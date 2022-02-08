@extends('layouts.app')

@section('title')
List produk
@endsection

@section('content')
<div class="text-end"><a href="/products/create" class="btn btn-primary">Tambah</a></div>

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
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/products/{{ $product->id }}" class="btn btn-sm btn-success">Detail</a>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection