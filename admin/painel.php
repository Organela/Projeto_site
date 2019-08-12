<?php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email']) && $_SESSION['nivel']> 0){
  header("location: ../login.php");
  exit;

}
?>
<!--Refazer HTML de adiministrador-->
<!doctype html>
<html lang="en">
<?php include '../modulos/head.php'; ?>
<head>
	<meta charset="UTF -8">
	<title>Painel do administrador</title>
</head>
<body>
<header>
	
</header>
<div class="row h-100 justify-content-center align-items-center">	
	<div class="container-fluid" style="height:300px">
		<div class="col-md-12" style="background-color:#4682B4; height:300px; font-size:100px">Notícias</div>	
	</div>
	<div class="container" style="height:300px">
		<div class="row">
			<div class="col-md-8" style="background-color:#00BFFF; height:300px"></div>
			<div class="col-md-4" style="background-color:#FF8C00; height:300px"></div>
		</div>
	</div>
</div>
<footer>
<p class="font-small grey-text d-flex justify-content-end">Deseja alterar dados do cadastro? <a href="registro.php" class="blue-text ml-1">Altere já</a></p>
</footer>
</body>
</html>