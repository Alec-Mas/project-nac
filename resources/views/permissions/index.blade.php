@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a href="{{ route('users.index') }}" class="nav-link">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link active">Permissions</a></h1>
                    </li>
                </ul>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class="thead-dark">
                              <tr>
                                  <th width="50%">Permissions</th>
                                  <th width="50%">Operation</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($permissions as $permission)
                              <tr>
                                  <td>{{ $permission->name }}</td>
                                  <td>
                                      {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                      <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-primary icon-style">
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
                  <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
