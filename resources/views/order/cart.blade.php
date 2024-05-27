<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route("home")}}">Home</a>
    @forelse ($products as $product) 
    <p>{{$product->name}}</p>
    @empty
    <p>kupuj kurvá neeee!!!!!!</p>
    @endforelse
    <form action="{{route("DeleteCart")}}" method="POST">
        @csrf
        <input type="submit" value="order">
    </form>
</body>
</html>