@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<form method="POST" action="/orders">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <img src="{{ asset('/storage/' . $product->image) }}" class="img-thumbnail" width="100px" >

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category" value="{{ $product->category->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="Rp. {{ number_format($product->price) }}" disabled>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="5" disabled>{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="qty" class="form-label">Qty</label>
        <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty') }}" min="1" required>
        @error('qty')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <label class="form-label mt-2">Total</label>
        <input type="text" class="form-control" id="total" name="total" readonly>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" name="address" id="address" rows="5" required>{{ old('address') }}</textarea>
        @error('address')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@push('script')
<script>
    const price = {{ $product->price }}

    $('#qty').on('change', function () {
        const qty = $(this).val()
        const total = price * qty

        $('#total').val(total)
    })
</script>
@endpush