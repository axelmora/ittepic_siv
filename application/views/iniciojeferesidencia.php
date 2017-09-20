<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: PANEL JEFE DE RESIDENCIA PROFESIONAL :</title>

  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav>
    <div class="nav-wrapper grey lighten-5 left-align">
      <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

      <div class="right-align hide-on-med-and-down">
        <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down">Bienvenido  <?= $this->session->userdata('perfil') ?>
          <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
        </div>
        <div class="right-align hide-on-med-and-down">
          <a href="<?php echo base_url(); ?>index.php/c_info_usuarios/administrativo"><span class="amber-text text-darken-2 right-align hide-on-med-and-down">Mi usuario<img src="<?php echo base_url(); ?>images/perm_identity_tiny.png"></span></a>
        </div>
      </div>
    </nav>
    <!-- Navbar goes here -->
    <!-- Page Layout here -->
    <!--  <div class="row">
    <div class="col s3">

  </div>
  <div class="col s9">
</div>
</div> -->
<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <h3 class="thin header center amber-text darken-1-text">
      Sistema Integral de Vinculación <br></h3>
      <p></p>
      <div class="row center">
        Jefe de Residencia Profesional - Panel de Administración
      </div>
      <div class="row center">
        <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">

        <a href="<?php echo base_url(); ?>index.php/Residencia/JefeResidencia/Panel_jeferesidencia/banco_proyecto">
          <div class="col s12 m4 center">
            <div class="card-panel grey lighten-5 z-depth-1 caro">
              <div class="row valign-wrapper ">
                <div class="col s6">
                  <img src="<?php echo base_url(); ?>images/banco.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s5">
                  <span class="black-text">
                    <h5 class="light">Banco de proyectos</h5>
                  </span>
                </div>
              </div>
            </div>
          </div></a>
          <a href="<?php echo base_url(); ?>index.php/Residencia/JefeResidencia/Panel_jeferesidencia/informacion_procedimiento">
            <div class="col s12 m4 center">
              <div class="card-panel grey lighten-5 z-depth-1 caro">
                <div class="row valign-wrapper">
                  <div class="col s6">
                    <img src="<?php echo base_url(); ?>images/info.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s7">
                    <span class="black-text">
                      <h5 class="light">Consultar información del procedimiento</h5>
                    </span>
                  </div>
                </div>
              </div>
            </div></a>
            <a href="<?php echo base_url(); ?>index.php/Residencia/JefeResidencia/Panel_jeferesidencia/registrar_documentos">
              <div class="col s12 m4 center">
                <div class="card-panel grey lighten-5 z-depth-1 caro">
                  <div class="row valign-wrapper">
                    <div class="col s6">
                      <img src="<?php echo base_url(); ?>images/revisiones.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s6">
                      <span class="black-text">
                        <h5 class="light">Registrar recepción de documentos</h5>
                      </span>
                    </div>
                  </div>
                </div>
              </div></a>
            </div>
            <div class="row">
              <a href="<?php echo base_url(); ?>index.php/Residencia/JefeResidencia/Panel_jeferesidencia/consulta_dictamen">
                <div class="col s12 m4 center">
                  <div class="card-panel grey lighten-5 z-depth-1 caro">
                    <div class="row valign-wrapper">
                      <div class="col s6">
                        <img src="<?php echo base_url(); ?>images/auto_dictamen.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                      </div>
                      <div class="col s6">
                        <span class="black-text">
                          <h5 class="light">Consultar autorización de dictamen</h5>
                        </span>
                      </div>
                    </div>
                  </div>
                </div></a>

                <a href="<?php echo base_url(); ?>index.php/Residencia/C_vacantes_residencia">
                  <div class="col s12 m4 center">
                    <div class="card-panel grey lighten-5 z-depth-1 caro">
                      <div class="row valign-wrapper ">
                        <div class="col s6">
                          <img src="<?php echo base_url(); ?>images/vacantes.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s6">
                          <span class="black-text">
                            <h5 class="light">Vacantes</h5>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div></a>
                  <a href="<?php echo base_url(); ?>index.php/Residencia/C_reportes">
                    <div class="col s12 m4 center">
                      <div class="card-panel grey lighten-5 z-depth-1 caro">
                        <div class="row valign-wrapper ">
                          <div class="col s6">
                            <img src="<?php echo base_url(); ?>images/reportes.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                          </div>
                          <div class="col s6">
                            <span class="black-text">
                              <h5 class="light">Reportes</h5>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div></a>
                    <a href="<?php echo base_url(); ?>index.php/Residencia/JefeResidencia/Panel_jeferesidencia/informe_finalsemestre">
                      <div class="col s12 m4 center">
                        <div class="card-panel grey lighten-5 z-depth-1 caro">
                          <div class="row valign-wrapper ">
                            <div class="col s6">
                              <img src="<?php echo base_url(); ?>images/reportes.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s6">
                              <span class="black-text">
                                <h5 class="light">Lista Informe Final</h5>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div></a>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="section">
                </div>
              </div>
              <footer class="page-footer black">
                <div class="container">
                </div>
                <div class="footer-copyright">
                  <div>
                    <div align="center ">Copyright 2016 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
                      ITTepic
                    </span></a></div>
                  </div>
                </div>
              </footer>
              <!--  Scripts-->
              <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
              <script src="<?php echo base_url(); ?>js/materialize.js"></script>
              <script src="<?php echo base_url(); ?>js/init.js"></script>
              <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.matchHeight.js"></script>
              <script>
              $(function() {
                $('.caro').matchHeight();
              });
              </script>
            </body>
            </html>
