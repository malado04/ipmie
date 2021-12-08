<?php 


   if (isset($_POST['modifierProfil'])) {

   $userData = array(
   'cni'=> $_POST['cniemployeurmod'],
   'nom'=> $_POST['nomemployeurmod'],
   'prenom'=> $_POST['prenomemployeurmod'],
   'telFixe'=> $_POST['telfixemployeurmod'],
   'telPortable'=> $_POST['telportemployeurmod'],
   'adresseCommune'=> $_POST['communemod'],
   'adresse'=> $_POST['quartiermod'],
   'email'=> $_POST['emailmod'],
   'login'=> $_POST['loginmod'],
   'password'=> $_POST['passwordmod'] 
   );

   $condition = array('id' => $_POST['iduser']);
  require_once 'DB.php';
   $db = new DB();
   $tblName = 'utilisateur';
   $update = $db->update($tblName,$userData,$condition);
     // var_dump($userData); 
     header('Location: success.php'); 
 }

// -------------------------------------------------Modifier la photo--------------------------------------- 

   if (isset($_POST['modifierPhoto'])) {

  $imgFile = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
  $temp  = $_FILES["image"]["tmp_name"];

  $upload_dir ="../../img/Profil/".$imgFile; //set upload folder path
    move_uploaded_file($tmp_dir, "../../img/Profil/" .$imgFile); //move upload file temperory directory to your upload folder
     // move_uploaded_file($tmp_dir,$upload_dir.$userpic);


   $userData = array( 
   'image'=> $imgFile
   );

   $condition = array('id' => $_POST['iduser']);
  require_once 'DB.php';
   $db = new DB();
   $tblName = 'utilisateur';
   $update = $db->update($tblName,$userData,$condition);
     var_dump($userData); 
     header('Location: success.php'); 
 }


// --------------------------------------------------------------------------------------------------------------------------------------------

   if (isset($_POST['photoEnfant'])) {

  $imgFile = $_FILES['imageenfant']['name'];
  $tmp_dir = $_FILES['imageenfant']['tmp_name'];
  $imgSize = $_FILES['imageenfant']['size'];
  $temp  = $_FILES["imageenfant"]["tmp_name"];
  $upload_dir ="../../img/enfant/".$imgFile; //set upload folder path
  move_uploaded_file($tmp_dir, "../../img/enfant/" .$imgFile); //move upload file temperory directory to your upload folder
  // move_uploaded_file($tmp_dir,$upload_dir.$userpic);
  
  $userData = array( 
  'image'=> $imgFile
  );

  $condition = array('idEnfants' => $_POST['id_Enfants']);
  require_once 'DB.php';
  $db = new DB();
  $tblName = 'enfants';
  $update = $db->update($tblName,$userData,$condition);
  //var_dump($userData); 
  header('Location: success.php'); 
 }

// --------------------------------------------------------------------------------------------------------------------------------------------

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

// --------------------------------------------------------------------------------------------------------------------------------------------

  if (isset($_POST['photoEmployer'])) {

  $imgFile = $_FILES['imageemployer']['name'];
  $tmp_dir = $_FILES['imageemployer']['tmp_name'];
  $imgSize = $_FILES['imageemployer']['size'];
  $temp  = $_FILES["imageemployer"]["tmp_name"];
  $upload_dir ="../../img/employer/".$imgFile; //set upload folder path
  move_uploaded_file($tmp_dir, "../../img/employer/".$imgFile); //move upload file temperory directory to your upload folder
  // move_uploaded_file($tmp_dir,$upload_dir.$userpic);

  $userData = array( 
  'image'=> $imgFile
  );

  $condition = array('idEmployer' => $_POST['id_Employer']);
  require_once 'DB.php';
  $db = new DB();
  $tblName = 'employer';
  $update = $db->update($tblName,$userData,$condition);
  var_dump($condition); 
  header('Location: success.php?page=employer'); 
 }

  ?>