<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/cadastro.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/uf-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12" id="registrer_main">
                <div class="forms">
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <h6 class="text">Criar conta</h6>
                    </div>
                    <form method="POST" action="{{ route('cadastro') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input placeholder="Nome e Sobrenome" type="text" class="input" name="name" :value="old('name')" required autofocus autocomplete="name" class="mt-2">
                        </div>

                        <div>
                            <input placeholder="E-mail" type="text" class="input" name="email" :value="old('email')" required autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <input placeholder="Telefone" type="number" class="input" name="telefone" :value="old('telefone')" required autocomplete="telefone">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <input placeholder="Criar Senha" type="password" class="input" type="password" name="password" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <input placeholder="Confirmar sua Senha" type="password" class="input" required="" for="password_confirmation" :value="__('Confirm Password')" type="password" name="password_confirmation" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="image-perfil">
                            <label for="image" id="image-label">Escolha uma foto para o Perfil</label>
                            <input type="file" id="image" name="image" class="from-control-file">

                        </div>

                        <button type="submit" class="btn uf-btn-primary btn-lg" id="cas" {{ __('cadastro') }}>Cadastrar</button>
                    </form>

                </div>
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
