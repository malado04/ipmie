<?php
  
	session_start();
 
require_once '../../dao/database.php';

	
	if(isset($_POST['cni']))
	{ 
	$cni = trim($_POST['cni']);
	$nom = trim($_POST['nom']);
	$prenom = trim($_POST['prenom']);
	$adresse = trim($_POST['adresse']);
	$tel = trim($_POST['tel']);
	$poste = trim($_POST['poste']);
	$login = trim($_POST['login']);
	$password = trim($_POST['password']);
	$valide=0;	
		try{
			
        	$pdo = Database::connect();  
			$stmt = $pdo->prepare("INSERT INTO utilisateur (cni, nom, prenom, adresse, tel, posteoccupe, login, password, valide) VALUES(:cni1, :nom1, :prenom1, :adresse1, :tel1, :poste1, :login1, :password1, :valide1)");
			$stmt->bindParam(":cni1", $cni);
			$stmt->bindParam(":nom1", $nom);
			$stmt->bindParam(":prenom1", $prenom);
			$stmt->bindParam(":adresse1", $adresse);
			$stmt->bindParam(":tel1", $tel);
			$stmt->bindParam(":poste1", $poste);
			$stmt->bindParam(":login1", $login);
			$stmt->bindParam(":password1", $password);  
			$stmt->bindParam(":valide1", $valide);  
			if($stmt->execute())
			{
				echo "ok";     
			}
			else{ 
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

if(isset($_POST['numerotxt']))
	{ 
	$numero = $_POST['numerotxt'];
	$destinataire = $_POST['destinatairetxt'];
	$type1 = $_POST['typetxt'];
	$objet1 = $_POST['objettxt'];
	$services = $_POST['servicestxt'];
	$datec1 = $_POST['datectxt'];
	$date = $_POST['datetxt'];  
		try{
			
        	$pdo = Database::connect();  

			 $stmt0 = $pdo->prepare("SELECT id FROM utilisateur WHERE id=:id");
			$stmt0->execute(array(":id"=>$_SESSION['user_session']));
			$userRow0=$stmt0->fetch(PDO::FETCH_ASSOC); 
			$iduser = $userRow0['id']; 
 
			$stmt1 = $pdo->prepare("INSERT INTO courrierdepart (numc, destinataire, type, objet, serviceexpediteur, datec, dated, idU) VALUES(:numerod, :destinataired, :typed, :objetd, :servicesd, :datecd, :dated, :idu1)");
			$stmt1->bindParam(":numerod", $numero);
			$stmt1->bindParam(":destinataired", $destinataire);
			$stmt1->bindParam(":typed", $type1);
			$stmt1->bindParam(":objetd", $objet1);
			$stmt1->bindParam(":servicesd", $services);
			$stmt1->bindParam(":datecd", $datec1);
			$stmt1->bindParam(":dated", $date);   
			$stmt1->bindParam(":idu1", $iduser);   
			$stm=$stmt1->execute(); 
			if($stm)
			{
				echo "Utilisateur créer avec succé";    
                header("Location:home.php");

			}
			else{ 
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}else{
			echo("dddddddddddddd");
		}
//------------------------------------------------------------------------------------------------------------
	if(isset($_POST['numerotxt']))
	{ 
	$numero = $_POST['numerotxt'];
	$destinataire = $_POST['destinatairetxt'];
	$objet1 = $_POST['objettxt'];
	$services = $_POST['servicestxt'];
	$datec1 = $_POST['datectxt'];
	$date = $_POST['datetxt'];  
		try{
			
        	$pdo = Database::connect();  

			 $stmt0 = $pdo->prepare("SELECT id FROM utilisateur WHERE id=:id");
			$stmt0->execute(array(":id"=>$_SESSION['user_session']));
			$userRow0=$stmt0->fetch(PDO::FETCH_ASSOC); 
			$iduser = $userRow0['id']; 
 
			$stmt1 = $pdo->prepare("INSERT INTO courrierdepart (numc, destinataire, objet, serviceexpediteur, datec, dated, idU) VALUES(:numerod, :destinataired, :objetd, :servicesd, :datecd, :dated, :idu1)");
			$stmt1->bindParam(":numerod", $numero);
			$stmt1->bindParam(":destinataired", $destinataire);
			$stmt1->bindParam(":objetd", $objet1);
			$stmt1->bindParam(":servicesd", $services);
			$stmt1->bindParam(":datecd", $datec1);
			$stmt1->bindParam(":dated", $date);   
			$stmt1->bindParam(":idu1", $iduser);   
			$stm=$stmt1->execute();
			var_dump($stm); 
			if($stm)
			{
				echo "Utilisateur créer avec succé";    
                header("Location:home.php");

			}
			else{ 
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}else{
			echo("dddddddddddddd");
		}

?>