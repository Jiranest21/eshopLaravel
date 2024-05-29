<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        header a {
            text-decoration: none;
            color: #28a745;
            font-size: 16px;
        }
        header a:hover {
            text-decoration: underline;
        }
        .auth-section {
            margin-bottom: 20px;
        }
        .auth-section p {
            margin: 0 0 10px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="text"], input[type="password"], input[type="submit"], input[type="checkbox"] {
            margin-bottom: 10px;
        }
        input[type="text"], input[type="password"], input[type="hidden"], input[type="checkbox"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .product {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .product p {
            margin: 5px 0;
        }
        .product a {
            color: #007bff;
            text-decoration: none;
        }
        .product a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <a href="{{route('user.register')}}">Register</a>
            <a href="{{route('user.login')}}">Login</a>
        </header>
        @auth
        <div class="auth-section">
            <p>Ahoj {{auth()->user()->name}}</p>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{auth()->user()->id}}">
                <input type="submit" value="Log out">
            </form>
            <a href="{{route('cart')}}">Cart</a>
        </div>
        @endauth

        <form action="{{route('FilteredProducts')}}" method="get">
            @foreach ($filtrs as $filtr)
                <label>{{$filtr->filtr}}</label>
                <input type="checkbox" value="{{$filtr->filtr}}" name="{{$filtr->filtr}}">
            @endforeach
            <input type="submit" value="Filtrovat">
        </form>

        @foreach ($products as $product)
            <div class="product">
                <p>Name: {{$product->name}}</p>
                <p>Price: {{$product->price}}</p>
                <p>Description: {{$product->description}}</p>
                <a href="{{route('product.show', $product->id)}}">More...</a>
                @auth
                <form action="{{route('AddToCart')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="submit" value="Add to Cart">
                </form>
                @endauth
            </div>
        @endforeach
    </div>
</body>
</html>
