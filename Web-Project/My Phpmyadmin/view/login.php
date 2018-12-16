<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <title>VPOnline</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
 <link rel="stylesheet" href="public/css/auth.css"/>
 <link href="public/css/my_css.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <br><br><br><br>
    <div class="row">
      <div class="vspacer"></div>
      <div class="col-md-4 col-md-offset-4">
       <div style="text-align: center; background-color:#545454;" ><br />
        <img src="public/img/logo.jpg" alt="..." >
        <h5 style="color:#FFF;">Connectez-vous pour accéder au service.</h5><br/>
      </div>
      <form role="form" method="POST" action='#'>
       <div class ="well">
        <div class="form-group" style="text-align: center">
          <img src="public/img/avatar.png" alt="..." class="img-circle">
        </div>
        <div class="form-group ">
          <input type="text" class="form-control input-lg " id="loginDB"  name="loginDB" required="required" placeholder="Adresse e-mail">
        </div>
        <div class="form-group">
          <input type="password" class="form-control input-lg" id="passwordDB" name="passwordDB"  placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn  btn-lg btn-warning btn-block  ">Connexion</button>
        <div class="checkbox">
         <label>
          <input type="checkbox"> Rester connecté</label>
        </div>
      </div>
    </form>
    <div id="error"></div>
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="public/js/login.js"></script>
</body>
</html>


