@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a href="{{ route('users.index') }}" class="nav-link">Users</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link active">Roles</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link">Permissions</a></h1>
                </li>
            </ul>
          </div>
          <div class="card-body">
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
                          <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-primary">
                              <span class="fa fa-wrench fa-lg" aria-hidden="true"></span>
                          </a>
                          {!! Form::button('<i class=" fa fa-trash-o fa-lg"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  !!}
                          {!! Form::close() !!}

                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>
          </div>
        </div>
    </div>
</div>

@endsection
