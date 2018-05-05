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
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (!Auth::guest())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Create
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('jobs.create') }}">Create a Job</a>
                        <a class="dropdown-item" href="{{ route('companies.create') }}">Create a Company</a>

                    </div>
                </li>
                @endif
                @role('Admin')
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ url('users') }}">User Management</a>
                      <a class="dropdown-item" href="{{ url('roles') }}">Role Management</a>
                      <a class="dropdown-item" href="{{ url('permissions') }}">Permission Management</a>
                  </div>
                </li>
                @endrole
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                </li>
                @endguest
            </ul>
          </div>
        </nav>

        <main class="py-4">
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
        </main>
    </div>
</body>
</html>
