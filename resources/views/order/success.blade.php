@extends('layouts.app')

@section('title', 'Order Success')

@section('content')
<div class="container mt-5">
    <h2>Order Success</h2>
    <p>Your order has been placed successfully. Thank you for shopping with us!</p>
    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
</div>
@endsection