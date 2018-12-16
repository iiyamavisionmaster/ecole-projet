<div class="form-group">
  <label for="mysql">Mysql</label>
  <input type="text" class="form-control mysqlPath"  id="mysql">
</div>
<button class="action" data-dest="content" data-type="setFileSql">Ajouter</button>

<?php
$file = fopen("../mysqlpath.ini", "a+");
$temp = fgets($file, 4096);
fclose($file);
echo "<br>path to mysql : $temp";
?>