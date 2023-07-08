function abrirTela(id = 0) {
    window.location.href = "formProduto.php?id=" + id;
}

function deletar(id) {
    if ((confirm("Deseja realmente excluir este produto?")) == true)
        window.location.href = "deletar.php?id=" + id;
}