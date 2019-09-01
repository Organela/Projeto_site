<?php
require_once '../Banco/Conexao.php';
require_once 'ControladorUsuario.php';
class ControladorLogin{

public static Function execLogin(){  
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
       if(isset($_POST["email"]) && isset($_POST["senha"])){//Verifica se  os campos estão preenchidos -> l.getLogin e l.getSenha() nao funciona?
           
            if(!empty($_POST["email"]) && !empty($_POST["senha"])){
                
                
                $user = new ControladorUsuario();
                
                if($user->procura($_POST["email"])!= null){
                   
                   /* $row = mysqli_fetch_array($result, MYSQLI_BOTH);*/
                   /* $row = $link->getBanco()->fetch(PDO::FETCH_BOTH);
                    var_dump($row);*/
                    $hash = $row["senha"];
                    echo password_verify($_POST["senha"], $hash);
                    $this->verificarAssinante();
                }
                else {
                    $erro = "E-mail não cadastrado";
                }
                
            }
            else{
                $erro= "Preencha todos os campos";
            }
			
        
   	}
        
    

        }
        $result = null;//Fechando conexeção
}
Function verificarAssinante(){    
            
        if(password_verify($l.getSenha(),$hash)){
                
                $procura = $link->getBanco()->prepare("SELECT cpf,nome,nivel FROM usuario WHERE email='".$l->getEmail()."'");
                $row2 = mysqli_fetch_assoc($procura);
                $id = $row2["cpf"];
                $nome = $row2["nome"];
                $nivel = $row2["nivel"];
                $alerta= "Validado com sucesso";
                
                session_start();
                $_SESSION['cpf'] = $id;
                $_SESSION['email'] = $email;
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
                 
                $procura = null;//Fechanco conexao
        }           
}

 
