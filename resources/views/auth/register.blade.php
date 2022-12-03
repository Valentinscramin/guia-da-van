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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</head>

<body class="login_body">
    <div class="login">
        <div class="container">
            <div class="row no-gutters">
                <div class="takeCard col-md-12">
                    <div class="col-12 col-md-6">
                        <div class="col-md-10">
                            <div class="icon_guia_van"><img src="{{ URL('/images/icon.png') }}" class="img-fluid" alt=""></div>
                            <div class="title col-12">{{ __('Registre-se') }}</div>
                            <div class="subtitle">Insira seus dados abaixo.</div>
                            <div class="formulario">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-12 itemInput">
                                        <label for="name">{{ __('Nome') }}</label>
                                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 itemInput">
                                        <label for="lastname">{{ __('Sobrenome') }}</label>
                                        <input id="lastname" type="text" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 itemInput">
                                        <label for="celular">{{ __('Celular') }}</label>

                                        <input id="celular" type="tel" class="@error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus onkeypress="$(this).mask('(00) 00000-0000')">

                                        @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 itemInput">
                                        <label for="email">{{ __('Email') }}</label>


                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 itemInput">
                                        <label for="password">{{ __('Senha') }}</label>

                                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 itemInput">
                                        <label for="password-confirm">{{ __('Confirmação de senha') }}</label>
                                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="col-12" style="justify-content: center;">
                                        <div class="btn_submit" style="margin: 10px auto;">
                                            <button type="submit" style="width: 100%; justify-content: center; padding: 19px 0; font-size: 1.45rem;">{{ __('Registre-se') }}</button>
                                        </div>
                                    </div>
                                </form>
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

</body>

</html>