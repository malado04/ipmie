<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'paiement';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){

    if($_REQUEST['action_type'] == 'add'){
        
        include_once 'database.php';  
        $pdo =Database::connect(); //on se connecte à la base 
        $stmt = $pdo->prepare("SELECT recu, idpaiement FROM paiement ORDER BY idpaiement DESC LIMIT 1");
        $stmt->execute(array());
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
         
        $recu=$userRow['recu']+1;
        
        $datetime=date('Y-m-d');
        $dateymdY= explode("-", $datetime);
        
        $userData = array(
                'cotisation' => $_POST['cotisation'],
                'datec' => $_POST['datec'],
                'periodec' => $_POST['periodec'],
                'remboursement' => $_POST['remboursement'],
                'dater' => $_POST['dater'],
                'perioder' => $_POST['perioder'],
                'refcheque' => $_POST['refcheque'],
                'datecheque' => $_POST['datecheque'],
                'valeurrefcheque' => $_POST['valeurrefcheque'],
                'banqueclient' => $_POST['banqueclient'],
                'recu' => $recu,
                'trie_annee' => $dateymdY['0'],
                'trie_mois' => $dateymdY['1'],
                'trie_jour' => $dateymdY['2'],
                'entreprise_id' => $_POST['idpaiement'],
                'iduser' => $_SESSION['user_session_sescretaire']
        );
        // var_dump($userData);
        $insert = $db->insert($tblName,$userData);

        header("Location: success.php?page=paiement"); 

     }

}else{

echo($_REQUEST['action_type']);
}