<?php 
session_start();


include_once '../../../dao/database.php';

// $pdo = Database::connect();  
// $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
// $stmt->execute(array(":id"=>$_SESSION['user_session_sescretaire'], ":valide"=>$valide));
// $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
 
if (isset($_GET['id'])) {
  $pdo = Database::connect();  
  $stmt = $pdo->prepare("SELECT * FROM employer WHERE codeemployer=:id");
  $stmt->execute(array(":id"=>$_GET['id']));
  $userRow2=$stmt->fetch(PDO::FETCH_ASSOC);
 
  $_SESSION['employer_print'] =$userRow2['codeemployer'];
  
  header('Location: qr.php');
}else{

}

   ?>