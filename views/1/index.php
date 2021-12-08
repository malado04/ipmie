<?php
session_start();

include_once '../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_ipmie'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_ipmie']))
{
  header("Location : ../../apps/");
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
      <!-- Navs Item - utilisateurs et employers -->
      <li class="nav-item">
        <a class="nav-link" href="listepaiement.php">
          <i class="fas fa-fw fa-users"></i> Liste paiement </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="employeurs/">
          <i class="fas fa-fw fa-users"></i> Liste employeurs </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="employers/">
          <i class="fas fa-fw fa-users"></i> Liste employers </a>
      </li>
      <!-- Navs Item - utilisateurs et employers -->
      <li class="nav-item">
        <a class="nav-link" href="interompu.php">
          <i class="fas fa-fw fa-users"></i> Enregistrement interompu </a>
      </li>
      <!-- Navs Item - utilisateurs et employers -->
      <li class="nav-item">
        <a class="nav-link" href="validercompte.php">
          <i class="fas fa-fw fa-users"></i> Valider compte utilisateur </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fournisseurs/">
          <i class="fas fa-fw fa-users"></i>
          <span  data-toggle="modal" data-target="#listeEmployer">Liste fournisseurs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="utilisateurs/">
          <i class="fas fa-fw fa-users"></i>
          <span>Utilisateurs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="entreprises/">
          <i class="fas fa-fw fa-users"></i>
          Entreprises</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="depenses/">
          <i class="fas fa-fw fa-users"></i>
          <span  data-toggle="modal">Dépenses</span></a>
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
 <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                    <a href="ajoutEmployeur.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i class="fas fa-download fa-sm text-white-50"></i> Ajouter un utilisateur</a>
                  </div>';          
               
       
        
<table id="entreprise" class="table table-hover table-striped table-bordered" style="width:100%">

 <thead>
            <tr>
       <!--       <th>ID</th>-->
              <th>Matricule</th>
              <th>Raison social</th>
              <!-- <th>Sigle</th> -->
              <th>CNI</th>
              <th>Nom</th>
              <th>Prénom</th> 
              <th>Téléphone</th> 
              <th>Adresse</th> 
              <th>Email</th>  
           <!--   <th>image</th> 
              <th>Date enregistrer</th>  -->
              <th>Employer</th><!--   
              <th>Modifier</th> 
              <th>Supprimer</th>  -->
            </tr>
</thead>
<tbody>
                        <?php  //on inclut notre fichier de connection 
                        $pdo =Database::connect(); //on se connecte à la base 
                        $pid=1;
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM utilisateur, entreprise WHERE utilisateur.id=entreprise.employeur_id AND activedescentreprise=:pid ORDER BY id DESC");  
                        $statement->execute(array(":pid"=>$pid));  
                        $result = $statement->fetchAll();
                       
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr>';
                 //           echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['matriculeEntreprise'] . '</td>';
                            echo '<td>' . $row['raisonSociale'] . '</td>';
                            // echo '<td>' . $row['sigleEntreprise'] . '</td>';
                            echo '<td>' . $row['cni'] . '</td>';
                            echo '<td>' . $row['nom'] . '</td>';
                            echo '<td>' . $row['prenom'] . '</td>';  
                            echo '<td>' . $row['telFixe'] . '</td>'; 
                            echo '<td>' . $row['adresseCommune'] . '</td>';   
                            echo '<td>' . $row['email'] . '</td>';        
                        //    echo '<td>' . $row['image'] . '</td>';    
                        //    echo '<td>' . $row['date'] . '</td>';       
                            echo ' <td><a href="#ajoutEmployer" class="ajoutEmployer"  data-id="'.$row['idEntreprise'].'" href="javascript:void(0)" data-toggle="modal"><i class="btn btn-primary" data-toggle="tooltip" title="Edit">Ajouter</i></a></td>';
                           // echo ' <td><a href="#ajoutEmployer" class="listeEmployer"  data-id="'.$row['id'].'" 
                            // data-id="'.$row['idEntreprise'].'"
                            // data-raisonSociale="'.$row['raisonSociale'].'"
                            // data-sigleEntreprise="'.$row['sigleEntreprise'].'"
                            // data-numResgitreEntreprise="'.$row['numResgitreEntreprise'].'"
                            // data-nineaEntreprise="'.$row['nineaEntreprise'].'"
                            // data-dateImmatriculationEntreprise="'.$row['dateImmatriculationEntreprise'].'"
                            // data-hommeEntreprise="'.$row['hommeEntreprise'].'"
                            // data-femmeEntreprise="'.$row['femmeEntreprise'].'"
                            // data-periodeTravailEntreprise="'.$row['periodeTravailEntreprise'].'"
                            // data-datePeriodeTravail="'.$row['datePeriodeTravail'].'"
                            // href="javascript:void(0)" data-toggle="modal"><i class="btn btn-primary" data-toggle="tooltip" title="Edit">Ajouter</i></a></td>';          
                            // echo ' <td><a href="#updateutilisateur" class="updateutilisateur"  data-id="'.$row['id'].'" href="javascript:void(0)" data-toggle="modal"><i class="btn btn-warning" data-toggle="tooltip" title="Edit">Modifier</i></a></td>';        
                            // echo '<td><a class="delete_utilisateur" data-id="'.$row['id'].'" href="javascript:void(0)"><i class="btn btn-danger">Supprimer</i></a></td>';                          
                        echo '</tr>'; 
                        }
                        Database::disconnect();  
                     ?> 
