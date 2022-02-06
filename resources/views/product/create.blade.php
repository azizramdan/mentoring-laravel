@extends('layouts.app')

@section('title')
    Tambah produk baru
@endsection

@section('content')
<form method="POST" action="/products">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
      @error('name')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
      @error('price')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
      @error('description')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection