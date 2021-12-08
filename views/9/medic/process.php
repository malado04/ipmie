<?php
   session_start();

if(!isset($_SESSION['user_session_docteur'])AND!isset($_SESSION['session_idEmployeur']))
{
} 
 
 if (isset($_POST['medic'])) {
include '../DB.php';
$db = new DB();
$tblName = 'item_med'; 
 
         for ($i=0; $i < count($_POST['medic']) ; $i++) { 
            $r = array(
            'med_item_con'=> $_POST['medic'][$i] ,
            'med_idEm'=> $_POST['emp'],
            'med_idc'=> $_POST['id_cons'],
            ); 
               // var_dump($r);

          $insert = $db->insert($tblName,$r);
               if($insert)
               {   
           header('Location: ord.php?idc='.$_POST['id_cons'].'&emp='.$_POST['emp']); 
               } 
}
}



?>