<?php 
if ($data == false) {
echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Votre base <'.$openParameter->dataBase.'> a été renommé en <'.$openParameter->renameDatabase.'> 
</div>

'; 
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
