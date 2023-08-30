<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
    <table border="2px">
        <tbody>
            <thead>
                <tr>
                    <th>product_id</th>
                    <th>product_name</th>
                    <th>product_availability</th>
                    <th>product_price</th>
                    <th>product_image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->availability }}</td>
                    <td>{{ $product->price }}</td>
                     {{-- <td><img src="{{asset('public/images' . $product->product_image)}}" alt=""></td> --}}
                    <td><img src="/images/{{$product->image}}" alt="" width="100px" height="100px"></td>
                    <td><a href="{{route('product.index')}}">return</a></td>
                </tr>
            </tbody>
        </table>
</body>
</html>
