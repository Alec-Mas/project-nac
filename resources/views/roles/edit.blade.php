@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('roles')}}">Roles</a></li>
    <li class="breadcrumb-item active">{{$role->name}}</li>
</ol>
<div class="card mb-3">
    <div class="card-header pb-0">
        <p>Edit Role: {{$role->name}}</p>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Role Name') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>

                                <h5><b>Assign Permissions</b></h5>
                                @foreach ($permissions as $permission)

                                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                                @endforeach
                                <br>
                                {{ Form::submit('Apply', array('class' => 'btn btn-success')) }}

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
