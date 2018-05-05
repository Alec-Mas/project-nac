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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
