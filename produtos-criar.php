<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php'?>
<?php 
try{    
    $lista_categoria = Categoria::listar();
}catch(Excption $e){
    Erro::trataErro($e);
}
    
?>
<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Produto</h2>
    </div>
</div>
<?php if(count($lista_categoria) > 0) :?>
<form action="produtos-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" step="0.01" name = "preco" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number"  min="0" class="form-control" name = "quantidade" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria do Produto</label>                
                <select class="form-control" name = "categoria">                    
                    <?php foreach($lista_categoria as $lista):?>
                        <option value="<?php echo $lista['id']?>"><?php echo $lista['nome']?></option>                    
                    <?php endforeach?>
                </select>
                
            </div>
            
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php else :?>
<p>Nenhuma Categoria foi criada no momento. Por favor efetuar o cadastro da 1ª categoria.</p>
<?php endif ?>

<?php require_once 'rodape.php' ?>
