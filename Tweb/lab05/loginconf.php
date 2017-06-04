<?php
/*
 *   Created on : 03-dic-2016,
 *   Author     : Stefano Benedetto 
 *   Lab5 (File loginconf.php)
 * 
 *  Recupera i dati passati per parametro verifica la loro autenticità e nel caso
 *  crea una nuova sessione utente.
*/ 

include("common.php");
if (isset($_REQUEST["name"]) && isset($_REQUEST["password"])) {
  $name = $_REQUEST["name"];
  $password =$_REQUEST["password"];
  if (is_password_correct($name, $password)) {
    if (isset($_SESSION)) {
      session_destroy();
      session_regenerate_id(TRUE);
      session_start();
    }
    $_SESSION["name"] = $name;     
    redirect("index.php", "Login successful! Welcome back.");
  } else {
    redirect("login.php", "Incorrect user name and/or password.");
  }
}
?>
