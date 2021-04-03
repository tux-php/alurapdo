<?php
require_once 'global.php';
$numero_de_roupas = 10;
$categoria_id = 8;

$tipo_roupa = ['Blusa','Camisa','Camiseta','Bermuda','Calça','Jaqueta'];
$sexo_roupa = ['Masculina','Feminina'];
$cor_roupa = ['Preta','Vermelha','Azul','Amarela','Branca','Marrom','Rosa'];
for($x = 1; $x<=$numero_de_roupas; $x++){
    $tipo_index = rand(0,5);
    $sexo_index = rand(0,1);
    $cor_index = rand(0,6);
    $preco = rand(1,100);
    $quantidade = rand(1,50);

    $roupa = $tipo_roupa[$tipo_index].' '.$sexo_roupa[$sexo_index].' '.$cor_roupa[$cor_index];

    $query = 'INSERT INTO produtos(nome,preco,quantidade,categoria_id)
              VALUES (:nome, :preco, :quantidade, :categoria_id)';
    $conexao = Conexao::pegaConexao();              
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome',$roupa);
    $stmt->bindValue(':preco',$preco);
    $stmt->bindValue(':quantidade',$quantidade);
    $stmt->bindValue(':categoria_id',$categoria_id);
    $stmt->execute();

    echo $roupa .' Cadastrada com sucesso!<br>';
}

?>