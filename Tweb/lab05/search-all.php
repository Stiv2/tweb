<?php include("top.php"); ?>
 <!--
    Created on : 03-dic-2016,
    Author     : Stefano Benedetto 
    Lab5 (File search-all.php)
    
   La pagina pagina riceve il nome tramite Get e interroga il database tramite 
   funzione srcactorID () che resttusce l'id secodo le specifiche. Poi attraverso
   searchmovie() la funzione restituisce i nomi di film e anno di pruduzine in cui 
   l'attore ha preso parte, i risultati vengono visulizzati in una tabella.
   Entrambe le funzioni sono implementate in common.php.
 -->     
<?php
     $name = $_GET["firstname"];
     $surname = $_GET["lastname"];
     $id= srcactorID($name,$surname);
     if ($id==NULL){ ?>
  <p>Actor <?=$name?> <?= $surname?> not found.</p>
  <?php     
     }
     else{
         ?>
  
  <h1>Results for <?=$name?> <?= $surname?></h1>   
    <p> All films </p>
        
        <table>
                <tr>
                <th>#</th>
                <th>Title</th> 
                <th>Year</th>
                </tr>
  
    <?php 
         $counter=0; 
         $movies=searchmovie($id); 
        foreach ($movies as $movie ){
             $counter++; ?>
                
                <tr>
                <td> <?= $counter ?></td>
                <td><?= $movie["name"] ?></td> 
                <td><?= $movie["year"] ?></td>
                </tr>
  
<?php 
        }
    }
?>
</table>
<?php include("bottom.html"); ?>