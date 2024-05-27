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
    <form action="{{route("user.login")}}" method="post">
    @csrf
    <input type="text" name="email">
    <input type="password" name="password" id="">
    <button type="submit">
        Submit
    </button>
    
    </form>
</body>
</html>