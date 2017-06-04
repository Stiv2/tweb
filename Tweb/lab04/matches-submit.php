<?php include("top.html"); ?>
<!--
    Created on : 26-nov-2016,
    Author     : Stefano Benedetto 
    Lab4 (File matches-submit.php)
    
   Il file riceve come parametri url (GET) il capo nome del soggetto che ricerca
   persone per un incontro. La pagina prima cerca i dati del soggetto poi con un 
   ciclo propone le persone affini secondo le specifiche di consegna.
 -->
<?php
#File contenente i single
 $SINGLES_FILENAME="singles.txt";
#Recupero del nome
 $name = $_GET['name'] ;
#variabile flag
 $flag=FALSE;
#campi del file "singles.txt"
 $branchs=array("Name","Gender","Age","type","OS");


# funzione per riscontrare i match di personalità 
 function personalitymatch ( $string1,$string2) {
   $count = 0;
   $str1 = str_split ($string1); 
   $str2 = str_split ($string2);
    
      for ($i=0;$i<4;$i++){
           if ( $str1[$i]==$str2[$i]){
                   $count++;
        }
    }
  return $count;
}
 
#ciclo ricerca dati e validazione imput 
 foreach(file($SINGLES_FILENAME) as $line){
     $data=explode(",",$line);
     if($data[0]==$name){
        $flag=TRUE;
        break; 
     }      
 }
 if ($flag==FALSE) {?>
<!--Gestione caso not found -->
    <p>Name not found!! Check it!!</p>
    
    
<?php } else { ?>

   <h1>Matches for <?= $data[0]?></h1>
 
<div>
    <!--ciclo di gestione dei match -->
    <?php
     foreach(file($SINGLES_FILENAME) as $line){
      $datamatch=explode(",",$line);
           if ($data[1]!=$datamatch[1] && $data[5] <= $datamatch[2] && $data[6]>=$datamatch[2]
                 && $data[4]==$datamatch[4] ){
           if  (personalitymatch ($data[3],$datamatch[3])>=1){
               
               
    ?>  
    <!--Persona compatibile (immagine+ nome)-->
        <div class="match">
            <p> <?= $datamatch[0]?> 
                 <img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg" 
                     alt="match" class="match img"/> </p>
            
            <!--Campi della personalità match creati con un ciclo  -->
            <ul>
                <?php for ($i=1;$i<sizeof($datamatch)-2;$i++) {?>
                <li> <strong> <?= $branchs[$i] ?> </strong> <?= $datamatch[$i]?> </li>
             <?php } ?>   
        </ul>
    </div>
  
     <?php  }
           }
         }
       }?>
    
</div>

<?php include("bottom.html"); ?>