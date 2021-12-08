<?php
session_start();

include_once '../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_sescretaire'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_sescretaire']))
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

  <title>IPM-IEZ - Secretaire</title>

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
   .width_img{
    width: 150px;
   }
.h{
text-align: left; color :orange;  /*color: #008080;*/font-family:"Cooper Black";font-weight:lighter;font-size: 43px;}
  h1{
    text-align: center;font-family: "Cooper Black";font-weight:lighter;font-size: 35px;color: blue; 
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
            <img class="rounded-circle img1" src="../../img/Profil/<?php echo $userRow['image']; ?>"> 
      </li>
      <!-- Divider -->
      <hr id="hr" class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="./">
          <span>Accueil</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cotisation/">
          <span>Cotisation</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="employers.php">
          <span>Employers !</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="enfant.php">
          <span>Enfants !</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="epouses.php">
          <span>Epouses</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="medicaments/">
          <span>Medicaments</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" class="dropdown-item" href="#" data-toggle="modal" data-target="#boncommande">
          <span>Remboursement</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="remboursement/">
          <span>Liste des remboursements</span></a>
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
                <img class="img-profile rounded-circle small" src="../../img/Profil/<?php echo $userRow['image']; ?>">

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

          <!-- Page Heading -->
    
<h2 class="text-center">Liste des enfants</h2><br><br>
        <!-- Begin Page Content -->
        <div class="container-fluid">
<!-- <meta http-equiv='refresh' content='50; url=#paiement'/> -->
        <table id="paiement" class="table table-hover table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>ID ENFANT</th>
              <th>PHOTO ENFANT</th>
              <th>Nom enfant</th>
              <th>Prénom enfant</th>
              <th>Date de naissance</th> 
              <th>Lieu de naissance</th> 
              <th>Numéro de registre</th>
              <th>Ajouter photo !</th>   
              <th>Modifier enfant !</th>   
            </tr>
          </thead>
          <tbody>
            <?php  
            $pdo =Database::connect(); //on se connecte à la base 
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
            $statement = $pdo->prepare("SELECT * FROM enfants ORDER BY idEnfants DESC");  
            // $statement = $pdo->prepare("SELECT * FROM enfants, employer WHERE enfants.employer_id =employer.idEmployer ORDER BY idEnfants DESC");  
            $statement->execute(array());  
            $result = $statement->fetchAll();
            foreach ($result as $row) { 
              echo '<tr>';
                echo '<td>' . $row['idEnfants'] . '</td>';
                echo '<td><img  class="width_img img-profile" src="../../img/enfant/'.$row['image'].'"></td>';
                echo '<td>' . $row['nomEnfants'] . '</td>';
                echo '<td>' . $row['prenomEnfants'] . '</td>';
                echo '<td>' . $row['dateNaissanceEnfants'] . '</td>';
                echo '<td>' . $row['LieuNaissanceEnfants'] . '</td>';  
                echo '<td>' . $row['numeroRegistreEnfants'] . '</td>';
                echo ' <td><a href="#ajoutPhoto" class="ajoutPhoto"  data-id="'.$row['idEnfants'].'" href="javascript:void(0)" data-toggle="modal"><i class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-camera fa-sm fa-fw mr-2 text-gray-400"></i></i></a></td>';                 
                echo '<td><a href="update_en.php?id='.$row['idEnfants'].'"><i class="btn btn-primary">Modifier</i></a></td>';

              echo '</tr>'; 
            }
            Database::disconnect();  
                ?>
          </tbody>  
        </table> 
 
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

    </div>
    <!-- End of Content Wrapper -->

  </div>
  </div>
  <!-- End of Page Wrapper -->
 
<!-- Ajouter une entrprise -->
  
 <?php include_once 'mod_profil.php'; ?>
 
<script type="text/javascript">
  /**
  $("#select").on('change', function () {
      var valeur =$(this).find(":selected").val(); 
      if (valeur=="terrainbati") {
        $("#bati").show(1000);
        $("#terrainnu").hide(1000);

      }else if (valeur=="terrainnu"){
        $("#terrainnu").show(1000);
        $("#bati").hide(1000);
      }
      else{
        bootbox.alert("Veuillez choir la banne valeur");
      }
  })*/ 

    $('.ajoutPhoto').click(function(e){
     e.preventDefault();
   
   // alert(idpaiement);
   var id_Enfants = $(this).attr('data-id'); 
  $("#id_Enfants").val(id_Enfants);   


} );
</script>


<script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../bootstrap/js/sb-admin-2.min.js"></script>
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
  /**
  $("#select").on('change', function () {
      var valeur =$(this).find(":selected").val(); 
      if (valeur=="terrainbati") {
        $("#bati").show(1000);
        $("#terrainnu").hide(1000);

      }else if (valeur=="terrainnu"){
        $("#terrainnu").show(1000);
        $("#bati").hide(1000);
      }
      else{
        bootbox.alert("Veuillez choir la banne valeur");
      }
  })*/

     $(document).ready(function() {
    $('#entreprise').DataTable();
    $('#paiement').DataTable();
    $('#medicament').DataTable(); 

} );
</script>

</body>

</html>
