


@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="container mt-5">
    <h2>My Orders</h2>
    @if($orders->isEmpty())
        <p>You have no orders.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Payment Method</th>
                    <th>Date</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>${{ $order->total_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>

                    <td><a href="{{ route('order.show', $order->id) }}" class="btn btn-info">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection







