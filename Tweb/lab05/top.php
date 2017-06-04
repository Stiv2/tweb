<!DOCTYPE html>
<html>
	<!-- MFN0634 TWeb Lab05 (Kevin Bacon) top -->
	<head>
		<title>My Movie Database (MyMDb)</title>
		<meta charset="utf-8" />
		
		<!-- Links to provided files.  Do not edit or remove these links -->
		<link href="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/5/favicon.png" type="image/png" rel="shortcut icon" />
		<script src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/5/provided.js" type="text/javascript"></script>

		<!-- Link to your CSS file that you should edit -->
		<link href="bacon.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="frame">
			<div id="banner">
				<a href="index.php"><img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/5/mymdb.png" alt="banner logo" /></a>
				My Movie Database
                                 <form id="logout" action="logout.php" method="post">
                                 <input type="submit" value="Log out" class="logout" />
                                 <input type="hidden" name="logout" value="true" />
                                    </form>
			</div>
<?php 

include("common.php");

if (!isset($_SESSION["name"])) {
    redirect ("login.php","You must log in before you can view this page.");    
}
?>
			<div id="main">
				<!-- your HTML output follows -->

                                
