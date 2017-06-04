<!DOCTYPE html>
<html>
<!-- Created on : 02-feb-2017,
     Author     : Stefano Benedetto 
     Progetto Finale (File signup.php) 
Il file contiene il form necessario alla registrazione, dopo l'inserimeto si occupa dell'invio dei 
file a sign.conf.php che si occuperà di ultimare la registrazione. Vengono recuperati i parametri 
password e email dalla precedente preregistrazione e vengono resi immodificabili.La pagina include
sempre il top e il bottom (html).
-->
	<head>
		<title>Home Page | Login</title>
		<meta charset="utf-8" />
		
		<!-- Links ai file di appoggio-->
		<link href="img/logo.png" type="image/png" rel="shortcut icon" />
                <script src="Java/java2.js" type="text/javascript"></script>
		<link href="Style/style2.css" type="text/css" rel="stylesheet" />
        </head>        
    <body>
<!-- Codice gestione sessione e recupero parametri via post-->    
<?php include("Top.html");
    if (!isset($_SESSION)) { session_start(); }  
       
       $email = $_POST["e"];
       $password = $_POST["p"]; 
       

?>
      
        <form action="signconf.php" method="post">
     
        <h1>Sign Up</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Your basic info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="user_name" required="required">
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="user_email" value="<?=$email?>" readonly="readonly" >
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="user_password" value="<?=$password?>" readonly="readonly" >
          
          <label> Birth Date:</label>
     <div id="date2" class="datefield" >   
         <input id="day" type="tel" name="dd" maxlength="2" placeholder="DD" required="required"/> /
         <input id="month" type="tel" name="mm" maxlength="2" placeholder="MM" required="required"/> /
          <input id="year" type="tel" name="yy" maxlength="4" placeholder="YYYY" required="required" />
     </div>

        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Your profile</legend>
          <label for="bio">Adress:</label>
          <textarea id="bio" name="user_adress" required="required"></textarea>
        </fieldset>
        <fieldset>
        <label for="job">Activity Tipe:</label>
        <select id="job" name="user_job" required="required">
            <optgroup label="Restaurant">
            <option value="ethnic">Ethnic Restaurant</option>
            <option value="fastfood">Fast food</option>
            <option value="cafe">Cafe</option>
            <option value="pub">Pub</option>
            <option value="generic">Generic</option>
          </optgroup>
          <optgroup label="Shop">
            <option value="bakery">Bakery</option>
            <option value="grocery_store">Grocery Store </option>
            <option value="mini_market">Mini Market</option>
          </optgroup>
          <optgroup label="Hotel">
            <option value="big_hotel">Big Hotel</option>
            <option value="small_hotel">Small Hotel</option>
          </optgroup>
          <optgroup label="Other">
            <option value="secretary">Private</option>
            <option value="maintenance">Canteen</option>
          </optgroup>
        </select>
      
        </fieldset>
        <button type="submit">Sign Up</button>
       </form>
  
<?php include("Bottom.html"); ?>