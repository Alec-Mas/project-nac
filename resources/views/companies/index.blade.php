@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="jumbotron text-center">
              <h1 class="display-4">Companies</h1>
            </div>
            <div class="card">
                <h5 class="card-header">{{ $companies->count() }} registered companies</h5>
                @foreach ($companies as $company)
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('companies.show', $company->id ) }}"><b>{{ $company->company_name }}</b><br></a>
                    </h5>
                    <p class="card-text">{{  str_limit($company->company_description, 100) }} {{-- Limit teaser to 100 characters --}}</p>
                </div>
                @endforeach
                <div class="card-footer text-muted">
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
