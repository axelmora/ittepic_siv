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
                    </h1><div align="right" class="right"> Bienvenido (a): <?php echo $nombre; ?>  
                        <?= anchor(base_url() . 'index.php/Inicio/logout', '( Cerrar sesión )&nbsp;&nbsp;&nbsp;&nbsp;') ?>  </div> 
                    <div class="social">
                        <ul>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-facebook.png" alt="Facebook" /></a></li>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-twitter.png" alt="Twitter" /></a></li>
                        </ul>
                    </div>
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
                </header>
                <!-- #branding -->
                <?php if ($asesor && $revisor1 && $revisor2 && $jefe) { ?> 
                    <br>
                    <br>
                    <h3 align="center">Participantes de tu proyecto</h3>
                    <br>
                    <div id="main" class="container-fluid" align="center">
                        <div align="center">
                            <div class="row">
                                <div class="col-sm-4"> 
                                    <b>Asesor</b>
                                </div>
                                <div class="col-sm-4"> 
                                    <b>Revisor 1</b>
                                </div>
                                <div class="col-sm-4"> 
                                    <b>Revisor 2</b>
                                </div> 
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"> 
                                    <b>Nombre:</b> <?php echo $asesor_nombre .' '. $asesor_apellido; ?>
                                </div>
                                <div class="col-sm-4"> 
                                    <b>Nombre:</b> <?php echo $revisor1_nombre .' '. $revisor1_apellido; ?>
                                </div>
                                <div class="col-sm-4"> 
                                    <b>Nombre:</b> <?php echo $revisor2_nombre .' '. $revisor2_apellido; ?>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-4"> 
                                    <b>Correo:</b> <?php echo $asesor_correo; ?>
                                </div>
                                <div class="col-sm-4"> 
                                    <b>Correo:</b> <?php echo $revisor1_correo; ?>
                                </div>
                                <div class="col-sm-4"> 
                                    <b>Correo:</b> <?php echo $revisor2_correo; ?>
                                </div> 
                            </div>
                        <?php } else { ?>
                            <br>
                            <br>
                            <h3 align="center">Asignación de Asesor y Revisores pendiente.</h3>
                            <br>
                            <br>
                        <?php } ?>
                            <br>
                            <br>
                        <div class="row">
                            <div class="col-sm-4"> 
                            </div>
                            <div class="col-sm-4"> 
                                <b>Jefe Académico</b>
                            </div>
                            <div class="col-sm-4"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"> 
                            </div>
                            <div class="col-sm-4"> 
                                <b>Nombre: </b> <?php echo $jefe_nombre; ?>
                            </div>
                            <div class="col-sm-4"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"> 
                            </div>
                            <div class="col-sm-4"> 
                                <b>Correo: </b> <?php echo $jefe_correo; ?>
                            </div>
                            <div class="col-sm-4"> 
                            </div>
                        </div>
                    </div>
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