@extends('layouts.app')

@section('title', '| View Post')

@section('content')

<div class="container">

    <h1>{{ $job->title }}</h1>
    <hr>
    <p class="lead">{{ $job->body }} </p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['jobs.destroy', $job->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Job')
    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Job')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}

</div>

@endsection
