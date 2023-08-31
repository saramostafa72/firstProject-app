<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
      @csrf
     <input type="text" name="name" placeholder="product_name" >
     @if ($errors->has('name'))
     <span style="color: red">
         {{ $errors->first('name') }}
     </span>
     @endif
     <br>
     <br>
     <input type="text" name="price" placeholder="product_price">
     @if ($errors->has('price'))
     <span style="color: red">
         {{ $errors->first('price') }}
     </span>
     @endif
     <br>
     <br>
     <input type="text" name="availability"placeholder="product_availability">
     @if ($errors->has('availability'))
     <span style="color: red">
         {{ $errors->first('availability') }}
     </span>
     @endif
     <br>
     <br>
     <input type="text" name="category_id"placeholder="category_id">
     @if ($errors->has('category_id'))
     <span style="color: red">
         {{ $errors->first('category_id') }}
     </span>
     @endif
     <br>
     <br>
     <input type="file" name="image">
     <br>
     @if ($errors->has('image'))
     <span style="color: red">
         {{ $errors->first('image') }}
     </span>
     @endif
     <br>
     <br>
     <input type="submit" >
    </form>

</body>
</html>
