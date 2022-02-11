@extends('dashboard.layout.app')

@section('title', 'List Kategori')

@section('header', 'List Kategori')

@section('breadcrumb')
<li class="breadcrumb-item active">Kategori</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="text-right"><a href="/dashboard/categories/create" class="btn btn-primary">Tambah</a></div>

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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/dashboard/categories/{{ $category->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/dashboard/categories/{{ $category->id }}" class="btn btn-sm btn-success">Detail</a>
                        <form action="/dashboard/categories/{{ $category->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection