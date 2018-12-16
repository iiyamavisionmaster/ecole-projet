<div class="form-group">
  <label for="newColumnName">Definissez un nouveau nom pour la colonne <span class='columnName'><?php echo $openParameter->newColumnName; ?></span> </label>

  <input id="newColumnName" type="text" class="form-control newColumnName" >
    <label for="newColumnType">Definissez un nouveau type pour la colonne </label>
  <input id="newColumnType" type="text" class="form-control newColumnType" >
</div>
<button class="action" data-dest="notif" data-type="renameColumn">Rename</button>
