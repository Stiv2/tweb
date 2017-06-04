<?php
/*
 *   Created on : 03-dic-2016,
 *   Author     : Stefano Benedetto 
 *   Lab5 (File logout.php)
 * 
 *  La pagina si occupa dopo il comando dell'utente di interrompere la sessine e
 *  richiamare la pagina di login.
*/ 
require_once("common.php");
session_destroy();
session_regenerate_id(TRUE);
session_start();
redirect("login.php", "Logout successful.");
?>
