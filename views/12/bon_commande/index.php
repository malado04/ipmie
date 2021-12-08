<?php
session_start();

include_once '../../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_bon'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_bon']))
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
        <a class="nav-link" href="../">
          <span>Accueil</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../">
          <span>Liste des bon de commande</span></a>
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
      <!-- Navs Item - utilisateurs et employers --><!-- 
      <li class="nav-item">
        <a class="nav-link" href="./listepaiement.php">
          <i class="fas fa-fw fa-users"></i> Liste paiement </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="./employeurs/">
          <i class="fas fa-fw fa-users"></i> Liste employeurs </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="employers/">
          <i class="fas fa-fw fa-users"></i> Liste employers </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./interompu.php">
          <i class="fas fa-fw fa-users"></i> Enregistrement interompu </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./validercompte.php">
          <i class="fas fa-fw fa-users"></i> Valider compte utilisateur </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-users"></i>
          <span  data-toggle="modal" data-target="#listeEmployer">Employers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-users"></i>
          <span  data-toggle="modal" data-target="#listeEmployer">Utilisateurs</span></a>
      </li> -->
    <!--  <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-users"></i>
          <span>Employers</span></a>
      </li>
 
--> 
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
 <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
<!--                     <a href="ajoutEmployeur.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i class="fas fa-download fa-sm text-white-50"></i> Ajouter un utilisateur</a>
 -->                  </div>
               
 
   <div class="modal-body ">  

<table id="listeEmployert" class="table table-hover table-striped table-bordered" style="width:100%">

 <thead>
            <tr> 
              <!-- <th>Act / Desc</th> -->
              <th>Matricule</th>
              <th>Raison social</th>
              <th>Nom parent</th>   
              <th>Prénom parent</th>   
              <th>Medic 1</th>   
              <th>Medic 2</th>   
              <th>Medic 3</th>   
              <!-- <th>Medic 4</th>    -->
              <!-- <th>Medic 5</th>    -->
              <th>Nom</th> 
              <th>Prénom</th> 
              <th>Date</th> 
              <th>Imprimer</th> 
            </tr>
</thead>
<tbody>
                        <?php  //on inclut notre fichier de connection 
                        $pdo =Database::connect(); //on se connecte à la base 
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM bon_, entreprise, employer, utilisateur WHERE bon_.id_ipmbon=utilisateur.id AND bon_.id_parent=employer.idEmployer AND bon_.id_structure=entreprise.idEntreprise ORDER BY id DESC");  
                        $statement->execute(array());  
                        $result = $statement->fetchAll();
                       
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr class="tr">';
                            // echo '<td  class="td">' . $row['activedesc'] . '</td>';
                            echo '<td>' . $row['idbon'] . '</td>';
                            echo '<td>' . $row['raisonSociale'] . '</td>';
                            echo '<td>' . $row['raisonSociale'] . '</td>';
                            echo '<td>' . $row['raisonSociale'] . '</td>';
                            echo '<td>' . $row['med1'] . '</td>';
                            echo '<td>' . $row['med2'] . '</td>';
                            echo '<td>' . $row['med3'] . '</td>';
                            // echo '<td>' . $row['med4'] . '</td>';
                            // echo '<td>' . $row['med5'] . '</td>';
                            echo '<td>' . $row['nom'] . '</td>';             
                            echo '<td>' . $row['prenom']. '</td>';   
                            echo '<td>' . $row['bon_datecreated']. '</td>';   
                            echo ' <td><a class="btn btn-success" href="../print.php?id_bon='.$row['idbon'].'" >          <i class="fas fa-fw fa-print"> </i> Imprimer</a></td>';                            

                        echo '</tr>'; 
                        }
                        Database::disconnect();  
                     ?> 
