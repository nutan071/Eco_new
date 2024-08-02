@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Checkout</h2>
    <div class="row">
        <div class="col-md-12">
            <h4>Your Cart</h4>
            @if(session('cart'))
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td><img src="{{ asset($details['image_url']) }}" width="50" height="50" class="img-responsive"/></td>
                        <td>{{ $details['name'] }}</td>
                        <td>${{ $details['price'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Total: ${{ $total }}</h4>
            @else
            <h4>Your cart is empty!</h4>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Payment Method</h4>
            <form action="{{ route('order.create') }}" method="POST">
                @csrf
                <input type="hidden" name="total_price" value="{{ $total }}">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="pod" value="POD" checked>
                    <label class="form-check-label" for="pod">
                        Pay on Delivery (POD)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD">
                    <label class="form-check-label" for="cod">
                        Cash on Delivery (COD)
                    </label>
                </div>
                <button type="submit" class="btn btn-success mt-3">Place Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
