<?php
class ControladorLogin{

Function execLogin(){    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once '../Login.php';
        $l = new Login(htmlspecialchars($_POST["login"]),$_POST["senha"] );//
        $result = mysqli_query($link,"SELECT * FROM usuario WHERE email='".$login."'");
        
        if(!empty($l.getLogin())&&!empty($l.getSenha)){
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result, MYSQLI_BOTH);
                $hash = $row["senha"];
                echo $hash;
                echo password_verify($l.getSenha(), $hash);
                verificarAssinante($l);
         }
			
        
   	}     
    }
Function verificarAssinante(Login $l){    
    
    
            if(password_verify($l.getSenha(), $hash)){
            {    
                $procura = mysqli_query($link,"SELECT cpf,nome,nivel FROM usuario WHERE email='".$l.getLogin()."'");
                $row2 = mysqli_fetch_assoc($procura);
                $id = $row2["cpf"];
                $nome = $row2["nome"];
                $nivel = $row2["nivel"];
                $alerta= "Validado com sucesso";
                echo $nivel;
                session_start();
                $_SESSION['cpf'] = $id;
                $_SESSION['email'] = $login;
                $_SESSION['nome'] = $nome;
                $_SESSION['nivel'] = $nivel;
      
                    if($nivel == 0){
                        header("location: /projeto_site/painel.php");
                    }else{
                        echo $nivel;
                        header("Location: /projeto_site/admin/painel.php");//Painel sendo chamado
                        }
            
            }
            else if (false){
                   $erro= "Senha Incorreta";
                   
                   
            }
            /*
            else{
                   $erro= "Email não cadastrado";
                       
                        
            }
            else{
             
                    $erro= "Preencha todos os campos";
                    
                    
            }           
  
            */
    
     
            }
             mysqli_close($link);

            
}