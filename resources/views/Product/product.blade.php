<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@forelse ($products as $user)
    <p>name: {{$products[0] -> name}}</p>
    <p>price: {{$products[0] -> price}}</p>
    <p>description: {{$products[0] -> description}}</p>
    @empty
    <p>product does not exist</p>
@endforelse
</body>
</html>