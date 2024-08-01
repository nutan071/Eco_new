@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container mt-5">
    <h2>Order Details</h2>
    <p>Order ID: {{ $order->id }}</p>
    <p>Total Price: ${{ $order->total_price }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Payment Method: {{ $order->payment_method }}</p>
    <p>Date: {{ $order->created_at->format('Y-m-d') }}</p>
   
</div>
@endsection
