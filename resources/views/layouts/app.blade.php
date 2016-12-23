<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ elixir('css/app.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
      <div class="hero is-primary is-bold">
        <div class="hero-head">
          <nav class="nav">
            <div class="nav-left">
              <a class="nav-item is-brand" href="/">LRWH</a>
            </div>
            <div class="nav-right">

              @if (Auth::guest())
                <a class="nav-item" href="{{ url('/login') }}">Login</a></li>
                <a class="nav-item is-disabled" href="{{ url('/register') }}">Register</a></li>
              @else
                <span class="nav-item">{{ Auth::user()->name }}</span>
                <a class="nav-item" href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                   Logout
               </a>
               <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
               </form>
              @endif
            </div>
          </nav>
        </div>

        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              @yield('title')
            </h1>
            <p>
              @yield('subtitle')
            </p>
          </div>
        </div>
      </div>

        @yield('content')
    </div>

    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <p>
            LRWH by AEG
          </p>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ elixir('/js/app.js') }}"></script>
</body>
</html>
