<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@foreach ($products as $product)
    <p>{{$product->name}}</p>
    <form action = "{{route("DeleteProduct")}}" method = "POST">
        @csrf
        <input type="hidden" name ="id" value="{{$product->id}}">
        <input type="submit" value="smazat">
    </form>
    <form action = "{{route("EditProductForm",$product->id)}}" method = "GET">
        @csrf
        <input type="submit" value="edit">
    </form>
@endforeach
</body>
</html>