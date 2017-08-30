<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: ELIMINAR PROCESOS TERMINADOS</title>

        <!-- CSS  -->

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->


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
                    ELIMINAR ARCHIVOS DE PROCESOS TERMINADOS</h5>
            </div>                

        </div>

        <div class="container">
            <div class="section">             
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/panel_academico/residencia/'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <div class="center-align col s3 m6 l3 card-panel grey lighten-5">
                    <div class="input-field">
                        <div>
                            <b>Esta opción elimina el historial de archivos de procesos de residencia que terminaron hace más de dos años.</b>
                        </div>
                        <form id="frm_eliminar_archivos" method="post" action="<?php echo base_url() . "index.php/Residencia/JefeAcademico/panel_jefeacademico/eliminar_archivos" ?>">                        
                            <br>
                                <br>
                            <?php if ($elim) { ?>
                                
                                <div>Archivos eliminados.</div>
                                <br>                                
                            <?php } else {
                                ?>
                                <a id="eliminar_archivos" class="btn orange darken-1 right-align z-depth-0">Eliminar archivos</a>
                            <?php }
                            ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>


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

<script>
            $(document).ready(function () {
                $('#eliminar_archivos').click(function () {
                    if (confirm('¿Seguro que desea realizar esta acción?, no se podrá deshacer.')) {
                        $('#frm_eliminar_archivos').submit();
                    }
                });
            });
        </script>

    </body>
</html>
