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
              height: 100%;

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
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-hand-holding-medical"> <b>Consultation malade</b></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="process.php" method="post">
        <div class="modal-body row">
        <div class="col-md-6 text-center">
          <img class=" img1" src="http://localhost/apps/img/employer/<?php echo $userRow1['image']; ?>" alt="<?php echo $userRow1['image']; ?>"><br><br> 
          <b><i><u class=""> <?php echo $userRow1['prenomEmployer']; echo " ";  echo $userRow1['nomEmployer']; ?></u></i></b>
        </div>  
        <?php 
            $ex= explode(" ", $_POST['id_beneficiaire']);
            if ($ex[0]=="Epouse") { 
          ?>
        <div class="col-md-6 text-center">
          <img class=" img1" src="http://localhost/apps/img/employer/<?php echo $userRow1['image']; ?>" alt="<?php echo $userRow1['image']; ?>"><br> <br>
          <b><i><u class=""> Epouse de <?php echo $userRow1['prenomEmployer']; echo " ";  echo $userRow1['nomEmployer']; ?></u></i></b>
        </div>  
         <?php 
            } else {
              
          ?>
        <div class="col-md-4  text-center">
          <img class=" img1" src="http://localhost/apps/img/employer/<?php echo $userRow1['image']; ?>" alt="<?php echo $userRow1['image']; ?>"><br> 
          <b><i><u class=""> Enfant de <?php echo $userRow1['prenomEmployer']; echo " ";  echo $userRow1['nomEmployer']; ?></u></i></b>
        </div>  
         <?php 
            }
            
         ?>

      <div class="col-md-12">  <br>
          <label>Poids :</label>
          <input type="number" name="poids" id="poids" class="form-control"  placeholder="Poids du malade" required step="0.01" /> <br/>
          <label>Température :</label>
          <input type="number" name="temp" id="temp" class="form-control"  placeholder="Température du malade" required step="0.01" /> <br/>
          <label>Tension :</label>
          <div class="row">
            <div class="col-md-5">
          <input type="number" name="tension" id="tension" class="form-control"  placeholder="Tension du malade" required step="0/01" /> 
            </div> <b>/</b>
            <div class="col-md-6">
          <input type="number" name="tension1" id="tension1" class="form-control"  placeholder="Tension du malade" required step="0/01" /> 
            </div>
          </div><br/>  
         
          </div>
          <div class="col-md-12">
            <select class="form-control" id="main" name="main">
              <option value="Main droite">Main droite</option>
              <option value="Main gauche">Main gauche</option>
            </select>
          </div>
          </div>
          <div class="modal-footer bg-primary text-white">
            <input type="hidden" class="form-control" name="idE" value="<?php echo $userRow1['idEmployer'];?>">
            <input type="hidden" class="form-control" name="codeEmployer" value="<?php echo $userRow1['codeemployer'];?>">
            <input type="hidden" class="form-control" name="id_str_b_fem" value="<?php echo $_POST['id_beneficiaire'];?>">
            <input type="hidden" class="form-control" name="parent" value="<?php echo $userRow1['codeemployer'];?>">
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
