<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: BASE DE CONCERTACIÓN</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Responsive/css/responsive.dataTables.min.css">
    </head>
    <body>
        <nav>
            <div class="nav-wrapper grey lighten-5 left-align">
                <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

                <div class="right-align hide-on-med-and-down">
                    <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down"><?php echo $info ?>
                            <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
                </div>
            </div>
        </nav>

        <div class="section no-pad-bot" id="index-banner">
            <div class="row center">
                <h5 class="condensed light header center amber-text darken-1-text">
                    BASE DE CONCERTACIÓN</h5>
            </div>
        </div>

        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <?php
                if ($info == 'jefeacademico') { ?>
                    <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
                   href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <?php }
                else{ ?>
                    <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
                   href="<?php echo base_url() . 'index.php/'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <?php }
                ?>

                <div class="row center-align">
                    <table id="tabla_base_concertacion" class="display">
                        <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data) {
                                foreach ($data as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->nombre_empresa; ?></td>
                                        <td><?php echo $row->fecha; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php //}   ?>
                </div>

            </div>

        </div>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
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
        <?php
        $this->load->view('jfacademicoarchivo');
        ?>
    </body>
</html>
