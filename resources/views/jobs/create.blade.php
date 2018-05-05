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
                        {{ Form::label('job_title', 'Title') }}
                        {{ Form::text('job_title', null, array('class' => 'form-control')) }}
                        <br>

                        {{ Form::label('job_description', 'Job Description') }}
                        {{ Form::textarea('job_description', null, array('class' => 'form-control')) }}
                        <br>

                        {{ Form::label('job_salary', 'Salary') }}
                        {{ Form::number('job_salary', null, array('class' => 'form-control')) }}
                        <br>

                        {{ Form::label('package_id', 'Package') }}
                        {{ Form::select('package_id', ['1' => 'Standard', '2' => 'Featured', '3' => 'Sponsored'], array('class' => 'form-control')) }}
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
