@extends('movies/wrapper')


@section('content')
<h1>List of movies</h1>

<input type="text" id="search">
<button id="btn">Search</button>


<ul>
    @foreach($movies as $movie)
    <li>
        <a href="{{ route('movie detail', ['id' => $movie->id]) }}">
        {{ $movie->title }} ({{ $movie->year }})
        </a>
    </li>
    @endforeach
</ul>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script>
    $('#btn').click(function(){

    var s = $('#search').val();

        //jquery ajax example: google search
        $.ajax({
            'url': '/movies/search',
            'type': 'post',
            'data':{
                'search' : s
            }
        }).done(function(data){


    console.log(data.length);

    $('ul').empty();

    for(var i = 0; i < data.length; i++){
        $('ul').append(
            '<li>'+
            '<a href="">' + data[i].title + '(' +data[i].year+ ')</a>'+
            '</li>'
            ); 
        }
    });

});
  
  </script>

@endsection

@section('page_title') List Movies @endsection