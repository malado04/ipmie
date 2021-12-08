<?php 
	include_once '../../../dao/database.php';

	$pdo =Database::connect(); //on se connecte à la base 
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
  	$stmt = $pdo->prepare("SELECT * FROM employer, entreprise WHERE entreprise.idEntreprise=employer.employeur_id AND idEntreprise=:id");
  	$stmt->execute(array(":id"=>$_GET['id']));
	$row=$statement->fetch(PDO::FETCH_ASSOC);

	Database::disconnect(); 
?>
                        	 
<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/bootstrap.css">
<style type="text/css">
	.img{
		width: 45%;
	}
	img{
		width: 100%;
	}
	.text-left{
		text-align: left;
	}
</style>
</head>
<body>
	<div class="container">
		
	<div class="row">
		<div class="col-md-4">
			<img class="img" src="../../../IPMIEZ.png"><br><br>
    			<h1><?php echo $row['nomEmployer']; echo " "; echo $row['prenomEmployer']; echo "<br>"; echo "Code : "; echo $row['codeemployer'];?></h1>
    			</div>
		<div class="col-md-8">
			<h1 class="text-left">WEB</h1><br>
			<img  src="images/<?php echo $row['codeemployer'];?>.png">
</div>
<div class="col-md-12 ">			
	<br><span><h2><i>Retrouvez-nous sur internet  </i><b>ipmiez.com</b></h2></span>
	 <span><h2>Tel : 33 991 51 33</h2></span>
</div>
	</div>
	</div>
</body>
</html>