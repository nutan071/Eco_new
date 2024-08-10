@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container mt-5">
    <div class="row">


        <div class="col-md-8">
            <h3>Ordered Products</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($findorder->items as $item)


                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>

                            @if($item->rating)
                            <p>Rated: {{ $item->rating->rating }} stars</p>
                            <p>Comment: {{ $item->rating->comment }}</p>
                        @else

                                <form action="{{ route('rating.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                    <input type="hidden" name="order_id" value="{{ $findorder->id }}">
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


        <div class="col-md-4">
            <h3>Order Details</h3>
            <table class="table">
                <tr>
                    <th>Order ID</th>
                    <td>{{ $findorder->id }}</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>${{ $findorder->total_price }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $findorder->status }}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>{{ $findorder->payment_method }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $findorder->created_at->format('Y-m-d') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
