<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{config('app.name', 'Gym for Gym')}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{elixir('css/g4g.css')}}"/>
</head>
<body>

<div class="top-bar">
    <div class="top-bar-title">
        <a href="/" class="top-bar-link">
            {{config('app.name', 'Gym for Gym')}}
        </a>
    </div>
    <div class="top-bar-right">
        @if (Auth::guest())
            <ul class="dropdown menu" data-dropdown-menu>
                <li>
                    <a href="{{route('login')}}" class="top-bar-link">
                        Log in
                    </a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="top-bar-link">
                        Register
                    </a>
                </li>
            </ul>
        @else
            <ul class="dropdown menu" data-dropdown-menu>
                <li>
                    <a href="#"
                       class="top-bar-link">{{Auth::user()->display_name}}
                    </a>
                    <ul class="menu vertical">
                        <li>
                            <form id="logout-form"
                                  action="{{route('logout')}}"
                                  method="POST">
                                {{csrf_field()}}
                                <button class="hollow button expanded"
                                        type="submit">
                                    Log out
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        @endif
    </div>
</div>

<div class="row content">
    <div class="columns">
        @yield('content')
    </div>
</div>

<script async defer src="{{elixir('js/g4g.js')}}"
        type="application/javascript"></script>
<script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()])!!};
    window.onload  = function () {
        $(document).foundation();
    };
</script>

</body>
</html>
