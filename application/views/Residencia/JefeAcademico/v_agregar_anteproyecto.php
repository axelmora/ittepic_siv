<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: AGREGAR ANTEPROYECTO</title>

        <!-- CSS  -->

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Select/css/select.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Responsive/css/responsive.dataTables.min.css">
        <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">-->

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
                    AGREGAR ANTEPROYECTO</h5>
            </div>

        </div>

        <div class="container">
            <div class="section">
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
                   href="<?php echo base_url() . 'index.php/Residencia/c_banco_proyectos'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <br>
                <br>
                <span class="blue-text"><b> 1. Agregue una </b><a href="#modal_nueva_empresa" class="btn orange darken-1 right-align z-depth-0 modal-trigger" type="submit">
                        NUEVA EMPRESA</a><b> o seleccione una registrada:</b></span>
                <br>
                <br>
                <hr>
                <caption><h6 style="text-align: center;"><b>EMPRESAS REGISTRADAS</b></h6></caption>
                <table id="tabla_empresas" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>SELECCIONAR</th>
                            <th hidden="true">Hola</th>
                            <th>NOMBRE</th>
                            <th>SECTOR</th>
                            <th>CIUDAD</th>
                            <th>FECHA</th>
                            <th style="text-align: center;">VER DETALLES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!$empresas) {

                        } else {
                            foreach ($empresas as $item) {
                                ?>
                                <tr>
                                    <td></td>
                                    <td hidden="true"><?= $item->empresa_pk; ?></td>
                                    <td><?= $item->nombre_empresa; ?></td>
                                    <td><?= $item->sector; ?></td>
                                    <td><?= $item->ciudad; ?></td>
                                    <td><?= $item->fecha_alta; ?></td>
                                    <td style="text-align: center;">
                                        <a href="#!"class="detalles_empresa"
                                           data-id="<?php echo $item->empresa_pk; ?>"
                                           empresa="<?php echo $item->nombre_empresa; ?>" tel="<?php echo $item->telefono; ?>"
                                           sector="<?php echo $item->sector; ?>" rfc="<?php echo $item->rfc; ?>"
                                           domicilio="<?php echo $item->domicilio; ?>" colonia="<?php echo $item->colonia; ?>"
                                           ciudad="<?php echo $item->ciudad; ?>" codigo_postal="<?php echo $item->codigo_postal; ?>"
                                           titular="<?php echo $item->titular_empresa; ?>" puesto="<?php echo $item->puesto_titular; ?>"
                                           fecha_alta="<?php echo $item->fecha_alta; ?>">
                                            <img src="<?php echo base_url(); ?>images/detalles_tiny.png">
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
                <br>
                <span style="text-align: center;" class="red-text"><?php echo $error_archivo['error']; ?></span>
                <br>
                <div id = "datos_proyecto" hidden>
                    <span class="blue-text"><b>2. Una vez que ha seleccionado la empresa de la tabla, agregue la información del anteproyecto:</b></span>
                    <!--Guardar info de empresa para enviarla-->
                    <br>
                    <?= form_open_multipart(base_url() . 'index.php/Residencia/C_banco_proyectos/bd_agregar_anteproyecto')//base_url() . 'index.php/Residencia/adjuntar_descargar/do_upload')   ?>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre_anteproyecto" name='nombre_anteproyecto' type="text" class="validate"required>
                            <label for="nombre_anteproyecto">Nombre del anteproyecto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <label>Posible asesor</label>
                            <br>
                            <br>
                            <select  id="posible_asesor" name="posible_asesor">
                                <?php
                                if ($asesores) {
                                    foreach ($asesores as $value) {
                                        ?>
                                <option value="<?= $value->rfc ?>"><?= utf8_decode($value->nombres . ' ' . $value->apellidos); ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <br>
                        <br>
                        <div class="input-field col s6">
                            <input id="residentes_requeridos" name="residentes_requeridos" type="number" min="1" class="validate" required>
                            <label for="residentes_requeridos">Residentes requeridos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">

                            <label>Adjuntar documento de anteproyecto</label>
                            <br>
                            <br>
                            <i class="material-icons prefix">note_add</i>
                            <input type="file" accept=".pdf,.docx,.doc" name="userfile" required/>
                            <br>
                            <br>
                            <input id="id_empresa" name="id_empresa" type="text" value="" hidden="true" required>
                            <input id="id_vacante" name="id_vacante" type="text" value="" hidden="true">
                        </div>
                        <br>

                        <div class="col s6">
                            <a href="#modal_vacantes" class="modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Registrar vacante en caso de que la hayas consultado de la sección vacantes">
                                <img src="<?php echo base_url(); ?>images/done_tiny.png"><u>Registrar vacante atendida</u></a>
                        </div>
                    </div>

                    <div class="row" style="text-align: center;">
                        <button class="btn orange waves-effect darken-1 right-align z-depth-0" type="submit">GUARDAR</button>
                        <a href="<?php echo base_url() . 'index.php/Residencia/C_banco_proyectos' ?>"class="btn red waves-effect darken-1 right-align z-depth-0">CANCELAR</a>
                    </div>
                    <?= form_close() ?>
                </div>




                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>

        </div>

        <!-- Modal Structure -->
        <div id="modal_vacantes" class="modal modal-fixed-footer">
            <div class="modal-content">

                <div class="header center-align amber-text"><h4>VACANTES</h4></div>
                <table id="tabla_modal_vacantes" class="display">
                    <thead>
                        <tr>
                            <th>Nombre de la empresa</th>
                            <th>Proyecto a desarrollar</th>
                            <th style="text-align: center;">Seleccionar</th>
                        </tr>

                    </thead>
                    <tbody><!-- poner el id en un input escondido, cuando de clic guardarlo en el input por medio del atributo onclic del img-->
                        <?php
                        if ($vacantes) {
                            foreach ($vacantes as $value) {
                                ?>

                                <tr>
                                    <td><?= $value->nombre_empresa; ?></td>
                                    <td><?= $value->domicilio; ?></td>
                                    <td style="text-align: center;">
                                        <img class="waves-effect modal-close"
                                             onclick="document.getElementById('id_vacante').value = <?php echo $value->id_vacante; ?>;
                                                     //alert(document.getElementById('id_vacante').value);"
                                             src="<?php echo base_url(); ?>images/done_tiny.png"></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br>

            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="modal_detalles_empresa" class="modal modal-fixed-footer">
            <div id="datos" class="modal-content">

                <div class="flow-text">
                    <div class="header center-align amber-text"><h4>DETALLES DE LA EMPRESA</h4></div>
                    Nombre de la empresa:
                    <br>
                    Teléfono:
                    <br>
                    Sector:
                    <br>
                    RFC:
                    <br>
                    Domicilio:
                    <br>
                    Colonia:
                    <br>
                    Ciudad:
                    <br>
                    Código postal:
                    <br>
                    Titular de la empresa:
                    <br>
                    Puesto:
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
            </div>
        </div>



        <!-- Modal modal_nueva_empresa -->
        <div id="modal_nueva_empresa" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="header center-align amber-text"><h4>AGREGAR NUEVA EMPRESA</h4></div>
                <div class="row">
                    <?= form_open(base_url() . 'index.php/Residencia/c_banco_proyectos/bd_agregar_empresa') ?>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre_empresa" type="text" name="nombre_empresa" class="validate" required>
                            <label for="nombre_empresa">Nombre de la empresa</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="input-field col s6">
                            <input id="telefono" type="text" name="telefono" data-mask="+00 (000)-000-0000" data-mask-clearifnotmatch="true" placeholder="+00 (000)-000-0000" class="validate" required>
                            <label for="telefono">Teléfono</label>
                        </div>
                        <div class="input-field col s6">
                            <select  id="sector" name="sector" class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Sector" required>
                                <option value="Industrial">Industrial</option>
                                <option value="Servicios">Servicios</option>
                                <option value="Público">Público</option>
                                <option value="Privado">Privado</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="domicilio" type="text" name="domicilio" class="validate" required>
                            <label for="domicilio">Domicilio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="colonia" type="text" name="colonia" class="validate" required>
                            <label for="colonia">Colonia</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="ciudad" type="text" name="ciudad" class="validate" required>
                            <label for="ciudad">Ciudad</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="codigo_postal" type="text" name="codigo_postal" pattern="^[0-9]{5}$" class="validate" required>
                            <label for="codigo_postal">Código postal</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="rfc" type="text" name="rfc" class="validate" pattern="^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))" required>
                            <label for="rfc">RFC</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="titular" type="text" name="titular" class="validate" required>
                            <label for="titular">Titular de la empresa</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="puesto_titular" type="text" name="puesto_titular" class="validate" required>
                            <label for="puesto_titular">Puesto del titular</label>
                        </div>
                    </div>
                    <!--                    <div class="row">
                                            <div class="input-field col s12">
                                                <input id="nombre_asesor_externo" type="text" name="nombre_asesor_externo" class="validate" required>
                                                <label for="nombre_asesor_externo">Nombre del asesor externo</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="puesto_asesor" type="text" name="puesto_asesor" class="validate" required>
                                                <label for="puesto_asesor">Puesto del asesor externo</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input id="correo" type="email" name="correo" class="validate" required>
                                                <label for="correo">Correo electrónico del asesor externo</label>
                                            </div>
                                        </div>-->
                    <div class="row center">
                        <button class="btn orange darken-1 right-align z-depth-0" type="submit">
                            GUARDAR</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
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
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/extensions/Select/js/dataTables.select.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>js/DataTables/tablas.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>js/modals.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>js/funciones.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>js/jquery.mask.min.js"></script>        
        <?php
        $this->load->view('jfacademicoarchivo');
        ?>

    </body>
</html>
