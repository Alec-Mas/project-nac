@extends('layouts.app')

@section('title', '| Add User')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('users')}}">Users</a></li>
    <li class="breadcrumb-item active">Add a User</li>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <p>Add a User</p>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::open(array('url' => 'users')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email', '', array('class' => 'form-control')) }}
                                </div>

                                <div class='form-group'>
                                    @foreach ($roles as $role)
                                        {{ Form::checkbox('roles[]',  $role->id ) }}
                                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                    @endforeach
                                </div>

                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}<br>
                                    {{ Form::password('password', array('class' => 'form-control')) }}

                                </div>

                                <div class="form-group">
                                    {{ Form::label('password', 'Confirm Password') }}<br>
                                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

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
