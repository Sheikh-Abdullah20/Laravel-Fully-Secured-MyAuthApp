<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $request['subject'] }}</title>
</head>
<body>
    <h1>Hey | Admin</h1>
    <p>Name : {{ $request['name'] }}</p>
    <p>Email : {{ $request['email'] }}</p>
    <p>Message : {{ $request['message'] }}</p>
</body>
</html>