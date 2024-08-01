@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('Admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image_url)
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection


