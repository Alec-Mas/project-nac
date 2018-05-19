@extends('layouts.app')

@section('title', '| Create New Job')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Create a new Job</li>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <p>Create a new Job</p>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-sm-9">
                <div class="card">
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
</div>
@endsection
