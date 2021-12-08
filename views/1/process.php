<?php
   session_start();

// if(!isset($_SESSION['user_session_ipmie'])AND!isset($_SESSION['session_idEmployeur']))
// {
//   header("Location: ../../pages/auth/index.php");
// } 
   require_once '../../dao/database.php';

if (isset($_POST['deleteemployeur'])) {
  
   $pid = $_POST['deleteemployeur']; 
   $pdo = Database::connect();  
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   $query1 = "SELECT * FROM entreprise, utilisateur WHERE utilisateur.id=entreprise.employeur_id AND id=:pid";
   $stmt1 = $pdo->prepare($query1);
   $stmt1->execute(array(':pid'=>$pid));
   if($stmt1){

   $query = "DELETE FROM utilisateur WHERE id=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
  
  if ($stmt) {
   echo ("Suppression effectuée avec succée ...");
  }
   }
  
 }

if (isset($_POST['deletepaiement'])) {
  
   $pid = $_POST['deletepaiement']; 
    
   $pdo = Database::connect();  
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   $query = "DELETE FROM paiement WHERE idpaiement=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
  
  if ($stmt) {
   echo ("Suppression effectuée avec succée ...");
  
 }
 }
if (isset($_POST['valideruser'])) {
  require_once '../../dao/DB.php';
   $db = new DB();
   $tblName = 'utilisateur';
   $pid = $_POST['valideruser']; 
   $valide = 1; 
   $userData = array(
      'valide' => $valide
   );
   $condition = array('id' => $pid);
   $update = $db->update($tblName,$userData,$condition);
      echo ("Validation effectuée avec succée ...");

 }

// 

if (isset($_GET['id_desc'])) {
  require_once '../../dao/DB.php';
   $db = new DB();
   $tblName = 'employer';
   $pid = $_GET['id_desc']; 
   $activedesc = 0; 
   $arraydata = array(
      'activedesc' => $activedesc
   );
   $condition = array('idEmployer' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);
      if ($update) {
         # code...
         header('Location: success.php');
      } else {
         # code...
         var_dump($activedesc);
      }
 }
if (isset($_GET['id_active'])) {
  require_once '../../dao/DB.php';
   $db = new DB();
   $tblName = 'employer';
   $pid = $_GET['id_active']; 
   $activedesc = 1; 
   $arraydata = array(
      'activedesc' => $activedesc
   );
   $condition = array('idEmployer' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);
      if ($update) {
         # code...
         header('Location: success.php');
      } else {
         # code...
         var_dump($activedesc);
      }
      

 }


if (isset($_POST['modifierEmployeur'])) {
   $userData = array(
'cni'=> $_POST['cniemployeur'],
'nom'=> $_POST['nomemployeur'],
'prenom'=> $_POST['prenomemployeur'],
'telFixe'=> $_POST['telfixemployeur'],
'telPortable'=> $_POST['telportemployeur'],
'adresseCommune'=> $_POST['commune'],
'adresse'=> $_POST['quartier'],
'email'=> $_POST['email'],
'login'=> $_POST['login'],
'password'=> $_POST['password'] 
   );
   $condition = array('id' => $_POST['iduser']);
   $tblName = 'utilisateur';
  require_once 'DB.php';
   $db = new DB();
   $update = $db->update($tblName,$userData,$condition);
   // var_dump($update);
      if ($update) {
         header('Location: success.php');
      } else {
         # code...
         header('Location: success.php');
      }
      

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
   $tblName = 'utilisateur';
  require_once 'DB.php';
   $db = new DB();
   $update = $db->update($tblName,$userData,$condition);
   var_dump($userData);
      if ($update>0) {
         echo "string";
         header('Location: success.php');
      } else {
         header('Location: success.php');
         echo "string";
         
         # code...
  // header("Location: https://ipmiez.com/apps/");
      }
      

 }

