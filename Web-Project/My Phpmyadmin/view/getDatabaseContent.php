<?php 
	if (is_array($data)) {
?>
<table id="contatTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>DATABASE</th>
			<th colspan="5">Action</th>
	</thead>
	<tbody>
	<?php  
		echo "<td>".$openParameter->dataBase."</td>";
	?>
		<td>
			<button id="" data-dest="content" data-type="renameDatabaseView" class="btn btn-secondary  action" type="button">Modifier</button>
		</td>
		<td>
			<button id="" data-dest="content" data-type="addTableView" class="btn btn-secondary  action" type="button">Ajouter Table</button>
		</td>
	</tbody>
</table>
<table id="contatTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Colonne</th>
			<th colspan="5">Action</th>
	</thead>
	<tbody>
		<?php 
			foreach ($data[2] as $key => $value) 
			{
				foreach ($value  as $k => $v) 
				{
					foreach ($v as $k2 => $v2) 
					{
						if ($k2=="0") {
							echo "<tr><td>Date de creation :".$v2	."</td><tr>" ;
						}
					}
				}
			}
			foreach ($data[0] as $key => $value) 
			{
				foreach ($value as $k => $v) 
				{
					if ($k=="0") {
						echo "<tr><td>".$v."</td>" ;
		?>
		<td>
			<button data-dest="content" data-type="contentTable" class="btn btn-secondary  action" type="button">Afficher</button>
		</td>
		<td>
			<button data-dest="content" data-type="getColumnTable" class="btn btn-secondary  action" type="button">Structure</button>
		</td>
		<td>
			<button data-dest="content" data-type="renameTableView" class="btn btn-secondary  action" type="button">Modifier</button>
		</td>
		<td>
			<button data-dest="content" data-type="truncateTable" class="btn btn-warning  action" type="button">Vider</button>
		</td>
		<td>
			<button data-dest="content" data-type="deleteTable" class="btn btn-danger  action deleteTable" type="button">Supprimer</button>
		</td>
	</tr>
	<?php
					}
				}
			}
	 		foreach ($data[1] as $key => $value) 
	 		{
				foreach ($value as $k => $v) 
				{
					echo "<tr><td>Nombre de tables : ".$v[0]." tables</td>" ;
				}
			}
			foreach ($data[3] as $key => $value) 
			{
				foreach ($value as $k => $v) 
				{
					echo "<td>Taille de la BDD : ".$v[0]." Mo</td><tr>" ;
				}
			}
	?>
	</tbody>
</table>
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