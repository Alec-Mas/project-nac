@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Company Details</h5>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $company->company_name }}
                    </h5>
                    <p class="card-text">{{ $company->company_description }}</p>
                    <p class="card-text">{{ $company->company_address }}</p>
                    <p class="card-text">{{ $company->company_phone }}</p>
                    <p class="card-text">{{ $company->company_size }}</p>
                    <p class="card-text">{{ $company->abn_number }}</p>
                    <hr>
                    <h5 class="card-title">
                        Advertised Jobs
                    </h5>
                    @foreach($company->jobs as $job)
                    <p class="card-text"><a href="{{ route('jobs.show', $job->id ) }}"><b>{{ $job->job_title }}</b><br></a></p>
                    @endforeach
                </div>
                <div class="card-footer text-muted">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['companies.destroy', $company->id] ]) !!}
                    <!--<a href="{{ url('companies') }}" class="btn btn-primary">Back</a>-->
                    @can('Edit Company')
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info icon-style">
                        <i class="fa fa-wrench fa-lg" aria-hidden="true"></i>
                    </a>                    @endcan
                    @can('Delete Company')
                    {!! Form::button('<i class=" fa fa-trash-o fa-lg"></i>', ['type' => 'submit', 'class' => 'btn btn-danger icon-style'] )  !!}
                    @endcan
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
