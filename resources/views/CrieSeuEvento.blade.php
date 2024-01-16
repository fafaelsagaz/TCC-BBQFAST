<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="assets/crieseuevento.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

</head>

<body class="body">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-12"></div>
            <img id="img" src="img/LogoPng.png" alt="">
        </div>
        <div class="row mt-5">
            <div calss="col-12 col-sm-12 col-md-12">
                <h1 id="evento">Crie seu evento</h1>

            </div>

        </div>
        <div class="row mt-3">
            <div calss="col-12 col-sm-12 col-md-12">
                <h5 id="comeca">Vamos começar?</h4>

            </div>

        </div>
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-12"></div>
            <svg onclick="window.location.href = '/evento'" id="plus" xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-12"></div>
            <svg onclick="window.location.href='/cliente'" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
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
