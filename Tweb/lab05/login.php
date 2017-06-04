<!DOCTYPE html>
<html>
<!--
    Created on : 03-dic-2016,
    Author     : Stefano Benedetto 
    Lab5 (File login.php)
    
   La pagina pagina a cui sono ridirezionate tutte le altre in caso di mancato 
   login oppure incaso di logout. Contiene il form username e password che viene
   poi inviato per verifica alla pagina loginconf.php. Contiene inoltre la stampa
   del messaggio di flash di ridirezione dalle altre pagine.
 --> 
	<head>
		<title>My Movie Database (MyMDb)</title>
		<meta charset="utf-8" />
		
		
		<link href="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/5/favicon.png" type="image/png" rel="shortcut icon" />
		<script src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/5/provided.js" type="text/javascript"></script>

		
		<link href="bacon.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
            <?php
              if (!isset($_SESSION)) { session_start(); }
               ?>
		<div id="frame">
			<div id="banner">
				<a href="index.php"><img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/5/mymdb.png" alt="banner logo" /></a>
				My Movie Database
			</div>
                    <div id="main">
                        <h1>Log in</h1>    
                        <?php
                             if (isset($_SESSION["flash"])) {
                        ?>
                                <div id="flash"> <?= $_SESSION["flash"] ?> </div>
                          <?php
                              unset($_SESSION["flash"]);
                                }
                             ?>
                        <form id="login" action="loginconf.php" method="post">
                         <dl>
                            <dt>Name</dt>     <dd><input type="text" name="name" /></dd>
                            <dt>Password</dt> <dd><input type="password" name="password" /></dd>
                            <dt> </dt>        <dd><input type="submit" value="Log in" /></dd>
                        </dl>
                        </form>
                    </div>
                    
                    <div id="w3c">
			<a href="http://validator.w3.org/check/referer">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/w3c-html.png" alt="Valid HTML" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" />
			</a>
		</div>
		</div> 
	</body>
</html>