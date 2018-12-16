<?php

     if (is_array($data)) {
echo '<div>
  <table id="updateRowView" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead id="thead">
      <tr>';
        foreach ($data[0] as $key => $value) {
          foreach ($value as  $k =>$v) {
           if ($k=="0") {
            echo "<th>$v</th>";
            
          }
          }
        }
        unset($data[0]);
        
        echo "<th>Action</th>
      </tr>
    </thead>
    <tbody>";
      $i=0;
      foreach ($data[1] as $key => $value) {
       echo "<tr>";
       foreach ($value as $k => $v) {
        if ($i%2==0) {
         echo "<td>$v</td>";
         
       }
       $i++;

     }
     echo '<td>
            <button data-dest="content" data-type="updateRowView" class="btn btn-secondary  action" type="button">Modifier</button>
          </td>
          <td>
            <button data-dest="content" data-type="deleteRow" class="btn btn-danger  action" type="button">Supprimer</button>
          </td>';
     echo "</tr>";
   } 
   
 echo '</tbody>
</table>
  <button data-dest="content" data-type="insertForm" class="btn btn-warning  action" type="button">Ajouter une ligne</button>
</div>';
}
if ($data == false) {
echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Echec!</strong> il y a un probleme avec votre requete <br>
  ERROR : '.$data;  
}
?>