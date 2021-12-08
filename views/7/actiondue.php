<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'remboursementdu';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'dueadd'){

        $userData = array(
                'datedue' => $_POST['dater'],
                'periodedue' => $_POST['perioder'],
                'remboursementdue' => $_POST['remboursement'],
                'identreprise' => $_POST['idajoutremboursement'],
        );
        // var_dump($userData);

        $insert = $db->insert($tblName,$userData);
        // var_dump($insert);

        header("Location: https://ipmiez.com/apps/views/7/"); 
        // var_dump($userData);    
        // }

     }

}else{

echo($_REQUEST['action_type']);
}