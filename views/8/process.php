<?php
   session_start();

if(!isset($_SESSION['user_session_pharmacie']))
{
  // header("Location: ../../pages/auth/index.php");
} 

if (isset($_POST['codeben'])) {
include 'DB.php';
$db = new DB();
$tblName = 'pharmacie'; 

         for ($i=0; $i < count($_POST['maladie']) ; $i++) {  
                  $userData = array(
                    'medic'=>$_POST['maladie'][$i], 
                    'prix'=>$_POST['prix'][$i], 
                    'codeemp'=>$_POST['codeben'], 
                    'pharma'=>$_SESSION['user_session_pharmacie']
              ); 
                  // var_dump($userData);
        $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                  header('Location: ./'); 
               } 
               else{
                  echo "requete"; 
   }
               } 
   }
?>