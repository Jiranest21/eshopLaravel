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
    <form action="{{route("user.register")}}" method="post">
    @csrf
    <label for="name">Name: </label>
    <input type="text" name ="name" class = "">
    <label for="name">E-mail: </label>
    <input type="text" name="email">
    <label for="name">Password: </label>
    <input type="password" name="password">
    <label for="name">Confirm Password: </label>
    <input type="password" name="password2">
    <button type="submit">
        Submit
    </button>
    
    </form>
</body>
</html>