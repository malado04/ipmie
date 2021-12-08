<?php
session_start();

include_once '../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_employeur'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$pdo = Database::connect();  
$stmt1 = $pdo->prepare("SELECT * FROM utilisateur, entreprise WHERE utilisateur.id=entreprise.idEntreprise AND id=:id AND valide=:valide");
$stmt1->execute(array(":id"=>$_SESSION['user_session_employeur'], ":valide"=>$valide));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_employeur']))
{
  header("Location: ../../");
}

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
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar"> 
      <li>
            <img class="img1" src="../../img/IPMIEZ.png"> 
      </li>
      <!-- Divider -->
      <hr id="hr" class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="./">
          <span>Accueil</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">
  
                            
      <div class="sidebar-heading">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <?php 
 
           ?>
      </div> <div class="sidebar-heading">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          Déconnexion
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Se déconnecter</span>
        </a>
        <div id="collapsePages" class="collapse alert-danger" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="logout.php"><i class="fas fa-fw fa-sign-out-alt"> Se déconnecter ici !</i> </a> 
          </div>
        </div>
      </li>
      <!-- Navs Item - employeurs et employers -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-users"></i>
          <!-- <span  data-toggle="modal" data-target="#listeEmployer">Employers</span></a> -->
      </li>
    <!--  <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-users"></i>
          <span>Employers</span></a>
      </li>
 
-->
      <!-- Nav Item - statistique -->
      <hr> <h6 class="text-white"><b><i>Impression cotisations</i></b></h6>
      <hr>
      <li class="nav-item">
        <a class="nav-link" href="print_cotisation.php?id=<?php echo $userRow1['id']; ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Cotisation mensulle</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="print_cotisationsemestre.php?id=<?php echo $userRow1['id']; ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Cotisation semestrielle</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="print_cotisationtrimestre.php?id=<?php echo $userRow1['id']; ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Cotisation trimestrielle</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="print_cotisationannee.php?id=<?php echo $userRow1['id']; ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Cotisation annuelle</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav id="content2" class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
      <h3 class="h">Bienvenue :  <?php echo $userRow['nom']; echo " "; echo $userRow['prenom']; echo " | <i class='fas fa-user fa-fw'></i> "; echo $userRow['posteoccupe']; ?></h3>

                             ?></h3>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
 
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" id="content1">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">                     
                  <h5 class="card-title">Bienvenu (e) : <?php echo($userRow['nom']); echo" "; echo($userRow['prenom']); ?></h5>
                </span>
                <img class="img-profile rounded-circle small" src="192.168.1.155/apps/IPMIEZ.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Réglages
                </a> 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Se déconnecter
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
 
        <!-- /.container-fluid -->
<div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ajoutEmployer"><i class="fas fa-download fa-sm text-white-50"></i> Ajouter un employer</a>
                  </div>';   
<?php include 'ajoutEmployer.php' ?>
<dic class="container">
  <?php 
     $pdo = Database::connect();  
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
   $stmt1 = $pdo->prepare("SELECT *, SUM(montant) AS montantc FROM utilisateur, entreprise, employer WHERE utilisateur.id=entreprise.employeur_id AND  entreprise.idEntreprise= employer.employeur_id AND id=:id");
                  $stmt1->execute(array("id"=>$_SESSION['user_session_employeur']));
                  $row2 = $stmt1->fetch(PDO::FETCH_ASSOC); 
   $stmt2 = $pdo->prepare("SELECT *, SUM(remboursementdue) AS remboursementdue FROM utilisateur, entreprise, remboursementdu WHERE utilisateur.id=entreprise.employeur_id AND  entreprise.idEntreprise= remboursementdu.identreprise AND id=:id");
                  $stmt2->execute(array("id"=>$_SESSION['user_session_employeur']));
                  $row4 = $stmt2->fetch(PDO::FETCH_ASSOC); 
// SELECT * FROM entreprise, remboursementdu WHERE entreprise.idEntreprise=remboursementdu.identreprise

    // $created=date('m');
    //     $stmt3 = $pdo->prepare("SELECT *, SUM(montant) AS montantc  FROM utilisateur, entreprise, employer WHERE utilisateur.id=entreprise.employeur_id AND entreprise.idEntreprise= employer.employeur_id AND id=:id");

    // $stmt3 = $pdo->prepare("SELECT *, SUM(montant) AS montantc FROM paiement,utilisateur, entreprise WHERE utilisateur.id=entreprise.employeur_id AND  entreprise.idEntreprise= paiement.entreprise_id AND id=:id AND createad=:created");
    // $stmt3->execute(array("id"=>$row4['idEntreprise'], "createad"=>$created));
    // $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
    // if ($row3) {
 ?>

    <?php        
    // } else {
 ?>
 <!-- 
LE REMBOURSEMENT DOIT EGALE à la somme des versements - la somme des remboursements
  -->
  <!-- <h1 class="alert-danger"> Votre cotisation s'élève à : <?php echo $row3['montantc']*7/100; ?> FCFA et votre remboursement à : <?php echo $row3['remboursementdue']; ?> FCFA</h1> -->

    <?php  
      
    // }
    
    ?>
  <table id="listeEmployert" class="table table-hover table-striped table-bordered" style="width:100%">

 <thead>
            <tr>  
              <th>Code</th>
              <th>CNI</th>
              <th>Nom</th>
              <th>Prénom</th> 
              <th>Téléphone</th> 
              <th>Email</th>    
              <th>Salaire</th> 
              <th>Cotisation</th> 
            </tr>
</thead>
<tbody>
                        <?php  
                        $pdo =Database::connect();  
                        $pid=1;
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM entreprise, employer WHERE entreprise.idEntreprise= employer.employeur_id AND idEntreprise=:id ORDER BY idEmployer DESC");  
                        $statement->execute(array("id"=>$userRow1['idEntreprise']));  
                        $result = $statement->fetchAll();
                       
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr>';
                            echo '<td>' . $row['codeemployer'] . '</td>';
                            echo '<td>' . $row['cniemployer'] . '</td>';
                            echo '<td>' . $row['nomEmployer'] . '</td>';
                            echo '<td>' . $row['prenomEmployer'] . '</td>';  
                            echo '<td>' . $row['telEmployer'] . '</td>'; 
                            echo '<td>' . $row['emailEmployer'] . '</td>';   
                            echo '<td>' . $row['montant'] . '</td>';             
                            echo '<td>' . $row['montant']*7/100 . '</td>';             
                        echo '</tr>'; 
                        }
                        Database::disconnect();  
                     ?> 
</tbody>  
</table>
</dic>
      </div> 
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white alert-danger">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> <a href="https://synapps-consulting.com">Copyright &copy; SynApps-Business-Consulting</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  
  <!-- End of Page Wrapper --><!-- 
 <?php //include_once 'ajoutEntreprise.php'; ?>
 <?php// include_once 'ajoutEmployer.php'; ?>
 <?php// include_once 'ajoutEmployeur.php'; ?>
 <?php //include_once 'ajoutEnfant.php'; ?>
 <?php //include_once 'ajoutEpouse.php'; ?> -->
  <?php include_once 'mod_profil.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="../../bootstrap/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="../../bootstrap/js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="../../bootstrap/js/demo/chart-pie-demo.js"></script> -->
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
  <script type="text/javascript">
    $(document).ready(function() { 

    
  
  $('#listeEmployert').DataTable({
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function(row) {
                var data = row.data();
                return 'Details for ' + data[0] + ' ' + data[1];
              }
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
              tableClass: 'table'
            })
          }
        }
      }); 
} );
  </script>


</body>

</html>