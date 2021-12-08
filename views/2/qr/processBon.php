<?php
   session_start();

if(!isset($_SESSION['user_session_pharmacie']))
{
  // header("Location: ../../pages/auth/index.php");
} 

if (isset($_POST['medicament1']) && isset($_POST['prixmedi1'])) {
 $medicament1=$_POST['medicament1'];
 $prixmedi1=$_POST['prixmedi1'];
} else {
  $medicament1='';
  $prixmedi1 ='';
}
if (isset($_POST['medicament2']) && isset($_POST['prixmedi2'])) {

 $medicament2=$_POST['medicament2'];
 $prixmedi2=$_POST['prixmedi2'];
} else {

 $medicament2="";
 $prixmedi2="";
}
if (isset($_POST['medicament3']) && isset($_POST['prixmedi3'])) {

 $medicament3=$_POST['medicament3'];
 $prixmedi3=$_POST['prixmedi3'];
} else {
 $medicament3="";
 $prixmedi3="";
}
if (isset($_POST['medicament4']) && isset($_POST['prixmedi4'])) {

 $medicament4=$_POST['medicament4'];
 $prixmedi4=$_POST['prixmedi4'];
} else {
  $medicament4='';
   $prixmedi4="";
}
if (isset($_POST['medicament5']) && isset($_POST['prixmedi5'])) {

 $medicament5=$_POST['medicament5'];
 $prixmedi5=$_POST['prixmedi5'];
} else {
 $medicament5="";
 $prixmedi5="";
}
if (isset($_POST['medicament6']) && isset($_POST['prixmedi6'])) {

 $medicament6=$_POST['medicament6'];
 $prixmedi6=$_POST['prixmedi6'];
} else {
 $medicament6="";
 $prixmedi6="";
}
if (isset($_POST['medicament7']) && isset($_POST['prixmedi7'])) {

 $medicament7=$_POST['medicament7'];
 $prixmedi7=$_POST['prixmedi7'];
} else {
 $medicament7="";
 $prixmedi7="";
}
if (isset($_POST['medicament8']) && isset($_POST['prixmedi8'])) {

 $medicament8=$_POST['medicament8'];
 $prixmedi8=$_POST['prixmedi8'];
} else {
 $medicament8="";
 $prixmedi8="";
}
if (isset($_POST['medicament9']) && isset($_POST['prixmedi9'])) {

 $medicament9=$_POST['medicament9'];
 $prixmedi9=$_POST['prixmedi9'];
} else {
 $medicament9="";
 $prixmedi9="";
}
if (isset($_POST['medicament10']) && isset($_POST['prixmedi10'])) {

 $medicament10=$_POST['medicament10'];
 $prixmedi10=$_POST['prixmedi10'];
} else {
 $medicament10="";
 $prixmedi10="";
}

 
include 'DB.php';
$db = new DB();
$tblName = 'pharmacie';  
   if (isset($_POST['id_parent'])) {
     
      $userData = array(
                    'med1_p'=>$medicament1,
                    'med2_p'=>$medicament2,
                    'med3_p'=>$medicament3,
                    'med4_p'=>$medicament4, 
                    'med5_p'=>$medicament5, 
                    'med6_p'=>$medicament6, 
                    'med7_p'=>$medicament7, 
                    'med8_p'=>$medicament8, 
                    'med9_p'=>$medicament9, 
                    'med10_p'=>$medicament10, 
                    'prix_medi1'=>$prixmedi1,
                    'prix_medi2'=>$prixmedi2,
                    'prix_medi3'=>$prixmedi3,
                    'prix_medi4'=>$prixmedi4, 
                    'prix_medi5'=>$prixmedi5, 
                    'prix_medi6'=>$prixmedi6, 
                    'prix_medi7'=>$prixmedi7, 
                    'prix_medi8'=>$prixmedi8, 
                    'prix_medi9'=>$prixmedi9, 
                    'prix_medi10'=>$prixmedi10, 
                    'id_parent_p'=>$_POST['id_parent'], 
                    'id_user_docteur_p'=>$_SESSION['user_session_pharmacie']
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
   

?>