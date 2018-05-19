@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('permissions')}}">Permissions</a></li>
    <li class="breadcrumb-item active">Create a Permission</li>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <p>Create a Permission</p>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                {{ Form::open(array('url' => 'permissions')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                                </div><br>
                                @if(!$roles->isEmpty())
                                    <h4>Assign Permission to Roles</h4>

                                    @foreach ($roles as $role)
                                        {{ Form::checkbox('roles[]',  $role->id ) }}
                                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                    @endforeach
                                @endif
                                <br>
                                {{ Form::submit('Create', array('class' => 'btn btn-success')) }}

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
