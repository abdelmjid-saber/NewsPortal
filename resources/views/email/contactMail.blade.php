<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Mail</title>
</head>
<body>
    <h3>Name: {{ $datalis['name'] }}</h3>
    <h3>Email: {{ $datalis['email'] }}</h3>
    <p><bold>Message: </bold>{{ $datalis['message'] }}</p>
</body>
</html>