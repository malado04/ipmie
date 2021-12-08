<?php
   session_start();

if(!isset($_SESSION['user_session_docteur'])AND!isset($_SESSION['session_idEmployeur']))
{
  header("Location: ../../pages/auth/index.php");
} 
 
 
 if (isset($_POST['nom_maladie'])) {
include '../DB.php';
$db = new DB();
$tblName = 'maladie'; 
    
      $userData = array(
                  'libelle_mal'=>$_POST['nom_maladie'],
              ); 
        $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                  header('Location: ../medic/medic_php.php'); 
               } 
               else{
                  echo "requete"; 
   }
}
 
 if (isset($_POST['maladie'])) {
include '../DB.php';
$db = new DB();
$tblName = 'item_mal'; 
 
         for ($i=0; $i < count($_POST['maladie']) ; $i++) { 
            $r = array(
            'mal_item_con'=> $_POST['maladie'][$i] ,
            'mal_idEm'=> $_POST['emp'],
            'mal_idc'=> $_POST['id_cons'],
            ); 
               // var_dump($r);

          $insert = $db->insert($tblName,$r);
               if($insert)
               {   
           header('Location: ../medic/medic_php.php?idc='.$_POST['id_cons'].'&emp='.$_POST['emp']); 
               } 
}
}
 

?>