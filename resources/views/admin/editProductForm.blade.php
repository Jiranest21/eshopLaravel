<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            box-sizing: border-box;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }
        ul li {
            color: #d9534f;
            margin-bottom: 5px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="text"], input[type="password"], input[type="submit"], input[type="hidden"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('EditProduct')}}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{$product[0]->name}}">
            
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="{{$product[0]->price}}">
            
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{$product[0]->description}}">
            
            <input type="hidden" name="id" value="{{$product[0]->id}}">
            <input type="submit" value="Odeslat">
        </form>
    </div>
</body>
</html>
