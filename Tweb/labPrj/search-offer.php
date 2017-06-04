<?php
/*   Created on : 02-feb-2017,
     Author     : Stefano Benedetto 
     Progetto Finale (search-offer.php) 
 * Cerca le offerte intterrogando il database commo dopo aver controllato le info poi scrive il 
 * file xml.
 */
include("common.php");


if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}



//chiamate sul database
$offerts= searchoffert();
    if (!isset($offerts)){
                header("HTTP/1.1 500 Server Error");
                        die("ERROR 500: Server error");
        }
 //creazione file xml       
header("Content-type: application/xml");
print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
      print "<offerts>\n";
    
      foreach($offerts as $offert) {
                print "<offert>\n";
                      $name=$offert["Name"];
                        print "\t<name>\n$name</name>\n";
                      $descr=$offert["descr"];
                        print "\t\t<descr>\n$descr</descr>\n";
                      $price=$offert["scount"];
                        print "\t\t<price>\n$price</price>\n";
                print "</offert>\n";      
                }       
                      
                        
     print "</offerts>\n";                     

?>