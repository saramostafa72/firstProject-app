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
    <a href="{{route('product.create')}}">Add Product</a>
    <br>
    <br>
    <a href="{{route('category.index')}}">Categories</a>
    <br>
    <br>
    <a href="{{route('order.index')}}">Orders</a>
    <br>
    <br>
    <table border="2px">
        <thead>
            <tr>
                <th>product_id</th>
                <th>product_name</th>
                <th>product_availability</th>
                <th>product_price</th>
                <th>Category Name</th>
                <th>product_image</th>
                {{-- <th>product_image</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->availability }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    {{-- <td><img src="{{asset('public/images' . $product->product_image)}}" alt=""></td> --}}

                    <td><img src="/images/{{$product->image}}" alt="" width="100px" height="100px"></td>
                    <td>
                        <form action="{{route('product.show',$product->id)}}" method="get">
                        <button>Show</button>
                        </form>
                        <form action="{{route('product.update',$product->id)}}" >
                            <button type="submit">Update</button>
                        </form>
                        <form action="{{route('product.destroy',$product->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                       </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
