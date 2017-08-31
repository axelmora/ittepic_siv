<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: PANEL JEFE VINCULACION :</title>
  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<style>
html {
  height: 100%;
}
body {
  min-height: 100%;
  display: grid;
  grid-template-rows: 1fr auto;
}
.footer {
  grid-row-start: 2;
  grid-row-end: 3;
}
.content {
  flex: 1 0 auto; /* Prevent Chrome, Opera, and Safari from letting these items shrink to smaller than their content's default minimum size. */
  padding: 20px;
}
i.icon-red {
    color: red;
}
</style>
<body>
  <nav>
    <div class="nav-wrapper grey lighten-5 left-align">
      <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>
      <div class="right-align hide-on-med-and-down">
      </div>
    </div>
    <div class="right-align hide-on-med-and-down">
        <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down">Bienvenido <?= $this->session->userdata('perfil') ?>
                <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
    </div>
  </nav>
  <!-- Navbar goes here -->
  <!-- Page Layout here -->
  <div class="row">
    <div class="col s3">
      <!-- Grey navigation panel -->
    </div>
    <div class="col s9">
      <!-- Teal page content  -->
    </div>
  </div>
  <div class="row content" >
    <div class="col s12">
      <div class="container">
        <center>
          <i class="large material-icons icon-red">error</i>
        <p>No tienes permisos para acceder a esta sección.</p>
      </center>
      </div>
    </div>
  </div>
  <footer class="page-footer black">
    <div class="container">
    </div>
    <div class="footer-copyright">
      <div>
        <div align="center ">Copyright 2017 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
          ITTepic
        </span></a></div>
      </div>
    </div>
  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../bin/materialize.js"></script>
  <script src="js/init.js"></script>
</body>
</html>
