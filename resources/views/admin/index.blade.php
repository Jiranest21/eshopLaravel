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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product p {
            margin: 0;
            flex: 1;
        }
        .product form {
            margin: 0 5px;
        }
        input[type="submit"] {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($products as $product)
            <div class="product">
                <p>{{$product->name}}</p>
                <form action="{{route('DeleteProduct')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="submit" value="Smazat" class="delete-button">
                </form>
                <form action="{{route('EditProductForm', $product->id)}}" method="GET">
                    @csrf
                    <input type="submit" value="Edit">
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
