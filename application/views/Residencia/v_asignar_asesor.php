<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: ASIGNAR ASESOR Y REVISORES</title>

  <!-- CSS  -->

  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified CSS -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->

  <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Responsive/css/responsive.dataTables.min.css">
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
    <!-- Navbar goes here keyboard_return_tiny-->


    <div class="section no-pad-bot" id="index-banner">

      <div class="row center">

        <h5 class="condensed light header center amber-text darken-1-text">
          ASIGNAR ASESOR Y REVISORES</h5>
        </div>

      </div>

      <div class="container">
        <div class="section">
          <?php if ($info == 'jefeacademico') { ?>
            <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
            href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
          <?php } else if ($info == 'coordinadorresidencia') {
            ?>
            <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
            href="<?php echo base_url() . 'index.php/Residencia/CoordinadorResidencia/Panel_coordiresidencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
          <?php }
          ?>

          <div class="left-align col s3 m6 l3 card-panel grey lighten-5">
            <div class="input-field">
              <?php if ($residentes) { ?>
                <form method="post" action="<?php echo base_url() . "index.php/Residencia/c_asignar_asesor/info_residente_sin_asesor"; ?>">
                  <label>Selecciona un alumno</label>
                  <br>
                  <br>
                  <select  id="participantes_id" name="participantes_id">
                    <?php
                    if ($residente_info) {
                      foreach ($residentes as $value) {
                        foreach ($residente_info as $val) {
                          if ($val->id == $value->id) {
                            ?>
                            <option value="<?= $value->id; ?>" selected><?= $value->nombre; ?></option>
                          <?php } else {
                            ?>
                            <option value="<?= $value->id; ?>"><?= $value->nombre; ?></option>
                            <?php
                          }
                        }
                      }
                    } else {
                      foreach ($residentes as $v) {
                        ?>
                        <option value="<?= $v->id; ?>"><?= $v->nombre; ?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <br>
                  <br>
                  <button class="btn orange waves-effect darken-1 right-align z-depth-0" type="submit">
                    Seleccionar</button>

                  </form>
                <?php } else { ?>
                  <p style="text-align: center;" class="blue-text"><?php echo 'No hay asignaciones pendientes.'; ?></p>
                <?php } ?>
              </div>
            </div>
            <p style="text-align: center;" class="blue-text"><?php echo $mensajes; ?></p>
            <?php if ($residente_info) { ?>
              <div class="row">
                <div class="col s5 center-align card-panel grey lighten-5">
                  <div class="input-field left-align">
                    <?php foreach ($residente_info as $value) { ?>
                      <div id="buscador">
                        DATOS DEL ALUMNO
                        <hr>
                        <b>Nombre completo:</b> <?= $value->nombre ?>
                        <br>
                        <b>No. de control:</b> <?= $value->numero_control ?>
                        <br>
                        <b>Carrera:</b> <?= $value->carrera ?>
                        <br>
                        <b>Semestre:</b> <?= $value->semestre_cursado ?>
                        <br>
                        <b>Teléfono:</b> <?= $value->telefono ?>
                        <br>
                        <b>Correo:</b> <?= $value->correo ?>
                        <br>
                        <b>Domicilio:</b> <?= $value->domicilio ?>
                        <br>
                        <br>
                      </div>
                    </div>
                  </div>
                  <div class="col s2"><br></div>
                  <div class="col s5 right-align card-panel grey lighten-5 ">
                    <div class="input-field left-align">
                      DATOS DEL PROYECTO
                      <hr>
                      <b>Nombre del Proyecto:</b> <?= $value->nombre_proyecto ?>
                      <br>
                      <b>Departamento del anteproyecto:</b> <?= $value->departamento_anteproyecto ?>
                      <br>
                      <b>Origen de anteproyecto:</b> <?php
                      if ($value->banco) {
                        echo 'Banco de proyectos';
                      } else {
                        echo 'Propuesta de alumno';
                      }
                      ?>
                      <br>
                      <b>Nombre de la empresa:</b> <?= $value->nombre_empresa ?>
                      <br>
                      <b>Proyecto opción para titulación:</b> <?php
                      if ($value->titulacion) {
                        echo 'Si';
                      } else {
                        echo 'No';
                      }
                      ?>
                      <br>
                      <br>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>

              <div class="center-align col m6 card-panel grey lighten-5">
                <form id="frm_asignar" method="post" action="<?php echo base_url() . "index.php/Residencia/c_asignar_asesor/asignar/" ?>">
                  <b>ASIGNAR ASESOR Y REVISORES</b>
                  <br>
                  <br>
                  Asesor: <label id="a">Sin asesor</label>&nbsp;&nbsp;&nbsp;&nbsp;
                   <!-- class modal-trigger -->
                  <a id="asesor" href="#modal_seleccionar_asesor-revisores" class="caro1 waves-effect  modal-trigger  tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar asesor">
                    <img src="<?php echo base_url(); ?>images/queue_tiny.png">
                  </a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a id="asesor-2" href="#modal_seleccionar_asesor-revisores2" class="caro2 waves-effect modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar asesor de otros departamentos">
                    <img src="<?php echo base_url(); ?>images/queue_tiny.png">
                  </a>
                  <br>
                  <br>
                  <a style="margin-bottom:15px;" class="btn waves-effect orange waves-light" id="revisoresboton">Selecionar revisores  <i class="material-icons right">person_add</i></a>
                  <div id="revisores" style="display: none;">
                    Revisor 1: <label id="r1">Sin revisor</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a id="revisor1" href="#modal_seleccionar_asesor-revisores" class=" waves-effect modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar revisor">
                      <img src="<?php echo base_url(); ?>images/queue_tiny.png">
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a id="revisor1-2" href="#modal_seleccionar_asesor-revisores2" class="waves-effect modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar revisor de un departamento no académico">
                      <img src="<?php echo base_url(); ?>images/queue_tiny.png">
                    </a>
                    <br>
                    <br>
                    Revisor 2: <label id="r2">Sin revisor</label>&nbsp;&nbsp;&nbsp;&nbsp;<a id="revisor2" href="#modal_seleccionar_asesor-revisores" class="waves-effect modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar revisor">
                      <img src="<?php echo base_url(); ?>images/queue_tiny.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a id="revisor2-2" href="#modal_seleccionar_asesor-revisores2" class="waves-effect modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Asignar revisor de un departamento no académico">
                        <img src="<?php echo base_url(); ?>images/queue_tiny.png"></a>
                      </div>
                      <br>
                      <br>
                      <?php
                      foreach ($residente_info as $value) {
                        if ($value->banco=='t') {
                          ?>
                          Asesor externo: <label id="ae">Sin asesor</label>     <a href="#modal_asignar_asesorE" class="waves-effect modal-trigger tooltipped" data-position="right" data-delay="50" data-tooltip="Asignar asesor">
                            <img src="<?php echo base_url(); ?>images/queue_tiny.png"></a>
                            <br>
                            <br>
                            <input id="id_empresa" name="id_empresa" type="text" value="" hidden="true">
                            <input id="id_anteproyecto" name="id_anteproyecto" type="text" value="" hidden="true">
                            <input id="nombre_asesore" name="nombre_asesore" type="text" value="" hidden="true">
                            <input id="area_ae" name="area_ae" type="text" value="" hidden="true">
                            <input id="correo_ae" name="correo_ae" type="text" value="" hidden="true">
                            <input id="puesto_ae" name="puesto_ae" type="text" value="" hidden="true">
                            <input id="banco" name="banco" type="text" value="t" hidden="true">
                            <?php
                          }
                          else{ ?>
                            <input id="banco" name="banco" type="text" value="f" hidden="true">
                          <?php }
                        }
                        ?>
                        <input id="id_participantes" name="id_participantes" type="text" value="<?php echo $id_participantes; ?>" hidden="true">
                        <input id="rfc_asesor" name="rfc_asesor" type="text" value="" bandera="0" nombres="" hidden="true">
                        <input id="rfc_revisor1" name="rfc_revisor1" type="text" value="" bandera="0" nombres="" hidden="true">
                        <input id="rfc_revisor2" name="rfc_revisor2" type="text" value="" bandera="0" nombres="" hidden="true">

                        <a id="btn_asignar" class="btn orange waves-effect darken-1 right-align z-depth-0" onclick="btn_asignar('<?php echo $id_participantes; ?>','<?php echo base_url();?>');">
                          GUARDAR</a>
                          <a id="cancelar_asignacion" class="btn red waves-effect darken-1 right-align z-depth-0">
                            CANCELAR</a>
                          </form>

                        </div>
                        <?php
                      }
                      ?>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                    </div>

                  </div>
                  <?php if ($residente_info) { ?>
                    <!-- Modal Structure -->
                    <div id="modal_seleccionar_asesor-revisores" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h4>Docentes</h4>
                        <table id="tabla_modal_docentes" class="display">
                          <thead>
                            <tr>
                              <th>Nombres</th>
                              <th>Departamento</th>
                              <th>Especialidad</th>
                              <th style="text-align: center;">Seleccionar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if ($docentes) {
                              foreach ($docentes as $value) {
                                ?>
                                <tr>
                                  <td><?= utf8_decode($value->nombres . ' ' . $value->apellidos); ?></td>
                                  <td><?= $value->departamento; ?></td>
                                  <td><?= $value->especialidad; ?></td>
                                  <td style="text-align: center;"><a class = "modal-close" onclick="asignar_asesor_revisores('<?php echo $value->rfc; ?>', '<?php echo $value->nombres . ' ' . $value->apellidos; ?>');"><img src="<?php echo base_url(); ?>images/done_tiny.png"></a>
                                  </td>
                                </tr>
                                <?php
                              }
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Cancelar</a>
                      </div>
                    </div>
                    <!-- Modal Structure -->
                    <div id="modal_seleccionar_asesor-revisores2" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h4>Docentes de otros departamentos</h4>
                        <table id="tabla_modal_docentes2" class="display">
                          <thead>
                            <tr>
                              <th>Nombres</th>
                              <th>Departamento</th>
                              <th>Especialidad</th>
                              <th style="text-align: center;">Seleccionar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if ($docentes_otros) {
                              foreach ($docentes_otros as $value) {
                                ?>
                                <tr>
                                  <td><?= utf8_decode($value->nombres . ' ' . $value->apellidos); ?></td>
                                  <td><?= $value->departamento; ?></td>
                                  <td><?= $value->especialidad; ?></td>
                                  <td style="text-align: center;"><a class = "modal-close" onclick="asignar_asesor_revisores('<?php echo $value->rfc; ?>', '<?php echo $value->nombres . ' ' . $value->apellidos; ?>');"><img src="<?php echo base_url(); ?>images/done_tiny.png"></a>
                                  </td>
                                </tr>
                                <?php
                              }
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Cancelar</a>
                      </div>
                    </div>
                    <?php
                    foreach ($residente_info as $value) {
                      if ($value->banco=='t') {
                        ?>
                        <!-- Modal Structure -->
                        <div id="modal_asignar_asesorE" class="modal modal-fixed-footer">
                          <div class="modal-content">
                            <h4>Asignar asesor externo</h4>
                            <input id="id_empresa_modal" name="nombre_ae_modal" type="text" hidden="true"value="<?php echo $value->empresa_pk; ?>">
                            <input id="id_anteproyecto_modal" name="id_anteproyecto_modal" type="text" hidden="true"value="<?php echo $value->anteproyecto_pk; ?>">
                            <div class="row">
                              <div class="input-field col s6">
                                <input id="nombre_ae_modal" type="text" name="nombre_ae_modal" class="validate">
                                <label for="nombre_ae_modal">Nombre completo</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                <input id="area_modal" type="text" name="area_modal" class="validate">
                                <label for="area_modal">Área en empresa</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                <input id="puesto_modal" type="text" name="puesto_modal" class="validate">
                                <label for="puesto_modal">Puesto en empresa</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                <input id="email_ae_modal" type="email" name="email_ae_modal" class="validate">
                                <label for="email_ae_modal">Correo electrónico</label>
                              </div>
                            </div>
                            <a id = "aceptar_modal_asig_ae" class="btn orange waves-effect">Aceptar</a>
                            <br>
                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Cancelar</a>
                          </div>
                        </div>
                        <?php
                      }
                    }
                  }
                  ?>
                  <br><br><br>
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
                  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
                  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>
                  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/modals.js"></script>
                  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/funciones.js"></script>
                  <script>
                  $(document).ready(function(){
                    $("#revisoresboton").click(function(){
                      $("#revisores").slideToggle( "fast", function() {
                        // Animation complete.
                      });
                    });
                  });

                  </script>
                </body>
                </html>
