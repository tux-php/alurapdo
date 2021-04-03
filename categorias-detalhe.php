<?php require_once 'cabecalho.php' ?>
<?php include_once 'global.php'?>

<?php
try {
    $id = $_GET['id'];
    $categoria = new Categoria($id);
    $categoria->carregarProdutos();     
    $listaProdutos = $categoria->produtos;
} catch (Exception $e) {
    Erro::trataErro($e);
}

?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $categoria->id?></dd>
    <dt>Nome</dt>
    <dd><?php echo $categoria->nome?></dd>
    <dt>Produtos</dt>
    <?php if(count($listaProdutos) > 0) :?>
    <dd>
    <?php foreach($listaProdutos as $prod):?>
        <ul>
            <li><a href="produtos-editar.php?id=<?php echo $prod['id']?>"><?php echo $prod['nome']?></a></li>            
        </ul>
    <?php endforeach?>
    </dd>
    <?php else :?>
    <dd>Não há nenhum produto cadastrado com relação a categoria <?php echo '<strong>'.$categoria->nome .'</strong>'?> .</dd>
    <?php endif?>
</dl>
<?php require_once 'rodape.php' ?>
