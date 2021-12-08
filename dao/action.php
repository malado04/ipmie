<?php
session_start();
include 'DB.php';
$db = new DB();
$tblName = 'utilisateur';
if(isset($_POST['cni'])){
        $userData = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'cni' => $_POST['cni'],
                'tel' => $_POST['tel'],
                'posteoccupe' => $_POST['profil'],
                'login' => $_POST['email'],
                'password' => $_POST['user_password']
        );
      // var_dump($userData);
      // var_dump($db);
    $insert = $db->insert($tblName,$userData);
    if ($insert>0) {
        $to      = $_POST['email'];
        $subject = 'Validation de compte IPM-IEZ';
        $message = 'Bonjour '.$_POST["nom"].' '.$_POST["prenom"].' Votre compte a été crée.  Veuillez contacter l\'administrateur du site pour sa validation au +221 77 529 62 66.  Merci de votre collaboration!';
        $headers = 'From: adamaseydi@ipmiez.com' . "\r\n" .
            'Reply-To: adamaseydi@ipmiez.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        header('Location: ../verif.html');
         
    } else {
        # code...
    }
    
}