<?php
class Conexao{
private $banco; // banco
const host = "localhost";
const user = "root";
const password = "";
const db = "site";

    function getBanco(){
        return $this->banco;
    }

    function Conexao(){
    try{
            $this -> banco = new PDO("mysql:host=".self::host.";
            dbname=".self::db."",
            self::user, self::password);
                
    } catch (Exception $e) {
        print "Erro: ".$e->getMessage();
        die();
    }
}

}
?>
