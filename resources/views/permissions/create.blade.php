@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">Add Permission</h5>
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
                        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
