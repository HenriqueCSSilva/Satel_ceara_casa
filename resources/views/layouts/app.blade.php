<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Satel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="https://unpkg.com/vue"></script>
 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--XXXXXX--> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Styles -->
    
    <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->

</head>
<body style="background-color: #38322D;">

    <div style="background-color: #38322D;" id="app">
        <nav style="background-color: #81BE01;"   class="navbar navbar-expand-md borda"> 
            <div class="container borda">
                <a style="color: #FFFFFF;" class="navbar-brand" href="{{ url('/home') }}">
                    <img src="img/logo.png" width="90" height="30"/>
                </a>

                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav_authent" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Generic Links -->
                  
                            <li class="nav-itemx">
                                <a style="color: #FFFFFF;" class="nav-link" href="{{ route('login') }}">{{ __('Ingresso de Projetos') }}</a>
                            </li>
                        					
							
					<!--  Menu Projetos     -->
                            <li style="color: #FFFFFF;" class="nav-item dropdown">
                                <a style = "color: #FFFFFF;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Consulta') }} <span style = "color: #FFFFFF;"class="caret"></span>
                                </a>

                                <div style = "background-color: #81BE01;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     
                                <a style = "color:#000;" class="dropdown-item" href="{{ '/ceara_satel_x/public/ingresso'}}">
                                      {{ __('Ingresso Projetos') }}
                                  </a>
                                  
                                    <a style = "color: #000;" class="dropdown-item" href="{{ '/ceara_satel_x/public/consulta' }}">
                                        {{ __('Consulta Ingressados') }}
                                    </a>
                                
                                </div>
                            </li>
                            <!--  Menu Projetos     -->
                    
	</ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a style="color: #FFFFFF;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color: #FFFFFF;" class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li style="color: #FFFFFF;" class="nav-item dropdown">
                                <a style = "color: #FFFFFF;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span style = "color: #FFFFFF;"class="caret"></span>
                                </a>

                                <div style = "background-color: #81BE01;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a style = "color: #FFFFFF;" class="dropdown-item" href="{{ route('configurarSenha') }}">
                                      {{ __('Configura Senha') }}
                                  </a>
                                  
                                    <a style = "color: #FFFFFF;" class="dropdown-item" href="{{ route('logout') }}"
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')


        </main>
    </div>
    @section('footer')


    <footer style = "border:none;" class="card">
            <div style="background-color: #81BE01   ; color: #FFFFFF; position:fixed;bottom:0; width:100%;
              text-align: center;" class="card-header">
            <label>Contato:pjceara@satel-sa.com</label>
            </div>
</footer>






@show
    
</body>
</html>
