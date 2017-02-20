<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
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
                        <li><a href="{{ url('/articles') }}">Articles</a></li>
                        <li><a href="{{ url('/users') }}">Users</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="articles/create">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            Create a new article
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out"></span> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">

            @include('flash::message')

            @yield('content')
        </div>
        @yield('footer')
        <div class="container-fluid page_footer">
            <div class="col-md-2">
                <h4>{{ config('app.name', 'Laravel') }}</h4>
            </div>
            <div class="col-md-4">
                <h4>Also on Someblog</h4>
                <ul class="footer_list _vertical">
                    <li><a href={{ url('/about') }}>About Us</a></li>
                    <li><a href={{ url('/subscribe') }}>Newsletter</a></li>
                    <li><a href={{ url('/contact') }}>Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Follow Someblog</h4>
                <ul class="footer_list _social">
                    <li><a href="https://www.facebook.com">Facebook</a></li>
                    <li><a href="https://twitter.com"><span class="fa fa-twitter"></span> Twitter</a></li>
                    <li><a href="https://www.linkedin.com">LinkedIn</a></li>
                    <li><a href="https://www.deviantart.com/">DeviantArt</a></li>
                    <li><a href="https://www.behance.net/">Behance</a></li>
                    <li><a href="https://www.tumblr.com">Tumblr</a></li>
                    <li><a href="https://www.instagram.com">Instagram</a></li>
                    <li><a href="https://www.flickr.com">Flickr</a></li>
                    <li><a href="https://www.pinterest.com">Pinterest</a></li>
                    <li><a href="#">Rss</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{--<!-- Scripts -->--}}
    {{--<script src="/js/app.js"></script>--}}
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
</body>
</html>
