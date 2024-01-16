<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="assets/perfill.css">
    <link href="{{URL::asset('assets/calculadora.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-calc">
        <div class="svg-navbar">
            <svg onclick="window.location.href='/prestador'" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
        </div>
        <div class="grid">
            <!-- area do texto de imagem -->
            <div class="text-content">
                <h1 class="h1-calc">
                    Te ajudaremos a organizar o <h1 class="h1-calcc">Evento!</h1>
                </h1>
                <img src="./assets/img/img.svg" alt="" />
            </div>
            <!-- area de calculo -->
            <div class="box-calculo">
                <img src="./assets/img/churraslogo.png" alt="" />
                <div class="form">
                    <div class="input-block-calc">
                        <label for="adultos" class="label-calc">Quantidade de adultos</label>
                        <input type="number" name="adultos" id="adultos" placeholder="Adultos" class="input-calc" />
                    </div>
                    <div class="input-block-calc">
                        <label for="criancas" class="label-calc">Quantidade de crianças</label>
                        <input type="number" name="criancas" id="criancas" placeholder="Crianças" class="input-calc" />
                    </div>
                    <div class="input-block-calc">
                        <label for="duracao" class="label-calc">Duração do churrasco</label>
                        <input type="number" name="duracao" id="duracao" placeholder="Duração (em horas)" class="input-calc" />
                    </div>
                    <div class="input-block-calc">
                        <button onclick="calcular()" class="button-calc">Calcular</button>
                    </div>
                </div>

                <div id="resultado"></div>


            </div>
        </div>
    </div>
    </div>

    <script src="/js/calculadora.js"></script>
</body>

</html>
