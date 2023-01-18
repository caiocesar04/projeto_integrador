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

function confirmarExclusaoAvaliacao(nota, id) {
    
    var resposta = confirm("Deseja remover o registro '" + nota + "' ?");
    if (resposta) {
       window.location.href = "AvaliacaoController.php?action=deleteAvaliacaoById&id=" + id;
    }
}

function confirmarExclusaoUsuario(nome, id) {
    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {
       window.location.href = "UsuarioController.php?action=deleteUsuarioById&id=" + id;
    }
}

function ajax(){
 var req = new XMLHttpRequest();
 req.onreadystatechange = function(){
    if(req.readyState == 4 && req.status == 200){
        document.getElementById('chat').innerHTML = req.responseText;
    }
    }
    req.open('GET', 'chat.php', true);
    req.send();
}
    setInterval(function(){ajax();},1000);