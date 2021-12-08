<?php
   session_start();

if(!isset($_SESSION['user_session_docteur']))
{
  header("Location: ipmiez.com");
}
              if (isset($_POST['codeEmployer'])) {
              include 'DB.php';
              $db = new DB();
              $tblName = 'consultation'; 
              $tens=$_POST['tension'].",".$_POST['tension1'];
              $userData = array(
                    'cons_id_emp'=>$_POST['idE'],
                    'codeE'=>$_POST['codeEmployer'],
                    'bene_ep'=>$_POST['id_str_b_fem'],
                    'benef_enf'=>$_POST['id_str_b_enf'],
                      'poids'=>$_POST['poids'],
                      'temp'=>$_POST['temp'],
                      'tension'=>$tens, 
                      'id_user_docteur'=>$_SESSION['user_session_docteur']
              );
              $insert = $db->insert($tblName,$userData);
                 if($insert)
                 {   
                    header('Location: syntom/?id='.$_POST['idE']); 
                 } 
                 else{
                    echo "requete"; 
                 }
              }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

              if (isset($_POST['nom_patho'])){
              include 'DB.php';
              $db = new DB();
              $tblName = 'consultation'; 
                  $userData = array( 
                    'nom_patho'=>$_POST['nom_patho'],
                    'bene_ep'=>$_POST['id_str_b_fem'],
                    'benef_enf'=>$_POST['id_str_b_enf'],
                    'poids'=>$_POST['poids'],
                    'temp'=>$_POST['temp'],
                    'main'=>$_POST['main'],
                    'tension'=>$tens, 
                    'id_user_docteur'=>$_SESSION['user_session_docteur']
                  );
                  // var_dump($userData);
                  $insert = $db->insert($tblName,$userData);
                    if($insert)
                    {   
                      header('Location: syntom/'); 
                    } 
                    else{
                      echo "requete"; 
                } 
              }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>