if (isset($_POST['modifierProfil'])) {

   // $userData = array(
   // 'cni'=> $_POST['cniemployeurmod'],
   // 'nom'=> $_POST['nomemployeurmod'],
   // 'prenom'=> $_POST['prenomemployeurmod'],
   // 'telFixe'=> $_POST['telfixemployeurmod'],
   // 'telPortable'=> $_POST['telportemployeurmod'],
   // 'adresseCommune'=> $_POST['communemod'],
   // 'adresse'=> $_POST['quartiermod'],
   // 'email'=> $_POST['emailmod'],
   // 'login'=> $_POST['loginmod'],
   // 'password'=> $_POST['passwordmod'] 
   //    );
     //  $condition = array('id' => $_POST['iduser']);
     //  $tblName = 'utilisateur';
     // require_once 'DB.php';
     //  $db = new DB();
     //  $update = $db->update($tblName,$userData,$condition);
      // var_dump($userData);
         if ($update>0) {
            echo "<META http-equiv='refresh' content='0; URL=success.php'>";
         } else {
            echo "<META http-equiv='refresh' content='0; URL=success.php'>";
         }
    }
  
 if(isset($_POST["ajoutEmployeur"]))
 {  
   $cnip= $_POST["cniemployeur"];
   $nomemployeurp= $_POST["nomemployeur"];
   $prenomemployeurp= $_POST["prenomemployeur"];
   $telfixemployeurp= $_POST["telfixemployeur"];
   $telportemployeurp= $_POST["telportemployeur"];
   $communep= $_POST["commune"];
   $quartierp= $_POST["quartier"];
   $emailp= $_POST["email"]; 
   $loginp= $_POST["login"];
   $passwordp= $_POST["password"];
   $idutilisateur=$_SESSION['user_session_ipmie'];
   $posteoccupep="Employeur";
   $pdo = Database::connect();  
      $stmt0 = $pdo->prepare("SELECT cni FROM utilisateur WHERE cni=:cniv"); 
      $stmt0->execute(array(":cniv" =>$cnip));
      $row0 = $stmt0->fetch(PDO::FETCH_ASSOC);   
      if ($row0>0) {
         echo "Ce cni est déja attribuer à un employeur";
      } else {
       
         include 'DB.php';
         $db = new DB();
         $tblName = 'utilisateur';
         $userData = array(
            'cni'=>$cnip,
            'nom'=>$nomemployeurp,
            'prenom'=>$prenomemployeurp,
            'telFixe'=>$telfixemployeurp, 
            'telPortable'=>$telportemployeurp, 
            'adresseCommune'=>$communep, 
            'adresse'=>$quartierp,  
            'posteoccupe'=>$posteoccupep,  
            'email'=>$emailp,  
            'login'=>$loginp,  
            'password'=>$passwordp,  
        );
         // var_dump($userData);
            $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                 $stmt2 = $pdo->prepare("SELECT id, cni FROM utilisateur WHERE cni=:cniv"); 
                  $stmt2->execute(array(":cniv" =>$cnip));
                  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC); 
                  $_SESSION['session_idEmployeur'] = $row2['id'];
                  echo $_SESSION['session_idEmployeur'] ;
                  header('Location: ajoutEntreprise.php') ; 
               }else{
                  echo "requete";
               }  
      }
      

   
} 
// *******************************************************************************************************************************************

 if(isset($_POST["raisonsociale"]))
 {  

   $pdo = Database::connect();       
   $stmt0 = $pdo->prepare("SELECT matriculeEntreprise, raisonSociale, sigleEntreprise, numResgitreEntreprise, nineaEntreprise FROM entreprise  WHERE matriculeEntreprise=:matriculeEntreprisev AND raisonSociale=:raisonSocialev AND numResgitreEntreprise=:numResgitreEntreprisev AND nineaEntreprise=:nineaEntreprisev LIMIT 1"); 
   $stmt0->execute(array(":matriculeEntreprisev"=>$_POST["numresgitreentreprise"],":raisonSocialev"=>$_POST["raisonsociale"],":numResgitreEntreprisev"=>$_POST["numresgitreentreprise"], ":nineaEntreprisev"=>$_POST["nineaentreprise"]));
   $row0 = $stmt0->fetch(PDO::FETCH_ASSOC);   
   if ($row0>0) {

      echo "Désolé "; echo($nomemployerp); echo "  "; echo($prenomemployerp);  echo "  "; 
      echo "Existe déja";

   } else{

   if (isset($_POST['idEmployeur']) AND !empty($_POST['idEmployeur'])) {
      $idEmployeurp= $_POST['idEmployeur'];
      
         include 'DB.php';
         $db = new DB();
         $tblName = 'entreprise';
         $userData = array(

            'matriculeEntreprise'=>$_POST["matricule"],
            'raisonSociale'=>$_POST["raisonsociale"],
            'sigleEntreprise'=>$_POST["sigleentreprise"],
            'numResgitreEntreprise'=>$_POST["numresgitreentreprise"], 
            'nineaEntreprise'=>$_POST["nineaentreprise"], 
            'dateImmatriculationEntreprise'=>$_POST["dateimmatriculationentreprise"], 
            'hommeEntreprise'=>$_POST["hommeentreprise"],  
            'femmeEntreprise'=>$_POST["femmeEntreprise"],  
            'periodeTravailEntreprise'=>$_POST["periodeTravailEntreprise"],  
            'datePeriodeTravail'=>$_POST["dateperiodetravail"],  
            'employeur_id'=>$idEmployeurp            
        );
         // var_dump($userData);
         // $_SESSION['mala']="éééééééé";
         // echo $_SESSION['session_idEmployeur'];
            $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                 $stmt2 = $pdo->prepare("SELECT idEntreprise, matriculeEntreprise FROM entreprise WHERE matriculeEntreprise=:matricule"); 
                  $stmt2->execute(array(":matricule" =>$_POST["matricule"]));
                  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC); 
                  $_SESSION['session_idEntreprise'] = $row2['idEntreprise'];
                  echo $_SESSION['session_idEntreprise']; 
                  header('Location: ajoutEmployer.php'); 
               }                
            }

}
}
//*********************************************************************************************************************************************

 
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
   // echo  $_SESSION['session_idEntreprise'];

  include 'DB.php';
  $db = new DB();
  $tblName = 'employer';
 
  $imgFile = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
  $temp  = $_FILES["image"]["tmp_name"];

  $upload_dir ="../../img/employer/".$imgFile; //set upload folder path
  move_uploaded_file($tmp_dir, "../../img/employer/" .$imgFile); //move upload file temperory directory to your upload folder
   
  $userData = array(
            'image'=>$imgFile,
            'codeemployer'=>$codeemployer,
            'cniemployer'=>$cnip,
            'nomEmployer'=>$nomemployerp,
            'prenomEmployer'=>$prenomemployerp, 
            'telEmployer'=>$telemployerp, 
            'emailEmployer'=>$emailemployerp, 
            'sex'=>$_POST['sex'],
            'nombreEnfantEmployer'=>$nombredenfantemployerp,
            'nombreEpousesEmployer'=>$nombredepouseemployerp,
            'montant'=>$salairep,
            'employeur_id'=>$_POST['idEntreprise']
  ); 

  var_dump($userData);
  $insert = $db->insert($tblName,$userData);
  $_SESSION['session_employer']=$cnip;

               if($insert)
               {   
                  header('Location: ajoutEpouse.php'); 
                  
                  // echo "1"; 
               } 
               else{
                  echo "requete"; 
                
   }
   
   // var_dump($userData);

 } 
}

