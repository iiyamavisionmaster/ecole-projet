 
<div>
  <table id="updateRowView" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead id='thead'>
      <tr>
        <?php 
        foreach ($data[0] as $key => $value) 
        {
        	if ($value != "Action") 
          {
        		echo "<th>$value</th>";
        	}
        }
        unset($data[0]);
        ?>
      </tr>
    </thead>
    <tbody>
    <?php
      echo "<tr>"; 
      foreach ($data[1] as $key => $value) 
      {
        if ($value!="Modifier" && $value != "Supprimer") 
        {
          echo "<td><div class='form-group'>
          <input type='text' class='form-control updateRow' placeholder='$value'>
          </div></td>";
        }
      }
      echo "</tr>"; 
    ?>
    </tbody>
  </table>
  <button data-dest="content" data-type="updateRow" class="btn btn-warning  action" type="button">Update</button>
</div>