@extends('layouts.app')

@section('title', '| Edit Job')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Edit Job</h5>
                <div class="card-body">
                    {{ Form::model($job, array('route' => array('jobs.update', $job->id), 'method' => 'PUT')) }}
                    <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

                    {{ Form::label('body', 'Job Body') }}
                    {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>

                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
