<!DOCTYPE HTML>
<html lang="es" xml:lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>SIV :: ITTEPIC</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/marketdeco.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/soberanasanslight.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/merriweather.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/queries.css" media="all" />


        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>

        <script>
            function confirmar()
            {
                if (confirm('¿Desea seleccionar este programa?\n\
        Recuerda si no tienes el 70% de avance reticular o mas\n\
        NO SE TE ASIGNARA EL PROGRAMA QUE SELECCIONASTE'))
                    return true;
                else
                    return false;
            }
        </script>
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
                    </h1><div class="right-align"> Bienvenido (a): <?php echo $nombre; ?>  
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



                            <ul class="collapsible popout" data-collapsible="accordion">
                                <?php foreach ($instancias as $item): ?>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">business</i><?= $item->nombre_instancia; ?></div><div class="collapsible-body grey lighten-5">
                                            <p><?php foreach ($PxI as $atom): ?> <?php if ($item->nombre_instancia === $atom->nombre_instancia) { ?>
                                                    <ul class="collection">
                                                        <li class="collection-item grey lighten-2"><i class="material-icons right">content_paste</i> <?= $atom->nombre_programa; ?> </li> 
                                                    </ul>
                                                    <b>&nbsp;&nbsp;Nombre del encargado: </b> <?= $atom->nombre_encargado; ?><br>
                                                    <b>&nbsp;&nbsp;Domicilio de la instancia: </b> <?= $atom->domicilio_instancia; ?><br>
                                                    <b>&nbsp;&nbsp;Correo del encargado:  </b> <?= $atom->correo_encargado; ?><br>
                                                    <b>&nbsp;&nbsp;Telefono: </b> <?= $atom->telefono_instancia; ?><br>
                                                    <b>&nbsp;&nbsp;Objetivo del programa: </b> <?= $atom->objetivo_programa; ?><br>
                                                    <b>&nbsp;&nbsp;Modalidad: </b> <?= $atom->modalidad; ?><br>
                                                    <b>&nbsp;&nbsp;Tipo de programa: </b> <?= $atom->nombre_tipoprograma; ?><br>
                                                    <b>&nbsp;&nbsp;Sector de la instancia: </b> <?= $atom->sector_instancia; ?><br>
                                                    <div class="right">&nbsp;&nbsp;&nbsp;&nbsp;<b>Numero total de vacantes:</b> <?= $atom->total_solicitudes; ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                    <?php if ($porcentaje_avance >= 70) { ?>
                                                        <form method="post" class="center" action="<?php echo base_url() . "index.php/alumnos/c_programas/insertar" ?>">
                                                        <?php } else { ?>
                                                            <form method="post" class="center" action="<?php echo base_url() . "index.php/alumnos/c_programas" ?>">
                                                            <?php } ?>

                                                            <?php
                                                            if ($atom->solicitudes_ocupadas < $atom->total_solicitudes) {
                                                                echo "<div class='right green-text'>";
                                                                echo ($atom->total_solicitudes - $atom->solicitudes_ocupadas);
                                                                echo "</div>";
                                                                echo "<div class='right green-text'><b> Vacantes disponibles:&nbsp;</b></div>";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<button class='btn waves-effect waves-light amber darken-1' type='submit' onclick='return confirmar()' name='action'>";
                                                                echo "Seleccionar";
                                                                echo "</button>";
                                                                echo "<br>&nbsp;&nbsp;";
                                                            } else {
                                                                echo "<div class='right'>";
                                                                echo "<div class='red-text'>Hay <b>0</b> vacantes disponibles</div>";
                                                                echo "</div>";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<br>&nbsp;&nbsp;";
                                                                echo "<button disabled='disabled' class='btn disabled waves-effect waves-light amber darken-1 center'>";
                                                                echo "Seleccionar";
                                                                echo "</button>";
                                                                echo "<br>&nbsp;&nbsp;";
                                                            }
                                                            ?>
                                                            <input type="text" name="ncontroli"  style="visibility: hidden"  value="<?php echo $username; ?> ">
                                                            <input type="text" name="solicitudpi"  style="visibility: hidden"  value=" <?= $atom->id_solicitud; ?>">
                                                            <input type="text" name="numerosolicitudes"  style="visibility: hidden"  value="<?php echo ($atom->solicitudes_ocupadas) + 1; ?>">
                                                        </form>
                                                    <?php } else {} ?>
                                                <?php endforeach; ?>
                                                </p>
                                        </div>
                                    <?php endforeach; ?>
                                </li>
                            </ul>




                            <h2>&nbsp;</h2>
                            <h2>&nbsp;</h2>
                            <h2>
                                <p>&nbsp;</p>
                                <p></p>
                        </div>

                        <!-- begin article -->
                        <!-- begin article -->
                        <!-- end article -->

                        <!-- begin article --><!-- end article -->

                        <!-- begin article --><!-- end article --></div><!-- #content -->
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