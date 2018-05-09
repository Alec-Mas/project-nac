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
    <style>
        /* Stackoverflow preview fix, please ignore */
        .navbar-nav {
          flex-direction: row;
        }

        .nav-link {
          padding-right: .5rem !important;
          padding-left: .5rem !important;
        }

        /* Fixes dropdown menus placed on the right side */
        .ml-auto .dropdown-menu {
          left: auto !important;
          right: 0px;
        }
      </style>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <aside class="col-12 col-md-2 p-0 bg-dark">
                <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                    <div class="collapse navbar-collapse">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            <li class="nav-item">
                                <a class="navbar-brand" href="{{ route('dashboard') }}">
                                    <i class="fa fa-handshake-o fa-fw"></i> {{ config('app.name', 'Laravel') }}
                                </a>
                            </li>
                            @if (!Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ url('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i><span class="d-none d-md-inline"> Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ url('jobs') }}"><i class="fa fa-heart-o fa-fw"></i><span class="d-none d-md-inline"> Jobs</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ url('companies') }}"><i class="fa fa-building fa-fw"></i><span class="d-none d-md-inline"> Companies</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ route('jobs.create') }}"><i class="fa fa-plus-circle fa-fw"></i><span class="d-none d-md-inline"> Create a Job</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ route('companies.create') }}"><i class="fa fa-plus-square-o fa-fw"></i><span class="d-none d-md-inline"> Create a Company</span></a>
                            </li>
                            @role('Admin')
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ url('users') }}"><i class="fa fa-user-plus fa-fw"></i><span class="d-none d-md-inline"> User Management</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ url('roles') }}"><i class="fa fa-users fa-fw"></i><span class="d-none d-md-inline"> Role Management</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ url('permissions') }}"><i class="fa fa-shield fa-fw"></i><span class="d-none d-md-inline"> Permission Management</span></a>
                            </li>
                            @endrole
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </aside>

            <main class="col bg-faded py-3">
                @if(Session::has('flash_message'))
                <div class="container">
                    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                    </div>
                </div>
                @endif

                <div class="container">
                    @include ('errors.list') {{-- Including error file --}}
                </div>
                <hr>
                @yield('content')
                <hr>
            </main>
        </div>
    </div>
    {{-- Scripts --}}
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('footer_scripts')
</body>
</html>
