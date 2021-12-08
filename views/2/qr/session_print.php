<?php 


include_once '../../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_sescretaire'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
 
if (isset($_GET['id'])) {
  // $pdo = Database::connect();  
  // $stmt = $pdo->prepare("SELECT * FROM employer WHERE codeemployer=:id");
  // $stmt->execute(array(":id"=>$_GET['id']));
  // $userRow2=$stmt->fetch(PDO::FETCH_ASSOC);
  // $codepatient=$userRow2['codeemployer'];

  $pdo =Database::connect(); //on se connecte à la base 
  $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
  $statement = $pdo->prepare("SELECT * FROM employer, epouses, enfants, consultation WHERE consultation.id_parent=employer.idEmployer OR consultation.lebeneficiairesc=epouses.idEpouses OR consultation.lebeneficiairesc=enfants.idEnfants AND codeemployer=:id GROUP BY idcons ORDER BY idEmployer DESC"); 
  $stmt->execute(array(":id"=>$_GET['id']));
  $userRow2=$stmt->fetch(PDO::FETCH_ASSOC);
  $codepatient=$userRow2['codeemployer'];
  $_SESSION['employer_print']=$codepatient;
  header('Location: qr.php')
}else{

}

   ?>