<?php
/*   Created on : 02-feb-2017,
     Author     : Stefano Benedetto 
     Progetto Finale (search-all.ph) 
 * cCerca le info principali dell'utente e effettua alcuni controlli sulle chiamate 
 * alla fine compila il file xml. La gestione del database è affidata al file 
 * common.php 
 * 
 */
include("common.php");



if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}
//chiamate sul database
$personalInfo=searchInfo($_SESSION["name"]);
$product=searchProduct($_SESSION["name"]);

if ($personalInfo===NULL||!isset($personalInfo)||!isset($product)) {
	header("HTTP/1.1 500 Server Error");
	die("ERROR 500: Server error");
}
//creazione file xml
header("Content-type: application/xml");
print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

			print "<personal>\n";
			print "\t<name>$personalInfo[0]</name>\n";
			print "\t<adress>$personalInfo[1]</adress>\n";
                        print "\t<frequency>$personalInfo[2]</frequency>\n";
                        print "\t<date>$personalInfo[3]</date>\n";
                        print "\t<orders>$personalInfo[4]</orders>\n";
                          print "\t<products>\n";
    foreach($product as $product) {
                      print "\t<product>\n";
                      $name=$product["Name"];
                        print "\t\t<name>\n$name</name>\n";
                      $avalb=$product["Avalb"];
                      if($avalb!=NULL)
                        print "\t\t<avalb>\n$avalb</avalb>\n";
                      else
                          print "\t\t<avalb>\n not available</avalb>\n";
                      $pakage=$product["Pakage"];
                        print "\t\t<pakage>\n$pakage</pakage>\n";
                      $price=$product["Price"];
                        print "\t\t<price>\n $price</price>\n";
                    print "\t</product>\n";
                }       
                   
                print "\t</products>\n";
		print "</personal>\n";
                        
                        

?>