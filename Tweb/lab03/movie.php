<!DOCTYPE html>
<!--
    Created on : 15-nov-2016
    Author     : Stefano Benedetto (808855)
    Course     : Tweb
    Lab3 (File movie.php)
    
Lo scheletro html preso dal precedente laboratorio è stato implementato con le 
automatizazzioni che si attivano secondo la query. 
 -->
<html>
    <head>
       <title>Rancid Tomatoes</title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="movie.css" type="text/css" rel="stylesheet" />
        <link href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif" type="image/gif" rel="shortcut icon">
        
    </head>
    
    <body>
        
        <div id="banner" >
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes" />
        </div >
    <?php
    
            #Variabili globali 
            $MOVIE_INFO = "info.txt";
            $MOVIE_OVERVIEW = "overview.txt";
            $MOVIE_OVERIMAGE = "overview.png";
            $MOVIE_REVIEW = "review*.txt";
            

           #Recupero il valore del parametro "film"
            $movie = $_GET['film'] ;
            
           #Recupero informzioni film
            $movie_path = $movie."/".$MOVIE_INFO;
            list($title,$year,$rating) = file($movie_path, FILE_IGNORE_NEW_LINES);
              
            
           #Etrazioni informazioni overview
            $movie_path = $movie."/".$MOVIE_OVERVIEW;
            $overview = file($movie_path, FILE_IGNORE_NEW_LINES);
            
           
           #pathimmagine e review
            $overviewpng =$movie."/".$MOVIE_OVERIMAGE;
            $movie_review =$movie."/".$MOVIE_REVIEW;
          
           #conta il numero di recensioni
            $counter=0;
         
             foreach (glob("$movie_review")as $file ){
                 $counter++;
            }        
    ?>        
                
    <h1><?=$title?> (<?=$year?>) </h1>
   
    <!-- Corpo della pagina -->

    <div id="main"> 
    
        <!-- Parte dei dati e immagine -->  
      <div id="dati">
            <img src="<?=$overviewpng?>" alt="general overview" /> 
        
        <div id="datatext">
            <dl>
                <?php 
                  #scompatta il file delle overview dividendo la scrittura nei campi
                    for ($i=0; $i<sizeof($overview) ; $i++) { 
                    
                    list($dt,$dd) =explode(":",$overview[$i])
                    
                    ?>  
                                  

                
                  <dt> <?=$dt?></dt>
                  <dd> <?=$dd?></dd>
                
                <?php } ?>
            </dl>
        </div>            
      </div>
        
        <div id="rottencmt">
            
            <div id="rottenimg">
             <!-- A seconda del campo rating cambia l'immagine tra rottene e fresh e poiaggiunge il numero -->       
                <?php if ($rating<60){?>
		    <img src="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rottenbig.png" alt="Rotten" />
                <?php }
                    else{ ?>
                    <img src="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/freshbig.png" alt="Fresh" />
                <?php }?>         
                    <span class="tretre"><?=$rating?>% </span> 
                    
	    </div>
	    <!-- Colonna 1 delle recensioni -->
            <div id="column1">
                 <?php 
                 #Legge e scompatta nelle variabili i file dele recensioni,se esse sono più di 10 cambia il metodo
                 # di ricerca per quelle sotto la 9.
                  for($i=1;$i<($counter/2)+1; $i++){
                     if ($counter>9 && (($i)<10)) {
                        $movie_path = $movie."/review0".($i).".txt";         
                     }
                      else {$movie_path = $movie."/review".($i).".txt";}
                      
                     list($review,$rate,$name,$newspaper) = file($movie_path, FILE_IGNORE_NEW_LINES);
                      
                       ?>
                <!-- A seconda della review cambia l'immagine tra rotten e fresh -->
                    <p class="quote">
                       <?php if ($rate=='ROTTEN') { ?>
			        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" class="qtimg" />
                        <?php }
                            else{ ?> 
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" class="qtimg"/>
              <?php } ?>
                                <!-- Recensione-->
                                <q><?=$review?></q>
		</p>
                <!--Recensore e rivista-->
                <p class="rev">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" class="qtimg"/>
			<?=$name?><br />
                        <span class="magazine"><?=$newspaper?></span>
		</p>
                 <?php       
                  }
                 ?>
            </div>
           <!-- Colonna 2 delle recensioni,uguale alla colonna 1 a parte per il contatore che non 
           è più inizializzato.-->
            <div id="column2">
                <?php 
                  for(;$i<=$counter; $i++){
                     if ($counter>9 && (($i)<10)) {
                        $movie_path = $movie."/review0".$i.".txt";         
                     }
                      else {$movie_path = $movie."/review".$i.".txt";}
                      
                       list($review,$rate,$name,$newspaper) = file($movie_path, FILE_IGNORE_NEW_LINES);
                       ?>
                    <p class="quote">
                       <?php if ($rate=='ROTTEN') { ?>
			        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" class="qtimg" />
                        <?php }
                            else{ ?> 
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" class="qtimg"/>
              <?php } ?>
                                <q><?=$review?></q>
		</p>
                <p class="rev">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" class="qtimg"/>
			<?=$name?><br />
                        <span class="magazine"><?=$newspaper?></span>
		</p>
                 <?php       
                  }
                 ?>
                    
                      
            </div>
           <!-- Footer della pagina cambia a seconda del counter-->
         </div>
            <footer>
             (1-<?=$counter ?>) of <?=$counter ?>       
            </footer>
        </div>
           <!-- Link ai validatori-->
        <div id="valink">
            <a href="http://validator.w3.org/check/referer"><img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/w3c-xhtml.png" alt="Validate HTML" /></a> <br />
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
        </div>   
    </body>
</html>
