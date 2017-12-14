<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: BITÁCORA DE AVANCE ASESOR</title>

  <!-- CSS  -->

  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/flow.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body style="background-color: #FFFFFF;">
  <nav>
    <div class="nav-wrapper grey lighten-5 left-align">
      <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

      <div class="right-align hide-on-med-and-down">
        <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down"><?php echo $nombres . ' ' . $apellidos; ?>
          <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
        </div>
      </div>
    </nav>
    <!-- Navbar goes here -->
    <div class="section no-pad-bot" id="index-banner">
      <div class="row center">
        <h5 class="condensed light header center amber-text darken-1-text">
          BITÁCORA DE AVANCE ASESOR</h5>
        </div>

      </div>
      <div class="">
        <div class="section" style=" margin-left: 1%;   margin-right: 1%; ">
          <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
          href="<?php echo base_url() . 'index.php/Residencia/Docente/panel_docente/'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
          <div class="left-align col s3 m6 l3 card-panel grey lighten-5">
            <div class="input-field">
              <form id="frm_sel_asesorado" method="post" action="<?php echo base_url() . "index.php/Residencia/Docente/c_bitacora_avance_docente/consulta_info_asesorado" ?>">
                <?php if ($asesorados) { ?>
                  <label>Selecciona tu asesorado</label>
                  <br>
                  <br>
                  <select  id="id_participantes" name="id_participantes">
                    <?php foreach ($asesorados as $value) { ?>
                      <option value="<?= $value->id; ?>"><?= $value->nombre; ?></option>
                    <?php } ?>
                  </select>
                  <br>
                  <br>
                  <button id="btn_sel_asesorado" class="btn orange waves-effect darken-1 right-align z-depth-0">
                    Seleccionar</button>
                  <?php } else { ?>
                    <p style="text-align: center;" class="blue-text"><?php echo 'No tienes asesorados.'; ?></p>
                  <?php } ?>
                </form>
              </div>
            </div>
            <div id="datos" class="row" hidden>
              <div class="col s5 center-align card-panel grey lighten-5">
                <div class="left-align">
                  <div id="buscador">
                    DATOS DEL ALUMNO
                    <hr>
                    <b>Nombre completo: </b><span id="nombre"></span>
                    <br>
                    <b>No. de control: </b><span id="nc"></span>
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
              <div class="col s5 right-align card-panel grey lighten-5 ">
                <div class="switch left-align">
                  DATOS DEL PROYECTO
                  <hr>
                  <b>Nombre del Proyecto: </b><span id="nombre_proyecto"></span>
                  <br>
                  <b>Departamento del anteproyecto: </b><span id="departamento_ante"></span>
                  <br>
                  <b>Origen de anteproyecto: </b><span id="origen"></span>
                  <br>
                  <b>Empresa: </b><span id="nombre_empresa"></span>
                  <br>
                  <form>
                    <b>Proyecto opción para titulación: </b>
                    <input id="anteproyecto_id" type="text" value="" base="<?php echo base_url(); ?>" hidden="true" />
                    <br>
                    <label>
                      No
                      <input id="titulacion" name="titulacion" type="checkbox"/>
                      <span class="lever"></span>
                      Si
                    </label>
                    <br>
                    <br>
                  </form>

                  <br>
                </div>
              </div>
            </div>
            <div id="avance" class="center-align col s3 m6 l12 card-panel grey lighten-5" hidden>
              <h5 class="amber-text">AVANCE DEL ALUMNO</h5>
              <br>
              <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
              <div id="steps1" align="center">

              </div>
              <br>
              <br>
              <div id="steps2" align="center">

              </div>
              <br>
              <div id="steps3" align="center">

              </div>
            </div>

            <div id="doc_asesorado" class="card-panel grey lighten-5" hidden>
              <table id="tabla_asesorado" class="bordered highlight responsive-table">
                <h5 class="amber-text center-align">ARCHIVOS DE AVANCE DEL ALUMNO</h5>
                <thead>
                  <tr>
                    <th>Nombre archivo</th>
                    <th>Tipo documento</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Fecha limite revisión</th>
                    <th>Descargar</th>
                    <th>Detalles</th>
                    <th style="text-align: center;">Agregar revisión</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>

            <div id="doc_rev_ase" class="card-panel grey lighten-5" hidden>
              <table id="archivos_rev_asesor" class="bordered highlight responsive-table">
                <h5 class="amber-text center-align">REVISIONES ASESOR</h5>
                <thead>
                  <tr>
                    <th>Nombre del archivo</th>
                    <th>Tipo de documento</th>
                    <th>Fecha de guardado</th>
                    <th>Revisión de archivo</th>
                    <th>Descargar</th>
                    <th>Detalles</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <br>
            </div>

            <div id="doc_asesor" class="card-panel grey lighten-5" hidden>
              <table id="archivos_asesor" class="bordered highlight responsive-table">
                <h5 class="amber-text center-align">ARCHIVOS DE CIERRE DE PROYECTO</h5>
                <ul>
                  <li>-Registro asesoría residencia profesional</li>
                  <li>-Formato de evaluación y seguimiento de residencia</li>
                  <li>-Carta de liberación de residencia profesional</li>
                </ul>
                <br>
                <a href="#modal_adjuntar_archivo_asesor" class=" btn orange modal-trigger">Adjuntar archivo</a>
                <thead>

                  <tr>
                    <th>Nombre del archivo</th>
                    <th>Tipo de documento</th>
                    <th>Fecha</th>
                    <th>Descargar</th>
                    <th>Detalles</th>
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

        <!-- modal_adjuntar_archivo_asesor -->
        <div id="modal_adjuntar_archivo_asesor" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4 class="amber-text center-align">ADJUNTAR ARCHIVO</h4>
            <?= form_open_multipart(base_url() . 'index.php/Residencia/Docente/c_bitacora_avance_docente/insertar_archivo_asesor', array('id' => 'frm_agregar_archivo'))?>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="descripcion_archivo" name="descripcion_archivo" oninput="maxLengthCheck(this)" minlength="1" maxlength="300" length="300" class="materialize-textarea" required></textarea>
                <label for="descripcion_archivo">Descripción del archivo</label>
                <input id="id_asesor_revisor" name="id_asesor_revisor" type="text" value="" hidden="true">
                <input id="ncontrol2" name="ncontrol2" type="text" value="" hidden="true"/>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <label>Tipo de documento:</label>
                <br>
                <br>
                <select  id="tipo_documento" name="tipo_documento">
                  <option value="RAR">Registro Asesoría Residencias Profesionales</option>
                  <option value="FES">Formato de Evaluación y Seguimiento de Residencia</option>
                  <option value="CLR">Carta de Liberación de Residencia Profesional</option>
                </select>
              </div>
              <div class="col s6">
                <label>Adjuntar archivo:</label>
                <br>
                <br>
                <input type="text" id="archivosadjuntadoscantidad" value="0" hidden>

                <div class="" id="panel_archivos" >
                  <input type="file" accept=".pdf,.docx,.doc" name="userfile" required/>
                </div>
                <p id="limite_archivos"></p>
                <br>
              </div>
            </div>
            <div class="row center">
              <div class="" id="panel_archivos2" >
                <button id ="btn_agregar_archivo" class="btn orange waves-effect darken-1 right-align z-depth-0" idp="" base="">
                  GUARDAR</button>              </div>
              </div>
              <?= form_close() ?>
            </div>
            <div class="modal-footer">
              <a id="btn_salir_modal_agregar_archivo" href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
            </div>
          </div>
          <!-- modal_detalles_archivo_asesor -->
          <div id="modal_detalles_archivo_asesor" class="modal modal-fixed-footer">
            <div class="modal-content">

            </div>
            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
            </div>
          </div>
          <!-- modal_detalles_archivo -->
          <div id="modal_detalles_archivo" class="modal modal-fixed-footer">
            <div class="modal-content">

            </div>
            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
            </div>
          </div>

          <!-- modal_agregar_revision -->
          <div id="modal_agregar_revision" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4>Revisión de: <span id="nombre_archivo_r"></span></h4>
              <?= form_open_multipart(base_url() . 'index.php/Residencia/Docente/c_bitacora_avance_docente/agregar_revision_asesor', array('id' => 'frm_revision')) ?>
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="descripcion_archivo_revision" name="descripcion_archivo_revision" value ="" oninput="maxLengthCheck(this)" minlength="1" maxlength="300" length="300" class="materialize-textarea" required></textarea>
                  <label for="descripcion_archivo_revision">Descripción del archivo</label>
                </div>
              </div>
              <div class="row">
                <input id="id_archivo_alu" name = "id_archivo_alu" type="text" value="" hidden="true"/>
                <input id="tipo_documento_revision" name="tipo_documento_revision" type="text" value="" hidden="true"/>
                <input id="id_asesor" name="id_asesor" type="text" value="" hidden="true"/>
                <input id="anteproyecto_id2" name="anteproyecto_id2" type="text" value="" hidden="true"/>
                <input id="ncontrol" name="ncontrol" type="text" value="" hidden="true"/>

                <div class="col s6">
                  <label><span id="lbl_adj_archivo"></span></label>
                  <br>
                  <br>
                  <input type="file" accept=".pdf,.docx,.doc" id = "userfile" name = "userfile" required/>
                  <br>
                </div>
                <div class="col s6">
                  <a id="descargar_formato" href="<?php  base_url()?>uploads/docentes/Formato_seguimiento_de_revisión.docx"></a>
                </div>
              </div>
              <br>
              <div id = "estado_a">
                <label>Estado del anteproyecto:</label><!--debe validar que llene ambos-->
                <br>
                <select id="estado_anteproyecto" name="estado_anteproyecto">
                  <option id="N" value="N">No Aprobado</option>
                  <option id="A" value="A">Aprobado</option>
                </select>
                <br>
                <br>
              </div>
              <button id="btn_agregar_revision" class="btn orange waves-effect darken-1 z-depth-0 " idp="" base="">ACEPTAR</button>
              <br>
              <br>
              <?= form_close() ?>
            </div>
            <div class="modal-footer">
              <a id="salir_modal_agregar_revision" href="#!" class="waves-effect waves-green btn orange">Salir</a>
            </div>
          </div>
          <br><br>
          <br><br>
          <br>
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
          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>js/modals.js"></script>
          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/bitacora_avance_asesor.js"></script>
          <!--        <script src="http://malsup.github.com/jquery.form.js"></script>-->
          <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.form.min.js"></script>
        </body>
        </html>
