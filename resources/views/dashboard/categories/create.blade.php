@extends('dashboard.layout.app')

@section('title', 'Tambah Kategori Baru')

@section('header', 'Tambah Kategori Baru')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard/categories">Kategori</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/dashboard/categories">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection