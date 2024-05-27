<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action = "{{route("EditProduct")}}" method = "POST">
        @csrf
        <input type="text" name="name" value="{{$product[0] -> name}}">
        <input type="text" name="price" value="{{$product[0] -> price}}">
        <input type="text" name="description" value="{{$product[0] -> description}}">
        <input type ="hidden" name="id" value="{{$product[0] ->id}}">
        <input type="submit" value="odeslat">
    </form>
</body>
</html>