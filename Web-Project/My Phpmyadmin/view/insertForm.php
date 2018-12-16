<?php 
if (is_array($data)){
  ?>
<table id="insertData" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Colonne</th>
      <th colspan="5">Data</th>
    <tr>
  </thead>
  <tbody>
  <?php
    $i = 0; 
    foreach ($data[0] as $key => $value) 
    {
      foreach ($value as $k => $v) 
      {  
        if ($i % 2 == 0) 
        {
          echo "<tr><td><p>" . $v . "</p></td>";
  ?>
      <td>
        <input type="text" value=""></input>
      </td>
    </tr>
    <?php
        }
        $i++;
      }
    }
    ?>
  </tbody>
</table>
<button data-dest="content" data-type="insertData" class="btn btn-warning  action" type="button">Ajouter</button>
<?php
}
elseif ($data == true) 
{
  echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Echec!</strong> il y a un probleme avec votre requete <br>
  ERROR : '.$data;  
}
else  
{
  print_r($data);
}
?>