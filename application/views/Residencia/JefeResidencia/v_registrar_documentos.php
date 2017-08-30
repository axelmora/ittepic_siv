<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <!-- Aqui debe cambiar dependiendo quien entre  -->
        <title>SIV :: REGISTRAR DOCUMENTOS FINALES</title>

        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>


        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">

        <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
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

        <style>
            input.button-add {
                background-image: url(/images/buttons/add.png); /* 16px x 16px */
                background-color: transparent; /* make the button transparent */
                background-repeat: no-repeat;  /* make the background image appear only once */
                background-position: 0px 0px;  /* equivalent to 'top left' */
                border: none;           /* assuming we don't want any borders */
                cursor: pointer;        /* make the cursor like hovering over an <a> element */
                /* make text start to the right of the image */
                vertical-align: middle; /* align the text vertically centered */
            }	



            ul.tsc_pagination { margin:4px 0; padding:0px; height:100%; overflow:hidden; font:12px 'Tahoma'; list-style-type:none; }
            ul.tsc_pagination li { float:left; margin:0px; padding:0px; margin-left:5px; }

            ul.tsc_pagination li a { color:black; display:block; text-decoration:none; padding:7px 10px 7px 10px; }


            ul.tsc_paginationA li a { color:#FFFFFF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }

            ul.tsc_paginationA01 li a { color:#474747; border:solid 1px #B6B6B6; padding:6px 9px 6px 9px; background:#E6E6E6; background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6); background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6)); }
            ul.tsc_paginationA01 li:hover a,
            ul.tsc_paginationA01 li.current a { background:#FFFFFF; }

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

                    <h5 class="condensed light header center amber-text darken-1-text">      
                        REGISTRAR DOCUMENTOS FINALES DE RESIDENCIA PROFESIONAL</h5>

                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" href="<?php echo base_url(); ?>index.php/Residencia/JefeResidencia/Panel_jeferesidencia"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>

                <br><p>&nbsp;</p> 

                <div class="col s6 center-align card-panel grey lighten-5">
                    <table id="table_id" class="display">
                        <thead>                    
                            <tr>
                                <th>Alumno</th>
                                <th>Carta de liberacion asesor interno</th>
                                <th>Carta de liberacion asesor externo</th>
                                <th>Evaluación asesor externo/interno</th>
                                <th>Evidencias</th>                                
                                <!--<th style="text-align: center;">Documentos Finales</th>-->
                            </tr>
                        </thead>
                        <tbody>                        
                            <?php
                            if ($dictamen) {
                                foreach ($dictamen as $value) {
                                    ?>
                                <form>                                    
                                    <tr>
                                        <td><?= $value->numero_control.' - '.$value->nombre; ?></td>

                                        <td style="text-align: center;">
                                            <div class="switch">
                                                <label>
                                                    No
                                                    <input type="checkbox" onchange="if ($(this).is(':checked')) {
                                                                        registrar(1, 'true',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }
                                                                    else {
                                                                        registrar(1, 'false',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }" <?php
                                                           if ($value->liberacion_interno == 't') {
                                                               echo 'checked = "checked"';
                                                           }
                                                           ?>>
                                                    <span class="lever"></span>
                                                    Si
                                                </label>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="switch">
                                                <label>
                                                    No
                                                    <input type="checkbox" onchange="if ($(this).is(':checked')) {
                                                                        registrar(2, 'true',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }
                                                                    else {
                                                                        registrar(2, 'false',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }" <?php
                                                           if ($value->liberacion_externo == 't') {
                                                               echo 'checked = "checked"';
                                                           }
                                                           ?>>
                                                    <span class="lever"></span>
                                                    Si
                                                </label>
                                            </div>
                                            <!--<input type="checkbox" id="clae" numero_c="<?php echo $value->numero_control; ?>"/><label for="clae"></label>-->
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="switch">
                                                <label>
                                                    No
                                                    <input type="checkbox" onchange="if ($(this).is(':checked')) {
                                                                        registrar(3, 'true',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }
                                                                    else {
                                                                        registrar(3, 'false',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }" <?php
                                                           if ($value->calificaciones == 't') {
                                                               echo 'checked = "checked"';
                                                           }
                                                           ?>>
                                                    <span class="lever"></span>
                                                    Si
                                                </label>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="switch">
                                                <label>
                                                    No
                                                    <input type="checkbox" onchange="if ($(this).is(':checked')) {
                                                                        registrar(4, 'true',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }
                                                                    else {
                                                                        registrar(4, 'false',<?php echo $value->numero_control; ?>, '<?php echo base_url(); ?>');
                                                                    }" <?php
                                                           if ($value->evidencias == 't') {
                                                               echo 'checked = "checked"';
                                                           }
                                                           ?>>
                                                    <span class="lever"></span>
                                                    Si
                                                </label>
                                            </div>
                                        </td>                                                               
                                    </tr>
                                </form>                                
                                <?php
                            }
                        }
                        ?>

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


        <!--  Scripts-->
        <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>               
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>        
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jefe_residencia.js"></script>        
        <script src="js/init.js"></script>


    </body>
</html>
