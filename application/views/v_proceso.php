<!DOCTYPE HTML>
<html lang="es" xml:lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>SIV :: ITTEPIC</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>	css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/marketdeco.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/soberanasanslight.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/merriweather.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/queries.css" media="all" />

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>

        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <link href="<?php echo base_url(); ?>js/materialize.css" type="text/javascript" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/proceso.css" type="text/css" rel="stylesheet" media="screen,projection"/>

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
                    <navs id="access" class="access" role="">


                        <?php if (!$programa) { ?>
                            <div id="menu" class="menu">
                                <ul id="tiny">
                                    <li><a href="<?php echo base_url(); ?>index.php/inicio">Inicio</a>
                                    </li>
                                    <li><a href="#">Servicio Social
                                        </a><ul>
                                            <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_anoticias">Noticias</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_proceso">Información</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_programas">Programas</a></li>
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

                            <?php
                        } else {
                            ?>

                            <div id="menu" class="menu">
                                <ul id="tiny">
                                    <li><a href="<?php echo base_url(); ?>index.php/inicio">Inicio</a>
                                    </li>
                                    <li><a href="#">Servicio Social
                                        </a><ul>
                                            <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_anoticias">Noticias</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_proceso">Informacion del proceso</a></li>
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



                            <?php
                        }
                        ?>
                        </nav>
                        <!-- #access --> 
                </header>
                <!-- #branding -->

                <div id="main">

                    <div id="primary">
                        <div id="content" role="main">

                            <ul id='timeline'>
                                <li class='work'>
                                    <input class='radio' id='work5' name='works' type='radio' checked>
                                    <div class="relative">
                                        <label for='work5'> Curso de induccion</label>
                                        <span class='date'>Paso 0</span>
                                        <span class='circle'></span>
                                    </div>
                                    <div class='content'>
                                        <p>
                                            Aqui va el texto.. 
                                        </p>
                                    </div>
                                </li>
                                <li class='work'>
                                    <input class='radio' id='work4' name='works' type='radio'>
                                    <div class="relative">
                                        <label for='work4'> Titulo</label>
                                        <span class='date'>Paso 1</span>
                                        <span class='circle'></span>
                                    </div>
                                    <div class='content'>
                                        <p>
                                            Texto
                                        </p>
                                    </div>
                                </li>
                                <li class='work'>
                                    <input class='radio' id='work3' name='works' type='radio'>
                                    <div class="relative">
                                        <label for='work3'> Titulo</label>
                                        <span class='date'>Paso 2</span>
                                        <span class='circle'></span>
                                    </div>
                                    <div class='content'>
                                        <p>
                                            Texto
                                        </p>
                                    </div>
                                </li>
                                <li class='work'>
                                    <input class='radio' id='work2' name='works' type='radio'>
                                    <div class="relative">
                                        <label for='work2'>Titulo</label>
                                        <span class='date'>Paso 3</span>
                                        <span class='circle'></span>
                                    </div>
                                    <div class='content'>
                                        <p>
                                            Texto
                                        </p>
                                    </div>
                                </li>
                                <li class='work'>
                                    <input class='radio' id='work1' name='works' type='radio'>
                                    <div class="relative">
                                        <label for='work1'>Titulo</label>
                                        <span class='date'>Paso 4</span>
                                        <span class='circle'></span>
                                    </div>
                                    <div class='content'>
                                        <p>
                                            Texto
                                        </p>
                                    </div>
                                </li>
                            </ul>


                        </div>
                    </div><!-- #primary -->


                </div><!-- #main -->

                <footer id="colophon" role="contentinfo">

                    <div id="site-generator">
                        Copyright 2015 - ITTepic
                    </div>
                </footer>
                <!-- #colophon -->
            </div><!-- #wrapper -->
        </div><!-- #page -->

        <script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
    </body>
</html>