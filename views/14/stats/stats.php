<?php
 
include_once 'dao/database.php';


$pdo = Database::connect();  


$sexm="M";
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm  AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6 AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21");
$stmt->execute(array(":sexm"=>$sexm));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
echo "Enfant compris entre 5 et 21 ans de sex M";
echo $userRow['nombre'];
echo "<br/>";
 
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt1 = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6");
$stmt1->execute(array(":sexm"=>$sexm));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);
echo "Enfant DE MOINS DE  5 ANS ";
echo $userRow1['nombre'];
echo "<br/>";

$sexm="F";
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6 AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21");
$stmt->execute(array(":sexm"=>$sexm));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
echo "Enfant compris entre 5 et 21 ans de sex M";
echo $userRow['nombre'];
echo "<br/>";

$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt1 = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6");
$stmt1->execute(array(":sexm"=>$sexm));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);
echo "Enfant DE MOINS DE  5 ANS";
echo $userRow1['nombre'];
echo "<br/>";


// $sexf="F";
// $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT COUNT(idEnfants) AS nombreEnfant_F FROM enfants where sex=:sex");
// $stmt->execute(array(":sex"=>$sexf));
// $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
// echo "Nombre de fille ";
// echo $userRow['nombreEnfant_F'];

// $sexm="M";
// $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT  COUNT(idEnfants) AS nombreEnfant_M FROM enfants where sex=:sexm");
// $stmt->execute(array(":sexm"=>$sexm));
// $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
// echo "Nombre de garcons ";
// echo $userRow['nombreEnfant_M'];




?>
