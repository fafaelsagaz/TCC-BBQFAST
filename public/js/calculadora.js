const inputAdultos = document.getElementById("adultos");
const inputCriancas = document.getElementById("criancas");
const inputDuracao = document.getElementById("duracao");

const resultado = document.getElementById("resultado");


function goBack() {
    window.history.back()
}

function carnePP(duracao) {
    if (duracao >= 6) {
        return 650;
    } else {
        return 400;
    }
}

function cervejaPP(duracao) {
    if (duracao >= 6) {
        return 2000;
    } else {
        return 1200;
    }
}

function bebidasPP(duracao) {
    if (duracao >= 6) {
        return 1500;
    } else {
        return 1000;
    }
}

function calcular() {
    const adultos = inputAdultos.value;
    const criancas = inputCriancas.value;
    const duracao = inputDuracao.value;

    const qdtTotalCarne =
        carnePP(duracao) * adultos + (carnePP(duracao) / 2) * criancas;
    const qdtTotalCerveja = cervejaPP(duracao) * adultos;
    const qdtTotalBebidas =
        bebidasPP(duracao) * adultos + (bebidasPP(duracao) / 2) * criancas;

    //coloca-se o "+" após o sinal de "=" para deixar entendido que preciso imprimir mais de um innerHTML
    resultado.innerHTML = `<h2 class="result-info h2-calc">Vai precisar, aproximadamente, de:</h2>`;

    resultado.innerHTML += `
    <div class="result-block-calc">
      <img class="img-calc" src="./assets/img/carne.svg"/>
      <p class="p-calc">${qdtTotalCarne / 1000} Kg de Carne</p>
    </div>
  `;
    resultado.innerHTML += `
    <div class="result-block-calc">
      <img class="img-calc" src="./assets/img/cerveja.svg"/>
      <p class="p-calc">${Math.ceil(qdtTotalCerveja / 355)} Latas de Cerveja</p>
    </div>
  `;
    resultado.innerHTML += `
    <div class="result-block-calc">
      <img class="img-calc" src="./assets/img/refri.svg"/>
      <p class="p-calc">${Math.ceil(
          qdtTotalBebidas / 2000
      )} Garrafas de Refrigerante</p>
    </div>
    </br>
    </br>
    </br>
    </br>
    </br>
  `;
}
