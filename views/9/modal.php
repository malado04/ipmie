<?php
session_start();
  
if(!isset($_SESSION['user_session_bon']))
{
  // header("Location: ../../");
}

include_once '../../dao/database.php';
 
$pdo = Database::connect();  
$stmt1 = $pdo->prepare("SELECT * FROM employer WHERE idEmployer=:id_bon");
$stmt1->execute(array(":id_bon"=>$_POST['id']));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);
if (($userRow1['idEmployer'])==null) {
  header('Location: ./?id=404');
}

 
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

        <link rel="stylesheet" href="docs/css/bootstrap-4.5.2.min.css" type="text/css">
        <link rel="stylesheet" href="docs/css/bootstrap-example.min.css" type="text/css">
        <link rel="stylesheet" href="docs/css/prettify.min.css" type="text/css">
        <link rel="stylesheet" href="docs/css/fontawesome-5.15.1-web/all.css" type="text/css">

        <script type="text/javascript" src="docs/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="docs/js/bootstrap.bundle-4.5.2.min.js"></script>
        <script type="text/javascript" src="docs/js/prettify.min.js"></script>

        <link rel="stylesheet" href="dist/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="dist/js/bootstrap-multiselect.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                window.prettyPrint() && prettyPrint();
            });
        </script>

        <style>
            .nav-link.active {
                font-weight: bold;
            }

            .badge {
                font-size: 85%;
            }
            .option{
              font-family: "Times New Rom";
            }
            .img1{
              width: 100%;
              height: 95%;

            }
        </style>
  <meta name="author" content="">

  <title>IPM-IEZ</title>

  <!-- Custom fonts for this template-->
  <link href="../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
 
</head>

<body id="page-top">
 
<div class="container">

<div class="" id="id_consultation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-hand-holding-medical"> <b>Identification malade</b></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="consultation.php" method="post">
        <div class="modal-body row">
       
         </script>
      <div class="col-md-8">
          <label>Bon de commande à délvré à :</label><!-- 
          <input type="text" name="delivrea" id="delivrea" class="form-control"  placeholder="Bon à délvré à" required /> <br/>   -->
        <input list="bondecommandepourluimm" class="form-control" name="id_beneficiaire_lui" value="<?php echo $userRow1['prenomEmployer']; echo " "; echo $userRow1['nomEmployer']; ?>" readonly>
     
          <label>Nom de l'épouse ou de l'enfant bénéficiaire</label>
          <select class="form-control" name="id_beneficiaire" id="id_beneficiaire">
           <?php  $pdo =Database::connect();
                          $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                          $statement = $pdo->prepare("SELECT *, nomEpouses, prenomEpouses, employer_id FROM epouses, employer WHERE employer.idEmployer=epouses.employer_id AND idEmployer=:id");  
                          $statement->execute(array(":id"=>$_POST['id']));  
                          $result = $statement->fetchAll();
                            foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                          ?>
                          <optgroup label="Epouse ">
                                   <option value="<?php echo "Epouse ";  echo" "; echo $row['idEpouses']; echo " / "; echo $row['nomEpouses']; echo " / "; echo $row['prenomEpouses'];?>"><?php echo $row['nomEpouses']; echo " "; echo $row['nomEpouses']; ?></option> 
                          </optgroup>
                          <?php 
                             }
                         ?> 
                          <?php  
                          $statement = $pdo->prepare("SELECT * FROM employer, enfants WHERE employer.idEmployer=enfants.employer_id AND idEmployer=:id");  
                          $statement->execute(array(":id"=>$_POST['id']));  
                          $result = $statement->fetchAll();
                            foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                          ?>
                          <optgroup label="Enfant ">
                            <option value="<?php echo "Enfant "; echo" "; echo $row['idEnfants']; echo " / "; echo $row['nomEnfants']; echo " / "; echo $row['prenomEnfants']; ?>"><?php echo $row['nomEnfants']; echo " "; echo $row['prenomEnfants']; ?></option> 
                            
                          </optgroup>
                          <?php 
                            }
                            Database::disconnect();  
                         ?> 
          </select> 
        </div> 
        <div class="col-md-4  text-center">
          <img class="rounded-circle img1" src="http://localhost/apps/img/employer/<?php echo $userRow1['image']; ?>" alt="<?php echo $userRow1['image']; ?>"><br> 
          <b><i><u class=""> <?php echo $userRow1['prenomEmployer']; echo " ";  echo $userRow1['nomEmployer']; ?></u></i></b>
        </div>  
          </div>
          <div class="modal-footer bg-primary text-white">
            <input type="hidden" class="form-control" name="id" value="<?php echo $userRow1['idEmployer'];?>">
            <a href="./"class="btn btn-danger" >Retour</a>
            <button type="submit" class="btn btn-primary text-white">Suivant  </button>
          </div>
      </form> 
    </div>
  </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
    </div>
    <!-- End of Content Wrapper -->

  </div> 
 
  <!-- Bootstrap core JavaScript-->
  <script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../bootstrap/js/sb-admin-2.min.js"></script>
  <!-- Page level custom scripts -->
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
 

</body>

</html>
