<?php
   session_start();

if(!isset($_SESSION['user_session'])AND!isset($_SESSION['session_idEmployeur']))
{
  header("Location: ../../pages/auth/index.php");
} 
   require_once '../../dao/database.php';
 

if (isset($_POST['deleteemployeur'])) {
  
   $pid = $_POST['deleteemployeur']; 
   $pdo = Database::connect();  
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   $query = "DELETE FROM enfants WHERE idEnfants=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
  
  if ($stmt) {
   echo ("Suppression effectuée avec succée ...");
  } 
  
 }

 
?>