<?php
   session_start();

// if(!isset($_SESSION['user_session'])AND!isset($_SESSION['session_idemployer']))
// {
//   header("Location: ../../pages/auth/index.php");
// } 
   require_once '../../../dao/database.php';

if (isset($_POST['deleteemployer'])) {
  
   $pid = $_POST['deleteemployer']; 
   $pdo = Database::connect();  
   // $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   // $query1 = "SELECT * FROM entreprise, employer WHERE employer.employeur_id=entreprise.idEntreprise AND idEmployer=:pid";
   // $stmt1 = $pdo->prepare($query1);
   // $stmt1->execute(array(':pid'=>$pid));
   // if($stmt1){

   $query = "DELETE FROM employer WHERE idEmployer=:pid";
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
   $pid = $_GET['id_desc']; 
   $activedesc = 0; 
   $arraydata = array(
      'activedesc' => $activedesc
   );

   $condition = array('idEmployer' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);
   var_dump($update);

      if ($update) {
         # code...
         header('Location: success.php');
      } else {
         # code...
      }
 }
if (isset($_GET['id_active'])) {
  require_once '../../../dao/DB.php';
   $db = new DB();
   $tblName = 'employer';
   $pid = $_GET['id_active']; 
   $activedesc = 1; 
   $arraydata = array(
      'activedesc' => $activedesc
   );
   var_dump($arraydata);
   $condition = array('idEmployer' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);
   var_dump($update);
   
      if ($update) {
         # code...
         header('Location: success.php');
      } else {
         # code...
      }
      

 }

   if (isset($_POST['modifierEmployer'])) { 
   $userData = array(
   'cniemployer'=> $_POST['cniemployermod'],
   'nomEmployer'=> $_POST['nomemployermod'],
   'prenomEmployer'=> $_POST['prenomemployermod'],
   'telEmployer'=> $_POST['telEmployermod'],
   'emailEmployer'=> $_POST['email'],
   'nombreEnfantEmployer'=> $_POST['nombreEnfantEmployermod'],
   'nombreEpousesEmployer'=> $_POST['nombreEpousesEmployermod'],
   'montant'=> $_POST['montant']
   );

   $condition = array('idEmployer' => $_POST['iduser']);
  require_once '../DB.php';
   $db = new DB();
   $tblName = 'employer';
   $update = $db->update($tblName,$userData,$condition);
     // var_dump($userData); 
     header('Location: success.php'); 
 }
 
 // 


   if (isset($_POST['transferEmployer'])) { 
   $userData = array(
   'employeur_id'=> $_POST['identreprise']
   );

   $condition = array('idEmployer' => $_POST['iduser']);
  require_once '../DB.php';
   $db = new DB();
   $tblName = 'employer';
   $update = $db->update($tblName,$userData,$condition);
   // var_dump($_POST['identreprise']);
     // var_dump($update); 
   if ($update) {
     # code...
     header('Location: success.php'); 
    
   } else {
     # code...
   }
   
 }
 
?>