<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Task List</title>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style type="text/css">
    .main.container {
      padding-top: 6em;
      padding-bottom: 2em;
    }
    .task-done {
      text-decoration: line-through;
    }
    table td form {
      display: inline;
    }
  </style>

</head>
<body>

  


<div id="app">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          &nbsp;
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

</div>
  @guest
  <div style="text-align:center">Please login to create some tasks</div>

  @else
  <div class="ui main text container">
    @yield('content')

  </div>

@endguest

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.js"></script>
</body>
</html>