<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('favicon')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/task.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <head>
        <title> @yield('title')</title>
    </head>
</head>
<body>
    @section('sidebar')
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active h1" href="#">TASK LIST</a>
        </li>
        <li class="nav-item">
           <i class="fa fa-list h2 pt-3" aria-hidden="true"></i>
        </li>
    </ul>
@show

<div class="container">
    @yield('content')
</div>
</body>

@yield('script')
</html>
