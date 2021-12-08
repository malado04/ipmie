<?php
   session_start();

if(!isset($_SESSION['user_session_sescretaire']))
{
  // header("Location: ../../pages/auth/index.php");
} 

 $libelle=$_POST['libelle'];
 $description=$_POST['description'];
 
 
include 'DB.php';
$db = new DB();
$tblName = 'depenses';  
   if (isset($_POST['libelle'])) { 
    echo $idparent;
      $userData = array(
                    'libelle'=>$libelle,
                    'description'=>$description 
              ); 
        $insert = $db->insert($tblName,$userData);
        // var_dump($_POST['idparent']);
               if($insert)
               {   
                  header('Location: ./'); 
               } 
               else{
                  echo "requete"; 
   }
    
      
   
   }
   

?>