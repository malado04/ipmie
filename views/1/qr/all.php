<?php 
	include_once '../../../dao/database.php';
	                
	require_once 'vendor/autoload.php';

	use Endroid\QrCode\ErrorCorrectionLevel;
	use Endroid\QrCode\LabelAlignment;
	use Endroid\QrCode\QrCode;
	use Endroid\QrCode\Response\QrCodeResponse;
	$pdo =Database::connect(); //on se connecte à la base 
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
    $statement = $pdo->prepare("SELECT * FROM employer ORDER BY idEmployer DESC");  
    $statement->execute(array());  
    $result = $statement->fetchAll();
    foreach ($result as $row) {   
	?>
	<table>
    	<tr>
    		<td>
    			<img  src="images/<?php echo $row['codeemployer'];?>.png"><br>
    			<?php echo $row['nomEmployer'];?> <?php echo " " ?>
    			<?php echo $row['prenomEmployer'];?>
    			<?php echo $row['codeemployer'];?>
    		</td>
    	</tr>
    </table>
<?php
                        }
                        Database::disconnect(); 

                        	?>
                        	 