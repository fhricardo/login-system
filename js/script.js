
function novaSenha() {
    const senha = document.getElementById('senha').value; // Obtém a senha digitada
    const novasenha = document.getElementById('novasenha').value; // Obtém a confirmação da senha
    const msg = document.getElementById('alert'); // Seleciona o elemento para exibir mensagens

    if (novasenha !== senha) {
        msg.innerHTML = "As senhas não coincidem!";
        msg.style.color = "red"; // Define estilo para erro
    } else {
        msg.innerHTML = "Tudo ok!";
        msg.style.color = "green"; // Define estilo para sucesso
    }
}