</tbody>  
</table>
 
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
    <!-- <form id="entrepriseform" method="post">    -->
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


    <!------>

<div class="container">           
<div class="row">           
  <div class="modal fade" id="listeEmployer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1450px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh col-md-12">Liste des employers </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
   
   <div class="modal-body ">  

<table id="listeEmployert" class="table table-hover table-striped table-bordered" style="width:100%">

 <thead>
            <tr> 
              <th>Matricule</th>
              <th>Raison social</th>
              <th>Sigle</th>
              <th>CNI <br/>employer</th>
              <th>Nom</th>
              <th>Prénom</th> 
              <th>Téléphone</th> 
              <th>Email</th>    
              <th>Salaire</th> 
              <th>Cotisation</th> 
            </tr>
</thead>
<tbody>
                        <?php  //on inclut notre fichier de connection 
                        $pdo =Database::connect(); //on se connecte à la base 
                        $pid=1;
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM entreprise, employer WHERE entreprise.idEntreprise= employer.employeur_id ORDER BY idEmployer DESC");  
                        $statement->execute(array());  
                        $result = $statement->fetchAll();
                       
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr>';
                            echo '<td>' . $row['matriculeEntreprise'] . '</td>';
                            echo '<td>' . $row['raisonSociale'] . '</td>';
                            echo '<td>' . $row['sigleEntreprise'] . '</td>';
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
   </div>

        
    </div>
    </div> 
    </div>
    </div>
    </div>

<!-- ******************************************************************************************************************************************** -->

<!-- Ajouter un employer -->

<div class="row">           
  <div class="modal fade" id="ajoutEmployer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh">Ajouter un nouveau employer </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div>
    <div class="etape row">
          <label class="col-md-3 label1">Etape 1 / 5</label>   
          <label class="col-md-2 label1">Etape 2 / 5</label>   
          <label class="col-md-3 label">Etape 3 / 5</label>  
          <label class="col-md-2 label1">Etape 4 / 5</label>  
          <label class="col-md-2 label1">Etape 5 / 5</label>    
    </div>  
