@extends('layout')

@section('section_header')
    <h1>Users</h1>
@stop

@section('section_description')
   <table>
   <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Birthdate</th>
   </tr>
   @foreach($users as $user)
   <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->surname }}</td>
        <td>{{ $user->birthdate }}</td>
   </tr>
   @endforeach
   </table>
@stop