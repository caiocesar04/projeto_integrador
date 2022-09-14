function confirmarExclusaoUsuario(nome, id) {
    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {
       window.location.href = "UsuarioController.php?action=deleteUsuarioById&id=" + id;
    }
}
