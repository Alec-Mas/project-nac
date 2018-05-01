@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">Roles</a>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Date/Time Added</th>
                          <th>User Roles</th>
                          <th>Operations</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                      <tr>

                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                          <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                          <td>
                          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                          {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
