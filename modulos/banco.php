<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "site";
$link = mysqli_connect($host, $user, $password, $db);

if (!$link) {
    die("Erro de Conexão: " . mysqli_connect_error());
}

function ConectaDB(){
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "site";
  $link = mysqli_connect($host, $user, $password, $db);
  if (!$link) {
      die("Erro de Conexão: " . mysqli_connect_error());
  }
  return $link;
}
?>
