<?php 
/*require '../Autoloader.php'; 
Autoloader::register(); 

if(Auth::islog() == true)
{
    require "public/index.php";
}else { 
    require "../view/login.php";
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head id="header">

</head>
<body> 


<div class="col-md-2 ">
    <nav >

        <ul id="nav" class="sidebar-nav"> 

        </ul>
    </nav>
</div>
<div class="col-md-10 ">
    <section id="content" class="section-admin admin-active ">
        <div class="container ">
            <div class="row">

                <div class="col-lg-10 col-lg-offset-1 text-center all">
                <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><div class='dataBaseDisplay'>Database</div><div class='tableDisplay'></div></a>
    </div>
    <ul class="nav navbar-nav navContent">

      <li  id='Afficher' class="active"><a href="#">Afficher</a></li>
        <li id='Structure' class=""><a href="#">Structure</a></li>
        <li id='Insert' class=""><a href="#">Insert</a></li>
      <li id='Drop' class=""><a href="#">Drop</a></li>
      <li id='SQL' class=""><a href="#" data-dest="content" data-type="freeRequester" class="action">SQL</a></li>
    </ul>
  </div>
</nav><div class="notif"></div><div class="content">


                    </div>
                </div>
            </div>
        </section>
        <section id="contacts" class="section-admin admin-active">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 text-center ">
                        <h2>Contactez nous</h2>
                        <hr class="small">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="a-r" class="section-admin-item ">
                                    <form class="form-admin well form-horizontal" >
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Email</label>  
                                            <div class="col-md-4 ">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input id="email" name="email" placeholder="email" class="form-control"  type="text" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Message</label>  
                                            <div class="col-md-4 ">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                                                    <textarea name="msg" placeholder="Votre message" class="form-control"  type="textarea"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <a id="send" href="#" class="btn btn-dark">Send</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="footer" class="col-md-12"></div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/my_js.js"></script>
    <script src="js/loadView.js"></script>    
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>
</html>