<?php
require_once 'global.php';

$lista_produtos = Produto::listar();

$query = "UPDATE produtos SET preco = :preco, quantidade = :quantidade WHERE id = :id";
$conexao = Conexao::pegaConexao();

foreach($lista_produtos as $produto){
    $stmt = $conexao->prepare($query);
    $novo_preco = rand(0,100);
    $nova_quantidade = rand(0,50);
    $stmt->bindValue(':preco',$novo_preco);
    $stmt->bindValue(':quantidade',$nova_quantidade);
    $stmt->bindValue(':id',$produto['id']);
    $stmt->execute();

    echo $produto['nome'] . ' Preço alterado de: '.$produto['preco'] . ' para '.$novo_preco.' e Quantidade alterada de: '.$produto['quantidade']. ' para '.$nova_quantidade.'</br></br>';
    
}

?>