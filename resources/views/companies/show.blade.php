@extends('layouts.landing')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            @if(Auth::check())
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{url('companies')}}">Companies</a></li>
                <li class="breadcrumb-item active">{{$company->company_name}}</li>
            </ol>
            @endif
            <div class="jumbotron text-center">
              <h1 class="display-4">{{ $company->company_name }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
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
                    @if(Auth::check())

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
                    <hr>
                    @endif
                    <p class="card-text">Last Updated {{$company->updated_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
