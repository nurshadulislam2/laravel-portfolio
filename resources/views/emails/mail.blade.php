<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
</head>
<body>
    <h3>{{ $mailData['name'] }}</h3>
    <h3>{{ $mailData['email'] }}</h3>
    <p>
        {{ $mailData['message'] }}
    </p>
</body>
</html>
