<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                @if (!Auth::guest())
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Companies">
                    <a class="nav-link" href="{{ url('companies') }}">
                        <i class="fa fa-fw fa-building"></i>
                        <span class="nav-link-text">Companies</span>
                    </a>
                </li>
                @endif
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Job Management">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseJobManagement" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Job Management</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseJobManagement">
                        <li>
                            <a href="#">View my Jobs</a>
                        </li>
                        @can('Create Job')
                        <li>
                            <a href="{{ route('jobs.create') }}">Create a Job</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @hasanyrole('Agency|Admin')
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company Management">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCompanyManagement" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-handshake-o"></i>
                        <span class="nav-link-text">Company Management</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseCompanyManagement">
                        @can('Create Company')
                        <li>
                            <a href="{{ route('companies.create') }}">Create a Company</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endrole
                @role('Admin')
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Management">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUserManagement" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">User Management</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseUserManagement">
                        @can('Administer roles & permissions')
                        <li>
                            <a href="{{ route('users.create') }}">Create Users</a>
                        </li>
                        <li>
                            <a href="{{ route('roles.create') }}">Create Roles</a>
                        </li>
                        <li>
                            <a href="{{ route('permissions.create') }}">Create a Permissions</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endrole
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                    </a>

                </li>
            </ul>
        </div>
    </nav>
  <div class="content-wrapper">
      <div class="container-fluid">
          @if(Session::has('flash_message'))
          <div class="container">
              <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
              </div>
          </div>
          @endif
          <div class="container">
              @include ('errors.list') {{-- Including error file --}}
          </div>
          @yield('content')
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <footer class="sticky-footer">
          <div class="container">
              <div class="text-center">
                  <small>Copyright © Eldora Studios {{ Carbon\Carbon::now()->year}}</small>
              </div>
          </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </div>
          </div>
      </div>
      {{-- Scripts --}}
      <script src="{{ mix('/js/app.js') }}"></script>
      @yield('footer_scripts')
  </div>
</body>
</html>
