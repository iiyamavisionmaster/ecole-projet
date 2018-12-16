<table id="contatTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Valeur</th>
			<th colspan="5">Action</th>
	</thead>
	<tbody>
	<?php 
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				echo "<tr>";
				foreach ($value as $k => $v) {
					echo "<td>".$v	."</td>" ;
				}
				echo "<tr>";
			}
		}
		elseif ($data == false) {
			echo '<div class="alert alert-success alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Votre requete a été executé correctement
		</div>';
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
	</tbody>
</table>