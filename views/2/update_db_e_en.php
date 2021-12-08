<?php 

if (isset($_POST['ajoutEpouse'])) {
   
include 'DB.php';
$db = new DB();
$tblName = 'epouses';
  // $imgFile = $_FILES['image']['name'];
  // $tmp_dir = $_FILES['image']['tmp_name'];
  // $imgSize = $_FILES['image']['size'];
  // $temp  = $_FILES["image"]["tmp_name"];

  // $upload_dir ="../../img/Profil/".$imgFile; //set upload folder path
  //   move_uploaded_file($tmp_dir, "../../img/epouse/" .$imgFile); //move upload file temperory directory to 

$pid = $_POST['idepouse']; 
$userData = array(
            // 'image'=>$imgFile,
            'nomEpouses'=>$_POST['nomepouses'],
            'prenomEpouses'=>$_POST['prenomepouses'],
            'sex'=>$_POST['sex'],
            'dateNaissanceEpouses'=>$_POST['datenaissepouses'],
            'dateMariage'=>$_POST['datemariage'], 
            'numeroActeMariage'=>$_POST['numeroactemariage'],  
            // 'employer_id'=>$_POST['idEmployer']
        ); 

   $condition = array('idEpouses' => $pid);
   $update = $db->update($tblName,$userData,$condition);
        $insert = $db->insert($tblName,$userData);
                  header('Location: epouses.php'); 
   
} else {
   # code...
}

 

// EPOUSES----------------------------------------------------------------
if (isset($_POST['ajoutEnfant'])) {
   
include 'DB.php';
$db = new DB();
$tblName = 'enfants';
  // $imgFile = $_FILES['image']['name'];
  // $tmp_dir = $_FILES['image']['tmp_name'];
  // $imgSize = $_FILES['image']['size'];
  // $temp  = $_FILES["image"]["tmp_name"];

  // $upload_dir ="../../img/enfant/".$imgFile; //set upload folder path
  //   move_uploaded_file($tmp_dir, "../../img/enfant/" .$imgFile); //move upload file temperory directory to 
$pid = $_POST['idEmployer']; 

$userData = array(
            // 'image'=>$_POST['image'],
            'nomEnfants'=>$_POST['nomenfant'],
            'prenomEnfants'=>$_POST['prenomenfant'],
                'sex'=>$_POST['sex'],
               'dateNaissanceEnfants'=>$_POST['datenaissanceenfant'],
               'LieuNaissanceEnfants'=>$_POST['lieunaissanceenfant'], 
               'numeroRegistreEnfants'=>$_POST['numeroregistre'],  
               // 'employer_id'=>$_POST['idEmployer']
        ); 

   $condition = array('idEnfants' => $pid);
   $update = $db->update($tblName,$userData,$condition);
        $insert = $db->insert($tblName,$userData);
                  header('Location: enfant.php'); 
   
} else {
   # code...
}

 
   if (isset($_POST['photoEpouses'])) {

  $imgFile = $_FILES['imageepouse']['name'];
  $tmp_dir = $_FILES['imageepouse']['tmp_name'];
  $imgSize = $_FILES['imageepouse']['size'];
  $temp  = $_FILES["imageepouse"]["tmp_name"];
  $upload_dir ="../../img/epouse/".$imgFile; //set upload folder path
  move_uploaded_file($tmp_dir, "../../img/epouse/".$imgFile); //move upload file temperory directory to your upload folder
  // move_uploaded_file($tmp_dir,$upload_dir.$userpic);
  
  $userData = array( 
  'image'=> $imgFile
  );

  $condition = array('idEpouses' => $_POST['id_epouse']);
  require_once 'DB.php';
  $db = new DB();
  $tblName = 'epouses';
  $update = $db->update($tblName,$userData,$condition);
  //var_dump($userData); 
  header('Location: success.php'); 
 }


  ?>