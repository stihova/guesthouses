@extends('layouts.app')
@section('content')
        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Guest Houses</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .links > a {
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<h1>House Types</h1>
@if (Auth::check())
<div class="panel-heading">
    <a class="btn btn-small btn-info" href="{{ URL::to('types/create') }}">Create a House Type</a>
</div>
@endif

<br>

<table class="table table-striped table-bordered">
    <thead style="background-color: #dd99ff">
    <tr>
        <th>ID</th>
        <th>House Type</th>
        <th colspan="4">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($types as $key => $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->houseType}}</td>
            <td>
                <a class="btn btn-primary btn-red" href="{{ route('types.show', $value->id) }}" method="POST">Show</a>
            </td>

            @if (Auth::check())
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('types/' . $value->id . '/edit') }}">Edit</a>
            </td>
            <td>
                <form action="{{action('TypeController@destroy', $value->id )}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            @endif

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
@endsection
