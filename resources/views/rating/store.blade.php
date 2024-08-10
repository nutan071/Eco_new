@extends('layouts.app')

@section('title', 'Rate Product')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Rate Product</h3>
            <form action="{{ route('rating.store') }}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="">Select a Rating</option>
                        <option value="1">1 - Very Poor</option>
                        <option value="2">2 - Poor</option>
                        <option value="3">3 - Average</option>
                        <option value="4">4 - Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
            </form>
        </div>
    </div>
</div>
@endsection
