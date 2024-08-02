@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="container mt-5">
    <h2>{{ $product->name }}</h2>
    <p>Description: {{ $product->description }}</p>
    <p>Price: ${{ $product->price }}</p>

  
    <h3>Ratings:</h3>
    @if($product->ratings->count() > 0)
        <ul>
            @foreach($product->ratings as $rating)
                <li>
                    Rating: {{ $rating->rating }} stars<br>
                    Comment: {{ $rating->comment ?? 'No comment' }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No ratings yet.</p>
    @endif

    @if(Auth::check())
        @if(!$product->hasBeenRatedBy(auth()->id()))
            <form action="{{ route('rating.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select name="rating" id="rating" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit Rating</button>
            </form>
        @else
            <p>You have already rated this product.</p>
        @endif
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to rate this product.</p>
    @endif
</div>
@endsection
