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

function confirmarExclusaoCategoria(nome, id) {
    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {
       window.location.href = "CategoriaController.php?action=deleteCategoriaById&id=" + id;
    }
}

function confirmarExclusaoSugestao(texto, id) {
    var resposta = confirm("Deseja remover o registro '" + texto + "' ?");

    if (resposta) {
       window.location.href = "SugestaoController.php?action=deleteSugestaoById&id=" + id;
    }
}