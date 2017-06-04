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
if (isset($_REQUEST["u"]) && isset($_REQUEST["p"])) {
  $name = $_REQUEST["u"];
  $password =$_REQUEST["p"];
  if (is_password_correct($name, $password)) {
    if (isset($_SESSION)) {
      session_destroy();
      session_regenerate_id(TRUE);
      session_start();
    }
    $_SESSION["name"] = $name;
    redirect("personalPage.php","");
  } else {
    redirect("index.php", "Incorrect user name and/or password.");
  }
}
?>
