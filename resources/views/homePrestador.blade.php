<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="assets/homePrestador.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

</head>

<body>
    <div class="navbar" id="navbar">
        <nav class="navbar navbar-dark ">
            <div class="container-fluid">
                <div class="svg-navbar">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <svg :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <svg onclick="window.location.href = '/home'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </form>
                </div>
                <form class="form-inline">
                    <div class="saudacao">
                        <div class="saudacao">
                            <h5>Olá</h5>
                        </div>
                        <div>
                            <h5 class="saudacao">{{ Auth::user()->name }}</h5>
                        </div>
                    </div>
                    <div class="icon-user navbar">
                        @if(Auth::user()->image)
                        <img class="img-geral" src="/img/perfil/{{ Auth::user()->image }}" alt="{{ Auth::user()->image }}" onclick="window.location.href='/perfilprestador'">
                        @else
                        <svg onclick="window.location.href='/perfilprestador'" height="25" width="25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="rgba(236,240,241,1)" d="M4.828 21l-.02.02-.021-.02H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H4.828zM20 15V5H4v14L14 9l6 6zm0 2.828l-6-6L6.828 19H20v-1.172zM8 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>
                        </svg>
                        @endif
                    </div>
                </form>
            </div>
        </nav>
    </div>

    <div class="container">

        @if(session('succ'))
        <div class="msg alert alert-success alert-dismissible fixed-top d-flex justify-content-center align-items-center mt-4 fade show" role="alert" style="white-space: nowrap; left: 50%; transform: translateX(-50%); width: 80%; max-width: 400px;">
            {{ session('succ') }}
            <button class="btn-close" data-bs-dismiss="alert" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"></button>
        </div>
        @endif

        <div class="btn-prestador">
            <div class="col-6 col-sm-6 col-md-6">
                <div class="card" onclick="window.location.href = '/pedidos'">
                    <h2>Pedidos</h2>
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 ">
                <div class="card" onclick="window.location.href = '/perfilprestador'">
                    <h2>Perfil</h2>
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
            </div>
        </div>

        <section class="card-prestador">
            <div class="row mt-5 " id="middle">
                <div class="col-12" id="middle">
                    <div class="cardmain" onclick="window.location.href = '/planos'">
                        <div id="card-title">
                            <h4 id="card-title">Planos</h4>
                            <h4 id="card-title">De Assinatura</h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3 " id="middle">
                <div class="col-12" id="middle">
                    <div class="cardmain" id="cardmain" onclick="window.location.href = '/agendamento'">
                        <div id="card-title">
                            <h4 id="card-title">Meus</h4>
                            <h4 id="card-title">Agendamentos</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3" id="midle">
                <div class="col-12" id="middle">
                    <div class="cardmain" onclick="window.location.href = '/avaliar'">
                        <div id="card-title">
                            <h4 id="card-title">Avaliações</h4>
                            <h4 id="card-title">e Comentários</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3" id="midle">
                <div class="col-12" id="middle">
                    <div class="cardmain" id="cardmain" onclick="window.location.href = '/dash'">
                        <div id="card-title">
                            <h4 id="card-title">Minha</h4>
                            <h4 id="card-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3" id="midle">
                <div class="col-12" id="middle">
                    <div class="cardmain" onclick="window.location.href = '/calculadora'">
                        <div id="card-title">
                            <h4 id="card-title">BBQ</h4>
                            <h4 id="card-title">Calculadora</h4>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='prestador'" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='agendamento'" xm lns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='avaliar'" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='perfil-prestador'" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0-2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
