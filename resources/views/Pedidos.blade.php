<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{URL::asset('assets/pedidos.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body">
    <main>
        @if(session('msg'))
        <div class="msg alert alert-success alert-dismissible fixed-top d-flex justify-content-center align-items-center mt-4 fade show" role="alert" style="white-space: nowrap; left: 50%; transform: translateX(-50%); width: 65%; max-width: 400px;">
            <button class="btn-close" data-bs-dismiss="alert" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"></button>
            {{ session('msg') }}
        </div>
        @endif
    </main>
    <div class="navbar" id="navbar">
        <nav class="navbar navbar-dark ">
            <div class="container-fluid">
                <div class="svg-navbar">
                    <svg onclick="window.location.href='/prestador'" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                </div>
                <form class="form-inline">
                    <div class="icon-user">
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
        <div class="row" id="title-default">
            <div class="col-12 col-sm-12 col-md-12" id="middle_title">
                <H1 id="text">Solicitações Pendentes</H1>
            </div>
        </div>
        @foreach ($eventos as $evento)
        @if ($evento->user)
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-12" id="middle">
                <div class="card-default">
                    <div class="header">
                        <div>
                            <a class="title" href="#">
                                {{ $evento->user->name }}
                            </a>
                            <p class="name">São Vicente-SP</p>
                        </div>
                        <div class="image">
                            @if( $evento->user->image )
                            <img class="img-geral-qr" src="/img/perfil/{{ $evento->user->image }}" alt="{{ $evento->user->image }}">
                            @else
                            <svg height="25" width="25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path fill="rgba(236,240,241,1)" d="M4.828 21l-.02.02-.021-.02H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H4.828zM20 15V5H4v14L14 9l6 6zm0 2.828l-6-6L6.828 19H20v-1.172zM8 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>
                            </svg>
                            @endif
                        </div>
                    </div>
                    <p class="description">
                        Endereço
                    <p class="db-info">{{ $evento->NM_ENDERECO_EVENTO }}</p>
                    </p>
                    <p class="description">
                        Nº de Convidados
                    <p class="db-info">{{ $evento->DS_QUANTIDADE_EVENTO }}</p>
                    </p>
                    <p class="description">
                        Data
                        @if ($evento->DT_EVENTO)
                        <p class="db-info">{{ \Carbon\Carbon::parse($evento->DT_EVENTO)->format('d/m/Y') }} </p>
                    @else
                        <p class="db-info">{{ $evento->DT_EVENTO }} </p>
                    @endif
                    <p class="description">
                        Horário
                    <p class="db-info">{{ $evento->HR_EVENTO }}</p>
                    </p>
                    <p class="description">
                        Duração do Evento
                    <p class="db-info">{{ $evento->HR_DURACAO }}
                    </p>
                    </p>
                    <div class="post-info">
                        <div>
                            <form method="POST" action="{{ route('recusar.pedido', ['pedidoId' => $evento->CD_PEDIDO]) }}">
                                @csrf
                                <button class="btn-card-default1" onclick="return confirm('Tem certeza que deseja recusar?')">Recusar</button>
                            </form>
                        </div>

                        <div class="btn-orca">
                            <button class="btn-card-default2"
                                onclick="exibirBotoesAceitar('{{ $evento->CD_PEDIDO }}', '{{ $evento->CD_TELEFONE_EVENTO }}')">Aceitar</button>
                            <div id="botoesAceitar_{{ $evento->CD_PEDIDO }}"
                                style="display: none; flex-direction: column; margin-top: 10px;">
                                <!-- Adicione um espaçamento superior -->
                                <label for="">O orçamento foi aceito?</label>
                                <div class="post-orca">
                                    <form method="POST"
                                        action="{{ route('aceitar.pedido', ['pedidoId' => $evento->CD_PEDIDO]) }}">
                                        @csrf
                                        <button type="submit" class="btn-card-default2"
                                            style="width: 60px; margin-right: 10px; margin-top: 3px; background-color: rgb(0, 128, 0);">Sim</button>
                                        <!-- Defina a largura desejada -->
                                    </form>
                                    <form method="POST"
                                        action="{{ route('recusar.pedido', ['pedidoId' => $evento->CD_PEDIDO]) }}">
                                        @csrf
                                        <button class="btn-card-default1"
                                            style="width: 60px; margin-top: 3px; background-color: rgba(235, 4, 4, 0.836);">Não</button>
                                        <!-- Defina a largura desejada -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
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
    <script>
        function goBack() {
            window.location.href = "/prestador";
        }
    </script>

    <script src="js/bootstrap.js"></script>
    <script>
        function goBack() {
            window.location.href = "/prestador";
        }
    </script>
     <script>
        function exibirBotoesAceitar(pedidoId, numeroTelefone) {
            // Esconder todos os conjuntos de botões
            document.querySelectorAll('[id^="botoesAceitar_"]').forEach(function (el) {
                el.style.display = 'none';
            });

            // Exibir apenas o conjunto de botões correspondente ao card clicado
            document.getElementById('botoesAceitar_' + pedidoId).style.display = 'block';

            numeroTelefone = numeroTelefone.replace('+', '00');

            // Abre o link do WhatsApp com o número de telefone em uma nova guia
            window.open('https://wa.me/' + numeroTelefone, '_blank');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>