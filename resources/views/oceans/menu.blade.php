<ul>


<li><a href="<?php echo route('route_homepage')?>">Home</a></li>

<li><a href="{{ route('route_homepage') }}">Home</a></li>

<li><a href="{{ action('HomeController@index') }}">Home</a></li>

<li><a href="{{ action ('OceanController@show', ['atlantic']) }}">Atlantic</a></li>

<li><a href="{{ action('OceanController@show', ['pacific']) }}">Pacific</a></li>

</ul>