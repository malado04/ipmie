<?php
   session_start();

// if(!isset($_SESSION['user_session'])AND!isset($_SESSION['session_idEmployeur']))
// {
//   header("Location: ../../pages/auth/index.php");
// } 
   require_once '../../dao/database.php';

  
 
 if(isset($_POST["ajoutEmployerp"]))
 {  
   $cnip= $_POST["cniemployer"];
   $nomemployerp= $_POST["nomemployer"];
   $prenomemployerp= $_POST["prenomemployer"];
   $telemployerp= $_POST["telemployer"];
   $emailemployerp= $_POST["emailemployer"];
   $nombredenfantemployerp= $_POST["nombredenfantemployer"];
   $nombredepouseemployerp= $_POST["nombredepouseemployer"];
   $salairep= $_POST["salaire"];
   $idemployeur_id=$_POST['idemployeur_id'];
   $pdo = Database::connect();   

   $stmt1 = $pdo->prepare("SELECT idEmployer,codeemployer FROM `employer` ORDER BY idEmployer DESC LIMIT 1 "); 
   $stmt1->execute(array());
   $row1 = $stmt1->fetch(PDO::FETCH_ASSOC); 
   $codeemployer= $row1['codeemployer']+1;  
     
   $stmt0 = $pdo->prepare("SELECT cniemployer, telEmployer FROM `employer` WHERE cniemployer=:cni AND telEmployer=:tel LIMIT 1"); 
   $stmt0->execute(array(":cni"=>$cnip, ":tel"=>$telemployerp));
   $row0 = $stmt0->fetch(PDO::FETCH_ASSOC);

   if ($row0>0) {
      echo "Désolé "; echo($nomemployerp); echo "  "; echo($prenomemployerp);  echo "  "; 
      echo "est déja enregistrer";
   } else { 
   echo  $_SESSION['session_idEntreprise'];

include 'DB.php';
$db = new DB();
$tblName = 'employer';
$userData = array(
            'codeemployer'=>$codeemployer,
                'cniemployer'=>$cnip,
               'nomEmployer'=>$nomemployerp,
               'prenomEmployer'=>$prenomemployerp, 
               'telEmployer'=>$telemployerp, 
               'emailEmployer'=>$emailemployerp, 
               'nombreEnfantEmployer'=>$nombredenfantemployerp,
               'nombreEpousesEmployer'=>$nombredepouseemployerp,
               'montant'=>$salairep,
               'employeur_id'=>$_POST['idemployeur_id']
        ); 
var_dump(($userData));
        $insert = $db->insert($tblName,$userData);

               if($insert)
               {   
                  header('Location: ../3/'); 
                  
                  // echo "1"; 
               } 
               else{
                  echo "requete"; 
                
   }
   
   // var_dump($userData);

 } 
} 

 
?>