<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title') | YAMW - yet another movie website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

    <nav>
        <a href="{{ url('movies') }}">Home</a>
        <a href="{{ action('movieController@listing') }}">List Of movies</a><!--alternative way -->
        <!--<a href="{{ route('movie detail', ['id' => 1]) }}">Movie Detail</a>--><!--Honza's preferred way, requires appending ->name onto the route in question, the name can be any string -->
        <a href="{{ action('movieController@create') }}">New Movie</a>
    </nav>

</div> 

<div class="container">
    @yield('content')
</div>

    @if(session()->has('success_message'))
    <div class="container">
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    </div>
    @endif


    
</body>
</html>