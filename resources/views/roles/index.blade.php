@extends('layouts.app')

@section('title', '| Roles')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Roles</li>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link active">Roles</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link">Permissions</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th width="10%">Role</th>
                        <th width="60%">Permissions</th>
                        <th width="30%">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>

                        <td>{{ $role->name }}</td>

                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                        <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-primary icon-style">
                            <span class="fa fa-wrench fa-lg" aria-hidden="true"></span>
                        </a>
                        {!! Form::button('<i class=" fa fa-trash-o fa-lg"></i>', ['type' => 'submit', 'class' => 'btn btn-danger icon-style'] )  !!}
                        {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ URL::to('roles/create') }}" class="btn btn-success" style="width:120px; margin-left:20px;margin-bottom:20px;">Add Role</a>
</div>
@endsection
