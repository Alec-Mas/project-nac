@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Job Details</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $job->title }}
                    </h5>
                    <p class="card-text">{{ $job->body }}</p>
                </div>
                <hr>
                <div class="card-footer text-muted">
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
            </div>
        </div>
    </div>
</div>

@endsection
