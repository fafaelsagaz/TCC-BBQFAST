<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('assets/perfill.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body">
    <div class="navbar" id="navbar">
        <nav class="navbar navbar-dark ">
            <div class="container-fluid" id="container-fluid">
                <div id="svg-exit">
                    <div class="svg-navbar"><svg onclick="window.location.href='/perfilprestador'"
                            xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-left">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg></div>
                </div>
                <div>
                    <form class="form-inline">
                        <div class="icon-user">
                            <div class="icon-user">
                                @if (Auth::user()->image)
                                    <img class="img-perfil" src="/img/perfil/{{ Auth::user()->image }}"
                                        alt="{{ Auth::user()->image }}">
                                @else
                                    <svg height="60" width="60" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="rgba(236,240,241,1)"
                                            d="M4.828 21l-.02.02-.021-.02H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H4.828zM20 15V5H4v14L14 9l6 6zm0 2.828l-6-6L6.828 19H20v-1.172zM8 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4z">
                                        </path>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        </header>
        <main class="info">
            <div class="row" id="title-default">
                <div class="col-12 col-sm-12 col-md-12" id="middle">
                    <h1 id="text">Incluir Dados Adicionais</h1>
                </div>
            </div>
            <form action="{{ route('perfilp.storep') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12" id="middle">
                        <div class="card-default">
                            <div class="container_input">
                                <div class="inputContainer">
                                    <label class="inputLabel">CPF ou CNPJ</label>
                                </div>
                                <div class="inputContainer">
                                    <input required="" class="customInput" type="number" name="CD_CNPJ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12" id="middle">
                        <div class="card-default">
                            <div class="container_input">
                                <div class="inputContainer">
                                    <label class="inputLabel">Grupo de Serviço</label>
                                </div>
                                <select type="text" class="form-select form-select-sm"
                                    aria-label="Small select example" id="form-select" name="services_id">
                                    <div id="option">
                                        <option value="">Selecione um serviço</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->DS_SERVICO }}</option>
                                        @endforeach
                                    </div>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12" id="middle">
                        <div class="card-default">
                            <div class="container_input">
                                <div class="inputContainer">
                                    <label class="inputLabel">Especialidade Principal</label>
                                </div>
                                <select type="text" class="form-select form-select-sm"
                                    aria-label="Small select example" id="form-select" name="specialties_id">
                                    <div id="option">
                                        <option value="">Selecione uma especialidade</option>
                                        @foreach ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->DS_ESPECIALIZACAO }}
                                            </option>
                                        @endforeach
                                    </div>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12" id="middle">
                        <div class="card-default" id="card-default-textarea">
                            <div class="container_input">
                                <div class="inputContainer">
                                    <label class="inputLabel">Descrição</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" type="text" placeholder="Escreva sobre você" id="floatingTextarea"
                                        name="DS_DESCRICAO"></textarea>
                                    <label for="floatingTextarea" id="label-textarea"> Fale sobre você...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-login mt-4">
                    <button id="button" type="submit" name="submit">Incluir Informações</button>
                </div>                
            </form>
        </main>
    </div>
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='prestador'"
                            xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='agendamento'" xm
                            lns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='avaliar'"
                            xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <div id="icons-footer">
                        <svg id="svg-footer" onclick="window.location.href='perfil-prestador'"
                            xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="#f39c12" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0-2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
</body>

</html>
