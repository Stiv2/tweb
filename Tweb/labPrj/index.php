<!DOCTYPE html>
<html>
<!-- Created on : 02-feb-2017,
     Author     : Stefano Benedetto 
     Progetto Finale (File index.php) 
Il file è la parte html della home page del sito include i banner alti e bassi (top.html,bottom.html), e il 
codice php necessario alla gestione delle sessione. I due link principali il cui id è rispettivamente "big-link-1"
e "big-link-2" sono controllati da codice javascrip che crea i relativi form. 
-->
	<head>
		<title>Home Page | Login</title>
		<meta charset="utf-8" />
		
		<!-- Links ai vari file di appoggio -->
		<link href="img/logo.png" type="image/png" rel="shortcut icon" />
                <script src="Scriptaculous/lib/prototype.js"></script>
                <script src="Scriptaculous/src/scriptaculous.js"></script>
                <script src="Java/Java.js" type="text/javascript"></script>
                <link href="Style/style.css" type="text/css" rel="stylesheet" />
	</head>


    <body>
    <?php include("Top.html");
        if (!isset($_SESSION)) { session_start(); }?>
           
            <div id="frame">
            <div id="page-title">
             <div class="page-title-text wow fadeInUp">
            	<h1>Welcome to our site</h1>
            	<p>We are United Distributors , we give you the product you need!</p>
                <p>Supplier of bakery products, for shops,resturant or generic secondary seller everywere</p>
            	<div class="page-title-bottom-link">
                    <!-- Parte contrallata dal file Javascript.js-->
            		<a id="big-link-1" href="#pricing-2">Personal Page</a>
            		<a id="big-link-2" href="#what-we-do">Subscribe your Activity</a>
            	</div>
            </div>
        </div>            
       </div> 
  <!-- Gestione dei messaggi di flash di ritorno da altre sessioni del sito o dopo login errato -->       
<?php
             if (isset($_SESSION["flash"])) {
        ?>
                <div id="flash"> <?= $_SESSION["flash"] ?> </div>
 <?php
              unset($_SESSION["flash"]);
                }		
include("Bottom.html"); 
?>
         