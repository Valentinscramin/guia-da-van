<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Scripts --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body class="login_body">
    <div class="login">
        <div class="container">
            <div class="row no-gutters">
                <div class="takeCard col-md-12">
                    <div class="col-12 col-md-6">
                        <div class="col-md-10">
                            <div class="icon_guia_van"><img src="{{ URL('/images/icon.png') }}" class="img-fluid" alt=""></div>
                            <div class="title col-12">{{ __('Login') }}</div>
                            <div class="subtitle">Entre com seu e-mail e senha.</div>
                            <div class="formulario">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="col-12 itemInput">
                                        <label for="email" class="col-md-4 text-md-end">{{ __('E-mail*') }}</label>

                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 itemInput">
                                        <label for="password" class="col-md-4 text-md-end">{{ __('Senha*') }}</label>

                                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 itemInput flex">
                                        <div class="col-6" style="display: flex;">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember">
                                                {{ __('Lembrar-me') }}
                                            </label>
                                        </div>
                                        <div class="col-6 forget_password">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Esqueceu sua senha?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12" style="justify-content: center;">
                                        <div class="btn_submit" style="margin: 10px auto;">
                                            <button type="submit" style="width: 100%; justify-content: center; padding: 19px 0; font-size: 1.45rem;">{{ __('Entrar') }}</button>
                                        </div>
                                    </div>
                                    <div class="col-12 btn_register_login">
                                        <a href="/register">Registrar-se</a>
                                    </div>
                            </div>
                            </form>

                            <div class="col-12">
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="slider_login">
                            <div class="item_login_slider"><img src="{{ URL('/images/card_1.png') }}" class="img-fluid" alt=""></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>