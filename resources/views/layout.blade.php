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
<body>
    <nav class="navbar navbar-expand-md bg-primary">
        <ul class="navbar-nav d-flex align-items-center justify-content-between">
                <li><a href="/"><img src="home.png" alt="" class="home_icon"></a></li>            
            @auth
                <li>
                    <a href="{{route('profile.user',auth()->user())}}">
                        <img src="{{asset('storage/images/'.auth()->user()->avatar)}}" class="rounded-circle mx-2 avatar-img" style="width: 50px; height:50px;"></img>
                    </a>
                </li>
                <li class="nav-item text-white m-3 text-white">
                    {{auth()->user()->username}}
                </li>   
                <li class="nav-item text-white m-3">
                    <a class="text-decoration-none text-white" href="/Dashboard">Dashboard</a>
                </li>
                <form action="/logout" method="post" class="align-self-end m-3">
                    @csrf
                    <button type="submit" class="nav-item btn btn-danger">Logout</button>
                </form>
            @else
                <li class="nav-item m-3">
                    <a class="text-white text-decoration-none" href="/register">Register</a>
                </li>
                <li class="nav-item m-3">
                    <a class="text-white text-decoration-none" href="/login">Login</a>
                </li>
            @endauth
        </ul>
    </nav>
</body>
</html>