<?php
   session_start();
 

if (isset($_GET['idEntrepriseDel'])) {
   echo "icissss";
  
   $pid = $_GET['idEntrepriseDel']; 

   $query = "DELETE FROM utilisateur WHERE id=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
  
  if ($stmt) {

}
  
 }
 
if (isset($_POST['idEntrepriseMod'])) {
      $tblName = 'entreprise';
      $userData = array(

         'matriculeEntreprise'=>$_POST["matricule"],
         'raisonSociale'=>$_POST["raisonsociale"],
         'sigleEntreprise'=>$_POST["sigleentreprise"],
         'numResgitreEntreprise'=>$_POST["numresgitreentreprise"], 
         'nineaEntreprise'=>$_POST["nineaentreprise"], 
         'dateImmatriculationEntreprise'=>$_POST["dateimmatriculationentreprise"], 
         'hommeEntreprise'=>$_POST["hommeentreprise"],  
         'femmeEntreprise'=>$_POST["femmeEntreprise"],  
         'periodeTravailEntreprise'=>$_POST["periodeTravailEntreprise"],  
         'datePeriodeTravail'=>$_POST["dateperiodetravail"],  
         'employeur_id'=>$_POST["idEmployeur"]           
     );

   $condition = array('idEntreprise' => $_POST['idEntrepriseMod']);
  require_once 'DB.php';
   $db = new DB();
   var_dump($_POST['idEntrepriseMod']);
   $update = $db->update($tblName,$userData,$condition);

   if ($update) {
         header('Location: success.php');
      } else {
         var_dump($update);
         # code...
         // header('Location: success.php');
      }
      

 }
     
    
?>