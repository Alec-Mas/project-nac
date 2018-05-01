@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Page {{ $jobs->currentPage() }} of {{ $jobs->lastPage() }}</h5>
                @foreach ($jobs as $job)
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('jobs.show', $job->id ) }}"><b>{{ $job->title }}</b><br></a>
                    </h5>
                    <p class="card-text">{{  str_limit($job->body, 100) }} {{-- Limit teaser to 100 characters --}}</p>
                </div>
                <hr>
                @endforeach
                <div class="card-footer text-muted">
                    {!! $jobs->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
