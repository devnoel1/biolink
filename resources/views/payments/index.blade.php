<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('pay', []) }}" method="post">
        @csrf
        <input type="text" name="amount" id="">
        <button type="submit">pay now</button>
    </form>
</body>
</html>
