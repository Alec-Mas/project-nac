@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Job Details</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $company->company_name }}
                    </h5>
                    <p class="card-text">{{ $company->company_description }}</p>
                    <p class="card-text">{{ $company->company_address }}</p>
                    <p class="card-text">{{ $company->company_phone }}</p>
                    <p class="card-text">{{ $company->company_size }}</p>
                    <p class="card-text">{{ $company->abn_number }}</p>
                </div>
                <hr>
                <div class="card-footer text-muted">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['companies.destroy', $company->id] ]) !!}
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    @can('Edit Company')
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info" role="button">Edit</a>
                    @endcan
                    @can('Delete Company')
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    @endcan
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
