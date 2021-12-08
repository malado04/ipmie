<?php
   session_start();

// if(!isset($_SESSION['user_session'])AND!isset($_SESSION['session_id']))
// {
//   header("Location: ../../pages/auth/index.php");
// } 
   require_once '../../../dao/database.php';

if (isset($_POST['delete_employeur'])) {
  
   $pid = $_POST['delete_employeur']; 
   $pdo = Database::connect();  
   // $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   // $query1 = "SELECT * FROM fournisseur, utilisateur WHERE utilisateur.utilisateur_id=fournisseur.idfournisseur AND id=:pid";
   // $stmt1 = $pdo->prepare($query1);
   // $stmt1->execute(array(':pid'=>$pid));
   // if($stmt1){

   $query = "DELETE FROM utilisateur WHERE id=:pid";
   $stmt = $pdo->prepare($query);
   $stmt->execute(array(':pid'=>$pid));
  
  if ($stmt) {
   echo ("Suppression effectuée avec succée ...");
  // }
   }
  
 } 

if (isset($_GET['id_desc'])) {
  require_once '../../../dao/DB.php';
   $db = new DB();
   $tblName = 'employer';
   $tblName1 = 'fournisseur';
   $pid = $_GET['id_desc']; 
   $activedesc = 0; 
   $arraydata = array(
      'activedesc' => $activedesc
   );
   $arraydata1 = array(
      'activedescfournisseur' => $activedesc
   );

   $condition = array('employeur_id' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);

   $condition1 = array('idfournisseur' => $pid);
   $update1 = $db->update($tblName1,$arraydata1,$condition1); 
      if ($update1) { 
         header('Location: success.php');
      } else {
        
      }
 }
// -------------------------------------------------------------------------------------------------------

if (isset($_GET['id_active'])) {
  require_once '../../../dao/DB.php';
   $db = new DB();
   $tblName = 'employer';
   $tblName1 = 'fournisseur';
   $pid = $_GET['id_active']; 
   $activedesc = 1; 
   $arraydata = array(
      'activedesc' => $activedesc
   );
   $arraydata1 = array(
      'activedescfournisseur' => $activedesc
   );

   $condition = array('employeur_id' => $pid);
   $update = $db->update($tblName,$arraydata,$condition);

   $condition1 = array('idfournisseur' => $pid);
   $update1 = $db->update($tblName1,$arraydata1,$condition1);

   // var_dump($update1);

      if ($update1) {
         # code...
         header('Location: success.php');
      } else {
         # code...
      }
 }


// if (isset($_POST['modifierEmployeur'])) {
//    $userData = array(
//     'cni'=> $_POST['cniemployeur'],
//     'nom'=> $_POST['nomemployeur'],
//     'prenom'=> $_POST['prenomemployeur'],
//     'telFixe'=> $_POST['telfixemployeur'],
//     'telPortable'=> $_POST['telportemployeur'],
//     'adresseCommune'=> $_POST['commune'],
//     'adresse'=> $_POST['quartier'],
//     'email'=> $_POST['email'],
//     'login'=> $_POST['login'],
//     'password'=> $_POST['password'] 
//    );
//    $condition = array('id' => $_POST['iduser']);
//    $tblName = 'utilisateur';
//   require_once '../DB.php';
//    $db = new DB();
//    $update = $db->update($tblName,$userData,$condition);
//    // var_dump($update);
//       if ($update) {
//          header('Location: success.php');
//       } else {
//          # code...
//          header('Location: success.php');
//       }
      

//  }

