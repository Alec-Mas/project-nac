@extends('layouts.app')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Create a New Company</li>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <p>Create a New Company</p>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('route' => 'companies.store')) }}
                        <div class="form-group">
                            {{ Form::label('company_name', 'Company Name') }}
                            {{ Form::text('company_name', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('company_description', 'Company Description') }}
                            {{ Form::textarea('company_description', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('company_address', 'Address') }}
                            {{ Form::text('company_address', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('company_phone', 'Phone') }}
                            {{ Form::number('company_phone', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('company_size', 'Size') }}
                            {{ Form::text('company_size', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('abn_number', 'ABN Number') }}
                            {{ Form::number('abn_number', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::submit('Create Job', array('class' => 'btn btn-success btn-lg btn-block')) }}
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
