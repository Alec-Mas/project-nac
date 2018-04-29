@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Advertised Jobs</h3></div>
                    <div class="panel-heading">Page {{ $jobs->currentPage() }} of {{ $jobs->lastPage() }}</div>
                    @foreach ($jobs as $job)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $job->title }}</b><br>
                                    <p class="teaser">
                                       {{  str_limit($job->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                    </div>
                    <div class="text-center">
                        {!! $jobs->links() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
