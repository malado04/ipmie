<?php 
                        include_once '../../../dao/database.php';
                        $conn =Database::connect(); //on se connecte à la base 
                        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                        $stmt = $conn->prepare("SELECT * FROM maladie");  
                        $stmt->execute(array()); 
    					$events = array();   
                        $data = array();
                        while($r = $userRow=$stmt->fetch(PDO::FETCH_ASSOC)) {
                           $rows[] = $r; 
						}

                        echo json_encode($rows);
                     ?> 