/*********************************************************************************************************************************************************/

 
 if(isset($_POST["idEntreprise"]))
 {  
   $cnip= $_POST["cniemployer"];
   $nomemployerp= $_POST["nomemployer"];
   $prenomemployerp= $_POST["prenomemployer"];
   $telemployerp= $_POST["telemployer"];
   $emailemployerp= $_POST["emailemployer"];
   $nombredenfantemployerp= $_POST["nombredenfantemployer"];
   $nombredepouseemployerp= $_POST["nombredepouseemployer"];
   $salairep= $_POST["salaire"];
   $pdo = Database::connect();  
   // $stmt2 = $pdo->prepare("SELECT idEmployeur FROM `employeur` ORDER BY idEmployeur DESC LIMIT 1 "); 
   // $stmt2->execute(array());
   // $row2 = $stmt2->fetch(PDO::FETCH_ASSOC); 
   // $idEmployeur= $row2['idEmployeur'];  

   $stmt1 = $pdo->prepare("SELECT idEmployer,codeemployer FROM `employer` ORDER BY idEmployer DESC LIMIT 1 "); 
   $stmt1->execute(array());
   $row1 = $stmt1->fetch(PDO::FETCH_ASSOC); 
   $codeemployer= $row1['codeemployer']+1;  
     

   $stmt0 = $pdo->prepare("SELECT cniemployer, telEmployer FROM `employer` WHERE cniemployer=:cni AND telEmployer=:tel  LIMIT 1"); 
   $stmt0->execute(array(":cni"=>$cnip, ":tel"=>$telemployerp));
   $row0 = $stmt0->fetch(PDO::FETCH_ASSOC); 
   // var_dump($codeemployer);
   if ($row0>0) {
      echo "Désolé "; echo($nomemployerp); echo "  "; echo($prenomemployerp);  echo "  "; 
      echo "est déja enregistrer";
   } else { 

   include 'DB.php';
   $db = new DB();
   $tblName = 'employer';
 
//   $imgFile = $_FILES['image']['name'];
//   $tmp_dir = $_FILES['image']['tmp_name'];
//   $imgSize = $_FILES['image']['size'];
//   $temp  = $_FILES["image"]["tmp_name"];

//   $upload_dir ="../../img/employer/".$imgFile; //set upload folder path
//   move_uploaded_file($tmp_dir, "../../img/employer/" .$imgFile); //move upload file temperory directory to your upload folder
   
  $userData = array(
            // 'image'=>$imgFile,
               'codeemployer'=>$codeemployer,
               'cniemployer'=>$cnip,
               'nomEmployer'=>$nomemployerp,
               'prenomEmployer'=>$prenomemployerp, 
               'telEmployer'=>$telemployerp, 
               'sex'=>$_POST['sex'],
               'emailEmployer'=>$emailemployerp, 
               'nombreEnfantEmployer'=>$nombredenfantemployerp,
               'nombreEpousesEmployer'=>$nombredepouseemployerp,
               'montant'=>$salairep,
               'employeur_id'=>$_POST['idEntreprise']
           );
           var_dump($userData);

         $_SESSION['session_employer']=$cnip;
         $insert = $db->insert($tblName, $userData);

               if($insert)
               { 

                  header('Location: ajoutEpouse_suivant.php'); 
               }else{
                  echo "requete"; 

   }
                 
   

 } 
}



