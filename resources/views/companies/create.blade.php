@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Create New Company</h5>
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
@endsection
