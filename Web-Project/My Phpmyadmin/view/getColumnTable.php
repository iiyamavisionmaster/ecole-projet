<?php
if (is_array($data)) {
  echo '<table id="contatTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr><th>Ajouter colonne</th><th colspan="5"><button data-dest="content" data-type="addColumnView" class="btn btn-secondary  action" type="button">Ajouter</button></th><tr>
    <tr><th>Table</th><th colspan="5">Action</th><tr></thead><tbody>';
$i = 0;
foreach ($data[0] as $key => $value) {
    
    foreach ($value as $k => $v) {
        
        if ($i % 2 == 0) {
            echo "<tr><td>" . $v . "</td>";
echo '<td><button data-dest="content" data-type="renameColumnView" class="btn btn-secondary  action" type="button">Modifier</button></td>
            <td><button data-dest="notif" data-type="deleteColumn" class="btn btn-danger  action" type="button">Supprimer</button></td>
          </tr>';

        }
        $i++;
    }
    
}

echo '   <tr><td>Total ligne </td><td colspan="5">';
$i = 0;
foreach ($data[1] as $key => $value) {
    foreach ($value[0] as $k => $v) {
        $i++;
        if ($i % 2 == 0) {
            echo "$v";
        }
    }
}       
 echo '     </td></tr>
  </tbody>
</table>';
}

elseif ($data == true) {
echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Echec!</strong> il y a un probleme avec votre requete <br>
  ERROR : '.$data;  
}
else  {
  print_r($data);
}
?>