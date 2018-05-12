@extends('layouts.app')
@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Welcome, {{ Auth::user()->name}}</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <p>{{Auth::user()->roles()->pluck('name')->implode(' ')}}</p>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card-deck justify-content-center">
                <div class="card border-light mb-3 text-center dashboard-tile">
                    <br>
                    <i class="fa fa-search fa-5x" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">My Jobs</h5>
                        @if(Auth::user()->jobs()->count() == 0)
                        <p class="card-text">NO Jobs Advertised</p>
                        @elseif(Auth::user()->jobs()->count() == 1)
                        <p class="card-text">{{Auth::user()->jobs()->count()}} job advertised</p>
                        @else
                        <p class="card-text">{{Auth::user()->jobs()->count()}} jobs advertised</p>
                        @endif
                    </div>
                </div>
                @can('Create Job')
                <div class="card border-light mb-3 text-center dashboard-tile">
                    <div class="card-body">
                        <a class="btn btn-primary dashboard-link" href="{{ route('jobs.create') }}">
                            <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
                        </a>
                        <h5 class="card-title" style="padding-top: 10px;">Create a new Job</h5>
                    </div>
                </div>
                @endcan
                @can('Create Company')
                <div class="card border-light mb-3 text-center dashboard-tile">
                    <div class="card-body">
                        <a class="btn btn-success dashboard-link" href="{{ route('companies.create') }}">
                            <i class="fa fa-building-o fa-5x" aria-hidden="true"></i>
                        </a>
                        <h5 class="card-title" style="padding-top: 10px;">Create a new Company</h5>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card-deck justify-content-center">
                @can('Administer roles & permissions')
                <div class="card border-light mb-3 text-center dashboard-tile">
                    <div class="card-body">
                        <a class="btn btn-info dashboard-link" href="{{ url('users') }}">
                            <i class="fa fa-user-plus fa-5x" aria-hidden="true"></i>
                        </a>
                        <h5 class="card-title" style="padding-top: 10px;">Manage Users</h5>

                    </div>
                </div>
                <div class="card border-light mb-3 text-center dashboard-tile">
                    <div class="card-body">
                        <a class="btn btn-dark dashboard-link" href="{{ url('roles') }}">
                            <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                        </a>
                        <h5 class="card-title" style="padding-top: 10px;">Manage Roles</h5>
                    </div>
                </div>
                <div class="card border-light mb-3 text-center dashboard-tile">
                    <div class="card-body">
                        <a class="btn btn-danger dashboard-link" href="{{ url('roles') }}">
                            <i class="fa fa-shield fa-5x" aria-hidden="true"></i>
                        </a>
                        <h5 class="card-title" style="padding-top: 10px;">Manage Permissions</h5>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
