
<?php
$erro;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  require 'modulos/funcoes.php';
  $nome = post("nome");
  $email = post("email");
  $cpf = post("cpf");
  $endereco = post("endereco");
  $cidade = post("cidade");
  $uf = post("uf");
  $senha = $_POST["senha"];
  $csenha = $_POST["csenha"];
  
  if(valida($nome,$email,$senha,$csenha)) {
    $senha = password_hash(trim($senha), PASSWORD_DEFAULT);
    require 'modulos/banco.php';
    $result = mysqli_query($link,"SELECT * FROM usuario WHERE email='".$email."'");
    if(!mysqli_num_rows($result)){
      mysqli_query($link,"INSERT INTO usuario (nome,email,cpf,endereco,cidade,uf,senha) VALUES('".$nome."','".$email."','".$cpf."','".$endereco."','".$cidade."','".$uf."','".$senha."')");
      $alerta = "Dados cadastrados com sucesso.";
    } else {
      $erro= "Esse email já está cadastrado.";
    }
    mysqli_close($link);
  }

}

 ?>
