<?php
   session_start();

if(!isset($_SESSION['user_session_sescretaire']))
{
  // header("Location: ../../pages/auth/index.php");
} 
$arrayPrixIpm = array();
$arrayPrixParent = array();
if (isset($_POST['medicament1']) && isset($_POST['prixmedi1'])) {
  
  $medicament1=$_POST['medicament1'];
  $prixmedi1=$_POST['prixmedi1'];
  $pieces = explode(" / ", $medicament1);
  if ($pieces[1]=="oui") {
      $medicament1_ipm="oui";
      $arrayPrixIpm[0]=$prixmedi1*60/100;
      $arrayPrixParent[0]=$prixmedi1*40/100;

  } else {
    # code...
      $medicament1_ipm="non";
      $arrayPrixIpm[0]=$prixmedi1*0;
      $arrayPrixParent[0]=$prixmedi1;
  }


} else {
  $medicament1='';
  $prixmedi1 ='';
  $medicament1_ipm="non";
}
// echo $_POST['ipm_medic1'];
if (isset($_POST['medicament2']) && isset($_POST['prixmedi2']) && (!empty($_POST['medicament2']))) {

 $medicament2=$_POST['medicament2'];
 $prixmedi2=$_POST['prixmedi2'];
  $pieces = explode(" / ", $medicament2);
    if ($pieces[1]=="oui") {
      $medicament2_ipm="oui";
      $arrayPrixIpm[1]=$prixmedi2*60/100;
      $arrayPrixParent[1]=$prixmedi2*40/100;

  } else {
    # code...
      $medicament2_ipm="non";
      $arrayPrixIpm[1]=$prixmedi2*0;
      $arrayPrixParent[1]=$prixmedi2;
  }

} else {

 $medicament2="";
 $prixmedi2="";
 $medicament2_ipm="non";
}
if (isset($_POST['medicament3']) && isset($_POST['prixmedi3']) && (!empty($_POST['medicament3']))) {

 $medicament3=$_POST['medicament3'];
 $prixmedi3=$_POST['prixmedi3'];
  $pieces = explode(" / ", $medicament3);
   if ($pieces[1]=="oui") {
      $medicament3_ipm="oui";
      $arrayPrixIpm[2]=$prixmedi3*60/100;
      $arrayPrixParent[2]=$prixmedi3*40/100;

  } else {
    # code...
      $medicament3_ipm="non";
      $arrayPrixIpm[2]=$prixmedi3*0;
      $arrayPrixParent[2]=$prixmedi3;
  }

} else {
 $medicament3="";
 $prixmedi3="";
 $medicament3_ipm="non";
}
if (isset($_POST['medicament4']) && isset($_POST['prixmedi4']) && (!empty($_POST['medicament4']))) {

 $medicament4=$_POST['medicament4'];
 $prixmedi4=$_POST['prixmedi4'];
  $pieces = explode(" / ", $medicament4);
    if ($pieces[1]=="oui") {
      $medicament4_ipm="oui";
      $arrayPrixIpm[3]=$prixmedi4*60/100;
      $arrayPrixParent[3]=$prixmedi4*40/100;

  } else {
    # code...
      $medicament4_ipm="non";
      $arrayPrixIpm[3]=$prixmedi4*0;
      $arrayPrixParent[3]=$prixmedi4;
  }

} else {
  $medicament4='';
  $prixmedi4="";
 $medicament4_ipm="non";
}
if (isset($_POST['medicament5']) && isset($_POST['prixmedi5']) &&  (!empty($_POST['medicament5']))) {

 $medicament5=$_POST['medicament5'];
 $prixmedi5=$_POST['prixmedi5'];
  $pieces = explode(" / ", $medicament5);
   if ($pieces[1]=="oui") {
      $medicament5_ipm="oui";
      $arrayPrixIpm[4]=$prixmedi5*60/100;
      $arrayPrixParent[4]=$prixmedi5*40/100;

  } else {
    # code...
      $medicament5_ipm="non";
      $arrayPrixIpm[4]=$prixmedi5*0;
      $arrayPrixParent[4]=$prixmedi5;
  }


} else {
 $medicament5="";
 $prixmedi5="";
 $medicament5_ipm="non";
}
if (isset($_POST['medicament6']) && isset($_POST['prixmedi6']) &&  (!empty($_POST['medicament6']))) {

 $medicament6=$_POST['medicament6'];
 $prixmedi6=$_POST['prixmedi6'];
  $pieces = explode(" / ", $medicament6);
    if ($pieces[1]=="oui") {
      $medicament6_ipm="oui";
      $arrayPrixIpm[5]=$prixmedi6*60/100;
      $arrayPrixParent[5]=$prixmedi6*40/100;

  } else {
    # code...
      $medicament6_ipm="non";
      $arrayPrixIpm[5]=$prixmedi6*0;
      $arrayPrixParent[5]=$prixmedi6;
  }


} else {
 $medicament6="";
 $prixmedi6="";
 $medicament6_ipm="non";
}
if (isset($_POST['medicament7']) && isset($_POST['prixmedi7']) &&  (!empty($_POST['medicament7']))) {

 $medicament7=$_POST['medicament7'];
 $prixmedi7=$_POST['prixmedi7'];
  $pieces = explode(" / ", $medicament7);
   if ($pieces[1]=="oui") {
      $medicament7_ipm="oui";
      $arrayPrixIpm[6]=$prixmedi7*60/100;
      $arrayPrixParent[6]=$prixmedi7*40/100;

  } else {
    # code...
      $medicament7_ipm="non";
      $arrayPrixIpm[6]=$prixmedi7*0;
      $arrayPrixParent[6]=$prixmedi7;
  }

} else {
 $medicament7="";
 $prixmedi7="";
 $medicament7_ipm="non";
}
if (isset($_POST['medicament8']) && isset($_POST['prixmedi8']) && (!empty($_POST['medicament_']))) {

 $medicament8=$_POST['medicament8'];
 $prixmedi8=$_POST['prixmedi8'];
  $pieces = explode(" / ", $medicament8);
    if ($pieces[1]=="oui") {
      $medicament8_ipm="oui";
      $arrayPrixIpm[7]=$prixmedi8*60/100;
      $arrayPrixParent[7]=$prixmedi8*40/100;

  } else {
    # code...
      $medicament8_ipm="non";
      $arrayPrixIpm[7]=$prixmedi8*0;
      $arrayPrixParent[7]=$prixmedi8;
  }

} else {
 $medicament8="";
 $prixmedi8="";
 $medicament8_ipm="non";
}
if (isset($_POST['medicament9']) && isset($_POST['prixmedi9']) && (!empty($_POST['medicament9']))) {

 $medicament9=$_POST['medicament9'];
 $prixmedi9=$_POST['prixmedi9'];
  $pieces = explode(" / ", $medicament9);
  if ($pieces[1]=="oui") {
      $medicament9_ipm="oui";
      $arrayPrixIpm[8]=$prixmedi9*60/100;
      $arrayPrixParent[8]=$prixmedi9*40/100;

  } else {
    # code...
      $medicament9_ipm="non";
      $arrayPrixIpm[8]=$prixmedi9*0;
      $arrayPrixParent[8]=$prixmedi9;
  }

} else {
 $medicament9="";
 $prixmedi9="";
 $medicament9_ipm="non";
}
if (isset($_POST['medicament10']) && isset($_POST['prixmedi10']) && (!empty($_POST['medicament10']))) {

 $medicament10=$_POST['medicament10'];
 $prixmedi10=$_POST['prixmedi10'];

  $pieces = explode(" / ", $medicament10);
   if ($pieces[1]=="oui") {
      $medicament10_ipm="oui";
      $arrayPrixIpm[9]=$prixmedi10*60/100;
      $arrayPrixParent[9]=$prixmedi10*40/100;

  } else {
    # code...
      $medicament10_ipm="non";
      $arrayPrixIpm[9]=$prixmedi10*0;
      $arrayPrixParent[9]=$prixmedi10;
  }

} else {
 $medicament10="";
 $prixmedi10="";
 $medicament10_ipm="non";
}

    include '../DB.php';
    $db = new DB();
    $tblName = 'bondecommande';  
    if (isset($_POST['medicament1'])) {
    $idparent=$_POST['idparent'];
    
      $totalIPM=($arrayPrixIpm[0]+$arrayPrixIpm[1]+$arrayPrixIpm[2]+$arrayPrixIpm[3]+$arrayPrixIpm[4]+$arrayPrixIpm[5]+$arrayPrixIpm[6]+$arrayPrixIpm[7]+$arrayPrixIpm[8]+$arrayPrixIpm[9]);
      $totalParent=($arrayPrixParent[0]+$arrayPrixParent[1]+$arrayPrixParent[2]+$arrayPrixParent[3]+$arrayPrixParent[4]+$arrayPrixParent[5]+$arrayPrixParent[6]+$arrayPrixParent[7]+$arrayPrixParent[8]+$arrayPrixParent[9]);

      $userData = array(
                    'idstructure'=>$_POST['idstructure'],
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
                    'med1_ipm'=>$medicament1_ipm,
                    'med2_ipm'=>$medicament2_ipm,
                    'med3_ipm'=>$medicament3_ipm,
                    'med4_ipm'=>$medicament4_ipm, 
                    'med5_ipm'=>$medicament5_ipm, 
                    'med6_ipm'=>$medicament6_ipm, 
                    'med7_ipm'=>$medicament7_ipm, 
                    'med8_ipm'=>$medicament8_ipm, 
                    'med9_ipm'=>$medicament9_ipm, 
                    'med10_ipm'=>$medicament10_ipm,  
                    'total_ipm'=>$totalIPM, 
                    'total_parent'=>$totalParent, 
                    'total_bon'=>$totalParent+$totalIPM, 
                    'id_parent_p'=>$idparent,    
                    'id_session_user'=>$_SESSION['user_session_sescretaire']
              ); 
      
        $insert = $db->insert($tblName,$userData);
        var_dump($arrayPrixParent); echo "string";
        var_dump($arrayPrixIpm);
              if($insert)
              {   
                  header('Location: ./'); 
              } 
              else{
                  echo "requete"; 
   }
    
      
   
   }
   

?>