</tbody>  
</table>
   </div>
 
      </div>
        <!-- /.container-fluid -->

      </div>
      </div>
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
<!-- 
<div class="">           
  <div class="modal fade" id="ajoutEntreprise" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1350px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh">Créer une nouvelle entreprise </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
    <div class="etape row">
          <label class="col-md-3 label1">Etape 1 / 5</label>   
          <label class="col-md-3 label">Etape 2 / 5</label>   
          <label class="col-md-2 label1">Etape 3 / 5</label>  
          <label class="col-md-2 label1">Etape 4 / 5</label>  
          <label class="col-md-2 label1">Etape 5 / 5</label>    
    </div> 
    <form action="process.php" method="post">   
    <div class="modal-body row">         
    <div class="col-md-6">
    <label>Matricule de l'entreprise</label>
    <input type="text" name="matricule" id="matricule" class="form-control"  placeholder="Matricule de l'entreprise" required /> <br/> 
    <label>Raison social de l'entreprise</label>
    <input type="text" name="raisonsociale" id="raisonsociale" class="form-control"  placeholder="Raison social de l'entreprise" required /><br/> 
    <label>Sigle de l'entreprise</label>
    <input type="text" name="sigleentreprise" id="sigleentreprise" class="form-control"  placeholder="Sigle  de l'entreprise" required /> <br/> 
    <label>Numéro Resgitre Entreprise de l'entreprise</label>
    <input type="text" name="numresgitreentreprise" id="numresgitreentreprise" class="form-control"  placeholder="Numéro Resgitre Entreprise de l'entreprise" required /> <br/> 
    <label>Ninéa de l'entreprise</label>
    <input type="text" name="nineaentreprise" id="nineaentreprise" class="form-control"  placeholder="Ninéa de l'entreprise" required />
  </div> 
    <div class="col-md-6"> 
    <label>Date d'immatriculation l'entreprise</label>
    <input type="date" name="dateimmatriculationentreprise" id="dateimmatriculationentreprise" class="form-control"  placeholder="Date d'immatriculation l'entreprise" required /> <br/> 
    <label>Nombre d'hommes dans l'entreprise</label>
    <input type="number" name="hommeentreprise" id="hommeentreprise" class="form-control"  placeholder="Nombre de hommes dans l'entreprise" required /> <br/> 
    <label>Nombre de femmes dans l'entreprise</label>
    <input type="number" name="femmeentreprise" id="femmeentreprise" class="form-control"  placeholder="Nombre de femmes dans l'entreprise" required /> <br/> 
    <label>Periode Travail Entreprise</label>
    <input type="text" name="periodeTravailEntreprise" id="periodeTravailEntreprise" class="form-control"  placeholder="Periode Travail Entreprise" required /> <br/> 
    <label>Période de travail</label>
    <input type="text" name="dateperiodetravail" id="dateperiodetravail" class="form-control"  placeholder="Periode Travail Entreprise" required />  <br/> 
    </div>
   </div>

        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" name="id" id="id">
              <button type="submit" class="btn btn glyphicon glyphicon-save orange1 form-control orange1" > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange form-control" data-dismiss="modal">   Annuler
              </button>
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>

 -->
    <!------>
 
  </div>

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
<script type="text/javascript" src="script.js"></script>  
  <script type="text/javascript">
    $(document).ready(function() { 

//     $('#listeEmployert .tr').each(function() {
//         var customerId = $(this).find("td").html(); 
//         // alert(customerId); 
//         if (customerId==1) {

//             $(".tr:eq(1)").css("background-color","green"); //edit, body must be in quotes!
//             }else if (customerId==0){
//             // $(".tr").css("background-color","red"); //edit, body must be in quotes!

//             $(".tr:eq(0)").css("background-color","green"); //edit, body must be in quotes!
// // $('td:odd').css('background-color','yellow');
//             }
//     });

    $('.ajoutEmployer').click(function(e){
     e.preventDefault();
    var idEntreprise = $(this).attr('data-id');
    $("#idEntreprise").val(idEntreprise);  
    $("#id").val(idEntreprise);  
    $('#modifierEmployeur').click(function(e){
      e.preventDefault();
    var idEntreprise = $(this).attr('data-id');

    })
    // alert(idEntreprise); 

 }); 

   
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
