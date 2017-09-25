<!DOCTYPE HTML>
<html lang="es" xml:lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>SIV :: ITTEPIC</title>
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/marketdeco.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/soberanasanslight.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/merriweather.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/queries.css" media="all" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/javascript" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/proceso.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/flow.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script>$(document).ready(function () {
                $('.step').each(function (index, element) {
                    // element == this
                    $(element).not('.active').addClass('done');
                    $('.done').html('<i class="icon-ok"></i>');
                    if ($(this).is('.active')) {
                        return false;
                    }
                });
            });</script>


        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

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
                <!--<header id="branding" role="banner">-->
                <h1 id="site-title">
                    <img src="<?php echo base_url(); ?>images/sep.gif" alt="SIG" width="287" height="86" />
                    <img src="<?php echo base_url(); ?>images/titulo.png" alt="SIG" width="380" height="76" /> <img src="<?php echo base_url(); ?>images/logotecchico.png" alt="SIG" width="76" height="76" />
                </h1><div align="right" class="right"> Bienvenido (a): <?php echo utf8_encode($nombre); ?>
                    <?= anchor(base_url() . 'index.php/Inicio/logout', '( Cerrar sesión )&nbsp;&nbsp;&nbsp;&nbsp;') ?>  </div>

                <!--                    <div class="social">
                                        <ul>
                                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-facebook.png" alt="Facebook" /></a></li>
                                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-twitter.png" alt="Twitter" /></a></li>
                                        </ul>
                                    </div>-->
                <nav id="access" class="access" role="">
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
                </nav>
                <!-- #access -->
                <!--</header>-->
                <!-- #branding -->

                <div id="main">
                    <div id="primary">
                        <div id="content" role="main">
                            <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
                            <br>
                            <?php
                            switch ($estado) {
                                case 1:
                                    ?>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Selección de anteproyecto">1</div>
                                        <div class = "step active" data-desc = "Validación de solicitud de residencia">2</div>
                                        <div class = "step active" data-desc = "Validación de anteproyecto">3</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Residencia profesional">4</div>
                                        <div class = "step active" data-desc = "Revisiones parciales">5</div>
                                        <div class = "step active" data-desc = "Reporte final">6</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Liberación de residencia">7</div>
                                    </div>
                                    <br>
                                    <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/Alumno/C_avance/generar">
                                        <button class="btn btn-warning" formtarget="_blank" type="submit">
                                            Generar Solicitud de Residencia Profesional</button>
                                    </form>
                                    <br>
                                    <?php if ($banco === 'f' && $lugares > 0) { ?>
                                        <span>Clave  para compartir proyecto: <?php echo $clave; ?> </span>
                                    <?php } ?>
                                    <br>
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Selección de anteproyecto">1</div>
                                        <div class = "step done" data-desc = "Validación de solicitud de residencia">2</div>
                                        <div class = "step active" data-desc = "Validación de anteproyecto">3</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Residencia profesional">4</div>
                                        <div class = "step active" data-desc = "Revisiones parciales">5</div>
                                        <div class = "step active" data-desc = "Reporte final">6</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Liberación de residencia">7</div>
                                    </div>
                                    <br>
                                    <br>
                                    <?php  ?>
                                    <button  align="center" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="material-icons">attach_file</i> Adjuntar Archivo</button></h3>
                                    <?php  ?>
                                    <br>
                                    <?php if ($banco === 'f') { ?>
                                        <span>Clave para compartir proyecto: <?php echo $clave; ?> </span>
                                    <?php } ?>
                                    <?php
                                    break;
                                case 3:
                                    ?>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Selección de anteproyecto">1</div>
                                        <div class = "step done" data-desc = "Validación de solicitud de residencia">2</div>
                                        <div class = "step done" data-desc = "Validación de anteproyecto">3</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Residencia profesional">4</div>
                                        <div class = "step active" data-desc = "Revisiones parciales">5</div>
                                        <div class = "step active" data-desc = "Reporte final">6</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Liberación de residencia">7</div>
                                    </div>
                                    <br>
                                    <?php if ($banco === 'f') { ?>
                                        <span>Clave para compartir proyecto: <?php echo $clave; ?> </span>
                                    <?php } ?>
                                    <br>
                                    <button  align="center" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Adjuntar Archivo</button></h3>
                                    <?php
                                    break;

                                case 4:
                                    ?>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Selección de anteproyecto">1</div>
                                        <div class = "step done" data-desc = "Validación de solicitud de residencia">2</div>
                                        <div class = "step done" data-desc = "Validación de anteproyecto">3</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Residencia profesional">4</div>
                                        <div class = "step done" data-desc = "Revisiones parciales">5</div>
                                        <div class = "step active" data-desc = "Reporte final">6</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Liberación de residencia">7</div>
                                    </div>
                                    <br>
                                    <?php if ($banco === 'f') { ?>
                                        <span>Clave para compartir proyecto: <?php echo $clave; ?> </span>
                                    <?php } ?>
                                    <br>
                                    <button  align="center" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Adjuntar Archivo</button></h3>
                                    <?php
                                    break;
                                case 5:
                                    ?>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Selección de anteproyecto">1</div>
                                        <div class = "step done" data-desc = "Validación de solicitud de residencia">2</div>
                                        <div class = "step done" data-desc = "Validación de anteproyecto">3</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Residencia profesional">4</div>
                                        <div class = "step done" data-desc = "Revisiones parciales">5</div>
                                        <div class = "step done" data-desc = "Reporte final">6</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Liberación de residencia">7</div>
                                    </div>
                                    <br>
                                    <br>
                                    <?php
                                    break;

                                case 6:
                                    ?>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Selección de anteproyecto">1</div>
                                        <div class = "step done" data-desc = "Validación de solicitud de residencia">2</div>
                                        <div class = "step done" data-desc = "Validación de anteproyecto">3</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Residencia profesional">4</div>
                                        <div class = "step done" data-desc = "Revisiones parciales">5</div>
                                        <div class = "step done" data-desc = "Reporte final">6</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step done" data-desc = "Liberación de residencia">7</div>
                                    </div>
                                    <br>
                                    <br>
                                    <?php
                                    break;

                                default:
                                    ?>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Selección de anteproyecto">1</div>
                                        <div class = "step active" data-desc = "Validación de solicitud de residencia">2</div>
                                        <div class = "step active" data-desc = "Validación de anteproyecto">3</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Residencia profesional">4</div>
                                        <div class = "step active" data-desc = "Revisiones parciales">5</div>
                                        <div class = "step active" data-desc = "Reporte final">6</div>
                                    </div>
                                    <br>
                                    <div id = "stepe" align = "center">
                                        <div class = "step active" data-desc = "Liberación de residencia">7</div>
                                    </div>
                                    <br>
                                    <?php
                                    break;
                            }
                            ?>

                            <!-- Modal Adjuntar -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="material-icons">attach_file</i> Adjuntar Archivo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_avance/subir_doc" enctype="multipart/form-data" class="form-horizontal" id="formid">
                                                <?php if ($estado < 3) { ?>
                                                    <span style="color: red">Nota: Tu anteproyecto será revisado sólo 2 veces por tu asesor.</span>
                                                <?php }
                                                ?>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Descripción del archivo:</label><br>
                                                    <div class="col-xs-6">
                                                        <textarea class="form-control"  name="descripcion_archivo" id="descripcion_archivo" placeholder="Descripción del archivo"value="" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Adjuntar Archivo:</label><br>
                                                    <div class="col-xs-6">
                                                        <input type="file" accept=".pdf,.docx,.doc" name="userfile" class="form-control" required >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Tipo de documento:</label><br>
                                                    <div class="col-xs-6">
                                                        <select class="form-control" name="tipo_documento" id="tipo_documento" placeholder="Tipo de documento" required>
                                                            <?php if ($estado < 3){  ?>
                                                            <option value="A">Anteproyecto</option>
                                                            <?php } ?>
                                                            <?php if ($estado >= 3) { ?>
                                                                <option value="R">Reporte Parcial</option>
                                                                <option value="RF">Reporte Final</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div><br>
                                                <div align="center">
                                                    <input type="submit" value="Adjuntar" class="btn btn-warning btn-lg">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php if ($estado) { ?>
                                <div class="table-responsive" align="center">
                                    <p><?php echo $error; ?></p>
                                    <!--<button  align="center" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Adjuntar Archivo</button></h3>-->
                                    <h4>Mis archivos compartidos</h4>
                                    <table id="archivo_alumno" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th><b>Descripción</b></th>
                                                <th><b>Tipo de documento</b></th>
                                                <th><b>Estado</b></th>
                                                <th><b>Fecha de guardado</b></th>
                                                <th><b>Fecha límite de revisión</b></th>
                                                <th><b>Descargar</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($archivo_alumno) {
                                                foreach ($archivo_alumno as $item):
                                                    ?>
                                                    <tr>
                                                        <td><?= $item->descripcion_archivo; ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($item->tipo_documento) {
                                                                case 'A  ':
                                                                    echo 'Anteproyecto';
                                                                    break;
                                                                case 'R  ':
                                                                    echo 'Reporte';
                                                                    break;
                                                                case 'RF ':
                                                                    echo 'Reporte Final';
                                                                    break;
                                                                default:
                                                                    echo $item->tipo_documento;
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($item->estado) {
                                                                case 'A  ':
                                                                    echo 'Aprobado';
                                                                    break;
                                                                case 'N  ':
                                                                    echo 'No aprobado';
                                                                    break;
                                                                case 'R  ':
                                                                    echo 'Revisado';
                                                                    break;
                                                                case 'ER ':
                                                                    if ($item->tipo_documento == 'A  ') {
                                                                        echo 'Postulado';
                                                                    } else {
                                                                        echo 'En revisión';
                                                                    }
                                                                    break;
                                                                default:
                                                                    echo $item->estado;
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $item->fecha_guardado_documento; ?></td>
                                                        <td><?= $item->fecha_limite_revision; ?></td>
                                                        <td style="text-align: center;"><a href="<?= base_url() . $item->ruta_archivo; ?>"><img src="<?php echo base_url(); ?>images/download_tiny.png"></a></td>
                                                    </tr>

                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive" align="center">
                                    <br>
                                    <h4>Archivos compartidos por mi asesor</h4>
                                    <table id="archivo_docente" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th><b>Descripción</b></th>
                                                <th><b>Tipo de documento</b></th>
                                                <th><b>Fecha de guardado</b></th>
                                                <th><b>Nombre del archivo</b></th>
                                                <th><b>Descargar</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($archivo_asesor) {
                                                foreach ($archivo_asesor as $item):
                                                    ?>
                                                    <tr>
                                                        <td><?= $item->descripcion_archivo; ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($item->tipo_documento) {
                                                                case 'FRA':
                                                                    echo 'Formato de Revisión de Anteproyecto';
                                                                    break;
                                                                case 'RAR':
                                                                    echo 'Registro Asesoría Residencias Profesionales';
                                                                    break;
                                                                case 'FES':
                                                                    echo 'Formato de Evaluación y Seguimiento de Residencia';
                                                                    break;
                                                                case 'FER':
                                                                    echo 'Formato de Evalución de Reporte de Residencia';
                                                                    break;
                                                                case 'CLR':
                                                                    echo 'Carta de Liberación de Residencia Profesional';
                                                                    break;
                                                                case 'R  ':
                                                                    echo 'Revisión avance';
                                                                    break;

                                                                default:
                                                                    echo $item->tipo_documento;
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $item->fecha_guardado_documento; ?></td>
                                                        <td><?= $item->nombre_archivo; ?></td>
                                                        <td style="text-align: center;"><a href="<?= base_url() . $item->ruta_archivo_asesor; ?>"><img src="<?php echo base_url(); ?>images/download_tiny.png"></a></td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($titulacion === 't') { ?>
                                    <div id="stepe" align="center">
                                        <div class="step done" data-desc="Opción a titulación">X</div>
                                    </div>
                                <?php } else { ?>
                                    <div id="stepe" align="center">
                                        <div class="step active" data-desc="Opción a titulación">X</div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
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

        <script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
    </body>
</html>
