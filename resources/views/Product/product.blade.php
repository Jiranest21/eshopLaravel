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
    </style>
</head>
<body>
    <div class="container">
        @forelse ($products as $product)
            <div class="product">
                <p>Name: {{$product->name}}</p>
                <p>Price: {{$product->price}}</p>
                <p>Description: {{$product->description}}</p>
            </div>
        @empty
            <p class="empty-message">Product does not exist</p>
        @endforelse
    </div>
</body>
</html>
