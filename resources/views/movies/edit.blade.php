@extends('movies/wrapper')


@section('content')

<form action="" method="post">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="title_input">Title</label><br>
        <input class="form-control" type="text" name="title" value="{{ $movie->title }}" id="title_input">
    </div>

    <div class="form-group">
        <label for="year_input">Year</label><br>
        <input class="form-control" type="text" name="year" value="{{ $movie->year }}" id="year_input">
    </div>

    <div class="form-group">
        <label for="plot_input">Plot</label><br>
        <textarea class="form-control" rows="4" cols="50" name="plot">{{ $movie->plot }}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary">
    </div>



</form>

@endsection




@section('page_title') Add Movies @endsection