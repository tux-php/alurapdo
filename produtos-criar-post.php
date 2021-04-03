<?php
require_once 'global.php';
try {
    $produto = new Produto();
    $produto->nome = $_POST['nome'];
    $produto->preco = $_POST['preco'];
    $produto->quantidade = $_POST['quantidade'];
    $produto->categoria_id = $_POST['categoria'];
    $produto->salvar();

    header("Location:produtos.php");

} catch (Exception $e) {
    Erro::trataErro($e);
}

?>