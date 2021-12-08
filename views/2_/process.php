<?php
   session_start();

if(!isset($_SESSION['user_session'])AND!isset($_SESSION['session_idEmployeur']))
{
  header("Location: ../../pages/auth/index.php");
} 
   require_once '../../dao/database.php';

  
 if(isset($_POST["libelle"]))
 {  
   $libellep= $_POST["libelle"]; 
   $pdo = Database::connect();  
      $stmt0 = $pdo->prepare("SELECT libelle FROM medicament WHERE libelle=:libellep"); 
      $stmt0->execute(array(":libellep" =>$libellep));
      $row0 = $stmt0->fetch(PDO::FETCH_ASSOC);   
      if ($row0>0) {
         echo "Ce medicament existe déja";
      } else {
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );   
            $statement = $pdo->prepare("INSERT INTO medicament 
               (libelle) VALUES 
               (:libellev)"); 
            $statement->bindParam(":libellev",$libellep); 
               if($statement->execute())
               {   

                  header("Location: ./");
               } 
               else{
                  echo "requete";
               }  
      }
      

   
} 

if (isset($_POST['deleteemployeur'])) {
  
   $pid = $_POST['deleteemployeur']; 
   $pdo = Database::connect();  
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   $query = "DELETE FROM enfants WHERE idEnfant=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
  
  if ($stmt) {
   echo ("Suppression effectuée avec succée ...");
  }else{
   var_dump($stmt);
  }
  
 }



if (isset($_GET['idMedicament'])) {
  
   $pid = $_GET['idMedicament']; 
   $pdo = Database::connect();  
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
 
   $query = "DELETE FROM medicament WHERE idMedicament=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
   header("Location: https://ipmiez.com/views/secretaire/");

 }
 

?>