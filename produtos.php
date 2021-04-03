<?php require_once 'global.php'?>
<?php require_once 'cabecalho.php' ?>
<?php
    try{
        $list = Produto::listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }
?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Crair Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(count($list) > 0):?>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($list as $produto):?>           
                    <tr>
                        <td><?php echo $produto['id']?></td>
                        <td><?php echo $produto['nome']?></td>
                        <td>R$ <?php echo $produto['preco']?></td>
                        <td><?php echo $produto['quantidade']?></td>
                        <td><?php echo $produto['categoria_nome']?></td>

                        <td><a href="produtos-editar.php?id=<?php echo $produto['id']?>" class="btn btn-info">Editar</a></td>
                        <td><a href="produtos-excluir-post.php?id=<?php echo $produto['id']?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto cadastrado!</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
