<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: BASE DE CONCERTACIÓN</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Responsive/css/responsive.dataTables.min.css">

    </head>
    <body>
        <nav>
            <div class="nav-wrapper grey lighten-5 left-align">
                <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

                <div class="right-align hide-on-med-and-down">
                    <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down"><?= $info ?>
                            <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
                </div>
            </div>
        </nav>
        <!-- Navbar goes here -->

        <!-- Page Layout here -->


        <div class="section no-pad-bot" id="index-banner">

            <div class="row center">

                <h5 class="condensed light header center amber-text darken-1-text">      
                    BASE DE CONCERTACIÓN</h5>

            </div>                            
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/Residencia/JefeVinculacion/panel_jefevinculacion'; ?>">
                    <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>

                <div id="myModal2" class="modal">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="header center-align amber-text">
                            <h4 class="modal-title">AGREGAR CONVENIO</h4>
                        </div>
                        <div class="modal-body">
                            <?= form_open_multipart(base_url() . 'index.php/Residencia/JefeVinculacion/Panel_jefevinculacion/subir')//base_url() . 'index.php/Residencia/adjuntar_descargar/do_upload') ?>
                            <img src="<?php echo base_url() ?>/images/attach_file.png">
                            <input type="file" accept=".pdf,.docx,.doc" name="userfile" required />
                            <br><br>
                            Nombre de la empresa: <input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa"  placeholder="Nombre de la empresa" required />                                
                            <br>
                            <input class="btn orange darken-1 z-depth-0" type="submit" value="ADJUNTAR" />
                            <?= form_close() ?>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="envia" class="btn orange darken-1 z-depth-0 modal-action modal-close waves-effect waves-green">Cerrar</button>
                        </div>
                    </div>
                </div>


                <div class="row center-align">
                    <button type="button" class="btn orange darken-1 right-align z-depth-0 modal-trigger" data-target="myModal2">Agregar Convenio</button><br>

                </div>
                <div class="row center-align">
                    <p style="color: red;"><?php echo $error; ?></p>
                    <table id="table_id" class="display">
                        <thead>                    
                            <tr>
                                <th style="text-align: center;">Empresa</th>
                                <th style="text-align: center;">Descargar convenio</th>
                                <th style="text-align: center;">Fecha</th>
                                <th style="text-align: center;">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            <?php
                            if ($convenios) {
                                foreach ($convenios as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $value->nombre_empresa; ?></td>
                                        <td style="text-align: center;"><a href="<?= base_url() . $value->ruta_archivo_convenio; ?>"><img src="<?php echo base_url(); ?>images/download_tiny.png"></a></td>
                                        <td style="text-align: center;"><?php echo $value->fecha; ?></td>
                                        <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/Residencia/JefeVinculacion/Panel_jefevinculacion/eliminar/<?php echo $value->id_convenio; ?>" ><img src="<?php echo base_url(); ?>images/close.png"></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>                      
                    </table>
                </div>
            </div>

        </div>
        <br><br>
        <br><br>
        <br>
        <br>
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
    </body>
</html>
