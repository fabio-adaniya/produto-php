function abrirTela(id = 0) {
    window.location.href = "produtoCriarAlterar.php?id=" + id
}

function excluir(id) {
    if ((confirm("Deseja realmente excluir este produto?")) == true)
        window.location.href = "excluir.php?id=" + id
}

function paginaIndex() {
    window.location.href = "index.php"
}