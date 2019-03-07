<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('admin.admin_title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/libs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark flex-md-nowrap shadow">
    <a class="navbar-brand" href="{{ url('/') }}">Neotest</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">{{ app()->getLocale() }}</a>
                <div class="dropdown-menu" aria-labelledby="dropdown">
                    <a class="dropdown-item" href="{{ route('locale', ['locale' => 'en']) }}">en</a>
                    <a class="dropdown-item" href="{{ route('locale', ['locale' => 'hu']) }}">hu</a>
                </div>
            </li>
            <li class="nav-item text-nowrap">
                <a href="{{ url('/logout') }}" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    @lang('admin.logout')
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(Route::is('companies.index')) active @endif"
                           href="{{ route('companies.index') }}">
                            @lang('admin.companies')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Route::is('employees.index')) active @endif"
                           href="{{ route('employees.index') }}">
                            @lang('admin.employees')
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            @if(Breadcrumbs::exists(Route::currentRouteName()))
                @if(Route::currentRouteName() == "companies.edit")
                    {{ Breadcrumbs::render(Route::currentRouteName(), $company) }}
                @elseif(Route::currentRouteName() == "employees.edit")
                    {{ Breadcrumbs::render(Route::currentRouteName(), $employee) }}
                @else
                    {{ Breadcrumbs::render(Route::currentRouteName()) }}
                @endif
            @endif

            @yield('content')

        </main>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/libs.js') }}"></script>

@php
    $notification = new \App\Helpers\NotificationHelper();
@endphp
<script>
    @if($notification->isHasNotification())

    $.notify({
        // options
        message: '{{ $notification->getMessage() }}'
    }, {
        // settings
        type: '{{ $notification->getType() }}',
        offset: {
            x: 20,
            y: 65
        }
    });

    @endif
</script>

@yield('scripts')

</body>
</html>