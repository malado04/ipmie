<?php
   session_start();
 
 require_once '../../../dao/database.php';
 
 if(isset($_POST["libelle"]))
 {  
   $libellep= $_POST["libelle"]; 
   $ipm= $_POST["ipm"]; 
   $pdo = Database::connect();  
      $stmt0 = $pdo->prepare("SELECT libelle FROM medicament WHERE libelle=:libellep"); 
      $stmt0->execute(array(":libellep" =>$libellep));
      $row0 = $stmt0->fetch(PDO::FETCH_ASSOC);   
      if ($row0>0) {
         echo "Ce medicament existe déja";
      } else {
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );   
            $statement = $pdo->prepare("INSERT INTO medicament 
               (libelle, ipm) VALUES 
               (:libellev, :ipm)"); 
            $statement->bindParam(":libellev",$libellep); 
            $statement->bindParam(":ipm",$ipm); 
               if($statement->execute())
               {   

                  header("Location: ./");
               } 
               else{
                  echo "requete";
               }  
      }
      

   
} 

if (isset($_GET['idMedicament'])) {
  
   $pid = $_GET['idMedicament']; 
   $pdo = Database::connect();  
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
 
   $query = "DELETE FROM medicament WHERE idMedicament=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
   header("Location: ./");

 }
 

?>