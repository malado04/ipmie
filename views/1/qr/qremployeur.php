<?php 
session_start();

require_once 'vendor/autoload.php';

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

include_once '../../../dao/database.php';

if (isset($_GET['id'])) {

  $pdo = Database::connect();  
  $stmt = $pdo->prepare("SELECT * FROM employer, entreprise WHERE entreprise.idEntreprise=employer.employeur_id AND idEntreprise=:id");
  $stmt->execute(array(":id"=>$_GET['id']));
  $result = $stmt->fetchAll();
	foreach ($result as $row) {
		 $data=array($row['codeemployer']);

// Create a basic QR code
$employer=$row['codeemployer'];
$employers="https://ipmiez.com/apps/auth/?id=$row[codeemployer]";
//$employer="https://ipmiez.com/apps/auth/?id=$_SESSION[employer_print]";
$qrCode = new QrCode($employers);
$qrCode->setSize(300);

// Set advanced options
$qrCode->setWriterByName('png');
$qrCode->setMargin(10);
$qrCode->setEncoding('UTF-8');
$qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
// $qrCode->setLabel('Scan the code', 16, __DIR__.'/../assets/fonts/noto_sans.otf', LabelAlignment::CENTER);
// $qrCode->setLogoPath(__DIR__.'images/symfony.png');
$qrCode->setLogoSize(300, 700);
$qrCode->setRoundBlockSize(true);
$qrCode->setValidateResult(false);
$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

// Directly output the QR code
header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();

// Save it to a file
$qrCode->writeFile('images/'.$employer.'.png');

// Create a response object
// $response = new QrCodeResponse($qrCode);
// header('Location: ./?id='.$employer);
	}
  header('Location: print_qr.php?id='.$_GET[id]);


}else{

}

   ?>