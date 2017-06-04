<?php
/*
 *   Created on : 03-dic-2016,
 *   Author     : Stefano Benedetto 
 *   Lab5 (File common.php)
 * 
 *  La pagina contine le funzioni attravero le quali il database viene interrogato e le 
 *  funzioni per la gestione delle sessioni.
*/ 

if (!isset($_SESSION)) { session_start(); }

/* La funzione srcactorID riceve il nome e il cognome dell'attore cercato e dopo 
 * aver interogato il database restituisce il numero id dell'attore. In casi di 
 * ambiguità l'id scelto sarà quello con il maggiore numero di film e numero id 
 * più basso. Se non viene trovata alcuna affinità la funzione restituisce NULL.
 */
 function srcactorID ($name,$surname){
      $dsn = 'mysql:dbname=imdb_small;host=localhost';
      $db = new PDO($dsn, 'root');
 
     $name = $db->quote($name."%");
     $surname = $db->quote($surname);
     $rows = $db->query("SELECT id,film_count FROM actors WHERE first_name LiKE $name and "
             . "last_name =$surname  ORDER BY film_count ASC, id DESC");
    
     foreach ($rows as $row){
         $id= $row["id"] ;        
     }
    
    if(isset($id)){      
        return $id; 
        }
         else {
                  return NULL;
      }
 }
 
/* La funzione prede l'id dell'attore come parametro e restitusce la lista di 
 * nomi e anni dei film a cui ha partecipato 
 */
function searchmovie ($id){
      $dsn = 'mysql:dbname=imdb_small;host=localhost';
      $db = new PDO($dsn, 'root');
      $id= $db->quote($id);
       $rows = $db->query("SELECT name,year FROM movies,roles WHERE 
           actor_id = $id and movie_id=id ORDER BY year");
             
    return  $rows;
}

/* La funzione prede l'id dell'attore come parametro e restitusce la lista di 
 * nomi e anni dei film a cui ha partecipato insieme a Kevin Bacon. In caso non 
 * siano presenti affinità il return è NULL. 
 */
function searchbacon ($id){
      $dsn = 'mysql:dbname=imdb_small;host=localhost';
      $db = new PDO($dsn, 'root');
      $id= $db->quote($id);
      $kavinid = srcactorID ("Kevin","Bacon");
      $kavinid= $db->quote($kavinid);
      $rows = $db->query("SELECT movieact1.name,movieact1.year "
              . "FROM movies as movieact1 ,roles as rolesct1, movies as movieact2 ,roles as rolesct2"
              . " WHERE rolesct1.actor_id = $id and rolesct1.movie_id=movieact1.id and rolesct2.actor_id =$kavinid "
              . "and rolesct2.movie_id=movieact2.id and movieact1.id=movieact2.id ORDER BY year");
      if($rows->rowCount()==0){
          return NULL;
      }
          
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
  $dsn = 'mysql:dbname=imdb_small;host=localhost';
  $db = new PDO($dsn, 'root');
 
  $name = $db->quote($name);
  $rows = $db->query("SELECT password FROM user WHERE username = $name");
  
  if ($rows) {
    foreach ($rows as $row) {
      $correct_password = $row["password"];
      return $password === $correct_password;
    }
  } else {
    return FALSE;   
  }
}
?>