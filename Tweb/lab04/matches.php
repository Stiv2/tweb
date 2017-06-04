<?php include("top.html"); ?>
<!--
    Created on : 26-nov-2016,
    Author     : Stefano Benedetto 
    Lab4 (File matches.php)
    
   Forrm per l'invio del nome alla ricerca di maych compatibili. L'invio è 
   implementato tramite GET.
 -->

    <form action="matches-submit.php"> 
        <fieldset>
            <legend>Returning User:</legend>
                    <span class='column'>Name:</span>
                    <input type="text" name="name" size="16" maxlength="16" /> 
                    <input type="submit" value="View My Matches" />
        
        </fieldset>        
     </form>
    




<?php include("bottom.html"); ?>