<?php
require '../Banco/Conexao.php';

class ControladorLogin{

public static Function execLogin(){  
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once '../Model/Login.php';
        $l = new Login(htmlspecialchars($_POST["login"]),htmlspecialchars( $_POST["senha"]));
        $result = new Conexao();
        $result->getBanco()->prepare("SELECT * FROM usuario WHERE email='".$l->getLogin."'"); 
        
        if(!empty($l.getLogin())&&!empty($l.getSenha)){//Verifica se  os campos estão preenchidos
            if(mysqli_num_rows($result)>0){//Verifica se E-mail foi cadastrado
                $row = mysqli_fetch_array($result, MYSQLI_BOTH);
                $hash = $row["senha"];
                 echo password_verify($l.getSenha(), $hash);
                verificarAssinante($l, $result,$row);
         }
            else{
                $erro= "Email não cadastrado";
}
			
        
   	}
        else{
             $erro= "Preencha todos os campos";
        }
    

        }
}
Function verificarAssinante(Login $l,$hash){    
            
        if(password_verify($l.getSenha(),$hash)){
                $procura = new Conexao();
                $procura->prepare("SELECT cpf,nome,nivel FROM usuario WHERE email='".$l->getLogin()."'");
                $row2 = mysqli_fetch_assoc($procura);
                $id = $row2["cpf"];
                $nome = $row2["nome"];
                $nivel = $row2["nivel"];
                $alerta= "Validado com sucesso";
                
                session_start();
                $_SESSION['cpf'] = $id;
                $_SESSION['email'] = $l.getLogin();
                $_SESSION['nome'] = $nome;
                $_SESSION['nivel'] = $nivel;
      
                    if($nivel == 0){
                        
                        header("location: /projeto_site/painel.php");//Painel sendo chamado - Atualizar!!!
                    }else{
                       
                        header("Location: /projeto_site/admin/painel.php");//Painel sendo chamado - Atualizar!!!
                        }
            
            }
         
            else{
                  $erro= "Senha Incorreta";
                }
                 mysqli_close();

        }           


 }
