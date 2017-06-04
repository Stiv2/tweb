<?php include("top.html"); ?>
<!--
    Created on : 26-nov-2016,
    Author     : Stefano Benedetto 
    Lab4 (File signup-submit.php)
    
   Il file riceve come parametri POST i parametri del soggetto che ha effettuato 
   la registrazione,li scrive sul file e genera un messaggio di benvenuto .
 -->
<?php
#File contenente i single
 $SINGLES_FILENAME="singles.txt";
 
#compatta parametri nella scringa e la scrive in coda al file
 $line = implode(",",$_POST);
 file_put_contents( $SINGLES_FILENAME,$line."\n",FILE_APPEND);

#nome del autore dell'iscrizione
 $name = $_POST["nname"];
 
?>
 
<!-- Messaggio di benvenuto-->
<div>
	<h1>Thank you!</h1> 
        <p>Welcome to NerdLuv, <?=$name  ?> !</p>
        <p>Now <a href="matches.php">log in to see yourmatches!</a></p>

	
</div>

<?php include("bottom.html"); ?>
