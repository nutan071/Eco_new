@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="container mt-5">
    <h2>Your Cart</h2>
    @if(session('cart'))
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach(session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
            <tr>
                <td><img src="{{ asset('storage/' . $details['image_url']) }}" width="50" height="50" class="img-responsive"/></td>
                <td>{{ $details['name'] }}</td>
                <td>${{ $details['price'] }}</td>
                <td>
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" data-id="{{ $id }}">
                </td>
                <td>${{ $details['price'] * $details['quantity'] }}</td>
                <td>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <h4>Total: ${{ $total }}</h4>
    </div>
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Checkout</button>
    </form>
    @else
    <h4>Your cart is empty!</h4>
    @endif
</div>

<script>
    $(document).ready(function() {
        $(".quantity").on('change', function() {
            var id = $(this).data('id');
            var quantity = $(this).val();
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    });
</script>
@endsection
