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
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
        }
        header a {
            text-decoration: none;
            color: #28a745;
            font-size: 16px;
            margin-right: 20px;
        }
        header a:hover {
            text-decoration: underline;
        }
        .products {
            margin-bottom: 20px;
        }
        .product {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
        .product p {
            margin: 5px 0;
        }
        .empty-message {
            color: #d9534f;
            font-weight: bold;
            text-align: center;
        }
        form {
            display: flex;
            justify-content: center;
        }
        input[type="submit"] {
            padding: 10px 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <header>
            <a href="{{route('home')}}">Home</a>
        </header>
        <div class="products">
            @forelse ($products as $product) 
                <div class="product">
                    <p>{{$product->name}}</p>
                </div>
            @empty
                <p class="empty-message">kupuj kurvá neeee!!!!!!</p>
            @endforelse
        </div>
        <form action="{{route('DeleteCart')}}" method="POST">
            @csrf
            <input type="submit" value="Order">
        </form>
    </div>
</body>
</html>
