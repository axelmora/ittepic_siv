<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: SOLICITUDES DE ANTEPROYECTO</title>

        <!-- CSS  -->

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Responsive/css/responsive.dataTables.min.css">

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
                    SOLICITUDES DE ANTEPROYECTO</h5>
            </div>                

        </div>

        <div class="container">
            <div class="section">             
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <div class="col s6 center-align card-panel grey lighten-5">
                    <table id="tabla_solicitudes_anteproyecto" class="display">
                        <thead>                    
                            <tr>
                                <th>NUMERO DE CONTROL</th>
                                <th>NOMBRE</th>
                                <th>ANTEPROYECTO</th>                        
                                <th>FECHA SOLICITUD</th>
                                <th style="text-align: center;">VACANTE ATENDIDA</th>
                                <th style="text-align: center;">ACEPTAR/RECHAZAR</th>                        
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($solicitudes) {
                                foreach ($solicitudes as $value) {
                                    ?>
                                    <tr>

                                        <td><?= $value->numero_control; ?></td>
                                        <td><?= $value->nombre; ?></td>
                                        <td><?= $value->nombre_proyecto; ?></td>                            
                                        <td><?= $value->fecha_solicitud; ?></td>                            
                                        <td style="text-align: center;"><a href="#!" onclick="detalles_vacante(<?php echo $value->id_vacante; ?>,'<?php echo $base; ?>')"><img src="<?php echo base_url(); ?>images/detalles_tiny.png"></a></td>                            
                                        <td style="text-align: center;">
                                            <a href="#!" onclick="aceptar_rechazar_solicitud(<?php echo $value->numero_control; ?>,<?php echo $value->anteproyecto_id; ?>, 'A', '<?php echo $value->banco; ?>')"  ><img src="<?php echo base_url(); ?>images/done_tiny.png"></a>&nbsp;&nbsp;&nbsp;
                                            <a href="#!" onclick="aceptar_rechazar_solicitud(<?php echo $value->numero_control; ?>,<?php echo $value->anteproyecto_id; ?>, 'R', '<?php echo $value->banco; ?>')" ><img src="<?php echo base_url(); ?>images/close.png"></a>
                                        </td>                        
                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                        </tbody>                      
                    </table>                              
                </div>                                                  
                <form id="solicitud" name="solicitud" action="<?php echo base_url() . 'index.php/Residencia/JefeAcademico/panel_jefeacademico/aceptar_cancelar_solicitud' ?>" method="POST">
                    <input id="nc" name="nc" type="text" value="" hidden="true">
                    <input id="id_anteproyecto" name="id_anteproyecto" type="text" value="" hidden="true">
                    <input id="estado" name="estado" type="text" value="" hidden="true">
                    <input id="banco" name="banco" type="text" value="" hidden="true">
                </form>

                <!-- modal_detalles_vacante-->
                <div id="modal_detalles_vacante" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
                    </div>     
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

        <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>               
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>               
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/modals.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/funciones.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/solicitudes_anteproyecto.js"></script>


    </body>
</html>
