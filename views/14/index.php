<?php
session_start();

include_once 'database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_icamo'], ":valide"=>$valide));
$userRowsession=$stmt->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_icamo']))
{
  header("Location: ../../apps/");
}

$sexm="M";
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm  AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6 AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21");
$stmt->execute(array(":sexm"=>$sexm));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
 
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt1 = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6");
$stmt1->execute(array(":sexm"=>$sexm));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);

$sexm="F";
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6 AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21");
$stmt->execute(array(":sexm"=>$sexm));
$userRow2=$stmt->fetch(PDO::FETCH_ASSOC);

$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
// $stmt = $pdo->prepare("SELECT *, (DATEDIFF(datenow, dateNaissanceEnfants)/365) >21 as datediff FROM enfants where sex=:sexm");
$stmt1 = $pdo->prepare("SELECT *, COUNT(idEnfants) as nombre FROM enfants where sex=:sexm AND (DATEDIFF(datenow, dateNaissanceEnfants)/365) <6");
$stmt1->execute(array(":sexm"=>$sexm));
$userRow3=$stmt1->fetch(PDO::FETCH_ASSOC);

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
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="../../bootstrap/cdnjs/jquery-3.3.1.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
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

   .text-size{
    font-size: 25px;
    font-family: Times new roman;
   }
   .arial{
    font-family: arial black;
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
            <img class="rounded-circle img1" src="../../img/Profil/<?php echo $userRow['image']; ?>"> 
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
    <!--  <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-users"></i>
          <span>Employers</span></a>
      </li>
 
-->
      <!-- Nav Item - statistique -->
      <li class="nav-item">
        <a class="nav-link" href="stats.php">
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
      <h3 class="h">Bienvenue :  <?php echo $userRowsession['nom']; echo " "; echo $userRowsession['prenom']; echo " | <i class='fas fa-user fa-fw'></i> "; echo $userRowsession['posteoccupe']; ?></h3>


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
                  <h5 class="card-title">Bienvenu (e) : <?php  echo($userRowsession['prenom']); ?></h5>
                </span>
                <img class="img-profile rounded-circle small" src="img/<?php echo $userRowsession['image']; ?>">

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
   <!--     
        <div class="container">
          <div class="row">
            <a class="col-md-3 text-white bg-primary btn" data-toggle="modal" data-target="#trierJour"  href="#trierJour">Trier par jour</a><a class="col-md-1"></a>
            <a class="col-md-3 text-white bg-primary btn"  data-toggle="modal" data-target="#trierMois" href="#trierMois">Trier par mois</a><a class="col-md-1"></a>
            <a class="col-md-3 text-white bg-primary btn" data-toggle="modal" data-target="#trierAnnee"  href="#trierAnnee">Trier par année</a>
          </div>
        </div> -->
     <!--    ------------------------ 
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
                <input class="form-control" type="date" name="trie_jour" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Trier par jour</button>
              </div>
            </div>
            </form>
          </div>
        </div>
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
                <input class="form-control" type="date" name="trie_mois"/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Trier par mois</button>
              </div>
            </div>
            </form>
          </div>
        </div>
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
                <input class="form-control" type="date" name="trie_jour" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Trier par année</button>
              </div>
            </div>
            </form>
          </div>
        </div>

 
        <br>
        <div class="container-fluid">
    -->    
    <div class="row">
        <div class="col-12">
            <div class="card"> 
              <h1 class="text-center">STATISTIQUE </h1>
                <div class="card-body row text-size">
                  <div class="col-md-4">Enfant de moins de 5 ans de sex M</div>
                  <div class="col-md-2 text- arial"><?php echo $userRow1['nombre']; ?></div>
                  <div class="col-md-4">Enfant de moins de 5 ans de sex F</div>
                  <div class="col-md-2 text- arial"><?php echo $userRow3['nombre']; ?></div>
                </div>
                <div class="card-body row text-size">
                  <div class="col-md-4">Enfant compris entre 5 et 21 ans de sex M</div>
                  <div class="col-md-2 text- arial"><?php echo $userRow['nombre']; ?></div>
                  <div class="col-md-4">Enfant compris entre 5 et 21 ans de sex F</div>
                  <div class="col-md-2 text- arial"><?php echo $userRow2['nombre']; ?></div>
                </div>
            </div>
        </div>
     </div>  
</div>
 <?php include_once '../mod_profil.php'; ?>

 
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/responsive.bootstrap4.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/js/bootbox.min.js"></script>
<script type="text/javascript">
  // https://stackoverflow.com/questions/30928840/chart-js-getting-data-from-database-using-mysql-and-php
  var chartData = {
  labels: ["S", "M", "T", "W", "T", "F", "S"],
  datasets: [{

    data: [589, 445, 483, 503, 689, 692, 634],
  },
  {
    data: [639, 465, 493, 478, 589, 632, 674],
  }]
};
  var chLine = document.getElementById("chLine");
if (chLine) {
  new Chart(chLine, {
  type: 'line',
  data: chartData,
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: false
        }
      }]
    },
    legend: {
      display: false
    }
  }
  });
}
</script>  
 


</body>

</html>
