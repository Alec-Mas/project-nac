@extends('layouts.app')

@section('title', '| Edit Permission')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('permissions')}}">Permissions</a></li>
    <li class="breadcrumb-item active">{{$permission->name}}</li>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <p>Edit {{$permission->name}}</p>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                            {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

                            <div class="form-group">
                                {{ Form::label('name', 'Permission Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
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
