<?php
session_start();

include_once '../../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_docteur'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_docteur']))
{
  header("Location: ../../../");
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
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
<script type="text/javascript" src="../../../bootstrap/cdnjs/jquery-3.3.1.js"></script> 
        <link rel="stylesheet" href="../docs/css/bootstrap-4.5.2.min.css" type="text/css">
        <link rel="stylesheet" href="../docs/css/bootstrap-example.min.css" type="text/css">
        <link rel="stylesheet" href="../docs/css/prettify.min.css" type="text/css">
        <link rel="stylesheet" href="../docs/css/fontawesome-5.15.1-web/all.css" type="text/css">

        <script type="text/javascript" src="../docs/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="../docs/js/bootstrap.bundle-4.5.2.min.js"></script>
        <script type="text/javascript" src="../docs/js/prettify.min.js"></script>

        <link rel="stylesheet" href="../dist/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="../dist/js/bootstrap-multiselect.js"></script>

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
            .fiexd-bottom{
              margin-bottom: 0px;
            }
        </style>
<meta name="author" content="">

<link rel="icon" type="icon" href="../../../img/IPMIEZ.png">
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
  ul li .btn{
    width: 100%;
    font-size: 10px;
  }
</style>
</head>

<body data-spy="scroll" data-target="#affix" style="font-size:14px;">

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
      <li class="nav-item active">
        <a class="nav-link" href="consultation/">
          <span>Liste des consultations</span>
        </a>
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
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item p-3">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Gestion médicament</span>
        </a><br>
        <li class="sidenav-item btn text-white"  data-toggle="modal" data-target="#idMedicModal">
          <a class="sidenav-link"><i>Ajouter medicament</i></a>
        </li> 
        <li class="btn text-white">
          <a href="../medic/"><i>liste medicament</i></a>
        </li><br>
      </li> <!-- 
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item p-3">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Gestion pathologis</span>
        </a><br>
        <li class="sidenav-item btn text-white"  data-toggle="modal" data-target="#idPathoModal">
          <a class="sidenav-link"><i>Ajouter pathologie</i></a>
        </li>  -->
        <li class="sidenav-item btn text-white">
          <a href="../patho/" class="sidenav-link"><i>liste pathologie</i></a>
        </li><br>
      </li> 
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item p-3">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Gestion maladies</span>
         ><br>
        <li class="sidenav-item btn text-white"  data-toggle="modal" data-target="#idMaladieModal">
          <a class="sidenav-link"><i>Ajouter maladie</i></a>
        </li> 
        <li class="sidenav-item btn text-white" >
          <a href="../malad/" class="sidenav-link"><i>liste maladie</i></a>
        </li><br>
      </li> 

      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item p-3">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Gestion syntome</span>
         ><br>
        <li class="sidenav-item btn text-white"  data-toggle="modal" data-target="#idPathoModal">
          <a class="sidenav-link"><i>Ajouter syntome</i></a>
        </li> 
        <li class="sidenav-item btn text-white">
          <a href="../malad/" class="sidenav-link"><i>liste syntome</i></a>
        </li><br>
      </li> 

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
          <span><a href="print.php?idc=<?php echo $_GET['idc']; ?>&emp=<?php echo $_GET['emp']; ?>" target="_blank" class="btn btn-primary"> <i class="fa fa-print"></i></a></span><br><br>
        <?php 

         $stmt = $pdo->prepare("SELECT * FROM employer, consultation, item_mal, item_syn, item_med WHERE consultation.idcons=item_med.med_idc and consultation.idcons=item_mal.mal_idc and consultation.idcons=item_syn.item_con_idc AND employer.idEmployer=:emp and idcons=:id GROUP BY idcons");
        $stmt->execute(array(":id"=>$_GET['idc'], ":emp"=>$_GET['emp']));
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
   ?>     
        <!-- <label class="lab"><?php echo $row['cons_id_emp']; ?></label><br>  -->
        <label class="lab">Code employer : <?php echo $row['codeE']; ?></label><br> 
        <label class="lab">Beneficiaire : <?php echo $row['beneficiaire']; ?></label><br>  
        <label class="lab">Main consulté: <?php echo $row['main']; ?></label><br>  
        <label class="lab">Poids : <?php echo $row['poids']; ?></label><br> 
        <label class="lab">Température : <?php echo $row['temp']; ?></label><br>  
        <label class="lab">Tension : <?php echo $row['tension']; ?></label><br> 
        <?php  
        $stmt1 = $pdo->prepare("SELECT * FROM consultation, item_mal WHERE consultation.idcons=item_mal.mal_idc and idcons=:id");
        $stmt1->execute(array(":id"=>$_GET['idc']));
        $result = $stmt1->fetchAll();//on cree les lignes du tableau avec chaque valeur retournée
         ?>
         <fieldset>
           <legend>Maladie (s) : </legend>
         <?php foreach ($result as $row) { 
        ?><label class="lab"><?php echo ($row['mal_item_con']);  ?></label><br> 
         </fieldset>
        <?php 
          } 

// ----------------------------------------------------------------------------------------------------------------------------

        $stmt1 = $pdo->prepare("SELECT * FROM consultation, item_med WHERE consultation.idcons=item_med.med_idc and idcons=:id");
        $stmt1->execute(array(":id"=>$_GET['idc']));
        $result = $stmt1->fetchAll(); //on cree les lignes du tableau avec chaque valeur retournée
         ?>
         <fieldset>
           <legend>Médicament (s) : </legend>
        <?php foreach ($result as $row) {
        ?> <label class="lab"> <?php echo ($row['med_item_con']);  ?></label><br> 
         </fieldset>
        <?php 
          } 
// ----------------------------------------------------------------------------------------------------------------------------

        $stmt1 = $pdo->prepare("SELECT * FROM consultation, item_syn WHERE consultation.idcons=item_syn.item_con_idc and idcons=:id");
        $stmt1->execute(array(":id"=>$_GET['idc']));
        $result = $stmt1->fetchAll();//on cree les lignes du tableau avec chaque valeur retournée
         ?>
         <fieldset>
           <legend>Syntom (s) : </legend>
       <?php  foreach ($result as $row) { 
       ?>  <label class="lab"><?php echo ($row['syn_item_con']);  ?></label><br> 
         </fieldset>
        <?php 
          } 
 ?>     
        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white alert-danger fiexd-bottom">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> <a href="https://synapps-consulting.com">Copyright &copy; SynApps-Business-Consulting</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
 
  </div> 

  <!-- Custom scripts for all pages-->
  <script src="../../../bootstrap/js/sb-admin-2.min.js"></script>
</body>

</html>
