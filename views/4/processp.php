<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'paiement';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){

    if($_REQUEST['action_type'] == 'add'){
        if (empty($_POST['iduser'])) {
            $iduser=1;
        } else {
            $iduser=$_POST['iduser'];
            echo $iduser;
        }
        include_once 'database.php';  
        $pdo =Database::connect(); //on se connecte à la base 
        $stmt = $pdo->prepare("SELECT recu, idpaiement FROM paiement ORDER BY idpaiement DESC LIMIT 1");
        $stmt->execute(array(":id"=>$_SESSION['user_session']));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
         
        $recu=$userRow['recu']+1;
        echo $recu;

        if (empty($_POST['valeurrefcheque'])) {
            # code...
            $valeurrefcheque="espece";       
        
        $userData = array(
                'cotisation' => $_POST['cotisation'],
                'remboursement' => $_POST['remboursement'],
                'periode' => $_POST['periode'],
                'refcheque' => $_POST['refcheque'],
                'valeurrefcheque' => $valeurrefcheque,
                'banqueclient' => $_POST['banqueclient'],
                'recu' => $recu,
                'iduser' => $iduser,
                'entreprise_id' => $_POST['idpaiement']
        );
        $insert = $db->insert($tblName,$userData);
        header("Location: https://ipmiez.com/views/secretaire/"); 
        
        } else {
            $valeurrefcheque=$_POST['valeurrefcheque'];
             
        
        $userData = array(
                'cotisation' => $_POST['cotisation'],
                'remboursement' => $_POST['remboursement'],
                'periode' => $_POST['periode'],
                'refcheque' => $_POST['refcheque'],
                'valeurrefcheque' => $valeurrefcheque,
                'banqueclient' => $_POST['banqueclient'],
                'recu' => $recu,
                'iduser' => $iduser,
                'entreprise_id' => $_POST['idpaiement']
        );
        $insert = $db->insert($tblName,$userData);
        header("Location: https://ipmiez.com/views/secretaire/"); 
        var_dump($userData);    
        }

     }

}else{

echo($_REQUEST['action_type']);
}