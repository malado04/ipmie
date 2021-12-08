<?php
   session_start();

if(!isset($_SESSION['user_session_docteur'])AND!isset($_SESSION['session_idEmployeur']))
{
  header("Location: ../../pages/auth/index.php");
} 
 
include 'DB.php';
$db = new DB();
$tblName = 'consultation'; 
 
 if (isset($_POST['tension1'])) {

    $userData = array( 
      'cons_id_emp'=>$_POST['idE'],
      'beneficiaire'=>$_POST['id_str_b_fem'],
      'main'=>$_POST['main'],
      'poids'=>$_POST['poids'],
      'temp'=>$_POST['temp'],
      'tension'=>$_POST['tension'].'.'.$_POST['tension1'],
      'codeE'=>$_POST['codeEmployer'],
      'id_user_docteur'=>$_SESSION['user_session_docteur'],
    ); 
    // var_dump($userData);  
    $insert = $db->insert($tblName,$userData); 
    if ($insert) {
          include_once '../../dao/database.php';
          $pdo = Database::connect();  
          $stmt = $pdo->prepare("SELECT idcons, cons_id_emp FROM consultation WHERE cons_id_emp=:id ORDER BY idcons DESC LIMIT 1");
          $stmt->execute(array(":id"=>$_POST['idE']));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
           header('Location: syntom/syntom_php.php?idc='.$userRow['idcons'].'&emp='.$_POST['idE']); 
         # code...
       } else {
         # code...
       }
          //    if($insert)
   //      {   
   //        include_once '../../../dao/database.php';
   //        $pdo = Database::connect();  
   //        $stmt = $pdo->prepare("SELECT idcons, cons_id_emp FROM consultation WHERE cons_id_emp=:id ORDER BY idcons DESC LIMIT 1");
   //        $stmt->execute(array(":id"=>$_POST['idEmployer']));
   //        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   //        // var_dump($userRow);
   //        $tblName = 'consultation';
   //        $r= serialize($_POST['symptom']);
   //          $r1 = array(
   //        'syntom'=> $r,
   //        ); 
   //        var_dump($r1); 
   //        $condition = array('idcons' => $userRow['idcons']);
   //        $update = $db->update($tblName,$r1,$condition);

   //         header('Location: ../malad/maladie_php.php?idc='.$userRow['idcons'].'&emp='.$_POST['idEmployer']); 
   //      } 
   //      else{
   //        echo "requete"; 
   // }
}
 
?>