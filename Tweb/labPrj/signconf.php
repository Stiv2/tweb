<?php
/*
 *   Created on : 03-dic-2016,
 *   Author     : Stefano Benedetto 
 *   Lab5 (File loginconf.php)
 * 
 *  Recupera i dati passati per parametro verifica la loro autenticità e li verifica interrogando il
 *  database con common e nel casocrea una nuova sessione 
*/ 

include("common.php");
if (isset($_REQUEST["user_adress"]) && isset($_REQUEST["user_name"])) {
    $date=$_REQUEST["dd"]+"-"+$_REQUEST["mm"]+"-"+$_REQUEST["yy"];
    
 $flag=signup( $_REQUEST["user_name"],$_REQUEST["user_password"],$_REQUEST["user_email"],
         $date,$_REQUEST["user_adress"],$_REQUEST["user_job"]);
  
 if($flag){ 
    if (isset($_SESSION)) {
      session_destroy();
      session_regenerate_id(TRUE);
      session_start();
    }
    $_SESSION["name"] = $_REQUEST["user_email"];
    redirect("personalPage.php","");
  } else {
    redirect("index.php", "Incorrect registration maiby your email is already used");
  }
}
?>
