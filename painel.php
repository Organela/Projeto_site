<?php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email']) && $_SESSION['nivel']== 0){
  header("location: /login.php");
  exit;
}
?>
<!--Refazer HTML de usuario-->