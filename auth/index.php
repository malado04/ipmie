<?php
   session_start();
   require_once '../dao/database.php';

   if(isset($_GET['id']))
   { 
      try
      {
        $pdo = Database::connect();  
      $stmt = $pdo->prepare("SELECT * FROM employer WHERE codeemployer=:id"); 
         $stmt->execute(array(":id"=>$_GET['id']));
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         if ($row) {
            header("Location: https://ipmiez.com/apps/views/8/?id=".$_GET['id']);
         } else { 
            echo "Désolé votre compte n'a pas encore été valider!!!";

            }
         
      }
      catch(PDOException $e){
         echo $e->getMessage();
      }
   }else{
      echo "sssss";
   }
?>