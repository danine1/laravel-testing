@extends('movies/wrapper')


@section('content')



<h1>{{ $movie->title }}</h1>

<div class="year">{{ $movie->year }}</div>

<p class="plot">
{{ $movie->plot }}
</p>

<h2>Roles</h2>
<ul>
    @foreach($movie->movie_roles as $role)
        <li>{{ $role->name }}</li>
    @endforeach
</ul>

<a href="{{ action('movieController@edit', ['id' => $movie->id]) }}" class="btn btn-primary">Edit this movie</a>

@endsection

@section('page_title') {{ $movie->title }} {{ $movie->year }} @endsection