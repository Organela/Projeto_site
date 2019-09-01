<?php
require_once '../Banco/Conexao.php';
require_once '../Model/Usuario.php';

Class ControladorUsuario{
    private $conexao;
    private $banco;
    
    function __construct(){
        
        $this ->conexao  = new Conexao();
        $this ->banco = $this->conexao->getBanco();
}
function  procura($email){
        
        $query = $this->banco->prepare("SELECT * FROM usuario WHERE email= ?");
        //$query = $this->banco->prepare("SELECT * FROM usuario");
        //var_dump($query);
        //$query->execute(array(':email' => $email));
        $query->execute(array($email));
        //var_dump( $query->execute());
        var_dump($query->fetch());/*Não para de retornar falso*/
             
       while( $coluna = $query->fetch()){
               echo "Hello";
               $usuario = new Usuario ($coluna['email'], $coluna['senha']);
               var_dump($coluna['email'], $coluna['senha']);
               //return $usuario;
               
       }
    return null;
}
}
?>