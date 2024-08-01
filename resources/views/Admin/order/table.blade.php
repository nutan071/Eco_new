<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
</head>
<body>
    <div class="container">
        <h2>Order List</h2>
        <div class="table">
            <thead>
                <tr>
                  
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Payment Method</th>
                    <th>registered at</th>

                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
           
                    <td>{{$order->total_price}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{$order->created_at}}</td>

                </tr>
                @endforeach
            </tbody>
        </div>
    </div>
</body>
</html>