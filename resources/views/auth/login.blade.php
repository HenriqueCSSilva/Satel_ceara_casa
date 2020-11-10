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

    <!-- Styles -->
     <link href="{{ asset('css/appStyle.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 

</head>
<body style="background-color: #38322D;">
<body style="background-color: #38322D;">

    <div style="background-color: #38322D;" id="app">
        <nav style="background-color: #81BE01;"   class="navbar navbar-expand-md borda"> 
            <div class="container borda">
                <a style="color: #FFFFFF;" class="navbar-brand" href="{{ url('/') }}">
                    <img src="img/logo.png" width="90" height="30"/>
                </a>

                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav_authent" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Generic Links -->
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
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style = "border: none;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF;"class="card-header">{{ __('Login') }}</div>

                <div style="background-color: #554c44;" class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style = "color: #FFFFFF;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style = "color: #FFFFFF;" class="form-check-label" for="remember">
                                        {{ __('Lembrar login') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style = "background-color:#81BE01; border: none;"class="btn btn-success"type="submit" >
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a style = "color: #FFFFFF;" class="btn btn-link" href="{{ route('esqueciSenha') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
           


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

























