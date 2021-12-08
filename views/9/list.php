
<table id="listeEmployert" class="table table-hover table-striped table-bordered" style="width:100%">

 <thead>
            <tr> 
              <!-- <th>Act / Desc</th> -->
              <th>CNI <br/>employer</th>
              <th>Nom</th>
              <th>Prénom</th> 
              <th>Téléphone</th> 
              <!-- <th>Email</th>     -->
              <!-- <th>Salaire</th>  -->
              <!-- <th>Cotisation</th>  -->
              <th>Consultation</th> 
              <th>Medicaments</th> 
            </tr>
</thead>
<tbody>
                        <?php  //on inclut notre fichier de connection 
                        $pdo =Database::connect(); //on se connecte à la base 
                        $act=1;
                          $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM employer WHERE activedesc=:act  ORDER BY idEmployer DESC");  
                        $statement->execute(array(":act"=>$act));  
                        $result = $statement->fetchAll();
               
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr class="tr">';
                            // echo '<td  class="td">' . $row['activedesc'] . '</td>';
                            echo '<td>' . $row['cniemployer'] . '</td>';
                            echo '<td>' . $row['nomEmployer'] . '</td>';
                            echo '<td>' . $row['prenomEmployer'] . '</td>';  
                            echo '<td>' . $row['telEmployer'] . '</td>'; 
                            if ($row['activedesc']==0) {
                              echo ' <td><a href="#" ><i class="btn btn-danger">N\'est pas à jour</i></a></td>';    
                              echo ' <td><a href="#" ><i class="btn btn-danger">Ne peut avoir </br> de medicaments</i></a></td>';    
                             } else {
                              echo '<td><a href="modal.php?id='.$row['idEmployer'].'" target="_blank">
                                    <i class="btn btn-success" data-toggle="tooltip" title="Consultation">
                                    <i class="fas fa-hand-holding-medical"></i> </i>
                                  </a>
                                </td>';  
                                echo '<td><a href="modal1.php?id='.$row['idEmployer'].'" target="_blank">
                                    <i class="btn btn-success" data-toggle="tooltip" title="Medicaments">
                                    <i class="fas fa-briefcase-medical"></i>  </i>
                                  </a>
                                </td>';          
                            }
                            
                        echo '</tr>'; 
                        }
                        Database::disconnect();  
                     ?> 
</tbody>  
</table>