<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ elixir('css/app.css')}}">
        <title>Laravel</title>

    </head>
    <body>
      <div class="hero is-primary is-bold is-large">
        <div class="hero-head">
          <nav class="nav">
            <div class="nav-left">
              <a class="nav-item is-brand" href="#">LRWH</a>
            </div>

              @if (Route::has('login'))
                <div class="nav-right">
                  @if (Auth::check())
                    <a class="nav-item" href="{{ url('/home') }}">Home</a>
                  @else
                    <a class="nav-item" href="{{ url('/login') }}">Login</a>
                    <a class="nav-item" href="{{ url('/register') }}">Register</a>
                  @endif
                </div>
              @endif
          </nav>
        </div>
        <div class="hero-body">
          <div class="container">
            <h1 class="title">Living Rooms Warehouse Inventory</h1>
            <p>
              Please Log in to proceed.
            </p>
          </div>
        </div>

      </div>

        <footer class="footer">
          <div class="container">
            <div class="content has-text-centered">
              <p>
                LRWH by Andreas
              </p>
            </div>
          </div>
        </footer>
    </body>
</html>
