<?php
session_start(); 

    if($_REQUEST['action_type'] == 'update'){
echo 'dsdsd';
         
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
                // 'recu' => $recu,
                'entreprise_id' => $_POST['idpaiement'],
                'iduser' => $_SESSION['user_session_ipmie']
        );

   $condition = array('idpaiement' => $_POST['idpaiement']);
  require_once 'DB.php';
   $db = new DB();
    $tblName = 'paiement';
   $update = $db->update($tblName,$userData,$condition);
var_dump($userData);
        header("Location: listepaiement.php"); 

     }