<form action="process.php" method="post" enctype="multipart/form-data">  
  <div class="modal-body row">               
    <div class="col-md-12">
    <label>Choisir une photo de profil </label>
    <input type="file" name="image" id="image" class="form-control"  placeholder="Choisir une photo de profil" /><br/>
    </div>  
    <div class="col-md-6">
    <label>CNI de l'employer</label>
    <input type="number" name="cniemployer" id="cnieployer" class="form-control"  placeholder="CNI de l'employer" required />
    <br/><label>Nom de l'employer</label>
    <input type="text" name="nomemployer" id="nomemployer" class="form-control"  placeholder="Nom de l'employer" required /><br/>
    <label>Prénom de l'employer</label>
    <input type="text" name="prenomemployer" id="prenomemployer" class="form-control"  placeholder="Prénom de l'employer" required />
    <br/><label>Téléphone de l'employer</label>
    <input type="number" name="telemployer" id="telemployer" class="form-control"  placeholder="Téléphone de l'employer" required />  
  </div>   
    <div class="col-md-6">
    <label>Email de l'employer</label>
    <input type="email" name="emailemployer" id="emailemployer" class="form-control"  placeholder="Email de l'employer" required />  
    <br/><label>Nombre d'enfants de l'employer</label>
    <input type="number" name="nombredenfantemployer" id="nombredenfantemployer" class="form-control"  placeholder="Nombre d'enfants de l'employer" required /> 
    <br/><label>Nombre d'épouses de l'employer</label>
    <input type="number" name="nombredepouseemployer" id="nombredepouseemployer" class="form-control"  placeholder="Nombre d'épouses de l'employer" required />
    <br/><label>Montant salaire</label>
    <input type="number" name="salaire" id="salaire" class="form-control"  placeholder="Montant salaire" required /> <br>
    <label for="">SEX</label>
    <select name="sex" id="sex" class="form-control">
     <option value="M">M</option>
     <option value="F">F</option>
    </select>
    </div>
   </div> 
        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" id="idEntreprise" name="idEntreprise">
              <button type="submit" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button>
              <!-- <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="https://ipmiez.com/views/1/ajoutEpouse.php">Suivant</a> -->
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  

  </div>
 <?php include_once 'mod_profil.php'; ?>

  <!-- End of Page Wrapper --><!-- 
 <?php// include_once 'ajoutEmployer.php'; ?>
 <?php// include_once 'ajoututilisateur.php'; ?>
 <?php //include_once 'ajoutEnfant.php'; ?>
 <?php //include_once 'ajoutEpouse.php'; ?> -->
 
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
  <script type="text/javascript">
    $(document).ready(function() { 

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

  
   $('.delete_utilisateur').click(function(e){
   
   e.preventDefault();
  // alert("dddd");
   var pid = $(this).attr('data-id');
   var parent = $(this).parent("td").parent("tr");   
   bootbox.dialog({ 
     message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/btn-ajax-loader.gif" /><br/>Etes-vous sûr de la suppression ?</div>', 
    title: "<i class='glyphicon glyphicon-trash'></i> Supprimer ! ",
     buttons: {
    success: {
      label: "Non, annuler",
      className: "btn-success",
      callback: function() {
      $('.bootbox').modal('hide');
      }
    },
    danger: {
      label: "Oui, supprimer!",
      className: "btn-danger",
      callback: function() {
       
       
       $.ajax({
        
        type: 'POST',
        url: 'process.php',
        data: 'deleteutilisateur='+pid
        
       })
       .done(function(response){
        
        bootbox.alert(response);
        parent.fadeOut('slow');
        
       })
       .fail(function(){
        
        bootbox.alert('Erreur de suppression');
                
       })
              
      }
    }
     }
   });
   
  });

   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   $('.valider_user').click(function(e){
   
   e.preventDefault();
   var pid = $(this).attr('data-id');
   alert(pid);

   var parent = $(this).parent("td").parent("tr");   
   bootbox.dialog({ 
     message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/btn-ajax-loader.gif" /><br/>Etes-vous sûr de la validation ?</div>', 
    title: "<i class='glyphicon glyphicon-trash'></i> Validation ! ",
     buttons: {
    success: {
      label: "Non, annuler",
      className: "btn-success",
      callback: function() {
      $('.bootbox').modal('hide');
      }
    },
    danger: {
      label: "Oui, valider!",
      className: "btn-danger",
      callback: function() {
       
       
       $.ajax({
        
        type: 'POST',
        url: 'process.php',
        data: 'valideruser='+pid
        
       })
       .done(function(response){
        
        bootbox.alert(response);
        parent.fadeOut('slow');
        
       })
       .fail(function(error){
        
        bootbox.alert('Erreur de validation')+error;
                
       })
              
      }
    }
     }
   });
   
  });

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   

  $("#employerform").submit(function( event ) {  
    var data = $("#employerform").serialize(); 
      $.ajax({ 
      type : 'POST',
      url  : 'process.php',
      data : data,
      beforeSend: function()
      {    
        $("#btncni").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
      },
      success :  function(response)
         {            
          if(response==1){  
           bootbox.dialog({ 
            size: "small",
            message: '<div id="modal"><img src="btn-ajax-loader.gif" />Enregistrement en cours ...</div>'});
            setTimeout('window.location.href = "views/1/"; ',1500);
          }
          else{
              bootbox.dialog({ 
            size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="btn-ajax-loader.gif" /><br/></div>'+response});
               setTimeout('window.location.href = "views/1/"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false; 


        });   
 /*--------------------------------------------------------------------------------------------------------------*/
 
  $("#utilisateurform").submit(function( event ) {  
    var data = $("#utilisateurform").serialize(); 
      $.ajax({ 
      type : 'POST',
      url  : 'process.php',
      data : data,
      beforeSend: function()
      {    
        $("#btncni").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
      },
      success :  function(response)
         {            
          if(response==1){  
           // var box = bootbox.dialog({ 
           //  size: "small",
           //  message: '<div id="modal"><img class="img-cirlce" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><br/>Enregistrement en cours ...</div>'});
           //  // setTimeout('window.location.href = "views/1/"; ',2000);

            $('#ajoututilisateur').modal('hide');
            $('#ajoutEntreprise').modal('show');
            
          }
          else{
              bootbox.dialog({ 
              size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></div>'+response});
              
                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   
 
 /*--------------------------------------------------------------------------------------------------------------*/

  $("#epouseform").submit(function( event ) {  
    var data = $("#epouseform").serialize(); 
      $.ajax({ 
      type : 'POST',
      url  : 'process1.php',
      data : data,
      beforeSend: function()
      {    
        $("#btncni").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
      },
      success :  function(response)
         {            
          if(response==1){  
           bootbox.dialog({ 
            size: "small",
            message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/waiting.gif" />Enregistrement en cours ...</div>'+response});
            setTimeout('window.location.href = "views/1/"; ',1500);
          }
          else{
              bootbox.dialog({ 
            size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><br/></div>'+response});
               setTimeout('window.location.href = "views/1/"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   
  
 /*--------------------------------------------------------------------------------------------------------------*/

  $("#enfantform").submit(function( event ) { 
  //alert("dsdsdsds"); 
    var data = $("#enfantform").serialize(); 
      $.ajax({ 
      type : 'POST',
      url  : 'process.php',
      data : data,
      beforeSend: function()
      {    
        $("#btncni").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
      },
      success :  function(response)
         {            
          if(response==1){  
           // bootbox.dialog({ 
           //  size: "small",
           //  message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/btn-ajax-loader2.gif" />Enregistrement en cours, Patientez SVP ...</div>'});
           //  setTimeout('window.location.href = "views/1/"; ',1500);

            $('#enfantform').modal('hide');
            $('#ajoutEpouse').modal('show');
          }
          else{
              bootbox.dialog({ 
            size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="btn-ajax-loader.gif" /><br/></div>'+response});
               setTimeout('window.location.href = "views/1/"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   

  $(".listeEmployer").click(function(e){
    e.preventDefault(); 
 
   var pid = $(this).attr('data-id');
   var pnom = $(this).attr('data-nom');
   var pprenom = $(this).attr('data-prenom'); 
    $("#nom").val(pnom);
    $("#prenom").val(pprenom);
    // alert(pnom);
  });
  
   $("#entrepriseform").submit(function( event ) {  
    var data = $("#entrepriseform").serialize(); 
    // alert("entreprise");
      $.ajax({ 
      type : 'POST',
      url  : 'process.php',
      data : data,
      beforeSend: function()
      {    
        $("#btncni").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
      },
      success :  function(response)
         {            
          if(response==1){  
           // bootbox.dialog({ 
           //  size: "small",
           //  message: '<div id="modal"><img class="img-cirlce" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><br/>Enregistrement en cours ...</div>'});
           //  setTimeout('window.location.href = "views/1/"; ',2000);

            $('#ajoutEntreprise').modal('hide');
            $('#ajoutEmployer').modal('show');

          }
          else{
              bootbox.dialog({ 
              size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></div>'+response
            });
           //  setTimeout('window.location.href = "ipmieziguinchor/administrateur/index.php"; ',2000);
            
            }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;
 

        });   

    $('#buttonsuivant').click(function(e){
      e.preventDefault(); 
      bootbox.dialog({ 
      size: "small",
      message: '<div id="modal"><img class="img-cirlce" id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></div>'});
      setTimeout('window.location.href = "views/1/"; ',1500);

    });



    $('.ajoutEpouse').click(function(e){
     e.preventDefault();

     var pid = $(this).attr('data-id');  
    // alert(pid);
    // var parent = $(this).parent("td").parent("tr");  
      $("#idemployer").val(pid);  
 }); 



    $('.ajoutEnfant').click(function(e){
     e.preventDefault();

     var pid = $(this).attr('data-id');  
     //alert(pid);
    // var parent = $(this).parent("td").parent("tr");  
      $("#idemployerenfant").val(pid);  
 }); 
    
  $('#utilisateur').DataTable({
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
  $('#entreprise').DataTable({
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
  
  // $('#utilisateur').DataTable({
  //       responsive: {
  //         details: {
  //           display: $.fn.dataTable.Responsive.display.modal({
  //             header: function(row) {
  //               var data = row.data();
  //               return 'Details for ' + data[0] + ' ' + data[1];
  //             }
  //           }),
  //           renderer: $.fn.dataTable.Responsive.renderer.tableAll({
  //             tableClass: 'table'
  //           })
  //         }
  //       }
  //     }); 
  
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
