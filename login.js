function toggleOptions() {
    var optionsList = document.querySelector('.options-list');
    optionsList.style.display = (optionsList.style.display === 'none' || optionsList.style.display === '') ? 'block' : 'none';
}

function verificarEmail() {
    var campoEmail = document.querySelector('.campo-email').value;
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (regexEmail.test(campoEmail)) {
        // E-mail válido, redirecionar para trabalho.html
        window.location.href = 'tcc_html.html';
    } else {
        // E-mail inválido, mostrar mensagem de erro
        var mensagemErro = document.querySelector('.mensagem-erro');
        mensagemErro.style.color = 'red';
        mensagemErro.textContent = 'E-mail inválido. Por favor, insira um e-mail válido.';
    }
}
//Botoões Cabeçalho
function aoClicar1(){
    window.location = "tcc_html.html"
    return
}

function aoClicar2(){
    window.location = "pagProdutor.html"
    return
}

function aoClicar3(){
    window.location = "pagCadastro.html"
    return
}

function aoClicar4(){
    window.location = "sobreNos.html"
    return
}

function aoClicar5(){
    window.location = "beneficiosHTML.html"
    return
}

function aoClicar6(){
    window.location = "pagLogin.html"
    return
}

function aoClicar7(){
  window.location = "assistTec.html"
  return
}

//
function abrirModal() {
    document.getElementById('modal').style.display = 'block';
  }

  function fecharModal() {
    document.getElementById('modal').style.display = 'none';
  }

  function abrirModalLogin() {
    fecharModal();
    document.getElementById('modal-login').style.display = 'block';
  }

  function fecharModalLogin() {
    document.getElementById('modal-login').style.display = 'none';
  }

  function validarFormulario() {
    // Adicione aqui a lógica de validação do formulário de criação de conta
    return true; // Retorna true se o formulário for válido, ou false se houver erro de validação
  }

  function validarLogin() {
    // Adicione aqui a lógica de validação do formulário de login
    return true; // Retorna true se o formulário for válido, ou false se houver erro de validação
  }
  