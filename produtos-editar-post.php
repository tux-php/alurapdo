<?php
require_once 'global.php';
try {
    $id = $_POST['id'];
    $produto = new Produto($id);
    $produto->nome = $_POST['nome'];
    $produto->preco = $_POST['preco'];
    $produto->quantidade = $_POST['quantidade'];
    $produto->categoria_id = $_POST['categoria'];
    $produto->alterar();
    header("Location:produtos.php");
} catch (Exception $e) {
    Erro::trataErro($e);
}

?>