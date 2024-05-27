<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route("user.register")}}">Register</a>
    <a href="{{route("user.login")}}">Login</a>
@auth
<p>Ahoj {{auth()->user()->name}}</p>
<form action="{{route("logout")}}" method="post">
    @csrf
    <input type="hidden" name="id" value ="{{auth()->user()->id}}">
    <input type="submit" value="Log out">
</form>
<a href="{{route("cart")}}">cart</a>
@endauth

<form action = "{{route("FilteredProducts")}}" method = "get">
    @foreach ($filtrs as $filtr)
    <label>{{$filtr->filtr}}</label>
    <input type = "checkbox" value = "{{$filtr->filtr}}" name = "{{$filtr->filtr}}">
    @endforeach
    <input type="submit" value="filtrovat">
</form>

@foreach ($products as $product)
    <p>name: {{$product -> name}}</p>
    <p>price: {{$product -> price}}</p>
    <p>description: {{$product -> description}}</p>
    <a href="{{route("product.show", $product->id)}}">more...</a>
    @auth
    <form action="{{route("AddToCart")}}" method="post">
        @csrf
        <input type="hidden" name="product_id" value = "{{$product->id}}">
        <input type="submit" value="add to Cart">
    </form>
    @endauth
@endforeach




</body>
</html>