@extends('layouts.app')

@section('title', '| Create New Job')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Create New Job</h5>
                <div class="card-body">
                    {{ Form::open(array('route' => 'jobs.store')) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, array('class' => 'form-control')) }}
                        <br>

                        {{ Form::label('body', 'Job Body') }}
                        {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                        <br>
        
                        {{ Form::submit('Create Job', array('class' => 'btn btn-success btn-lg btn-block')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
