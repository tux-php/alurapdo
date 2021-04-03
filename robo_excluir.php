<?php
include_once 'global.php';

$preco_base = 50;
$quantidade_base = 20;

$query = "DELETE FROM produtos WHERE preco <= :preco AND quantidade <= :quantidade";
$conexao = Conexao::pegaConexao();
$stmt = $conexao->prepare($query);
$stmt->bindValue(':preco',$preco_base);
$stmt->bindValue(':quantidade',$quantidade_base);
$stmt->execute();

echo $stmt->rowCount() . ' excluídos com sucesso!';
?>