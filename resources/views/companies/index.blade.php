@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
            </ul>
          </div>
          <div class="card-body">
              <table class="table">
                  <thead class="thead-dark">
                      <tr>
                          <th>Company</th>
                          <th>Operation</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              <a href="{{ URL::to('companies/create') }}" class="btn btn-success">Add Company</a>
          </div>
        </div>
    </div>
</div>

@endsection
