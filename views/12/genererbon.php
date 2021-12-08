<?php
session_start();
  
if(!isset($_SESSION['user_session_bon']))
{
  // header("Location: ../../");
}

include_once '../../dao/database.php';
 
$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM employer, enfants, epouses WHERE employer.idEmployer=epouses.employer_id OR employer.idEmployer=enfants.employer_id AND idEmployer=:id_bon");
$stmt->execute(array(":id_bon"=>$_GET['id_bon']));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


$stmt1 = $pdo->prepare("SELECT * FROM employer WHERE idEmployer=:id_bon");
$stmt1->execute(array(":id_bon"=>$_GET['id_bon']));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);


 
// $pdo = Database::connect();  
// $stmt1 = $pdo->prepare("SELECT * FROM employeur, utilisateur WHERE employeur.utilisateur_idEmployeur=utilisateur.id AND id=:id");
// $stmt1->execute(array(":id"=>$_SESSION['user_session_bon']));
// $userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link rel="icon" type="icon" href="../../img/IPMIEZ.png">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="../../bootstrap/cdnjs/jquery-3.3.1.js"></script> 
  <meta name="author" content="">

  <title>IPM-IEZ</title>

  <!-- Custom fonts for this template-->
  <link href="../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
  .wrapper #img{ 
    width: 100%;
    top: 5%;
  }
.h{
text-align: left; color :orange;  /*color: #008080;*/font-family:"Cooper Black";font-weight:lighter;font-size: 43px;}
  h1{
    text-align: center;font-family: "Cooper Black";font-weight:lighter;font-size: 35px;color: #008080; 
  }
  #accordionSidebar, #content1, #content2{
   background-color:  #008080; 
   color: white;
  }
  .img1{
    padding: 6%;
    width: 100%;
  }
   .span{
    color: white;
   } 
  body{
    background-color: rgba(0,0,0,0.5);
  }
  footer{
position:absolute;   
background-color:  #008080; 

    width:100%;
    bottom:0px;  
  }
</style>
</head>

<body id="page-top">
<div class="container">
<div class="row">         
<!-- Ajouter un utilisateur -->
  <div class="col-md-12" id="ajoutEpouse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1800px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh">Générer un nouveau bon pour :  </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>     
        <form action="select_e_f.php" method="post" class="">   

   <div class="modal-body row">         
    <div class="col-md-8">
      <label>Bon de commande à délvré à :</label><!-- 
      <input type="text" name="delivrea" id="delivrea" class="form-control"  placeholder="Bon à délvré à" required /> <br/>   -->
      <input list="bondecommandepourluimm" class="form-control" name="id_beneficiaire_lui" value="<?php echo $userRow1['prenomEmployer']; echo " "; echo $userRow1['nomEmployer']; ?>" readonly>
 
      <label>Nom de l'épouse bénéficiaire</label>
      <input list="bondecommandepoursone" class="form-control" name="id_beneficiaire_fem">
      <datalist id="bondecommandepoursone">
       <?php  $pdo =Database::connect();
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                           $statement = $pdo->prepare("SELECT * FROM epouses, employer WHERE employer.idEmployer=epouses.employer_id AND idEmployer=:id_bon");  
                        $statement->execute(array(":id_bon"=>$_GET['id_bon']));  
                        $result = $statement->fetchAll();
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
                               <option value="<?php echo $row['idEpouses']; ?>"><?php echo $row['nomEpouses']; echo " "; echo $row['nomEpouses']; ?></option> 
                      <?php 
                         }
                        Database::disconnect();  
                     ?> 
      </datalist>  
      <label>Nom de l'enfant bénéficiaire</label>
      <input list="bondecommandepoursaf" class="form-control" name="id_beneficiaire_enf">
      <datalist id="bondecommandepoursaf">
       <?php  $pdo =Database::connect();

                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM employer, enfants WHERE employer.idEmployer=enfants.employer_id AND idEmployer=:id_bon");  
                        $statement->execute(array(":id_bon"=>$_GET['id_bon']));  
                        $result = $statement->fetchAll();
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
         <option value="<?php echo $row['idEnfants']; ?>"><?php echo $row['nomEnfants']; echo " "; echo $row['prenomEnfants']; ?></option> 
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>   
      <label>Ordonnance délivré par : </label>
      <input list="ordonnancedelivre" class="form-control" name="id_fournisseur">
      <datalist id="ordonnancedelivre">
       <?php  $pdo =Database::connect();

                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM fournisseur");  
                        $statement->execute(array());  
                        $result = $statement->fetchAll();
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
         <option value="<?php echo $row['idfournisseur']; ?>"><?php echo $row['raisonSocialefournisseur']; echo " "; echo $row['raisonSocialefournisseur']; ?></option> 
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>   

    </div> 
  <div class="col-md-4">
      <img class="rounded-circle img1" src="../../img/Profil/<?php echo $userRow1['image']; ?>" alt="Photo de profil"><br><br> 
      <b><i><u><?php echo $userRow1['prenomEmployer']; echo " ";  echo $userRow1['nomEmployer']; ?></u></i></b>
    </div>  
 
    </fieldset>


   </div> 
    <div class="modal-footer row">
            <div class="col-md-3">
              </div>
            <div class="col-md-4">
            <button type="submit" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
            <div class="col-md-4">
              <a href="./" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" >Annuler</a>
          </div>
          </div>
    </form>
    </div>
    </div> 
    </div>
    </div>   

        </div>
        <!-- /.container-fluid -->

      </div>
  
 --> -->      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div> 
 
  <!-- Bootstrap core JavaScript-->
  <script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../bootstrap/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../bootstrap/js/demo/chart-area-demo.js"></script>
  <script src="../../bootstrap/js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/responsive.bootstrap4.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/js/bootbox.min.js"></script>
<script type="text/javascript" src="script.js"></script>  
 

</body>

</html>
