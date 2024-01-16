<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/evento.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <style>
        #formAlert {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main>
        @if(session('error'))
        <div class="msg alert alert-danger alert-dismissible fixed-top d-flex justify-content-center align-items-center mt-4 fade show" role="alert" style="white-space: nowrap; left: 50%; transform: translateX(-50%); width: 65%; max-width: 400px;">
            <button class="btn-close" data-bs-dismiss="alert" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"></button>
            {{ session('error') }}
        </div>
        @endif
    </main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    @csrf
                    <div class="forms" >
                        <div>
                            <svg id="plus" xmlns="http://www.w3.org/2000/svg" width="65" height="65"
                                viewBox="0 0 24 24" fill="none" stroke="#f39c12" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>

                            <h4 class="text">Crie seu Evento</h4>
                            <p>Preencha as informações abaixo para criação do evento.</p>
                        </div>
                        <div class="alert alert-danger" role="alert" id="formAlert">
                            Por favor, preencha todos os campos.
                        </div>


                        <label for="tipo-evento" id="text-label">Qual o tipo de serviço você procura?</label>
                        <select type="text" class="form-select form-select-sm" aria-label="Small select example"
                            id="form" name="service_id">
                            <div id="option">
                                <option value="1"></option>
                                @foreach ( $services as $service )
                                <option value="{{ $service->id }}">{{ $service->DS_SERVICO }}</option>
                                @endforeach

                            </div>
                        </select>

                        <label for="tipo-evento" id="text-label">Qual o tipo de evento?</label>
                        <select type="text" class="form-select form-select-sm" aria-label="Small select example"
                            id="form" name="DS_EVENTO">
                            <div id="option">
                                <option value="1"></option>
                                <option value="Casamento">Casamento</option>
                                <option value="Aniversário">Aniversário</option>
                                <option value="Formatura">Formatura</option>
                                <option value="Debutante">Debutante</option>
                                <option value="Corporativo">Corporativo</option>
                                <option value="Evento Privado">Evento Privado</option>
                                <option value="Batizado">Batizado</option>
                                <option value="Comunhão">Comunhão</option>
                                <option value="Coquetel">Coquetel</option>
                                <option value="Outro">Outro</option>
                            </div>
                        </select>

                        <label for="quantidade" id="text-label">Qual o nº estimado de convidados?</label>
                        <select type="text" class="form-select form-select-sm" aria-label="Small select example"
                            id="form" name="DS_QUANTIDADE_EVENTO">
                            <div id="option">
                                <option value="1"></option>
                                <option value="até 30 pessoas">até 30 pessoas</option>
                                <option value="30 a 50 pessoas">30 a 50 pessoas</option>
                                <option value="50 a 70 pessoas">50 a 70 pessoas</option>
                                <option value="70 a 90 pessoas">70 a 90 pessoas</option>
                                <option value="100 ou mais pessoas">100 ou mais pessoas</option>
                            </div>
                        </select>

                        <label for="data-evento" id="text-label">Qual a data do evento?</label>
                        <input class="form-control  form-control-sm" type="date" placeholder=""
                            aria-label="default input example" id="form" name="DT_EVENTO">

                        <label for="horario-evento" id="text-label">Qual o horário que o evento será marcado?</label>
                        <input class="form-control  form-control-sm" type="time" placeholder=""
                            aria-label="default input example" id="form" name="HR_EVENTO">

                        <label for="tipo-evento" id="text-label">Qual a duração do evento?</label>
                        <select type="text" class="form-select form-select-sm" placeholder="Nome"
                            aria-label="Small select example" id="form" name="HR_DURACAO">
                            <div id="option">
                                <option value="1"></option>
                                <option value="1 hora">1 hora</option>
                                <option value="2 horas">2 horas</option>
                                <option value="3 horas">3 horas</option>
                                <option value="4 ou mais">4 ou mais</option>
                            </div>
                        </select>

                        <label for="tipo-evento" id="text-label">Qual o endereço do local?</label>
                        <input class="form-control  form-control-sm" type="text" placeholder="Insira o logradouro, número, bairro e cidade"
                        aria-label="default input example" id="form" name="NM_ENDERECO_EVENTO">

                        <label for="tipo-evento" id="text-label">Qual o telefone para contato?</label>
                        <input class="form-control  form-control-sm" type="text" placeholder="DDD + Telefone" value="{{ Auth::user()->telefone }}"
                            aria-label="default input example" id="form" name="CD_TELEFONE_EVENTO">

                        <button type="submit" class="btn uf-btn-primary btn-lg" id="cas"
                          >CRIAR</button>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12"></div>
                    <svg onclick="window.location.href='/cliente'" xmlns="http://www.w3.org/2000/svg" width="35"
                        height="35" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <p id="exit">Sair</p>
                </div>
            </div>
        </div>
    </div>

    <script>
      function validateForm() {
    // Sua lógica de validação aqui

    const servico = document.querySelector("select[name='DS_SERVICO']").value;
    const evento = document.querySelector("select[name='DS_EVENTO']").value;
    const quantidade = document.querySelector("select[name='DS_QUANTIDADE_EVENTO']").value;
    const data = document.querySelector("input[name='DT_EVENTO']").value;
    const horario = document.querySelector("input[name='HR_EVENTO']").value;
    const duracao = document.querySelector("select[name='HR_DURACAO']").value;
    const endereco = document.querySelector("input[name='NM_ENDERECO_EVENTO']").value;
    const telefone = document.querySelector("input[name='CD_TELEFONE_EVENTO']").value;

    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!servico || !evento || !quantidade || !data || !horario || !duracao || !endereco || !telefone) {
        alert("Por favor, preencha todos os campos.");
        return false;
    }

    // Verifica se a data do evento é válida
    const dataEvento = new Date(data);
    if (isNaN(dataEvento.getTime())) {
        alert("Por favor, insira uma data de evento válida.");
        return false;
    }

    // Oculta o alerta se os campos estiverem preenchidos corretamente
    const alert = document.getElementById("formAlert");
    alert.style.display = "none";

    return true;
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
