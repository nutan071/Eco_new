@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Add Product</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="product-list">
                @foreach($products as $product)
                    <tr data-id="{{ $product->id }}">
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <img src="{{ asset('' . $product->image_url) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#editProductModal{{ $product->id }}">Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal{{ $product->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addProductForm" action="{{ route('Admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Product Modal Template -->
@foreach($products as $product)
<div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="editProductForm" data-id="{{ $product->id }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
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
                        @if($product->image_url)
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Product Modal Template -->
@foreach($products as $product)
<div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Admin.products.destroy', $product) }}" method="POST" class="deleteProductForm" data-id="{{ $product->id }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script>
$(document).ready(function () {
    $('#addProductForm').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    $('#addProductModal').modal('hide');
                    $('#addProductForm')[0].reset();
                    var product = response.product;
                    var newRow = `
                        <tr data-id="${product.id}">
                            <td>${product.name}</td>
                            <td>${product.description}</td>
                            <td>${product.price}</td>
                            <td>${product.quantity}</td>
                            <td><img src="${product.image_url}" alt="${product.name}" style="width: 100px; height: auto;"></td>
                            <td>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#editProductModal${product.id}">Edit</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal${product.id}">Delete</button>
                            </td>
                        </tr>
                    `;
                    $('#product-list').append(newRow);
                }
            },
            error: function (response) {
                alert('Error adding product.');
            }
        });
    });

    $('.editProductForm').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    $('#editProductModal' + id).modal('hide');
                    location.reload(); 
                }
            },
            error: function (response) {
                alert('Error updating product.');
            }
        });
    });

    $('.deleteProductForm').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function (response) {
                if (response.success) {
                    $('#deleteProductModal' + id).modal('hide');
                    $('tr[data-id="' + id + '"]').remove();
                }
            },
            error: function (response) {
                alert('Error deleting product.');
            }
        });
    });
});
</script>
@endsection
