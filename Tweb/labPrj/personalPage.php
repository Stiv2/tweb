<!DOCTYPE html>
<html>
<head>
<!-- Created on : 02-feb-2017,
     Author     : Stefano Benedetto 
     Progetto Finale (File personalPage.php) 
Questa pagina è il cuore html del sito contiene tutti gli "scheletri poi riempiti dalle funzioni ajax 
implementate nei file di supporto.La pagina è stata modificata da un template bootstrap.Inlcude il codice
php per la gestione delle sessioni e top e bottom.html.
-->
     <meta charset="utf-8"/>
    
    <title>Personal Page</title>
	
    <script src="Scriptaculous/lib/prototype.js"></script>
    <script src="Scriptaculous/src/scriptaculous.js"></script>
    <script src="Java/java3.js" type="text/javascript"></script>
    
    
    <link href="Style/bootstrap.css" rel="stylesheet" />
    <link href="Style/custom.css" rel="stylesheet" />
 <?php 
include("common.php");
 if (!isset($_SESSION["name"])) {
     redirect ("index.php","You must log in before you can view this page.");    
}
?>
</head>
<body>
<?php include("Top.html"); ?>
           <!-- Parte alta offerte speciali se viene cliccato il link e foto utente fissa-->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="img/find_user.png" class="user-image img-responsive" alt="user-image"/>
					</li>
                </ul>
                        <div class="panel-body">
                      <a id="big-link-1" href="#pricing-2">Special Offert</a>
                        </div>
                </div>
        </nav>  
        <!-- Parte centrale nome utente e gestione del logout-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div id="col-md-12">
                     <h2>Personal Page</h2>   
                     <a id="big-link-2" href="logout.php">Logout</a>
                                      

                    </div>
                </div>              
                 <!-- Prima riga con le informazioni variabili di frequenza dell'ordine
                 data di spedizione e numero di ordini già effettuati con la comagnia-->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div id="text-box" >
                    <p class="text-muted">Modify your order at</p>
                    <p class="main-text">120345976</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div id="text-box1" > 
                    <p class="text-muted">Frequency</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div id="text-box2" >
                    
                    <p class="text-muted">shipping date</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div id="text-box3" >
                    <p class="text-muted">Orders</p>
                </div>
             </div>
		     </div>
			</div>
                <hr />                

                 <!-- Seconda riga con indirizzo e tabella degli ordini-->
                <div class="row" >
                    <div class="col-md-3 col-sm-12 col-xs-12">
  <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div id="panel-body">
                            
                           
                        </div>
                        <div class="panel-footer back-footer-green">
                             <i class="fa fa-rocket fa-5x"></i>
                            This is your adress, we send produt only at 
                             this verified adress, if  you want to change
                             it you must contact the webmaster. 
                        </div>
                    </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Your shipping plane 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Availability</th>
                                            <th>Pakage</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12"> 
                    </div>
                </div>    
      </div>        
    </div>
     
 <?php include("Bottom.html"); ?>
</body>
</html>
