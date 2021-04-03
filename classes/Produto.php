<?php
class Produto{
    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;

    public function __construct($id = false){
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }
    public static function listar()
    {
        $query = "SELECT p.id,p.nome,p.preco,p.quantidade,c.nome as categoria_nome FROM produtos p
        INNER JOIN categorias c ON(p.categoria_id = c.id)
        ORDER BY p.nome ASC";
        $conexao = Conexao::pegaConexao();        
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarProdutoCategoria($categoria_id)
    {
        $query = "SELECT id, nome, preco, quantidade FROM produtos WHERE categoria_id = :categoria_id";                  
                  $conexao = Conexao::pegaConexao();
                  $stmt = $conexao->prepare($query);                  
                  $stmt->bindValue(':categoria_id',$categoria_id);                  
                  $stmt->execute();
                  return $stmt->fetchAll();
    }

    public function carregar()
    {
        $query = "SELECT * FROM produtos WHERE id = :id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->id);
        $stmt->execute();
        $lista = $stmt->fetch();        
        $this->id = $lista['id'];
        $this->nome = $lista['nome'];
        $this->preco = $lista['preco'];
        $this->quantidade = $lista['quantidade'];
        $this->categoria_id = $lista['categoria_id'];
        
    }

    public function alterar()
    {
        $query = "UPDATE produtos SET nome = :nome,preco = :preco,
        quantidade = :quantidade,categoria_id = :categoria_id 
        WHERE id = :id";                
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome',$this->nome);
        $stmt->bindValue(':preco',$this->preco);
        $stmt->bindValue(':quantidade',$this->quantidade);
        $stmt->bindValue(':categoria_id',$this->categoria_id);
        $stmt->bindValue(':id',$this->id);
        $stmt->execute();        

    }

    public function salvar()
    {
        $query = "INSERT INTO produtos(nome,preco,quantidade,categoria_id) 
        VALUES (:nome, :preco, :quantidade, :categoria_id)";        
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome',$this->nome);
        $stmt->bindValue(':preco',$this->preco);
        $stmt->bindValue(':quantidade',$this->quantidade);
        $stmt->bindValue(':categoria_id',$this->categoria_id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM produtos WHERE id = :id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->id);
        $stmt->execute();
    }
}