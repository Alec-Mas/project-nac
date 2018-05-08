@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center">Welcome, {{ Auth::user()->name}}</h1>
    </div>
    <div class="row justify-content-center">
        <p>{{Auth::user()->roles()->pluck('name')->implode(' ')}}</p>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card-deck justify-content-center">
                <div class="card text-center dashboard-tile">
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
                    <div class="card-footer">
                        <small class="text-muted">View ALL your Jobs</small>
                    </div>
                </div>
                @can('Create Job')
                <div class="card text-center dashboard-tile">
                    <br>
                    <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Create a new Job</h5>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Manage your Jobs</small>
                    </div>
                </div>
                @endcan
                @can('Create Company')
                <div class="card text-center dashboard-tile">
                    <br>
                    <i class="fa fa-building fa-5x" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Create a new Company</h5>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Manage ALL Companies</small>
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
                <div class="card text-center dashboard-tile">
                    <br>
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Manage website-wide users</small>
                    </div>
                </div>
                <div class="card text-center dashboard-tile">
                    <br>
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Manage Roles</h5>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Manage website-wide account roles</small>
                    </div>
                </div>
                <div class="card text-center dashboard-tile">
                    <br>
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Manage Permissions</h5>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Manage website-wide permissions</small>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
