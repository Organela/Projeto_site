<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$login=htmlspecialchars($_POST["login"]);
$senha=$_POST["senha"];
require 'modulos/banco.php';


$result = mysqli_query($link,"SELECT * FROM usuario WHERE email='".$login."'");
if(!empty($login)&&!empty($senha)){
if(mysqli_num_rows($result)>0){

   $row = mysqli_fetch_array($result, MYSQLI_BOTH);
   $hash = $row["senha"];
   echo password_verify($senha, $hash);
   if(password_verify($senha, $hash)){
      $procura = mysqli_query($link,"SELECT cpf,nome,nivel FROM usuario WHERE email='".$login."'");
	 
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
    } else{
			echo $nivel;
           header("Location: /projeto_site/admin/painel.php");//Painel sendo chamado
    }


   
   } else{
       $erro= "Senha Incorreta";
   }


}else{
    $erro= "Email não cadastrado";
}
} else{
  $erro= "Preencha todos os campos";
}
mysqli_close($link);
}
?>
