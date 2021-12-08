<?php 
                        include_once '../../../dao/database.php';
                        $conn =Database::connect(); //on se connecte à la base 
                        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                        $stmt = $conn->prepare("SELECT * FROM medicament");  
                        $stmt->execute(array()); 
    					$events = array();   
                        $data = array();
                        while($r = $userRow=$stmt->fetch(PDO::FETCH_ASSOC)) {
                           $rows[] = $r;
					    // $rows[] = $r["idMedicament"];
					    // $rows[] = $r["libelle"];
					    // $rows[] = $r["ipm"];
					    // $rows[] = $r["poucentage"];
					   //  $data[] = array( 
					   //    "idMedicament"=>$r['idMedicament'],
					   //    "libelle"=>$r['libelle'],
					   //    "ipm"=>$r['ipm'],
					   //    "poucentage"=>$r['poucentage']
					   // );
            //             $e = array();
				        // $e['idMedicament'] = $r['idMedicament'];
				        // $e['libelle'] = $r['libelle'];
				        // $e['ipm'] = $r['ipm'];


						}

                        echo json_encode($rows);
                     ?> 
