<?php 


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
  require_once 'DB.php';
   $db = new DB();
   $tblName = 'employer';
   $update = $db->update($tblName,$userData,$condition);
     // var_dump($userData); 
     header('Location: employers/success.php'); 
 }


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

  ?>