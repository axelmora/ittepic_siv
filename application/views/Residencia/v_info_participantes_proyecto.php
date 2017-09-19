<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: INFORMACIÓN DE PARTICIPANTES DE PROYECTO</title>
  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->
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
          INFORMACIÓN DE PARTICIPANTES DE PROYECTO</h5>
        </div>

      </div>
      <div class="container">
        <div class="section">
          <?php if ($info == 'jefeacademico') { ?>
            <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
            href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
          <?php } elseif ($perfil == 'docente') { ?>
            <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
            href="<?php echo base_url() . 'index.php/Residencia/Docente/panel_docente'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
            <?php
          }
          ?>
          <div class="center-align col s3 m6 l3 card-panel grey lighten-5">
            <?php if ($perfil == 'docente') { ?>
              <!-- Asesor/revisor -->
              <div class="switch">
                <label>
                  Asesor
                  <input id="ar" type="checkbox" base = "<?php echo base_url(); ?>">
                  <span class="lever"></span>
                  Revisor
                </label>
              </div>
            <?php } ?>
            <!--<form method="post" action="<?php echo base_url() . "index.php/c_alumnos_ds/cambiar_estado/" ?>">-->
            <div class="input-field">
              <?php if ($proyectos) { ?>
                <form id="frm_sel_proyecto" method="post" action="<?php echo base_url() . "index.php/Residencia/c_info_participantes_proyecto/participantes_proyecto" ?>">
                  <label>Proyecto:</label>
                  <br>
                  <br>
                  <select  id="ppid" name="ppid">
                    <?php foreach ($proyectos as $value) { ?>
                      <option value="<?php echo $value->id; ?>"><?php echo $value->nombre_proyecto.' - '.$value->nombre; ?></option>
                    <?php } ?>
                  </select>
                  <br>
                  <br>
                  <button id = "btn_sel_proyecto" class="btn orange waves-effect darken-1 right-align z-depth-0" type="submit">
                    Seleccionar Proyecto</button>
                  </form>
                  <p id="no_participas" hidden="true">Sin proyectos.</p>
                <?php } else { ?>
                  <form id="frm_sel_proyecto" method="post" action="<?php echo base_url() . "index.php/Residencia/c_info_participantes_proyecto/participantes_proyecto" ?>" hidden="true">
                    <label>Proyecto:</label>
                    <br>
                    <br>
                    <select  id="ppid" name="ppid">
                      <?php foreach ($proyectos as $value) { ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->nombre_proyecto.' - '.$value->nombre; ?></option>
                      <?php } ?>
                    </select>
                    <br>
                    <br>
                    <button id = "btn_sel_proyecto" class="btn orange waves-effect darken-1 right-align z-depth-0">
                      Seleccionar Proyecto</button>
                    </form>
                    <p id="no_participas">Sin proyectos.</p>
                  <?php } ?>

                </div>
              </div>
              <div id="tabla_part" class="col s6 center-align card-panel grey lighten-5" hidden>
                <table id="tabla_participantes_proy" class="bordered responsive-table" hidden>
                  <thead>
                    <tr>
                      <th style="text-align: center;">Puesto/Función</th>
                      <th style="text-align: center;">Nombre</th>
                      <th style="text-align: center;">Correo</th>
                      <?php if ($info == 'jefeacademico') { ?>
                        <th style="text-align: center;" class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Cambiar por docente del departamento">Cambiar 1</th>
                        <th style="text-align: center;" class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Cambiar por docente de otros departamentos">Cambiar 2</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <?php if ($info == 'jefeacademico') { ?>
                <div class="row">
                  <br>
                  <br>
                  <div id="oficios_comision" class="col s12 center-align card-panel grey lighten-5" hidden>
                    <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/Panel_jefeacademico/generar">
                      <input id="id_participantes" name ="id_participantes" value="" type="text" hidden/>
                      <div class="row">
                        <div class="col s4">
                          <input id="oficio_asesor" name ="oficio_asesor" type="text" placeholder="Numero de oficio del asesor interno" required />
                        </div>
                        <div class="col s4">
                          <input id="oficio_revisor1" name ="oficio_revisor1" type="text" placeholder="Numero de oficio del revisor 1" required />
                        </div>
                        <div class="col s4">
                          <input id="oficio_revisor2" name ="oficio_revisor2" type="text" placeholder="Numero de oficio del revison 2" required />
                        </div>
                      </div>
                      <button class="btn orange darken-1 right-align z-depth-0" formtarget="_blank" type="submit" >
                        Generar oficio de comisión</button>
                      </form>
                      <br>
                    </div>
                  </div>
                  <input id="rol" name="rol" type="text" value = "" hidden/>
                  <!-- Modal Structure -->
                  <div id="modal_cambiar" class="modal modal-fixed-footer">
                    <div class="modal-content">
                      <h5>DOCENTES DEL DEPARTAMENTO</h5>

                      <table id="tabla_cambiar" class="display">
                        <thead>
                          <tr>
                            <th>Nombres</th>
                            <th>Especialidad</th>
                            <th>Asignar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if ($docentes) {
                            foreach ($docentes as $value) {
                              ?>
                              <tr>
                                <td><?= utf8_decode($value->nombres . ' ' . $value->apellidos); ?></td>
                                <td><?= $value->especialidad ?></td>
                                <td><a href="#" onclick="cambiar('<?php echo $value->rfc ?>', '<?php echo base_url(); ?>');"><img src="<?php echo base_url(); ?>images/swap_horiz.png"></a>
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
                      <a href="#!" class="btn orange modal-action modal-close waves-effect waves-green">CANCELAR</a>
                    </div>
                  </div>
                  <!-- Modal Structure -->
                  <div id="modal_cambiar2" class="modal modal-fixed-footer">
                    <div class="modal-content">
                      <h5>DOCENTES DE OTROS DEPARTAMENTOS </h5>
                      <!--                            <input id="rol2" name="rol2" type="text" value = "" hidden/>                -->
                      <table id="tabla_cambiar2" class="display">
                        <thead>
                          <tr>
                            <th>Nombres</th>
                            <th>Departamento</th>
                            <th>Especialidad</th>
                            <th>Asignar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if ($docentes_otros) {
                            foreach ($docentes_otros as $value) {
                              ?>
                              <tr>

                                <td><?= utf8_decode($value->nombres . ' ' . $value->apellidos); ?></td>
                                <td><?= $value->departamento ?></td>
                                <td><?= $value->especialidad ?></td>
                                <td><a href="#" onclick="cambiar('<?php echo $value->rfc ?>', '<?php echo base_url(); ?>');"><img src="<?php echo base_url(); ?>images/swap_horiz.png"></a>
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
                      <a href="#!" class="btn orange modal-action modal-close waves-effect waves-green">CANCELAR</a>
                    </div>
                  </div>
                  <?php
                }
                ?>
                <!-- Asesor externo-->
                <form method="post" id="editorasesorexternoform" accept-charset="UTF-8">
                  <div id="modalexterno" class="modal">
                    <div class="modal-content">
                      <h4>Editar Asesor externo</h4>
                      <br>
                      <input id="idasesorexterno"  name="idasesorexterno" value="" hidden="hidden">
                      <div class="input-field col s6">
                        <input required id="nombreasesorexternoactual" name="nombreasesorexternoactual" placeholder="Nombre actual del asesor" id="first_name" type="text" class="validate">
                        <label for="first_name">Nombre asesor externo</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn waves-effect waves-light" type="submit" name="action">ACTUALIZAR NOMBRE
                        <i class="material-icons right">edit</i>
                      </button>
                      <a href="#!" class="modal-action  modal-close waves-effect waves-green btn-flat">CANCELAR</a>
                    </div>
                  </div>
                </form>
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
            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/modals.js"></script>
            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/info_participantes_proyecto.js"></script>
            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.form.min.js"></script>
            <script type="text/javascript">
            $( document ).ready(function() {
              $("#editorasesorexternoform").submit(function(e) {
                //var id=$('#idasesorexterno').val();
                var nombre=$('#nombreasesorexternoactual').val();
                var url = "C_info_participantes_proyecto/editarasesorexternofun";
                $.ajax({
                  type: "POST",
                  url: url,
                  data: $("#editorasesorexternoform").serialize(),
                  success: function(data)
                  {
                    $('#asxnombre').html(""+nombre);
                    $('#modalexterno').closeModal();
                    //alert(data);
                  }
                });
                e.preventDefault();
              });
            });
            </script>
          </body>
          </html>
