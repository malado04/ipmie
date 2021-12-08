<meta http-equiv='refresh' content='50; url=#paiement'/>
<table id="paiement" class="table table-hover table-striped table-bordered" style="width:100%">


 <thead>
            <tr>
              <th>Matricule</th>
              <th>Raison social</th>
              <!-- <th>Sigle</th>  -->
              <th>cotisation</th>
              <th>Date <br> de cotisation</th> 
              <th>periode</th> 
              <th>remboursement</th>
              <th>Date <br> de remboursement</th>
              <th>periode</th> 
              <th>refcheque</th>  
              <th>valeurrefcheque </th>   
              <th>banqueclient</th>   
              <th>Cotisation !</th>   
              <!-- <th>Paiement !</th>    -->
            </tr>
</thead>
<tbody>
                        <?php  //on inclut notre fichier de connection 
                        $pdo =Database::connect(); //on se connecte à la base 
                        $datemois=date('Y');
                        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                        $statement = $pdo->prepare("SELECT * FROM paiement, entreprise WHERE paiement.entreprise_id=entreprise.idEntreprise AND datec=:datemois ORDER BY idEntreprise DESC");  
                        $statement->execute(array('datemois'=>$datemois));  
                        $result = $statement->fetchAll();
                       
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr>';
                 //           echo '<td>' . $row['idEmployeur'] . '</td>';
                            echo '<td>' . $row['matriculeEntreprise'] . '</td>';
                            echo '<td>' . $row['raisonSociale'] . '</td>';
                            // echo '<td>' . $row['sigleEntreprise'] . '</td>';
                            echo '<td>' . $row['cotisation'] . '</td>';
                            echo '<td>' . $row['datec'] . '</td>';
                            echo '<td>' . $row['periodec'] . '</td>';  
                            echo '<td>' . $row['remboursement'] . '</td>';
                            echo '<td>' . $row['dater'] . '</td>';  
                            echo '<td>' . $row['perioder'] . '</td>';  
                            echo '<td>' . $row['refcheque'] . '</td>';  
                            echo '<td>' . $row['valeurrefcheque'] . '</td>'; 
                            echo '<td>' . $row['banqueclient'] . '</td>'; 
                            echo ' <td><a href="print.php?id='.$row["idpaiement"].'" target="blank_"><i class="btn btn-success" data-toggle="tooltip" title="Edit"> Imprimer ! </i></a></td>'; 
                            // echo ' <td><a href="#ajoutPaiement" class="ajoutPaiement"  data-id="'.$row['idEntreprise'].'" href="javascript:void(0)" data-toggle="modal"><i class="btn btn-primary" data-toggle="tooltip" title="Edit"> Paiement ! </i></a></td>'; 
                        echo '</tr>'; 
                        }
                        Database::disconnect();  
                     ?> 
</tbody>  
</table>