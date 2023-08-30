<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>
            order_user
        </legend>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Order Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->price}}</td>
                    <td><a href="{{route('order.index')}}">return</a></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</body>
</html>
