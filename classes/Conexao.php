<?php
class Conexao
{
    public static function pegaConexao()
    {
        
        $conexao = new PDO(DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_SENHA);
        
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conexao;
    }
}