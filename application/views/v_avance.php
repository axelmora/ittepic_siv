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
                                            <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_avance">Avance</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Residencia Profesional
                                        </a><ul>
                                            <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_informacion">Información del procedimiento</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_participantes">Información de participantes del proyecto</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_banco">Banco de proyectos</a></li>
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

                            <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
                            <?php if (!$programa) { ?>
                                <div id="steps">

                                    <div class="step active" data-desc="Seleccionar programa">1</div>
                                    <div class="step active" data-desc="Dirigirte">2</div>
                                    <div class="step active" data-desc="Primer reporte">3</div>
                                    <div class="step active" data-desc="Segundo reporte">4</div>
                                </div>

                            <?php } else { ?>

                                <?php foreach ($programa as $item): ?>




                                    <?php if (!$tarjeta) { ?>  
                                        Aun no se activa tu  avance, por favor continua tu tramite asistiendo a la oficina de servicio social. 
                                        <?= form_open(base_url() . 'index.php/c_alumnos_pdf/generar2') ?>
                                        <input type="submit" value="Generar pdf" formtarget="_blank" />
                                        <input type="text" style="visibility:hidden"  name="idps" value="<?= $item->id_programa_seleccionado; ?>" id="idps" />      
                                        <input type="text" style="visibility:hidden" oninput="maxLengthCheck(this)" name="id" value="<?= $item->numero_control; ?>"  maxlength="8" length="8" id="id" />
                                        <?= form_close() ?>

                                    <?php } else { ?>       			

                                        <br>
                                        Obten el formato de reporte aqui:
                                                    <a href="http://sgc.ittepic.edu.mx/sgc/SGC/02%20VINCULACION/ITTEPIC-VI-PO-002%20SERVICIO%20SOCIAL/ITTEPIC-VI-PO-002-04_REPORTE_BIMESTRAL_SERV_SOCIAL.doc
                                                       ">(Enlace de descarga)</a>
                                                    <br>
                                        <?php // Esta seccion corresponde al reporte bimestal 1 del alumno ?>   				
                                        <?php if ($hoy == $item->fecha_reporte1) { ?>
                                            hoy es el ultimo dia para entregar tu reporte!
                                        <?php } else { ?>  <?php } ?>
                                        <?php foreach ($tarjeta as $tar): ?>   

                                            <?php if ($tar->reporteb1 != 't') { ?>    						
                                                <?php if ($hoy > $startdate1 && $hoy <= $enddate1) { ?>
                                                    <br>                                                    
                                                    <?= form_open(base_url() . 'index.php/alumnorb1/validar') ?>
                                                    <input type="text" style="visibility:hidden; "  name="idps" value="<?= $item->id_programa_seleccionado; ?>" id="idps" /><br>
                                                    Descripcion de las actividades bimestrales:
                                                    <textarea style="background:white; resize: none" rows="8" class="large-textarea" name="actividadesi" id="actividadesi" type="text" value="<?php echo set_value('actividadesi'); ?>" placeholder="Describe las actividades realizadas en este bimestre"></textarea>
                                                    <div class="red-text left"><?php echo form_error('actividadesi'); ?></div>
                                                    Total de horas de este bimestre:&nbsp;&nbsp;<input type="text"   name="totalhb1" value="<?php echo set_value('totalhb1'); ?>" id="totalhb1" /><br>
                                                    <div class="red-text left"><?php echo form_error('totalhb1'); ?></div>
                                                    <br>Total de horas acumuladas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"   name="totalha1" value="<?php echo set_value('totalha1'); ?>" id="totalha1" /><br>
                                                    <div class="red-text left"><?php echo form_error('totalha1'); ?></div>
                                                    <br><button class="btn orange darken-1 right-align z-depth-0 " type="submit" formtarget="_blank">
                                                        <div class="text-orange"><i class="material-icons right">supervisor_account</i>Generar reporte bimestral</div>
                                                    </button>
                                                    <br>
                                                    <br>
                                                    <?= form_close() ?>

                                                    Una vez realizado, favor de llevarlo a la oficina de servicio social antes de que sea tu fecha limite, de lo contrario tendras una amonestación.


                                                <?php } else { ?>  <?php } ?>
                                            <?php } else { ?> <?php } ?>
                                        <?php endforeach; ?>
                                        <?php // Termina codigo reporte bimestal 1 del alumno ?> 


                                        <?php // Esta seccion corresponde al reporte bimestal 2 del alumno ?>   				
                                        <?php if ($hoy == $item->fecha_reporte2) { ?>
                                            Hoy es el ultimo dia para entregar tu reporte!

                                            <br>
                                            Una vez realizado, favor de llevarlo a la oficina de servicio social antes de que sea tu fecha limite, de lo contrario tendras una amonestación.

                                        <?php } else { ?>  <?php } ?>
                                        <?php foreach ($tarjeta as $tar): ?>   

                                            <?php if ($tar->reporteb2 != 't') { ?>    						
                                                <?php if ($hoy > $startdate2 && $hoy <= $enddate2) { ?>
                                                    
                                                    <br>
                                                    <?= form_open(base_url() . 'index.php/alumnorb2/validar') ?>
                                                    <input type="text" style="visibility:hidden; "  name="idps" value="<?= $item->id_programa_seleccionado; ?>" id="idps" /><br>
                                                    Descripcion de las actividades bimestrales:
                                                    <textarea style="background:white; resize: none" rows="8" class="large-textarea" name="actividadesi" id="actividadesi" type="text" value="<?php echo set_value('actividadesi'); ?>" placeholder="Describe las actividades realizadas en este bimestre"></textarea>
                                                    <div class="red-text left"><?php echo form_error('actividadesi'); ?></div>
                                                    Total de horas de este bimestre:&nbsp;&nbsp;<input type="text"   name="totalhb2" value="<?php echo set_value('totalhb2'); ?>" id="totalhb2" /><br>
                                                    <div class="red-text left"><?php echo form_error('totalhb2'); ?></div>
                                                    <br>Total de horas acumuladas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"   name="totalha2" value="<?php echo set_value('totalha2'); ?>" id="totalha2" /><br>
                                                    <div class="red-text left"><?php echo form_error('totalha2'); ?></div>
                                                    <br><button class="btn orange darken-1 right-align z-depth-0 " type="submit" formtarget="_blank">
                                                        <div class="text-orange"><i class="material-icons right">supervisor_account</i>Generar reporte bimestral</div>
                                                    </button>
                                                    <br>
                                                    <br>
                                                    <?= form_close() ?>
                                                <?php } else { ?>  <?php } ?>
                                            <?php } else { ?>  <?php } ?>
                                        <?php endforeach; ?>
                                        <?php // Termina codigo reporte bimestal 2 del alumno ?> 

                                        <?php // Esta seccion corresponde al reporte bimestal 3 del alumno ?>   				
                                        <?php if ($hoy == $item->fecha_reporte3) { ?>
                                            Hoy es el ultimo dia para entregar tu reporte!
                                            <br>
                                            Una vez realizado, favor de llevarlo a la oficina de servicio social antes de que sea tu fecha limite, de lo contrario tendras una amonestación.

                                        <?php } else { ?>  <?php } ?>
                                        <?php foreach ($tarjeta as $tar): ?>   

                                            <?php if ($tar->reporteb3 != 't') { ?>    						
                                                <?php if ($hoy > $startdate3 && $hoy <= $enddate3) { ?>
                                                    <br>                                                   
                                                    <?= form_open(base_url() . 'index.php/alumnorb3/validar') ?>



                                                    <input type="text" style="visibility:hidden; "  name="idps" value="<?= $item->id_programa_seleccionado; ?>" id="idps" /><br>
                                                    Descripcion de las actividades bimestrales:
                                                    <textarea style="background:white; resize: none" rows="8" class="large-textarea" name="actividadesi" id="actividadesi" type="text" value="<?php echo set_value('actividadesi'); ?>" placeholder="Describe las actividades realizadas en este bimestre"></textarea>
                                                    <div class="red-text left"><?php echo form_error('actividadesi'); ?></div>
                                                    Total de horas de este bimestre:&nbsp;&nbsp;<input type="text"   name="totalhb3" value="<?php echo set_value('totalhb3'); ?>" id="totalhb3" /><br>
                                                    <div class="red-text left"><?php echo form_error('totalhb3'); ?></div>
                                                    <br>Total de horas acumuladas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"   name="totalha3" value="<?php echo set_value('totalha3'); ?>" id="totalha3" /><br>
                                                    <div class="red-text left"><?php echo form_error('totalha3'); ?></div>
                                                    <br><button class="btn orange darken-1 right-align z-depth-0 " type="submit" formtarget="_blank">
                                                        <div class="text-orange"><i class="material-icons right">supervisor_account</i>Generar reporte bimestral</div>
                                                    </button>
                                                    <br>
                                                    <br>
                                                    <?= form_close() ?>
                                                <?php } else { ?>  <?php } ?>
                                            <?php } else { ?>  <?php } ?>
                                        <?php endforeach; ?>
                                        <?php // Termina codigo reporte bimestal 3 del alumno ?> 


                                        <?php foreach ($tarjeta as $tar): ?>  
                                            <?php if ($tar->reporteb1 != 't' && $tar->reporteb2 != 't' && $tar->reporteb3 != 't' && $tar->reportefinal != 't' && $hoy <= $enddate1) { ?>  
                                                <br>
                                                <?php
                                                $d1 = strtotime($item->fecha_reporte1);
                                                $d2 = ceil(($d1 - time()) / 60 / 60 / 24);
                                                echo "Faltan " . $d2 . " dias para tu primer reporte, Fecha limite: " . $item->fecha_reporte1;
                                                ?> <br>Tienes una semana habil antes de esta fecha para realizar tu reporte bimestral
                                                <br>
                                                <div id="steps">

                                                    <div class="step" data-desc="Seleccionar programa">1</div>
                                                    <div class="step active" data-desc="1er. Reporte">2</div>
                                                    <div class="step active" data-desc="2do. Reporte">3</div>
                                                    <div class="step active" data-desc="3er. Reporte">4</div>
                                                    <div class="step active" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?>

                                            <?php if ($tar->reporteb1 != 't' && $tar->reporteb2 != 't' && $tar->reporteb3 != 't' && $tar->reportefinal != 't' && $hoy > $enddate1) { ?>  
                                                <span style="color:red; " >Por favor, dirigete a la oficina de servicio social para regularizar tu tramite, entrega tu primer reporte.</span>
                                                <br>
                                                <div id="steps">

                                                    <div class="step" data-desc="Seleccionar programa">1</div>
                                                    <div class="step active" data-desc="1er. Reporte">2</div>
                                                    <div class="step active" data-desc="2do. Reporte">3</div>
                                                    <div class="step active" data-desc="3er. Reporte">4</div>
                                                    <div class="step active" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?>


                                            <?php if ($tar->reporteb1 == 't' && $tar->reporteb2 != 't' && $tar->reporteb3 != 't' && $tar->reportefinal != 't' && $hoy <= $enddate2) { ?> 

                                                <?php
                                                $d3 = strtotime($item->fecha_reporte2);
                                                $d4 = ceil(($d3 - time()) / 60 / 60 / 24);
                                                echo "Faltan " . $d4 . " dias para tu segundo reporte, Fecha limite: " . $item->fecha_reporte2;
                                                ?> Tienes una semana habil antes de esta fecha para realizar tu reporte bimestral

                                                <div id="steps">

                                                    <div class="step" data-desc="Seleccionar programa">1</div>
                                                    <div class="step" data-desc="1er. Reporte">2</div>
                                                    <div class="step active" data-desc="2do. Reporte">3</div>
                                                    <div class="step active" data-desc="3er. Reporte">4</div>
                                                    <div class="step active" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?> 

                                            <?php if ($tar->reporteb1 == 't' && $tar->reporteb2 != 't' && $tar->reporteb3 != 't' && $tar->reportefinal != 't' && $hoy > $enddate2) { ?> 
                                                <span style="color:red; " >Por favor, dirigete a la oficina de servicio social para regularizar tu tramite, entrega tu segundo reporte.</span>


                                                <div id="steps">

                                                    <div class="step" data-desc="Seleccionar programa">1</div>
                                                    <div class="step" data-desc="1er. Reporte">2</div>
                                                    <div class="step active" data-desc="2do. Reporte">3</div>
                                                    <div class="step active" data-desc="3er. Reporte">4</div>
                                                    <div class="step active" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?> 

                                            <?php if ($tar->reporteb1 == 't' && $tar->reporteb2 == 't' && $tar->reporteb3 != 't' && $tar->reportefinal != 't' && $hoy <= $enddate3) { ?>  

                                                <?php
                                                $d5 = strtotime($item->fecha_reporte3);
                                                $d6 = ceil(($d5 - time()) / 60 / 60 / 24);
                                                echo "Faltan " . $d6 . " dias para tu tercer reporte, Fecha limite: " . $item->fecha_reporte3;
                                                ?> Tienes una semana habil antes de esta fecha para realizar tu reporte bimestral

                                                <div id="steps">

                                                    <div class="step done" data-desc="Seleccionar programa">1</div>
                                                    <div class="step done" data-desc="1er. Reporte">2</div>
                                                    <div class="step done" data-desc="2do. Reporte">3</div>
                                                    <div class="step active" data-desc="3er. Reporte">4</div>
                                                    <div class="step active" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?> 

                                            <?php if ($tar->reporteb1 == 't' && $tar->reporteb2 == 't' && $tar->reporteb3 != 't' && $tar->reportefinal != 't' && $hoy > $enddate3) { ?>  
                                                <span style="color:red; " >Por favor, dirigete a la oficina de servicio social para regularizar tu tramite, entrega tu tercer reporte.</span>


                                                <div id="steps">

                                                    <div class="step done" data-desc="Seleccionar programa">1</div>
                                                    <div class="step done" data-desc="1er. Reporte">2</div>
                                                    <div class="step done" data-desc="2do. Reporte">3</div>
                                                    <div class="step active" data-desc="3er. Reporte">4</div>
                                                    <div class="step active" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?> 

                                            <?php if ($tar->reporteb1 == 't' && $tar->reporteb2 == 't' && $tar->reporteb3 == 't' && $tar->reportefinal != 't') { ?>  
                                                Por favor realiza tu reporte final y entregalo en las oficinas de servicio social.<div id="steps">

                                                    <div class="step" data-desc="Seleccionar programa">1</div>
                                                    <div class="step" data-desc="1er. Reporte">2</div>
                                                    <div class="step" data-desc="2do. Reporte">3</div>
                                                    <div class="step" data-desc="3er. Reporte">4</div>
                                                    <div class="step active" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?> 

                                            <?php if ($tar->reporteb1 == 't' && $tar->reporteb2 == 't' && $tar->reporteb3 == 't' && $tar->reportefinal == 't') { ?>  
                                                <div id="steps">

                                                    <div class="step done" data-desc="Seleccionar programa">1</div>
                                                    <div class="step done" data-desc="1er. Reporte">2</div>
                                                    <div class="step done" data-desc="2do. Reporte">3</div>
                                                    <div class="step done" data-desc="3er. Reporte">4</div>
                                                    <div class="step done" data-desc="Reporte Final">5</div>
                                                </div>
                                            <?php } ?> 

                                        <?php endforeach; ?>
                                    <?php } ?> 


                                <?php endforeach; ?>
                            <?php } ?>


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