<?php
	session_start();
	require_once 'database.php';

	if(isset($_POST['btn-login']))
	{ 
		$login = trim($_POST['user_login']);
		$password = trim($_POST['user_password']); 
		$valide=1; 
		try
		{
        $pdo = Database::connect();  
		$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE login=:login and password=:password and valide=:valide"); 
			$stmt->execute(array(":login"=>$login, ":password"=>$password, ":valide"=>$valide));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($row<0) {
				echo "Désolé votre compte n'a pas encore été valider!!!";
			} else { 
			$count = $stmt->rowCount(); 
			if($count > 0){    
			$poste=$row['posteoccupe'];
				switch ($poste) {
					case 'Gerant': $_SESSION['user_session_ipmie'] = $row['id'];echo(1); break; 
	                case 'Secretaire': $_SESSION['user_session_sescretaire'] = $row['id'];echo(2); break; 
	                case 'Employeur': $_SESSION['user_session_employeur'] = $row['id'];echo(3); break; 
	                case 'Employer': $_SESSION['user_session_employer'] = $row['id'];echo(4); break; 
	                case 'Inspecteur': $_SESSION['user_session_inspecteur'] = $row['id'];echo(5); break; 
	                case 'Comptable': $_SESSION['user_session_comptable'] = $row['id'];echo(6); break; 
	                case 'Pharmacie': $_SESSION['user_session_pharmacie'] = $row['id'];echo(8); break; 
	                case 'Docteur': $_SESSION['user_session_docteur'] = $row['id'];echo(9); break; 
					case 'Special': $_SESSION['user_session_special'] = $row['id']; echo(10); break;
					case 'Administrateur': $_SESSION['user_session'] = $row['id']; echo(11); break;
					case 'Gestionnaire de bon': $_SESSION['user_session_bon'] = $row['id']; echo(12); break;
					case 'Remboursement': $_SESSION['user_session_remboursement'] = $row['id']; echo(13); break;
				}
				
			}
			else{ 
 				// $_SESSION['sessionMessage']= "Vous n'avez pas de compte ici!"; 
 				// header('Location : https://ipmiez.com/');
			}
			}
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}else{
		echo "sssss";
	}
?>