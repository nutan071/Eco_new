@extends('layouts.app')

@section('title', 'Wishlist')

@section('content')
<div class="container mt-5">
    <h2>Your Wishlist</h2>
    @if($wishlist->count())
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wishlist as $item)
            <tr>
                <td><img src="{{ asset($item->product->image_url) }}" width="50" height="50" class="img-responsive"/></td>
                <td>{{ $item->product->name }}</td>
                <td>${{ $item->product->price }}</td>
                <td>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h4>Your wishlist is empty!</h4>
    @endif
</div>
@endsection
