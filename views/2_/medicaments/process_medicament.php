<?php 


   if (isset($_GET['id_medic'])) {
  $pris_en_charge_ipm="oui";
   $userData = array( 
   'ipm'=> $pris_en_charge_ipm
   );

   $condition = array('idMedicament' => $_GET['id_medic']);
  require_once '../DB.php';
   $db = new DB();
   $tblName = 'medicament';
   $update = $db->update($tblName,$userData,$condition);
     // var_dump($userData); 
     header('Location: success.php'); 
 }


   if (isset($_GET['id_medic_n'])) {
  $pris_en_charge_ipm="non";
   $userData = array( 
   'ipm'=> $pris_en_charge_ipm
   );

   $condition = array('idMedicament' => $_GET['id_medic_n']);
  require_once '../DB.php';
   $db = new DB();
   $tblName = 'medicament';
   $update = $db->update($tblName,$userData,$condition);
     // var_dump($userData); 
     header('Location: success.php'); 
 }



 ?>