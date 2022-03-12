<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/code.js') }}" defer></script>
    <title>Document</title>
</head>
<body class="bg-primary py-4 d-flex flex-column justify-content-center align-items-center py-4">
    <div class="container-fluid bg-primary d-flex justify-content-center align-items-center align-self-center">
        <a href="/register">
            <button class="btn border border-primary bg-white fs-1 my-4 mx-4 rounded-pill p-4">Sign Up</button>
        </a>
        <a href="/login">
            <button class="btn border border-primary bg-white fs-1 my-4 mx-4 rounded-pill p-4">Login</button>
        </a>
    </div>
    <div class="text-white fs-4">
        Sign up to join all the fun!
    </div>
</body>
</html>