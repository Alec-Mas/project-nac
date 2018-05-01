@extends('layouts.app')

@section('title', '| Permissions')

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
                  <a href="{{ route('roles.index') }}" class="nav-link">Roles</a></h1>
              </li>
            </ul>
          </div>
          <div class="card-body">
              <table class="table">
                  <thead class="thead-dark">
                      <tr>
                          <th>Permissions</th>
                          <th>Operation</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($permissions as $permission)
                      <tr>
                          <td>{{ $permission->name }}</td>
                          <td>
                          <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info" style="margin-right: 3px;">Edit</a>
                          {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}

                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
          </div>
        </div>
    </div>
</div>

@endsection
