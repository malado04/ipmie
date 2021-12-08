<?php 

 
// -------------------------------------------------Modifier la photo--------------------------------------- 

   if (isset($_POST['modifierPhoto'])) {

  $imgFile = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
  $temp  = $_FILES["image"]["tmp_name"];

  $upload_dir ="img/".$imgFile; //set upload folder path
    move_uploaded_file($tmp_dir, "img/" .$imgFile); //move upload file temperory directory to your upload folder
     // move_uploaded_file($tmp_dir,$upload_dir.$userpic);


   $userData = array( 
   'image'=> $imgFile
   );

   $condition = array('id' => $_POST['iduser']);
  require_once 'DB.php';
   $db = new DB();
   $tblName = 'utilisateur';
   $update = $db->update($tblName,$userData,$condition);
     header('Location: ./'); 
 }

  ?>