@extends('layouts.app')

@section('title', 'Product List')

@section('content')
<div class="container">
    <h1 class="text-center" >Product List</h1>
    <a href="{{ route('Admin.products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    <a href="{{ route('Admin.products.export') }}" class="btn btn-success mb-3">Download as Excel</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td><img src="{{ asset('' . $product->image_url) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;"></td>
                    <td>
                        <a href="{{ route('Admin.products.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('Admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
