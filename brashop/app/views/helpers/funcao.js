function confirmarExclusaoUsuario(nome, id) {
    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {
       window.location.href = "UsuarioController.php?action=deleteUsuarioById&id=" + id;
    }
}

function confirmarExclusaoAnuncio(nome, id) {
    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {
       window.location.href = "AnuncioController.php?action=deleteAnuncioById&id=" + id;
    }
}
