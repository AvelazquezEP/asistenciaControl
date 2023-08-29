<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    @guest
        <title>{{ $_ENV['APP_NAME'] }}</title>
    @else
        <title>{{ $_ENV['APP_NAME'] }} - {{ Auth::user()->name }}</title>
    @endguest
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- ICONS (fontawssome) -->

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/b50aac37d5.js" crossorigin="anonymous"></script>
</head>

<style>
    .customNav {
        border-radius: 0;
        /* background-color: gray; */
    }
</style>
{{-- <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li> --}}

<body>
    <div id="app">
        <nav class="navbar navbar-inverse customNav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar">
                        </span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ $_ENV['APP_NAME'] }}</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    @guest
                        <ul class="nav navbar-nav navbar-right">
                            @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            {{-- NO SE NECESITA REGISTER PORQUE EL ADMINISTRADOR CREA CADA UNO DE LOS USUARIOS --}}
                            {{-- @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        </ul>
                    @else
                        <ul class="nav navbar-nav">
                            @can('dashboard-list')
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Dashboard
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                                Manage Dashboard
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            {{-- @can('post-list')
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Posts
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('posts.index') }}">
                                                Manage Post
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan --}}
                            @can('user-list')
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Users
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                                Manage Users
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Roles
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('roles.index') }}">
                                                Manage Roles
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="dropdown-item" href="{{ route('permission.index') }}">
                                                Manage Permissions
                                            </a>
                                        </li> --}}
                                    </ul>
                                </li>
                            @endcan
                            @if (auth()->user()->can('resource-list') ||
                                    auth()->user()->can('exams-list') ||
                                    auth()->user()->can('post-list'))
                                {{-- USAR CONDICION SI SE QUIERE AGREGAR MAS DE UN ROL/PERMISO  --}}
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Resources
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @can('resource-list')
                                            <li>
                                                <a class="dropdown-item" href="{{ route('category.index') }}">
                                                    Manage Resources
                                                </a>
                                            </li>
                                        @endcan
                                        @can('exams-list')
                                            <li>
                                                {{-- href="{{ route('tests.index') }}" --}}
                                                <a class="dropdown-item" href="{{ route('exams.index') }}">
                                                    Manage Exams
                                                </a>
                                            </li>
                                        @endcan
                                        @can('post-list')
                                            <li class="dropdown">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('posts.index') }}">
                                                    Manage Post
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif
                            @can('request-list')
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Request
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        {{-- <li>
                                            <a class="dropdown-item" href="{{ route('resources.index') }}">
                                                Manage Resources
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a class="dropdown-item" href="{{ route('category.index') }}">
                                                Manage Requests
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            {{-- @can('scheduler-list') --}}
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Scheduler
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('scheduler.index') }}">
                                            Manage Scheduler
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('scheduler.index') }}">
                                            Manage Assistance
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- @endcan --}}
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    {{-- <li>
                                        <a class="dropdown-item" href="#">
                                            Profile
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>
