<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php'?>
<?php
try{
    $id = $_GET['id'];
    $produto = new Produto($id);    
}catch(Exception $e){
    Erro::trataErro($e);
}
     
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="produtos-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" value="<?php echo $produto->nome?>" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" name="preco" value="<?php echo $produto->preco?>" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" name = "quantidade" value="<?php echo $produto->quantidade?>" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria do Produto</label>
                <?php    
                try{            
                $id = $produto->categoria_id;                
                $categoria = new Categoria();
                $lista_categorias = $categoria->listar();
                }catch(Exception $e){
                    Erro::trataErro($e);
                }
                ?>
                <select class="form-control" name="categoria">
                <?php
                 foreach($lista_categorias as $categoria){                                         
                ?>
                    <option value="<?php echo $categoria['id']?>"<?php if($categoria['id']==$id){echo "selected";}?>><?php echo $categoria['nome']?></option>                    
                <?php
                    }
                 ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $produto->id?>">
            <input type="submit" class="btn btn-success btn-block" value="Salvar">

        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