// EPOUSES----------------------------------------------------------------
if (isset($_POST['ajoutEpouse'])) {
   
include 'DB.php';
$db = new DB();
$tblName = 'epouses';
  $imgFile = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
  $temp  = $_FILES["image"]["tmp_name"];

  $upload_dir ="../../img/Profil/".$imgFile; //set upload folder path
    move_uploaded_file($tmp_dir, "../../img/epouse/" .$imgFile); //move upload file temperory directory to 

$userData = array(
            'image'=>$imgFile,
            'nomEpouses'=>$_POST['nomepouses'],
            'prenomEpouses'=>$_POST['prenomepouses'],
            'sex'=>$_POST['sex'],
            'dateNaissanceEpouses'=>$_POST['datenaissepouses'],
            'dateMariage'=>$_POST['datemariage'], 
            'numeroActeMariage'=>$_POST['numeroactemariage'],  
            'employer_id'=>$_POST['idEmployer']
        ); 
var_dump(($userData));
        $insert = $db->insert($tblName,$userData);
 var_dump($insert);
               if($insert)
               {   
                  header('Location: ajoutEpouse1.php?id='.$_POST["idEmployer"]); 
                  
                  // echo "1"; 
               } 
               else{
                  echo "requete"; 
                
   }
   
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

$userData = array(
            // 'image'=>$_POST['image'],
            'nomEnfants'=>$_POST['nomenfant'],
                'prenomEnfants'=>$_POST['prenomenfant'],
                'sex'=>$_POST['sex'],
               'dateNaissanceEnfants'=>$_POST['datenaissanceenfant'],
               'LieuNaissanceEnfants'=>$_POST['lieunaissanceenfant'], 
               'numeroRegistreEnfants'=>$_POST['numeroregistre'],  
               'employer_id'=>$_POST['idEmployer']
        ); 
        $insert = $db->insert($tblName,$userData);
 
               if($insert)
               {   
                  header('Location: ajoutEnfant1.php?id='.$_POST["idEmployer"]); 
               } 
               else{
                  echo "requete"; 
                
   }
   
} else {
   # code...
}

 
?>