<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: PANEL MI USUARIO-:</title>

  <!-- CSS  -->

  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified CSS -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->

  <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">

  <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

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
          MI USUARIO</h5>
        </div>
      </div>

      <div class="container">
        <div class="section">
          <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" href="<?php echo base_url(); ?>index.php">
            <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
            <a class="waves-effect waves-light btn modal-trigger orange " style="margin-left:5%; margin-bottom:3%;" href="#modal1"><i class="material-icons">edit</i>Cambiar Contraseña</a>
            <?php if (isset($messageerror)) { ?>
              <CENTER><p class="col s4 center-align card-panel red white-text"><?php echo "$messageerror"; ?></p></CENTER><br>
            <?php } ?>
            <?php if (isset($messageseactualizocontrasena)) { ?>
              <CENTER><p class="col s4 center-align card-panel green white-text"><?php echo "$messageseactualizocontrasena"; ?></p></CENTER><br>
            <?php } ?>
            <div class="center-align col m6 card-panel grey lighten-5">
              <table class="bordered highlight responsive-table">
                <tr>
                  <th>USUARIO</th>
                  <th>NOMBRE DE USUARIO</th>
                  <th>CORREO</th>
                  <th>MODIFICAR</th>

                </tr>
                <?php
                $usuarionombre="";
                if ($info_usuario) {

                  foreach ($info_usuario as $value) {
                      $usuarionombre=$value->nombre_usuariosistema;
                    ?>
                    <tr>
                      <form method="post" action="<?php echo base_url() . 'index.php/c_info_usuarios/actualizar_administrativo/' ?>">
                        <td><?php echo $info; ?></td>
                        <td><input type="text" name="usuario" id="usuario" value="<?php echo $value->nombre_usuariosistema; ?>" required/></td>
                        <td><input type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@ittepic.edu.mx" title="...@ittepic.edu.mx" name="correo" id="correo" value="<?php echo $value->correo; ?>" required/></td>
                        <td><button type="submit" style=" border: 0; background: transparent"><img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons blue-text">autorenew</i>
                        </button></td>
                      </form>
                    </tr>
                    <?php
                  }
                }
                ?>
              </table>

            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </div>
          <!-- MODAL CAMBIAR CONTRASEÑA -->
          <?php echo form_open('C_info_usuarios/validarEditarContrasena'); ?>
          <div id="modal1" class="modal">
            <div class="modal-content">
              <p class="amber-text" style=" font-size: 120%;">
                <i class="material-icons">enhanced_encryption</i> Cambiar contraseña para <?php echo $usuarionombre;?></p>
              <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Ingresar Contraseña Actual" id="contraacutal" name="contraacutal" type="text" value="<?php echo set_value('contraacutal'); ?>" class="validate" required>
                  <label for="contraacutal">Contraseña Actual</label>
                  <div class="red-text left"><?php echo form_error('contraacutal'); ?></div>
                </div>
                <div class="input-field col s6">
                  <input id="contranueva1"  name="contranueva1" placeholder="Ingresar nueva contraseña." type="text" value="<?php echo set_value('contranueva1'); ?>" class="validate" required>
                  <label for="contranueva1">Nueva Contraseña</label>
                    <div class="red-text left"><?php echo form_error('contranueva1'); ?></div>
                </div>
                <div class="input-field col s6">
                  <input id="contranueva2" type="text"  name="contranueva2" placeholder="Ingresar nuevamente la contraseña nueva." value="<?php echo set_value('contranueva2'); ?>" class="validate" required>
                  <label for="contranueva2">Repetir Nueva Contraseña</label>
                    <div class="red-text left"><?php echo form_error('contranueva2'); ?></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn red "><i class="material-icons">cancel</i>Cancelar</a>
              <button class="btn waves-effect waves-green orange darken-1 right-align z-depth-0 " style="margin-right:2%;" type="submit">
                <div class="text-orange"><i class="material-icons right">description</i>Cambiar Contraseña</div>
              </button>
            </div>
          </div>
          <?= form_close() ?>
          <!-- MODAL CAMBIAR CONTRASEÑA -->


        </div>
        <br><br>
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
        <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <script src="<?php echo base_url(); ?>js/init.js"></script>
        <script src="<?php echo base_url(); ?>js/modals.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/funciones.js"></script>


      </body>
      </html>
