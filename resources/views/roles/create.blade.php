@extends('layouts.app')

@section('title', '| Add Role')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('roles')}}">Roles</a></li>
    <li class="breadcrumb-item active">Create a Role</li>
</ol>
<div class="card mb-3">
    <div class="card-header pb-0">
        <p>Create a Role</p>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <h5 class="card-header">Create a Role</h5>
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::open(array('url' => 'roles')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>

                                <h5><b>Assign Permissions</b></h5>

                                <div class='form-group'>
                                    @foreach ($permissions as $permission)
                                        {{ Form::checkbox('permissions[]',  $permission->id ) }}
                                        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                                    @endforeach
                                </div>

                                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

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
