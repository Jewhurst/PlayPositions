
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Play Positions') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app" class="container">

        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-bb-primary">
            <a class="navbar-brand" href="#">Play Positions - Baseball</a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                @guest
                    <span class="pr-4"><a class="clr-white" href="{{ route('login') }}">Login</a></span>
                    <a class="clr-white"href="{{ route('register') }}">Register</a>
                @else
                    <li class="dropdown" style="list-style-type: none;">
                        <a href="#" class="dropdown-toggle clr-white" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
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

            </div>
        </nav>



        @yield('content')
        @include('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        document.getElementById('playercount').onchange = function answers2() {
            var player = document.getElementById("playercount");
            var answer2 = player.options[player.selectedIndex].value;
            if(answer2 != ""){document.getElementById("inningcount").disabled = false;}
        }

    </script>

    <script type="text/javascript">

        document.getElementById('inningcount').onchange = function answers() {
            var inning = document.getElementById("inningcount");
            var answer = inning.options[inning.selectedIndex].value;
            var player = document.getElementById("playercount");
            var answer2 = player.options[player.selectedIndex].value;

            if(answer != "9" && answer2 == "9"){
                $('#oddwarning').modal('show');
            }else if(answer == "9" && answer2 != "9"){
                $('#plywarning').modal('show');
            } else if(answer !="9" && answer2 !="9"){
                $('#plyinnwarning').modal('show');
            }
        }


    </script>
</body>
</html>
