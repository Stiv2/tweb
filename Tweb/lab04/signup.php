<?php include("top.html"); ?>
<!--
    Created on : 26-nov-2016,
    Author     : Stefano Benedetto 
    Lab4 (File signup.php)
    
   La pagina tamite un form compila i campi necessari per l'iscrizione e li invia
   alla pagina "signup-submit" tramite POST.
 -->

    <form action="signup-submit.php"  method="post"> 
     <fieldset>
       <legend>New User Signup</legend>
       
       <!--Lista dei campi da completare nome,gender(radiobutton),età, personalità(secondo
       specifiche da link),sistema operativo preferito (campi a lista), età ricercata.-->
         <ul>
            <li>
                    <strong>Name:</strong>
                    <input type="text" name="nname" size="16" maxlength="16" />  </li>
        
            <li> 
                <strong>Gender:</strong>
                 <input type="radio" name="gender" value="M" checked="checked" /> Male
                 <input type="radio" name="gender" value="F"/> Female </li>
       
            <li>
               <strong>Age:</strong>                 
                 <input type="text" name="age" size="6" maxlength="2" />  </li>
            <li>
             <strong>Personality type:</strong>
                <input type="text" name="personality" size="6" maxlength="4" />
                (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp ">Dont' know your type?</a>) </li>
            
            <li>
                 <strong> Favorite OS</strong>
                <select name="favoritecharacter">
                      <option>Windows</option>
                      <option>Mac OS X</option>
                      <option selected="selected">Linux</option>
                         </select>  </li>
            <li>
             <strong>Seeking age:</strong> 
                <input type="text" name="sekagemin" size="6" maxlength="2" placeholder="min" /> to
                <input type="text" name="sekagemax" size="6" maxlength="2" placeholder="max"/> <li />
            <li>    
                <input type="submit" value="Sign Up" /></li>
        
     </fieldset>

         
     </form>
    




<?php include("bottom.html"); ?>