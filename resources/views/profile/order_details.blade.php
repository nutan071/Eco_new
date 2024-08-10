@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container mt-5">
    <h2>Order Details </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Rating</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ $item->price }}</td>
                <td>
                    <form action="{{ route('order_item.update_status') }}" method="GET">
                        @csrf
                        <input type="hidden" name="order_item_id" value="{{ $item->id }}">
                        <select name="status" onchange="this.form.submit()" class="form-control">
                            <option value="processing" {{ $item->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $item->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $item->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="canceled" {{ $item->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </form>
                </td>
                <td>
                    @if($item->rating)
                        <p>Rated: {{ $item->rating->rating }} stars</p>
                        <p>Comment: {{ $item->rating->comment }}</p>
                    @else
                        <form action="{{ route('rating.store') }}" method="GET">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
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
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
