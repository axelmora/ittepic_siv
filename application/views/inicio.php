<!DOCTYPE HTML>
<html lang="es" xml:lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>SIV :: ITTEPIC</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/marketdeco.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/soberanasanslight.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/merriweather.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/queries.css" media="all" />


  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>



  <style type="text/css">
  body {
    background-color: #F0F0F0;
  }
  </style>
  <!--[if IE 8]>
  <link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
  <![endif]-->
  <!--[if IE 9]>
  <link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
  <![endif]-->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/ddsmoothmenu.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/html5.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/selectnav.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/twitter.min.js"></script>
</head>

<body>
  <div id="page" class="hfeed">
    <div id="wrapper">
      <header id="branding" role="banner">
        <h1 id="site-title">
          <img src="<?php echo base_url(); ?>images/sep.gif" alt="SIG" width="287" height="86" />
          <img src="<?php echo base_url(); ?>images/titulo.png" alt="SIG" width="380" height="76" /> <img src="<?php echo base_url(); ?>images/logotecchico.png" alt="SIG" width="76" height="76" />
        </h1>
        <div class="right-align"><a href="<?php echo base_url();?>index.php/c_info_usuarios/alumno">Mi usuario<img src="<?php echo base_url(); ?>images/perm_identity_tiny.png"></a></div>
        <div class="right-align"> Bienvenido (a): <?php echo mb_convert_encoding($nombre, 'Windows-1252'); ?>
          <?= anchor(base_url() . 'index.php/Inicio/logout', '( Cerrar sesión )&nbsp;&nbsp;&nbsp;&nbsp;') ?>  </div>
          <div class="social">
            <ul>
              <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-facebook.png" alt="Facebook" /></a></li>
              <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-twitter.png" alt="Twitter" /></a></li>
            </ul>
          </div>
          <navs id="access" class="access" role="">

            <?php if (!$programa) { ?>
              <div id="menu" class="menu">
                <ul id="tiny">
                  <li><a href="<?php echo base_url(); ?>index.php/inicio">Inicio</a>
                  </li>
                  <li><a href="#">Servicio Social
                  </a><ul>
                    <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_anoticias">Noticias</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_proceso">Información</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_programas">Programas</a></li>
                  </ul>
                </li>
                <li><a href="#">Residencia Profesional
                </a><ul>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_informacion">Información del procedimiento</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_participantes">Información de participantes del proyecto</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_banco">Banco de proyectos</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_base">Convenios</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_proponer">Proponer un proyecto</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_avance">Bitacora de avance</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_noticias">Noticias</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_historial">Historial de notificaciones</a></li>
                </ul>
              </li>
              <li><a href="#">Centro de Idiomas</a></li>
              <li><a href="#">Servicio Externo</a></li>
              <li><a href="#">Visitas a Empresas</a></li>

            </ul>
          </div>

          <?php
        } else {
          ?>

          <div id="menu" class="menu">
            <ul id="tiny">
              <li><a href="<?php echo base_url(); ?>index.php/inicio">Inicio</a>
              </li>
              <li><a href="#">Servicio Social
              </a><ul>
                <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_anoticias">Noticias</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_proceso">Información</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_avance">Avance</a></li>
              </ul>
            </li>
            <li><a href="#">Residencia Profesional
            </a><ul>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_informacion">Información del procedimiento</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_participantes">Información de participantes del proyecto</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_banco">Banco de proyectos</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_base">Convenios</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_proponer">Proponer un proyecto</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_avance">Bitacora de avance</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_noticias">Noticias</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_historial">Historial de notificaciones</a></li>
            </ul>
          </li>
          <li><a href="#">Centro de Idiomas</a></li>
          <li><a href="#">Servicio Externo</a></li>
          <li><a href="#">Visitas a Empresas</a></li>

        </ul>
      </div>
      <?php
    }
    ?>
  </nav>
  <!-- #access -->
</header>
<!-- #branding -->
<div id="main">
  <div id="primary">
    <div id="content" role="main">
      <br>
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="<?php echo base_url()."/images/inicio/tec_1.jpg" ?>"> <!-- random image -->
            <div class="caption center-align">
              <br>
              <h3>¡Bienvenido!</h3>
              <h5 class="light black-text">Te presentamos el SIV</h5>
            </div>
          </li>
          <li>
            <img src="<?php echo base_url()."/images/inicio/tec_2.jpg" ?>"> <!-- random image -->
            <div class="caption right-align">
              <h3 class="white-text"></h3>
              <h5 class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
          <li>
            <img src="<?php echo base_url()."/images/inicio/tec_3.jpg" ?>"> <!-- random image -->
            <div class="caption left-align">
              <h3></h3>
              <h5 class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
        </ul>
      </div>
      <div class="intro">
      </ul>
      <h2>&nbsp;</h2>
      <h2>&nbsp;</h2>
      <h2>
        <p>&nbsp;</p>
        <p></p>
      </div>
      <!-- begin article -->
      <!-- begin article -->
      <!-- end article -->
      <!-- begin article --><!-- end article -->
      <!-- begin article --><!-- end article --></div><!-- #content -->
    </div><!-- #primary -->
  </div><!-- #main -->
  <footer id="colophon" role="contentinfo">
    <div id="site-generator">
      Copyright 2016 - ITTepic
    </div>
  </footer>
  <!-- #colophon -->
</div><!-- #wrapper -->
</div><!-- #page -->
<script>
$(document).ready(function () {

  $('.collapsible').collapsible();
  $('.slider').slider({
    full_width: true
  });
  $('.materialboxed').materialbox();
});
</script>
<script src="<?php echo base_url(); ?>js/materialize.js"></script>
<script src="<?php echo base_url(); ?>js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
</body>
</html>
