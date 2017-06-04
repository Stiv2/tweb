<?php
/*
 *   Created on : 03-dic-2016,
 *   Author     : Stefano Benedetto 
 *   progetto finale (File common.php)
 * 
 *  La pagina contine le funzioni attravero le quali il database viene interrogato e le 
 *  funzioni per la gestione delle sessioni.
*/ 

if (!isset($_SESSION)) { session_start(); }

/* la funzione intterroga il database per le informazioni principali effettuando join 
 * sulle tabelle
 */
 function searchInfo($email){
      $dsn = 'mysql:dbname=uniteddistributors;host=localhost';
      $db = new PDO($dsn, 'root');
 $data=array(); 
     $email = $db->quote($email);
    $rows = $db->query("SELECT user.Name,preference.Adress,preference.Frequency,"
            . "preference.Date,user2.info2 FROM preference,user,user2 WHERE user.Email=$email AND "
            . "preference.user_id =user.Id AND user2.id=user.Id ");
   
    foreach($rows as $row){
        $data[0]=$row["Name"];
        $data[1]=$row["Adress"];
        $data[2]=$row["Frequency"];
        $data[3]=$row["Date"];
        $data[4]=$row["info2"];
     }
     return $data; 
 }
 
/* La funzione cerca i prodotti associati ad un dato utente
 */
function searchProduct($email){
      $dsn ='mysql:dbname=uniteddistributors;host=localhost';
      $db = new PDO($dsn, 'root');
      $email= $db->quote($email);
     return $rows = $db->query("SELECT products.Name,products.Avalb,products.Pakage,products.Price "
              . "FROM products,orders,user WHERE products.Id=orders.Id_product AND user.Id=orders.Id_user "
              . "AND user.Email=$email");  
}

/* La funzione attraverso una join recupera informazioni sui prodotti in offerta
 */
function searchoffert(){
      $dsn ='mysql:dbname=uniteddistributors;host=localhost';
      $db = new PDO($dsn, 'root');
      
      $rows = $db->query("SELECT Name,descr,scount FROM special,products WHERE products.Id=special.id");
      return  $rows;
   
}


/* La funzione redirige le pagine e scrive un messaggio di flash*/
function redirect($url, $flash_message = NULL) {
  if ($flash_message) {
    $_SESSION["flash"] = $flash_message;
  }
  header("Location: $url");
  die;
}


/* La funzione si occupa di essettuare un controllo delle password degli utenti 
 * dalla tabella user nel database
 */
function is_password_correct($name, $password) {
  $dsn = 'mysql:dbname=uniteddistributors;host=localhost';
  $db = new PDO($dsn, 'root');
 
  $name = $db->quote($name);
  $rows = $db->query("SELECT Password FROM user WHERE Email = $name");
  
  if ($rows) {
    foreach ($rows as $row) {
      $correct_password = $row["Password"];
      return $password == $correct_password;
    }
  } else {
    return FALSE;   
  }
}
/* la funzione attraverso i paramtri passati cerca di effettuare un login
 * incrementando l'id master e controllando se la password è già presente nel sito 
 * in caso questo non avvenga la registrazione va a buon fine
 * 
 */
function signup($name,$password,$user_email,$date,$adress,$user_job){
    $dsn = 'mysql:dbname=uniteddistributors;host=localhost';
    $db = new PDO($dsn, 'root');
    
    $name = $db->quote($name);
    $password= $db->quote($password);
    $user_email = $db->quote($user_email);
    $date= $db->quote($date);
    $user_job= $db->quote($user_job);
    $adress = $db->quote($adress);
    $frequency=$db->quote("week");
    $ids = $db->query("SELECT masterid FROM id");
    
    $emails=$db->query("SELECT Email FROM user");
    foreach ($emails as $mail){
        if($mail["Email"]==$user_email){
            return false;
        }
    }
        
    foreach ($ids as $id){
        $userid=$id["masterid"]+1;
    }
    $userid = $db->quote($userid);
    
    $date2 = mktime(0, 0, 0, date("m"), date("d")+7,   date("Y"));
    $date2= $db->quote($date2);
    
    $db->query("UPDATE `id` SET `masterid`=$userid WHERE 1");
    $db->query("INSERT INTO `INSERT INTO `orders`(`Id_user`, `Id_product`) VALUES ('$userid,'1000')");
    $db->query("INSERT INTO `user`(`Id`, `Name`, `Email`, `Password`) VALUES ($userid,$name,$user_email,$password)");
    $db->query("INSERT INTO `user2`(`id`, `date`, `info1`) VALUES ($userid, $date, $user_job)");
    $db->query("INSERT INTO `preference`(`user_id`, `Date`, `Adress`, `Frequency`)"
             . " VALUES ($userid,$date2,$adress, $frequency)");
    
    return true;
 }

//funzione di filtraggio della query da GET
function filter_chars($str) {
	return preg_replace("/[^A-Za-z0-9_]*/", "", $str);
}


?>