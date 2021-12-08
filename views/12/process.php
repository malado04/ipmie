<?php
   session_start();

include 'DB.php';
$db = new DB();
$tblName = 'bon_'; 
if (!isset($_POST['id_beneficiaire_lui'])) {
   
$userData = array(
            'id_parent'=>$_POST['id_beneficiaire_lui'],
            'id_beneficiaire'=>$_POST['id_beneficiaire_lui'],
            'id_structure'=>$_POST['id_fournisseur'],
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
              'id_ipmbon'=>$_SESSION['user_session_bon']
        ); 

        $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                  header('Location: ./'); 
               } 
               else{
                  echo "requete"; 
   }
   
} else if (isset($_POST['valide_f'])) {
        $userData = array(
                    'id_parent'=>$_POST['id_beneficiaire_lui'],
                    'id_beneficiaire'=>$_POST['id_beneficiaire_fem'],
                    'id_structure'=>$_POST['id_fournisseur'],
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
                    'id_ipmbon'=>$_SESSION['user_session_bon']
                ); 
         $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                  header('Location: ./'); 
               } 
               else{
                  echo "requete"; 
   }
   
} else if (isset($_POST['valide_e'])) {
   
$userData = array(
            'id_parent'=>$_POST['id_beneficiaire_lui'],
            'id_beneficiaire'=>$_POST['id_beneficiaire_enf'],
            'id_structure'=>$_POST['id_fournisseur'],
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
              'id_ipmbon'=>$_SESSION['user_session_bon']
        ); 
        $insert = $db->insert($tblName,$userData);
               if($insert>0)
               {   
                  header('Location: ./'); 
               } 
               else{
                  header('Location: success.php'); 
   }
   
} else {
   # code...
}

 
?>