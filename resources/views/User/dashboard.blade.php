@extends('layouts.app')



@section('content')
@include('partials.home')   


<div class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('' . $product->image_url) }}" style="width: 100px; height: auto;" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        <p class="card-text">Quantity:
                            <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 60px; display: inline-block;">
                        </p>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>  
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

