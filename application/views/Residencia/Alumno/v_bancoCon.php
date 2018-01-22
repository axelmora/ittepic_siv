<!DOCTYPE HTML>
<html lang="es" xml:lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>SIV :: ITTEPIC</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/marketdeco.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/soberanasanslight.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/merriweather.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/queries.css" media="all" />

        <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <link href="<?php echo base_url(); ?>css/proceso.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/flow.css" type="text/css" rel="stylesheet" media="screen,projection"/>



        <style type="text/css">
            body {
                background-color: #F0F0F0;
            }
        </style>
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
                    </h1><div class="right-align"> Bienvenido (a): <?php echo mb_convert_encoding($nombre, 'Windows-1252'); ?>
                        <?= anchor(base_url() . 'index.php/Inicio/logout', '( Cerrar sesión )&nbsp;&nbsp;&nbsp;&nbsp;') ?>  </div>

                    <div class="social">
                        <ul>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-facebook.png" alt="Facebook" /></a></li>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-twitter.png" alt="Twitter" /></a></li>
                        </ul>
                    </div>
                    <navs id="access" class="access" role="">

                        <div id="menu" class="menu">
                            <ul id="tiny" align="left" class="align-left">
                                <li><a href="<?php echo base_url(); ?>index.php/inicio">Inicio</a>
                                </li>
                                <li><a href="#">Servicio Social
                                    </a><ul>
                                        <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_anoticias">Noticias</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_proceso">Información</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/inicio">Avance</a></li>
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
                    </navs>
                    <!-- #access -->
                </header>
                <!-- #branding -->
                <div id="main">
                    <div id="primary">
                        <div id="content" role="main">
                            <ul class="collapsible popout" data-collapsible="accordion">
                                <?php
                                if ($anteproyectos && !$solicitud) {
                                    foreach ($anteproyectos as $item):
                                        ?>
                                        <li>
                                            <div class="collapsible-header tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?= $item->nombre_proyecto; ?>"><i class="material-icons">business</i><?= $item->nombre_empresa; ?></div>
                                            <div class="collapsible-body grey lighten-5">
                                                <ul class="collection">
                                                    <li class="collection-item grey lighten-2"><i class="material-icons right">content_paste</i> <?= $item->nombre_proyecto; ?> </li>
                                                </ul>
                                                <?php if ($porcentaje_avance >= 80) { ?>
                                                     <label value = "<?= $s = $s + 1; ?>" hidden="true"></label>
                                                    <form class="form-horizontal">
                                                    <?php } else { ?>
                                                        <form method="post" class="form-horizontal" action="<?php echo base_url() . "index.php/Residencia/Alumno/c_banco" ?>">
                                                        <?php } ?>
                                                        <div class="form-group">
                                                            <div class="col-xs-5"><b>&nbsp;&nbsp;Nombre de la empresa: </b> <?= $item->nombre_empresa; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-5"><b>&nbsp;&nbsp;Domicilio de la empresa: </b> <?= $item->domicilio; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-5"><b>&nbsp;&nbsp;Anteproyecto:  </b> <a href="<?= base_url() . $item->ruta_archivo; ?>"> Documento </a></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-5"><b>&nbsp;&nbsp;Residentes requeridos:  </b> <?= $item->residentes_requeridos; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-5"><b>&nbsp;&nbsp;Atención Médica:  </b>&nbsp;&nbsp;
                                                                <select class="form-control" name="atencion_medica<?= $s; ?>" id="atencion_medica<?= $s; ?>" placeholder="Con qué seguro cuentas" required>
                                                                    <option>IMSS</option>
                                                                    <option>ISSSTE</option>
                                                                    <option>Seguro Popular</option>
                                                                    <option>Otro</option>
                                                                </select></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-5"><b title="Número de afiliación o poliza de seguro">&nbsp;&nbsp;Numero de Afiliación:  </b>&nbsp;&nbsp;
                                                                <input type="text"  class="form-control" name="numero_afiliacion<?= $s; ?>" id="numero_afiliacion<?= $s; ?>" value="<?php echo set_value('numero_afiliacion' . $s); ?>" placeholder="Numero de Afiliación" required />
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($item->periodo == null || $item->periodo == '') {
                                                            ?>
                                                            <div class="form-group">
                                                                <div class="col-xs-5"><b title="Periodo en el que realizarás residencia">&nbsp;&nbsp;Periodo proyectado:  </b>&nbsp;&nbsp;
                                                                    <input type="text"  class="form-control" name="periodo<?= $s; ?>" id="periodo<?= $s; ?>" value="<?php echo set_value('periodo' . $s); ?>" placeholder="Periodo en el que realizarás tu residencia profesional" required />
                                                                </div>
                                                            </div>
                                                        <?php } else {
                                                            ?>
                                                            <div class="form-group" hidden="true">
                                                                <div class="col-xs-5"><b title="Periodo en el que realizarás residencia">&nbsp;&nbsp;Periodo proyectado:  </b>&nbsp;&nbsp;
                                                                    <input type="text"  class="form-control" name="periodo<?= $s; ?>" id="periodo<?= $s; ?>" value="" placeholder="Periodo en el que realizarás tu residencia profesional"/>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        if ($item->banco == 'f' && $item->lugares_disponibles > 0) {
                                                            ?>
                                                            <div class="form-group">
                                                                <div class="col-xs-5"><b>&nbsp;&nbsp;Clave compartida:  </b>&nbsp;&nbsp;
                                                                    <input type="text"  class="form-control" name="clave<?= $s; ?>" id="clave<?= $s; ?>"  placeholder="Clave compartida para seleccionar este proyecto" required />
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        if ($item->lugares_disponibles > 0) {
                                                            ?>
                                                            <div class='green-text'><b>&nbsp;&nbsp;Vacantes disponibles:<?= $item->lugares_disponibles ?></b></div>
                                                            <br>&nbsp;&nbsp;
                                                            <?php if ($item->banco == 'f') {//si no es de banco  ?>
                                                                <a class='btn waves-effect waves-light amber darken-1' onclick="confirmar2(<?= $item->anteproyecto_pk ?>,<?php echo $s; ?>);" name='action'>
                                                                <?php } else { //si es de banco ?>
                                                                    <a class='btn waves-effect waves-light amber darken-1'  onclick="confirmar('<?php echo base_url(); ?>', <?= $item->anteproyecto_pk ?>,<?php echo $s; ?>);" name='action'>
                                                                    <?php } ?>
                                                                    Seleccionar</a>
                                                            <?php } else { ?>
                                                                <div class='right'>
                                                                    <div class='red-text'>No hay vacantes disponibles</div>
                                                                </div>
                                                                <br>&nbsp;&nbsp;
                                                                <br>&nbsp;&nbsp;
                                                                <button disabled='disabled' class='btn disabled waves-effect waves-light amber darken-1 center'>
                                                                    Seleccionar
                                                                </button>
                                                            <?php }
                                                            ?>
                                                            <?php if (($item->lugares_disponibles - 1) == 0) { ?>
                                                                <input type="text" name="disponible<?= $s; ?>" id="disponible<?= $s; ?>"  style="visibility: hidden"  value="false">
                                                            <?php } else { ?>
                                                                <input type="text" name="disponible<?= $s; ?>" id="disponible<?= $s; ?>" style="visibility: hidden"  value="true">
                                                            <?php } ?>
                                                            <input type="text" name="lugares_d<?= $s; ?>" id="lugares_d<?= $s; ?>"  style="visibility: hidden"  value="<?php echo ($item->lugares_disponibles); ?> ">
                                                            <input type="text" name="anteproyecto_pk<?= $s; ?>" id="anteproyecto_pk<?= $s; ?>"  style="visibility: hidden"  value=" <?= $item->anteproyecto_pk; ?>">
                                                            </form>
                                                            </div>
                                                            </li>
                                                            <?php
                                                        endforeach;
                                                    } else {
                                                        ?>
                                                        <br>
                                                        <h5 align="center">No hay proyectos disponibles ó ya estas postulado a un proyecto.</h5>
                                                    <?php } ?>
                                                    </ul>
                                                    <form id = "frm_postular" method="post" class="form-horizontal" action="<?php echo base_url() . "index.php/Residencia/Alumno/c_banco/postular" ?>">
                                                        <input type="text" name="periodo" id="periodo"  style="visibility: hidden"  value="">
                                                        <input type="text" name="numero_afiliacion" id="numero_afiliacion"  style="visibility: hidden"  value="">
                                                        <input type="text" name="atencion_medica" id="atencion_medica"  style="visibility: hidden"  value="">
                                                        <input type="text" name="disponible" id="disponible"  style="visibility: hidden"  value="">
                                                        <input type="text" name="lugares_d" id="lugares_d"  style="visibility: hidden"  value="">
                                                        <input type="text" name="anteproyecto_pk" id="anteproyecto_pk"  style="visibility: hidden"  value="">
                                                    </form>
                                                    <h2>&nbsp;</h2>
                                                    <h2>&nbsp;</h2>
                                                    <p>&nbsp;</p>


                                                    </div><!-- #content -->
                                                    </div><!-- #primary -->
                                                    </div><!-- #main -->

                                                    <footer id="colophon" role="contentinfo">
                                                        <div id="site-generator">
                                                            Copyright 2016 - ITTepic
                                                        </div>
                                                    </footer>
                                                    <!-- #colophon -->
                                                    </div><!-- #wrapper -->
                                                    </div> <!-- #page -->
                                                    <!--<script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>-->
                                                    <!-- Compiled and minified JavaScript -->
                                                    <script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
                                                    <!--<script src="<?php echo base_url(); ?>js/materialize.js"></script>-->
                                                    <script type="text/javascript" src="<?php echo base_url(); ?>js/banco_alumno.js"></script>

                                                    </body>
                                                    </html>
