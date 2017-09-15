<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SIV :: BITÁCORAS DE AVANCE</title>
  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--<link href="<?php echo base_url(); ?>css/proceso.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
  <link href="<?php echo base_url(); ?>css/flow.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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

  <div class="card-panel lighten-5">
    <div class="section no-pad-bot" id="index-banner">
      <div class="row center">
        <h5 class="condensed light header center amber-text darken-1-text">
          BITÁCORAS DE AVANCE</h5>
        </div>
      </div>
      <div class="container">
        <div class="section">
          <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
          href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
          <div  class="row" >
            <div class="left-align col s12 m5 card-panel grey lighten-5 lol">
              <div class="input-field">
                <!--                        <form method="post" action="<?php echo base_url() . "index.php/c_alumnos_ds/cambiar_estado/" ?>">-->
                <form id="frm_sel_residente" method="post" action="<?php echo base_url() . "index.php/Residencia/JefeAcademico/c_bitacora_avance_academico/consulta_bitacora_residente" ?>">
                  <?php if ($residentes) { ?>
                    <label>Selecciona un alumno</label>
                    <br>
                    <br>
                    <select  id="id_participantes" name="id_participantes">
                      <?php foreach ($residentes as $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->nombre ?></option>
                      <?php } ?>
                    </select>
                    <br>
                    <br>
                    <button id="btn_sel_residente" class="btn orange darken-1 right-align z-depth-0" style="margin-bottom: 10px;">
                      Seleccionar</button>
                    <?php } else { ?>
                      <p style="text-align: center;" class="blue-text">No hay alumnos</p>
                    <?php } ?>
                    <br>
                  </form>
                </div>
              </div>
              <div class=" col s1 m2 card">
              </div>
              <div class="left-align col s12 m5 card-panel grey lighten-5 lol">
                <div class="input-field">
                  <!--                        <form method="post" action="<?php echo base_url() . "index.php/c_alumnos_ds/cambiar_estado/" ?>">-->
                  <form id="frm_sel_residente2" method="post" action="<?php echo base_url() . "index.php/Residencia/JefeAcademico/c_bitacora_avance_academico/consulta_bitacora_residente_nocontrol" ?>">
                    <?php if ($residentes) { ?>
                      <p><i class="material-icons">search</i> Buscar por numero de control:</p>
                      <input type="number" required placeholder="Numero de Control" name="numero_control" id="numero_control" />
                      <button id="btn_sel_residente2" class="btn orange darken-1 right-align z-depth-0" style="margin-bottom: 10px;">
                        Buscar</button>
                      <?php } else { ?>
                        <p style="text-align: center;" class="blue-text">No hay alumnos</p>
                      <?php } ?>
                      <br>
                      <?php if (isset($mensajeerror)) { ?>
                        <CENTER><p class="col s4 center-align card-panel red white-text"><?php  echo "$mensajeerror";?></p></CENTER><br>
                      <?php } ?>
                    </form>
                  </div>
                </div>
              </div>
              <div id="info" class="row" hidden>
                <div class="col m5  s12 center-align card-panel grey lighten-5 daz">
                  <div class="input-field left-align">
                    <div id="buscador">
                      DATOS DEL ALUMNO
                      <hr>
                      <b>Nombre completo: </b><span id="nombre"></span>
                      <br>
                      <b>No. de control: </b><span id="num_con"></span>
                      <br>
                      <b>Carrera: </b><span id="carrera"></span>
                      <br>
                      <b>Semestre: </b><span id="semestre"></span>
                      <br>
                      <b>Teléfono: </b><span id="tel"></span>
                      <br>
                      <b>Correo: </b><span id="correo"></span>
                      <br>
                      <b>Domicilio: </b><span id="dom"></span>
                      <br>
                      <br>
                    </div>
                  </div>
                </div>
                <div class="col s2"><br></div>
                <div class="col m5  s12 right-align card-panel grey lighten-5 daz">
                  <div class="input-field left-align">
                    DATOS DEL PROYECTO
                    <hr>
                    <b>Nombre del Proyecto: </b><span id="np"></span>
                    <br>
                    <b>Empresa: </b><span id="empresa"></span>
                    <br>
                    <b>Departamento del anteproyecto: </b><span id="dep"></span>
                    <br>
                    <b>Origen de anteproyecto: </b><span id="origen"></span>
                    <br>
                    <b>Proyecto opción para titulación: </b><span id="tit"></span>
                    <br>
                    <br>
                    <div id="dic" hidden>
                      <b style="color: red;">Recepción de documentos finales con el Jefe de Residencia Profesional: <span id="documentosR"></span></b>
                    </div>
                    <br>
                  </div>
                </div>
              </div>

              <div id="progreso" class="center-align col s3 m6 l12 card-panel grey lighten-5"  hidden>
                <h6 class="amber-text">AVANCE DEL ALUMNO</h6>
                <br>
                <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
                <div id="steps1" align="center">
                  <!--                        <div class="step done col s3 m6 l12" data-desc="Selección de anteproyecto">1</div>
                  <div class="step done col s3 m6 l12" data-desc="Validación de solicitud de residencia">2</div>
                  <div class="step done col s3 m6 l12" data-desc="Validación de anteproyecto">3</div>-->
                </div>
                <br>
                <br>
                <div id="steps2" align="center">
                  <!--                        <div class="step done col s3 m6 l12" data-desc="Revisiones parciales">4</div>
                  <div class="step done col s3 m6 l12" data-desc="Reporte final">5</div>
                  <div class="step done col s3 m6 l12" data-desc="Liberación residencia">6</div>-->
                </div>
                <br>
                <br>
                <div id="steps3" align="center">

                </div>
              </div>
              <div id="a_residente" class="center-align col s12 card-panel grey lighten-5" hidden>
                <table id="archivos_asesorado" class="responsive-table bordered highlight ">
                  <caption class="amber-text">ARCHIVOS DE AVANCE DEL ALUMNO</caption>
                  <thead>
                    <tr>
                      <th>Nombre del archivo</th>
                      <th>Descripción</th>
                      <th>Tipo de documento</th>
                      <th>Estado</th>
                      <th>Fecha de guardado</th>
                      <th>Fecha límite de revisión</th>
                      <th>Descargar</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              <div id="a_rev_ase" class="center-align col s12 card-panel grey lighten-5" hidden>
                <table id="archivos_asesor" class="bordered highlight responsive-table">
                  <caption class="amber-text">REVISIONES ASESOR</caption>
                  <thead>
                    <tr>
                      <th>Nombre del archivo</th>
                      <th>Descripción</th>
                      <th>Tipo de documento</th>
                      <th>Fecha de guardado</th>
                      <th>Revisión de archivo</th>
                      <th>Descargar</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <br>
              </div>
              <div id="a_ase" class="center-align col s12 card-panel grey lighten-5" hidden>
                <table id="archivos_asesor" class="bordered highlight responsive-table">
                  <caption class="amber-text">ARCHIVOS DE CIERRE DE PROYECTO</caption>
                  <thead>
                    <tr>
                      <th>Nombre del archivo</th>
                      <th>Descripción</th>
                      <th>Tipo de documento</th>
                      <th>Fecha de guardado</th>
                      <th>Descargar</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <br>
              </div>
              <div id="id_opciones" class="center-align col s12 card-panel grey lighten-5" hidden>
                <div class="row">
                  <h6 class="amber-text">OPERACIONES PARA RESIDENCIA</h6>
                  <form id="frm_cancelar_residencia" method="post" action="<?php echo base_url() . "index.php/Residencia/JefeAcademico/c_bitacora_avance_academico/cancelar_residencia" ?>">
                    <div class="col s6 align-left">
                      <input id="participantes_id" name = "participantes_id" type="text" value="" hidden="true" />
                      <input id="anteproyecto_id" name = "anteproyecto_id" type="text" value="" base="<?php echo base_url(); ?>" hidden="true" />
                      <input id="nc" name="nc" type="text" value="" hidden="true" />
                      <input id="asesor_id" name="asesor_id" type="text" value="" hidden="true" />
                      <input id="revisor1_id" name="revisor1_id" type="text" value="" hidden="true" />
                      <input id="revisor2_id" name="revisor2_id" type="text" value="" hidden="true" />
                      <input id="asesore_id" name="asesore_id" type="text" value="" hidden="true" />
                      <br>
                      <input type="checkbox" class="filled-in" id="autorizacion_dictamen"/>
                      <label for="autorizacion_dictamen">Autorizar dictamen</label>
                      <br>
                      <br>
                    </div>
                    <div class="col s6 align-right">
                      <br>
                      <a id="cancelar_residencia" class="waves-effect">
                        <img src="<?php echo base_url(); ?>images/close.png" alt="Logo" /></a>&nbsp;&nbsp;<label style="color: red;">Cancelar residencia profesional</label>
                      </div>
                    </form>
                  </div>
                </div>





                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </div>
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
            <script src="<?php echo base_url(); ?>js/jquery.matchHeight.js"></script>
            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/modals.js"></script>
            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/bitacora_jefe_academico.js"></script>
            <!--<script src="http://malsup.github.com/jquery.form.js"></script>-->
            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.form.min.js"></script>
            <script>
            $(function() {
              $('.lol').matchHeight();
            //  $('.daz').matchHeight();
            });
            </script>
          </body>
          </html>
