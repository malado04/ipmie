<?php
   session_start();

if(!isset($_SESSION['user_session_docteur'])AND!isset($_SESSION['session_idEmployeur']))
{
  header("Location: ../../pages/auth/index.php");
} 
 
include 'DB.php';
$db = new DB();
$tblName = 'consultation'; 
 
 if (isset($_POST['lebeneficiaire'])) {
   if (isset($_POST['lebeneficiaireenfant'])) {
     
      $userData = array(
                  'id_parent'=>$_POST['codepatient'],
                  'id_user_docteur'=>$_SESSION['user_session_docteur']
              ); 
        $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                  header('Location: modal1.php?emp='.$_POST['idEmployer']); 
               } 
               else{
                  echo "requete"; 
   }
   

   } else {
      $userData = array(
                  'codepatient'=>$_POST['codepatient'],
                  'lebeneficiaire'=>$_POST['lebeneficiaire'],
                  'lebeneficiairesc'=>$_POST['lebeneficiaireepouse'],
                    'poids'=>$_POST['poids'],
                    'temp'=>$_POST['temp'],
                    'tension'=>$_POST['tension'],
                    'description'=>$_POST['description'],
                    'med1'=>$_POST['medicament1'],
                    'med2'=>$_POST['medicament2'],
                    'med3'=>$_POST['medicament3'],
                    'med4'=>$_POST['medicament4'], 
                    'med5'=>$_POST['medicament5'], 
                    'med6'=>$_POST['medicament6'], 
                    'med7'=>$_POST['medicament7'], 
                    'med8'=>$_POST['medicament8'], 
                    'med9'=>$_POST['medicament9'], 
                    'med10'=>$_POST['medicament10'], 
                    'id_ipmbon'=>$_SESSION['user_session_docteur']
              ); 
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