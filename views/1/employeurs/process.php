<?php
   session_start();

// if(!isset($_SESSION['user_session'])AND!isset($_SESSION['session_id']))
// {
//   header("Location: ../../pages/auth/index.php");
// } 
   require_once '../../../dao/database.php';

if (isset($_POST['delete_employeur'])) {
  
   $pid = $_POST['delete_employeur']; 
   $pdo = Database::connect();  
   // $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   // $query1 = "SELECT * FROM entreprise, utilisateur WHERE utilisateur.utilisateur_id=entreprise.idEntreprise AND id=:pid";
   // $stmt1 = $pdo->prepare($query1);
   // $stmt1->execute(array(':pid'=>$pid));
   // if($stmt1){

   $query = "DELETE FROM utilisateur WHERE id=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
  
  if ($stmt) {
   echo ("Suppression effectuée avec succée ...");
  // }
   }
  
 } 

if (isset($_GET['id_desc'])) {
  require_once '../../../dao/DB.php';
   $db = new DB();
   $tblName = 'employer';
   $tblName1 = 'entreprise';
   $pid = $_GET['id_desc']; 
   $activedesc = 0; 
   $arraydata = array(
      'activedesc' => $activedesc
   );
   $arraydata1 = array(
      'activedescentreprise' => $activedesc
   );

   $condition = array('employeur_id' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);

   $condition1 = array('idEntreprise' => $pid);
   $update1 = $db->update($tblName1,$arraydata1,$condition1); 
      if ($update1) { 
         header('Location: success.php');
      } else {
        
      }
 }
// -------------------------------------------------------------------------------------------------------

if (isset($_GET['id_active'])) {
  require_once '../../../dao/DB.php';
   $db = new DB();
   $tblName = 'employer';
   $tblName1 = 'entreprise';
   $pid = $_GET['id_active']; 
   $activedesc = 1; 
   $arraydata = array(
      'activedesc' => $activedesc
   );
   $arraydata1 = array(
      'activedescentreprise' => $activedesc
   );

   $condition = array('employeur_id' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);

   $condition1 = array('idEntreprise' => $pid);
   $update1 = $db->update($tblName1,$arraydata1,$condition1);

   // var_dump($update1);

      if ($update1) {
         # code...
         header('Location: success.php');
      } else {
         # code...
      }
 }


if (isset($_POST['modifierEmployeur'])) {
   $userData = array(
    'cni'=> $_POST['cniemployeur'],
    'nom'=> $_POST['nomemployeur'],
    'prenom'=> $_POST['prenomemployeur'],
    'telFixe'=> $_POST['telfixemployeur'],
    'telPortable'=> $_POST['telportemployeur'],
    'adresseCommune'=> $_POST['commune'],
    'adresse'=> $_POST['quartier'],
    'email'=> $_POST['email'],
    'login'=> $_POST['login'],
    'password'=> $_POST['password'] 
   );
   $condition = array('id' => $_POST['iduser']);
   $tblName = 'utilisateur';
  require_once '../DB.php';
   $db = new DB();
   $update = $db->update($tblName,$userData,$condition);
   // var_dump($update);
      if ($update) {
         header('Location: success.php');
      } else {
         # code...
         header('Location: success.php');
      }
      

 }


if (isset($_POST['idEmployeur'])) {
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

   require_once 'DB.php';
   $db = new DB(); 

        $insert = $db->insert($tblName,$userData);

   if ($insert) {
         header('Location: success.php');
      } else {
         var_dump($update);
         # code...
         // header('Location: success.php');
      }
      

 }
     

?>