<?php
session_start();

include_once '../../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_ipmie'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_ipmie']))
{
  header("Location: ../../../apps/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="icon" href="IPMIEZ.png">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="../../../bootstrap/cdnjs/jquery-3.3.1.js"></script> 
<meta name="author" content="">

<title>IPM-IEZ</title>

  <!-- Custom fonts for this template-->
  <link href="../../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
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
/*.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}*/
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar"> 
      <li>
            <img class="rounded-circle img1" src="../../../img/Profil/<?php echo $userRow['image']; ?>"> 
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
      <!-- Navs Item - utilisateurs et employers -->
      <li class="nav-item">
        <a class="nav-link" href="../listepaiement.php">
          <i class="fas fa-fw fa-users"></i> Liste paiement </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../employeurs/">
          <i class="fas fa-fw fa-users"></i> Liste employeurs </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../employers/">
          <i class="fas fa-fw fa-users"></i> Liste employers </a>
      </li>
      <!-- Navs Item - utilisateurs et employers -->
      <li class="nav-item">
        <a class="nav-link" href="../interompu.php">
          <i class="fas fa-fw fa-users"></i> Enregistrement interompu </a>
      </li>
      <!-- Navs Item - utilisateurs et employers -->
      <li class="nav-item">
        <a class="nav-link" href="../validercompte.php">
          <i class="fas fa-fw fa-users"></i> Valider compte utilisateur </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../fournisseurs/">
          <i class="fas fa-fw fa-users"></i>
          <span  data-toggle="modal" data-target="#listeEmployer">Fournisseurs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../utilisateurs/">
          <i class="fas fa-fw fa-users"></i>
          <span  data-toggle="modal" data-target="#listeEmployer">Utilisateurs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stats/">
          <i class="fas fa-fw fa-chart-area"></i>
          <span> Statistique</span></a>
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
                <img class="img-profile rounded-circle small" src="../../../img/Profil/<?php echo $userRow['image']; ?>">

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Voir mon profil
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modifierEmployeur">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Modifier mon profil
                </a> 
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modifierImage">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Modifier ma photo
                </a> 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Me déconnecter
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

<!--   <div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
 style="width: <?php echo "90"; ?>%;">
<span class="sr-only">60% effectué</span>
</div>
</div> -->

       
        <div class="container">
          <div class="row">
            <a class="col-md-3 text-white bg-primary btn" data-toggle="modal" data-target="#trierJour"  href="#trierJour">Trier par jour</a><a class="col-md-1"></a>
            <a class="col-md-3 text-white bg-primary btn"  data-toggle="modal" data-target="#trierMois" href="#trierMois">Trier par mois</a><a class="col-md-1"></a>
            <a class="col-md-3 text-white bg-primary btn" data-toggle="modal" data-target="#trierAnnee"  href="#trierAnnee">Trier par année</a>
          </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div class="modal fade" id="trierJour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="trie_jour.php" method="GET">              
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Trier par jour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input class="form-control" type="date" name="trie_jour" required="" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Trier par jour</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div class="modal fade" id="trierMois" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="trie_mois.php" method="GET">              
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Trier par mois</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input class="form-control" type="date" name="trie_mois" required="" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Trier par mois</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div class="modal fade" id="trierAnnee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="trie_annee.php" method="GET">              
            <div class="modal-content">
              <div class="modal-header  bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Trier par année</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input class="form-control" type="date" name="trie_annee" required="" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Trier par année</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <br><br>
<table id="listetrie" class="table table-hover table-striped table-bordered" style="width:100%">

 <thead>
            <tr> <!-- 
              <th>Matricule</th>
              <th>Raison social</th>
              <th>Sigle</th>  -->
              <th>cotisation</th>
              <th>Date <br> de cotisation</th> 
              <th>periode</th> 
              <th>refcheque</th>  
              <th>valeurrefcheque </th>   
              <th>banqueclient</th>   
              <th>Date !</th>   
              <th>Ajouter <br>Employer</th> 
              <th>Date</th> 
              <th>Effectuer <br>paiement</th> 
            </tr>
</thead>
<tbody>
                        <?php

                        $createad= $_GET['trie_annee']; 
                        $out = explode('-', $createad);
                        // echo $out1;
                          //on inclut notre fichier de connection 
                        $pdo =Database::connect(); //on se connecte à la base 
                        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
                        $statement = $pdo->prepare("SELECT * FROM entreprise, paiement WHERE entreprise.idEntreprise=paiement.entreprise_id AND trie_annee=:createad ORDER BY idEntreprise DESC");  
                        $statement->execute(array('createad'=> $out[0]));  
                        $result = $statement->fetchAll();
                       
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr>';
                            // echo '<td>' . $row['matriculeEntreprise'] . '</td>';
                            // echo '<td>' . $row['raisonSociale'] . '</td>';
                            // echo '<td>' . $row['sigleEntreprise'] . '</td>';
                            echo '<td>' . $row['cotisation'] . '</td>';
                            echo '<td>' . $row['datec'] . '</td>';
                            echo '<td>' . $row['periodec'] . '</td>';  
                            echo '<td>' . $row['refcheque'] . '</td>';  
                            echo '<td>' . $row['valeurrefcheque'] . '</td>'; 
                            echo '<td>' . $row['banqueclient'] . '</td>';                             
                            echo '<td>' . $row['paiement_createad'] . '</td>';                             
                            echo ' <td><a href="print_cotisation.php?id='.$row['idEntreprise'].'" target="_blank"><i class="btn btn-primary" data-toggle="tooltip" title="Edit"> +  <i class="fas fa-search fa-user"></i> </i></a></td>';
                            echo ' <td><a href="#ajoutPaiement" class="ajoutPaiement"  data-id="'.$row['idEntreprise'].'" href="javascript:void(0)" data-toggle="modal"><i class="btn btn-primary" data-toggle="tooltip" title="Edit"> +  <i class="fas fa-search fa-shopping-basket"></i> </i></a></td>'; 
                            echo ' <td><a href="#ajoutPaiement" class="ajoutPaiement"  data-id="'.$row['idEntreprise'].'" href="javascript:void(0)" data-toggle="modal"><i class="btn btn-primary" data-toggle="tooltip" title="Edit"> +  <i class="fas fa-search fa-shopping-basket"></i> </i></a></td>'; 
                        echo '</tr>'; 
                        }
                        Database::disconnect();  
                     ?> 
</tbody>  
</table>
        </div>
 <?php include_once '../mod_profil.php'; ?>

  <!-- End of Page Wrapper --><!-- 
 <?php// include_once 'ajoutEmployer.php'; ?>
 <?php// include_once 'ajoututilisateur.php'; ?>
 <?php //include_once 'ajoutEnfant.php'; ?>
 <?php //include_once 'ajoutEpouse.php'; ?> -->
 
  <!-- Bootstrap core JavaScript-->
  <script src="../../../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../../bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../../bootstrap/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../../bootstrap/js/demo/chart-area-demo.js"></script>
  <script src="../../../bootstrap/js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/responsive.bootstrap4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../../bootstrap/js/bootbox.min.js"></script>

<script type="text/javascript">
  
  $('#listetrie').DataTable({
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
</script>  


</body>

</html>
