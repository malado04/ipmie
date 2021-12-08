<?php
   session_start();

if(!isset($_SESSION['user_session_docteur'])AND!isset($_SESSION['session_idEmployeur']))
{
  header("Location: ../../pages/auth/index.php");
} 
 
include '../DB.php';
$db = new DB();
$tblName = 'item_syn'; 
 
 if (isset($_POST['symptom'])) {
  for ($i=0; $i < count($_POST['symptom']) ; $i++) { 
            $r = array(
            'syn_item_con'=> $_POST['symptom'][$i] ,
            'item_con_idEm'=> $_POST['idEmployer'],
            'item_con_idc'=> $_POST['idconsul'],
            ); 
          $insert = $db->insert($tblName,$r);
               if($insert)
               {   
           header('Location: ../malad/maladie_php.php?idc='.$_POST['idconsul'].'&emp='.$_POST['idEmployer']); 
               } 
  }

        } 
        else{
          echo "requete"; 
}
 

?>