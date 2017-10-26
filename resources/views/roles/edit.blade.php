@extends('movies/wrapper')


@section('content')

<form action="" method="post">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="movie_id_select">Name:</label><br>
        <select name="movie_id" id="movie_id_select">
            @foreach($movies as $movie)
                <option value="{{ $movie->id }}"{{ $movie->id == $role->movie_id ? ' selected' : '' }}>{{ $movie->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="genre_id_select">Genre:</label><br>
        <select name="genre_id" id="genre_id_select">
            @foreach($genres as $genre_id => $genre_name)
                <option value="{{ $genre_id }}"{{ $genre_id == $role->genre_id ? ' selected' : '' }}>{{ $genre_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name_input">Name:</label><br>
        <input class="form-control" type="text" name="name" value="{{ $role->name }}" id="name_input">
    </div>

    @if($role->movie)
    <h1>{{ $role->movie->title }}</h1>

    <p>
        {{ $role->movie->plot }}
    </p>

  
        <h2>Other Roles</h2>
        <ul>
            @foreach($role->movie->movie_roles as $one_role)
                <li>{{ $one_role->name }}</li>
            @endforeach
        </ul>


    @endif

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="save">
    </div>

</form>

@endsection