
<img src="img/logo.jpg" alt="..." >
<div class='navLink'>
  <a href="" class='HomePage'><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
  <a href="" class='HomePage'><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a>
  <a href="" class='HomePage action'  data-dest='content' data-type='option'><i class="fa fa-tasks fa-lg" aria-hidden="true"></i></a>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="input-group">
      <input type="text" class="form-control databaseName" placeholder="nouvelle database">
      <span class="input-group-btn">
        <button data-dest="content" data-type="createDatabase" class="btn btn-secondary  action" type="button">Créer!</button>
      </span>
    </div>
    <div class="input-group">
      <input type="text" class="form-control databaseName" placeholder="database a supprimer">
      <span class="input-group-btn">
        <button data-dest="content" data-type="deleteDatabase" class="btn btn-secondary  action" type="button">Supp!</button>
      </span>
    </div>
  </div>

</div> 

<?php  
for ($i=0; $i <count($data) ; $i++) { 
  foreach ($data[$i] as $key => $value) {
    echo "<ul id='$key' class='databaseParent '><li><a href='' data-dest='content' data-type='getDatabaseContent' class='action'>$key</a></li><ul class='column '>";
    foreach ($value as $k => $v) {


     echo "<li><a href='' class='action actionNav'data-dest='content' data-type='contentTable'  >".$v[0] ."</a></li>";
   }
   echo "</ul></ul>";
 }
}
 ?>
