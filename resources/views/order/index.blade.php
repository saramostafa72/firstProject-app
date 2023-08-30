<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
    <a href="{{route('product.index')}}">return</a>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>Order_id</th>
                <th>Order_price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order )
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->price}}</td>
                <td>
                    <a href="{{route('order.show',$order->id)}}">Show</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</body>
</html>
