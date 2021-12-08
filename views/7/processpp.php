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
        
        $userData = array(
                'cotisation' => $_POST['cotisation'],
                'datec' => $_POST['datec'],
                'periodec' => $_POST['periodec'],
                'remboursement' => $_POST['remboursement'],
                'dater' => $_POST['dater'],
                'perioder' => $_POST['perioder'],
                'refcheque' => $_POST['refcheque'],
                'valeurrefcheque' => $_POST['valeurrefcheque'],
                'banqueclient' => $_POST['banqueclient'],
                'recu' => $recu,
                'iduser' => $iduser,
                'entreprise_id' => $_POST['idpaiement']
        );
        var_dump($userData);

        $insert = $db->insert($tblName,$userData);
        var_dump($insert);

        header("Location: https://ipmiez.com/views/secretaire/"); 
        var_dump($userData);    
        // }

     }

}else{

echo($_REQUEST['action_type']);
}