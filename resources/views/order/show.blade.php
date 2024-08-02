

@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container mt-5">
    <h2>Order Details</h2>
    <table class="table">
        <tr>
            <th>Order ID</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Total Price</th>
            <td>${{ $order->total_price }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $order->status }}</td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td>{{ $order->payment_method }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $order->created_at->format('Y-m-d') }}</td>
        </tr>
    </table>

    <h3>Rate this Order</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('profile.order_details', $order->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rating">Rating</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="">Select a rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
        </div>
        <input type="hidden" name="product_id" value="{{ $order->product_id }}">
       
        <button type="submit" class="btn btn-primary">Submit Rating</button>
    </form>
</div>
@endsection




