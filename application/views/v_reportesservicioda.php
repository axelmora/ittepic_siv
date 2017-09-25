<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE SERVICIO:</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <script>
            function confirmar()
            {
                $(document).ready(function () {
                    $('.collapsible').collapsible({
                        accordion: true// A setting that changes the collapsible behavior to expandable instead of the default accordion style
                    });
                });
            }
        </script>

        <script>
            function maxLengthCheck(object)
            {
                if (object.value.length > object.maxLength)
                    object.value = object.value.slice(0, object.maxLength)
            }
        </script>
        <style>
            .picker { outline: none; } /* Optional feature */
            /* Header - Day of the week */
            .picker__weekday-display { background-color: #f57c00; }
            /* Body - Today info */
            .picker__date-display { background-color: #ff9800; }
            /* Buttons of actions */
            .picker__nav--prev:hover { background-color: #fff3e0; }
            .picker__nav--next:hover { background-color: #fff3e0; }
            .picker__nav--prev:before {
                border-left: 0;
                border-right: 0.75em solid #ffb74d;
            }
            .picker__nav--next:before {
                border-right: 0;
                border-left: 0.75em solid #ffb74d;
            }
            .picker__today { color: #fb8c00; }
            .picker__clear { /* If you want to customize */ }
            .picker__close { color: #fb8c00; }
            .btn-flat.picker__today:active { background-color: #fff3e0; }
            .btn-flat.picker__close:active { background-color: #fff3e0; }
            .btn-flat.picker__clear:active { background-color: #fff3e0; }
            /* Select months of the year */
            .picker__select--month.browser-default {
                display: inline;
                background-color: #FFFFFF;
                width: 34%;
                border: none;
                outline: none;
            }
            /* Every month of the year except: today */
            .picker__day { /* If you want to customize */ }
            .picker__day:hover { /* If you want to customize */ }
            .picker__day--infocus:hover { color: #f57c00; }
            .picker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected { color: #f57c00; }
            .picker__day.picker__day--infocus.picker__day--selected.picker__day--highlighted { background-color: #ffcc80; }
            /* Today */
            .picker__day.picker__day--infocus.picker__day--today.picker__day--selected.picker__day--highlighted { background-color: #ff9800; }
            .picker__day.picker__day--today { color: #f57c00; }



            ul.tsc_pagination { margin:4px 0; padding:0px; height:100%; overflow:hidden; font:12px 'Tahoma'; list-style-type:none; }
            ul.tsc_pagination li { float:left; margin:0px; padding:0px; margin-left:5px; }

            ul.tsc_pagination li a { color:black; display:block; text-decoration:none; padding:7px 10px 7px 10px; }


            ul.tsc_paginationA li a { color:#FFFFFF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }

            ul.tsc_paginationA01 li a { color:#474747; border:solid 1px #B6B6B6; padding:6px 9px 6px 9px; background:#E6E6E6; background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6); background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6)); }
            ul.tsc_paginationA01 li:hover a,
            ul.tsc_paginationA01 li.current a { background:#FFFFFF; }



            /* label color */
            .input-field label {
                color: #FFA600;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #FFA600;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #000;
                box-shadow: 0 1px 0 0 #000;
            }
            /* valid color */
            .input-field input[type=text].valid {
                border-bottom: 13px solid #00FF1E;
                box-shadow: 0 1px 0 0 #00FF1E;
            }
            /* invalid color */
            .input-field input[type=text].invalid {
                border-bottom: 10px solid #FF0000;
                box-shadow: 0 20px 0 0 #FF0000;
            }
            /* icon prefix focus color */
            .input-field .prefix.active {
                color: #000;
            }




        </style>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper grey lighten-5 left-align">
                <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

                <div class="right-align hide-on-med-and-down">
                    <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down">Bienvenido <?= $this->session->userdata('perfil') ?>
                            <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
                </div>
            </div>
        </nav>
        <!-- Navbar goes here -->
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large orange darken-1">
                <i class="large material-icons">stars</i>
            </a>
            <ul>

                <li><a class="btn-floating grey lighten-1" href="<?php echo base_url(); ?>index.php/c_alumnos"><i class="material-icons">assignment_ind</i></a></li>
                <li><a class="btn-floating grey lighten-1" href="<?php echo base_url(); ?>index.php/c_instancias"><i class="material-icons">business</i></a></li>
                <li><a class="btn-floating grey lighten-1" href="<?php echo base_url(); ?>index.php/c_noticias"><i class="material-icons">comment</i></a></li>
            </ul>
        </div>
        <!-- Page Layout here -->
        <div class="row">

            <div class="col s3">
                <!-- Grey navigation panel -->
            </div>

            <div class="col s9">
                <!-- Teal page content  -->
            </div>

        </div>

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">

                <br><br>
                <br>
                <div class="row center">

                    REPORTES MODULO SERVICIO SOCIAL

                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <a href="<?php echo base_url(); ?>index.php">< Regresar</a>




                <!--IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII-->
                <!--IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII-->

                <!--IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII-->
                <div class="row center-align">

                    <div class="col s1 center-align"><div class="input-field center-align">
                            <div id="buscador">

                            </div></div>

                    </div>


                    <div class="col s4 center-align card-panel grey lighten-5"><br>ALUMNOS POR CARRERA<div class="input-field center-align">
                            <div id="buscador">





                                <span><?php echo validation_errors(); ?></span>
                                <?= form_open(base_url() . 'index.php/c_alumnosc_pdf/validar') ?>

                                <div class="left-align">Carrera:</div>
                                <select  id="carrerai" name="carrerai" value="" class="browser-default">
                                    <option value="3">ARQUITECTURA</option>
                                    <option value="4">INGENIERIA CIVIL</option>
                                    <option value="5">INGENIERIA ELECTRICA</option>
                                    <option value="6">INGENIERIA INDUSTRIAL</option>
                                    <option value="7">INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
                                    <option value="8">INGENIERIA BIOQUIMICA</option>
                                    <option value="9">INGENIERIA QUIMICA</option>
                                    <option value="10">LICENCIATURA EN ADMINISTRACION</option>
                                    <option value="11">LICENCIATURA EN INFORMATICA</option>
                                    <option value="12">LICENCIATURA EN RELACIONES COMERCIALES</option>
                                    <option value="13">INGENIERIA MECATRONICA</option>
                                    <option value="14">INGENIERIA EN GESTION EMPRESARIAL</option>
                                    <option value="15">INGENIERIA EN TECNOLOGIAS DE LA INFORMACION Y COMUNICACIONES</option>
                                    <option value="16">INGENIERIA EN DESARROLLO COMUNITARIO</option>

                                </select>

                                <br>
                                <div class="left-align">Desde:</div>
                                <input type="text"  class="datepicker" placeholder="Fecha inicial" name="desdex" value=""   id="desdex" />




                                <div class="left-align">Hasta:</div>
                                <input type="text" class="datepicker" placeholder="Fecha final" name="hastax" value=""    id="hastax" />

                                <button class="btn orange darken-1 z-depth-0 " type="submit">
                                    <div class="text-orange"><i class="material-icons right">description</i>Generar</div>
                                </button>
                                <?= form_close() ?>
                            </div></div>
                        <br>
                    </div>

                    <div class="col s2 center-align"><div class="input-field center-align">
                        </div>

                    </div>




                    <div class="col s4 center-align card-panel grey lighten-5"><br>ALUMNOS POR SEXO<div class="input-field center-align">
                            <div id="buscador">





                                <span><?php echo validation_errors(); ?></span>
                                <?= form_open(base_url() . 'index.php/c_alumnosx_pdf/validar') ?>

                                <div class="left-align">Sexo:</div>
                                <select  id="sexoi" name="sexoi" value="" class="browser-default">
                                    <option value="F">Mujeres</option>
                                    <option value="M">Hombres</option>
                                </select>

                                <br>
                                <div class="left-align">Desde:</div>
                                <input type="text"  class="datepicker" placeholder="Fecha inicial" name="desdex" value=""   id="desdex" />




                                <div class="left-align">Hasta:</div>
                                <input type="text" class="datepicker" placeholder="Fecha final" name="hastax" value=""    id="hastax" />


                                <button class="btn orange darken-1 z-depth-0 " type="submit">
                                    <div class="text-orange"><i class="material-icons right">description</i>Generar</div>
                                </button>
                                <?= form_close() ?>
                            </div></div>
                        <br>
                    </div>


                    <div class="col s1 center-align"><div class="input-field center-align">
                        </div>

                    </div>
                </div>
                <!--IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII-->



                <div class="striped">





                </div>


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
                    <div align="center ">Copyright 2015 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
                                ITTepic
                            </span></a></div>
                </div>
            </div>
        </footer>


        <!--  Scripts-->
        <script>

            $(document).ready(function () {
                $('.datepicker').pickadate({
                    format: 'dd/mm/yyyy',
                    formatSubmit: 'dd/mm/yyyy',
                    hiddenName: true
                });
            });

            jQuery.extend(jQuery.fn.pickadate.defaults, {
                monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                monthsShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                weekdaysFull: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
                weekdaysShort: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
                today: 'hoy',
                clear: 'borrar',
                close: 'cerrar',
                firstDay: 1,
                format: 'dd/mm/yyyy',
                formatSubmit: 'dd/mm/yyyy',
            });

            jQuery.extend(jQuery.fn.pickatime.defaults, {
                clear: 'borrar'
            });
        </script>
        <?php
        $this->load->view('jfacademicoarchivo');
        ?>
    </body>
</html>
