<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: CONSULTAR PROYECTOS POR DOCENTE</title>
  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->
  <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/font-awesome.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav>
    <div class="nav-wrapper grey lighten-5 left-align">
      <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

      <div class="right-align hide-on-med-and-down">
        <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down"><?php echo $info; ?>
          <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
        </div>
      </div>
    </nav>
    <!-- Navbar goes here -->


    <div class="section no-pad-bot" id="index-banner">
      <div class="row center">
        <h5 class="condensed light header center amber-text darken-1-text">
          CONSULTAR PROYECTOS POR DOCENTE</h5>
        </div>

      </div>

      <div class="container">
        <div class="section">
          <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
          href="<?php echo base_url() . 'index.php/'; ?>">
          <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
          <div class="row">
            <div class="left-align col s12 m6 l5 card-panel grey lighten-5 caro">
              <div class="input-field">
                <?php
                if ($proyectos) { ?>
                  <form id ="frm_sel_docente" method="post" action="<?php echo base_url().'index.php/Residencia/CoordinadorResidencia/panel_coordiresidencia/participaciones_docente';?>">
                    <label><i class="fa fa-user" aria-hidden="true"></i> DOCENTE</label>
                    <br>
                    <br>
                    <select  id="rfc_docente" name="rfc_docente">
                      <?php
                      foreach ($proyectos as $value) { ?>
                        <option value="<?php echo $value->rfc;?>"><?= utf8_decode($value->nombres.' '.$value->apellidos); ?></option>
                      <?php }
                      ?>
                    </select>
                    <br>
                    <br>
                    <button id="btn_sel_docente" class="btn orange darken-1 right-align z-depth-0" style="margin-bottom: 10px;" >
                      Seleccionar</button>
                      <br>
                    </form>
                  <?php }
                  else{ ?>
                    <p class="blue-text"><i class="fa fa-user" aria-hidden="true"></i>  No hay docentes</p>
                  <?php }
                  ?>
                </div>
              </div>
              <div class=" col s2 m2 l2 card-panel ">

              </div>
              <div class="left-align col s12 m6 l5 card-panel grey lighten-5 caro">
                <div class="input-field">
                  <?php
                  if ($proyectoscompartidos) { ?>
                    <form id ="frm_sel_docentecompartido" method="post" action="<?php echo base_url().'index.php/Residencia/CoordinadorResidencia/panel_coordiresidencia/participaciones_docentecompartido';?>">
                      <label><i class="fa fa-users" aria-hidden="true"></i> DOCENTE COMPARTIDO</label>
                      <br>
                      <br>
                      <select  id="rfc_docente" name="rfc_docente">
                        <?php
                        foreach ($proyectoscompartidos as $value) { ?>
                          <option value="<?php echo $value->rfc;?>"><?= utf8_decode($value->nombres.' '.$value->apellidos); ?></option>
                        <?php }
                        ?>
                      </select>
                      <br>
                      <br>
                      <button id="btn_sel_docente2" class="btn orange darken-1 right-align z-depth-0" style="margin-bottom: 10px;" >
                        Seleccionar</button>
                        <br>
                      </form>
                    <?php }
                    else{ ?>  <center>
                      <p class="blue-text"><i class="fa fa-users" aria-hidden="true"></i> <center>  No hay docentes compartido </center></p>
                    <?php }
                    ?>
                  </div>
                </div>
              </div>
              <div id="participaciones" class="col s6 center-align card-panel grey lighten-5" hidden>
                <table id="tabla_participantes_proy" class="responsive-table display">
                  <thead>
                    <tr>
                      <th style="text-align: center;">Puesto/Función</th>
                      <th style="text-align: center;">Proyecto</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>

          </div>

          <br><br>

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


          <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>
          <script src="<?php echo base_url(); ?>js/materialize.js"></script>

          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/media/js/jquery.dataTables.js"></script>
          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>
          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/coordi_residencia.js"></script>
          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.form.min.js"></script>
          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.matchHeight.js"></script>
          <script>
          $(function() {
            $('.caro').matchHeight();
          });
          </script>
        </body>
        </html>
