<!doctype html>
<html lang="en">
<head>
    <title> User Custom Registration and Login with Session </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="#">GIG CRUD Module Service</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">

        <ul class="navbar-nav ml-auto pull-left">
            @auth
           <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">Blog</a></li>
            @role('admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
            @endrole

            <li class="nav-item">
                <a class="nav-link text-white"> Welcome: {{ ucfirst(Auth()->user()->name) }} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}"> Logout </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user-login') }}"> Login </a>
            </li>
            <li class="nav-item">
                @if (Route::has('user-registration')) <a class="nav-link" href="{{ route('user-registration') }}"> Register </a> @endif
            </li>
            @endif
        </ul>
    </div>
</nav>
@yield('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