// ------------------------------------------fournisseur--------------------------------------------------------------------------------------------

 if(isset($_POST["raisonsocialeINSER"]))
 {  

   $pdo = Database::connect();       
   $stmt0 = $pdo->prepare("SELECT matriculefournisseur FROM fournisseur where matriculefournisseur=:matriculefournisseurv"); 
   $stmt0->execute(array(":matriculefournisseurv"=>$_POST["matricule"]));
   $row0 = $stmt0->fetch(PDO::FETCH_ASSOC);   
   if ($row0>0) {

      echo "Désolé "; echo($_POST["matricule"]); echo "  "; echo($_POST["raisonsociale"]);  echo "  "; 
      echo "Existe déja";

   } else{

      
         include '../../../dao/DB.php';
         $db = new DB();
         $tblName = 'fournisseur';
         $userData = array(

            'matriculefournisseur'=>$_POST["matricule"],
            'raisonSocialefournisseur'=>$_POST["raisonsocialeINSER"],
            'siglefournisseur'=>$_POST["siglefournisseur"],
            'numResgitrefournisseur'=>$_POST["numresgitrefournisseur"], 
            'nineafournisseur'=>$_POST["nineafournisseur"], 
            'dateImmatriculationfournisseur'=>$_POST["dateimmatriculationfournisseur"],
            'typeFournisseur'=>$_POST['typefournisseur']
        );
            $insert = $db->insert($tblName,$userData);
               if($insert)
var_dump($insert);               {   
                  header('Location: success.php'); 
               }          
               echo "sqsqsq";      

}
}


 if(isset($_POST["typefournisseurMOD"]))
 {  

         include '../../../dao/DB.php';
         $db = new DB();
         $tblName = 'fournisseur';
         $userData = array(

            'matriculefournisseur'=>$_POST["matricule"],
            'raisonSocialefournisseur'=>$_POST["raisonsociale"],
            'siglefournisseur'=>$_POST["siglefournisseur"],
            'numResgitrefournisseur'=>$_POST["numresgitrefournisseur"], 
            'nineafournisseur'=>$_POST["nineafournisseur"], 
            'dateImmatriculationfournisseur'=>$_POST["dateimmatriculationfournisseur"],
            'typeFournisseur'=>$_POST['typefournisseurMOD']
        );
   $condition = array('idfournisseur' => $_POST['pid']);

   $update = $db->update($tblName,$userData,$condition);
        
                  header('Location: success.php'); 
               
}


 if(isset($_POST["ajoutEmployeur"]))
 {  
   $cnip= $_POST["cniemployeur"];
   $nomemployeurp= $_POST["nomemployeur"];
   $prenomemployeurp= $_POST["prenomemployeur"];
   $telfixemployeurp= $_POST["telfixemployeur"];
   $telportemployeurp= $_POST["telportemployeur"];
   $specialite= $_POST["specialite"];
   $posteoccupep= $_POST["profil"];
   $quartierp= $_POST["email"];
   $emailp= $_POST["email"]; 
   $loginp= $_POST["login"];
   $passwordp= $_POST["password"];
   $idf= $_POST["idf"];
   $act= 1;
   $pdo = Database::connect();  
      $stmt0 = $pdo->prepare("SELECT cni FROM utilisateur WHERE cni=:cniv"); 
      $stmt0->execute(array(":cniv" =>$cnip));
      $row0 = $stmt0->fetch(PDO::FETCH_ASSOC);   
      if ($row0>0) {
         $_SESSION['error']="Cet utilisateur est déja attribuer à un utilisateur";
         header('Location: erreur.php');
      } else {
       
         include '../../../dao/DB.php';
         $db = new DB();
         $tblName = 'utilisateur';
         $userData = array(
            'cni'=>$cnip,
            'nom'=>$nomemployeurp,
            'prenom'=>$prenomemployeurp,
            'telFixe'=>$telfixemployeurp, 
            'telPortable'=>$telportemployeurp, 
            'specialite'=>$specialite, 
            'posteoccupe'=>$posteoccupep,  
            'email'=>$emailp,  
            'login'=>$loginp,  
            'fk_idfour'=>$idf,  
            'valide'=>$act,  
            'password'=>$passwordp,  
        );
         // var_dump($userData);
            $insert = $db->insert($tblName,$userData);
               if($insert)
               {   
                  header('Location: ./') ; 
               }else{
                  echo "requete";
               }  
      }
      

   
} 
?>