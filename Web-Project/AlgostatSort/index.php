<!DOCTYPE html>
<html>
<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ALGO STAT">
  <meta name="author" content="ALGO STAT">
  <title>Algostat</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link href="css/my_css.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>
  <div class="col-md-2">
    <nav >
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="#"><img src="img/algorithme.jpg" width="60%"></a>
        </li> <br><br>
        <li>
        <a id="algo" href="" >Testez vos Algorithmes</a>
        </li>
        <li>
          <a id="result" href="">Consultez vos Resultats</a><br>
        </li>
        <li class="actionDestroy">
        <button   class="btn btn-secondary  actionDestroy" type="button">Destroy!</button>
          
        </li>
      </ul>
    </nav>
  </div>
  <div id="algoContent" class="col-md-10 ">
    <section  class="section-admin admin-active">

      <div class="container">
        <h2>Algostat</h2>
        <div>
          <div class="input-group ">
           <div class="form-group col-sm-4">
            <label for="typeList">Type de liste:</label>
            <select class="form-control" id="typeList">

              <option value="genOrdList">Une série déjà triée</option>
              <option value="genDecList">Une série triée en sens inverse</option>
              <option value="genSmallDisList">Une série quasiment-triée</option>
              <option value="genUniRandList">Une série totalement aléatoire</option>
              <option value="genDupList">Une série avec beaucoup de doublons et très peu de termes uniques</option>
              <option value="genListArray">Une moyenne des séries citées ci-dessus</option>
            </select>
          </div>
          <div class="form-group col-sm-4">
            <label for="typeList">Nombre d'éléments :</label>
            <select class="form-control" id="nbItem">

              <option value="10">10</option>
              <option value="100">100</option>
              <option value="1000">1000</option>
              <option value="10000">10000</option>
            </select>
          </div>
          <div class="form-group col-sm-4">
            <label for="nbExec">Nombre d'exécutions :</label>
            <input type="text" class="form-control" id="nbExec" placeholder="3" value="3">
          </div>
          <div class="form-group col-sm-4">
            <label for="typeList">Nombre d'éléments :</label>
            <select class="form-control" id="testType">

              <option value="chrono">Compter les Chronos</option>
              <option value="tour">Compter le nombre de tours</option>
            </select>
          </div>
          <span class="input-group-btn buttonReplace col-sm-1">
            <button   class="btn btn-secondary  action" type="button">Go!</button>
          </span>
        </div>
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </section>
</div>

<div class="col-md-10 " id="resultContent">
  <section id="algostat" class="section-admin admin-active">

    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>Numéro du test</th>
            <th>Type de série</th>
            <th>Résultat par Algorithme</th>
          </tr>
        </thead>
        <tbody class="tbodyD">
          <tr>
            <td>Moyenne</td>
            <td></td>
            <td class="tdM"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!-- Bootstrap JSc -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<!-- Custom JS -->
<script src="js/colorData.js"></script>
<script src="js/my_js.js"></script> 
<script src="js/chartjs-plugin-zoom.min.js"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>