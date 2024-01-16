<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/alterarsenha.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link href="{{URL::asset('assets/alterarsenha.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <title>Recuperação de senha</title>
</head>
<body>
<div class="container">
        <img src="./img/LOGO2.png" alt="" id="logo">
        <div class="row mt-3">
            <div class="col-12 col-sm-12 col-md-12" id="card_main">

                <form class="form_main" method="POST" action="{{ route('password.store') }}">

                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="inputContainer">
                        <svg viewBox="0 0 16 16" fill="#2e2e2e" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="inputIcon">
                            <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
                        </svg>
                        <input placeholder="E-mail" type="text" class="input" name="email" :value="old('email')" required autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="inputContainer">
                        <svg viewBox="0 0 16 16" fill="#2e2e2e" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="inputIcon">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                        </svg>
                        <input placeholder="Criar Senha" type="password" class="input" type="password" name="password" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="inputContainer">
                        <svg viewBox="0 0 16 16" fill="#2e2e2e" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="inputIcon">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                        </svg>
                        <input placeholder="Confirmar sua Senha" type="password" class="input" required="" for="password_confirmation" :value="__('Confirm Password')" type="password" name="password_confirmation" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="btn-login">
                        <button type="submit" id="button" {{ __('login') }}>Entrar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-12"></div>
            <svg onclick="goBack()" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            <p id="exit">Sair</p>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
</body>
</html>
