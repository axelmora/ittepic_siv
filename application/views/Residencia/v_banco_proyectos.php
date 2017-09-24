<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: BANCO DE PROYECTOS</title>
        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                    BANCO DE PROYECTOS</h5>
            </div>
        </div>

        <div class="container">
            <!--<a href="<?php echo base_url(); ?>index.php">< Regresar</a>-->
            <div class="section">
                <?php if ($info == 'jefeacademico') { ?>
                    <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
                       href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                   <?php } elseif ($info == 'jefevinculacion') {
                       ?>
                    <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
                       href="<?php echo base_url() . 'index.php/Residencia/JefeVinculacion/panel_jefevinculacion'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                   <?php } else {
                       ?>
                    <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
                       href="<?php echo base_url() . 'index.php'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                   <?php
                   }
                   if ($info == 'jefeacademico' || $info == 'coordinadorresidencia') {
                       ?>
                    <div class="row">
                        <br>

                        <a href="<?php echo base_url() . "index.php/Residencia/c_banco_proyectos/agregar_anteproyecto/" ?>" class="btn orange darken-1 right-align z-depth-0">
                            Agregar Anteproyecto</a>
                    </div>
                    <?php
                }
                ?>
                <div class="col s6 center-align card-panel grey lighten-5">
                    <table id="tabla_banco_proyectos" class="display">
                        <thead>
                            <tr>
                                <th>ANTEPROYECTO</th>
                                <th>EMPRESA</th>
                                <th>FECHA</th>
                                <th style="text-align: center;">DETALLES</th>
                                <th style="text-align: center;">DESCARGAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($banco) {
                                foreach ($banco as $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value->nombre_proyecto; ?></td>
                                        <td><?= $value->nombre_empresa; ?></td>
                                        <td><?= $value->fecha_alta; ?></td>
                                        <td style="text-align: center;">
                                            <a href="#!"class ="detalles_anteproyecto"
                                               nombre_proyecto = "<?php echo $value->nombre_proyecto; ?>" resid_req = "<?php echo $value->residentes_requeridos; ?>"
                                               lugares_disponibles = "<?php echo $value->lugares_disponibles; ?>"
                                               banco = "<?php echo $value->banco; ?>" aprobado = "<?php echo $value->aprobado; ?>"
                                               titulacion = "<?php echo $value->titulacion; ?>" departamento = "<?php echo $value->departamento_anteproyecto; ?>"
                                               pos_asesor= "<?php echo utf8_decode($value->nombres . ' ' . $value->apellidos); ?>" fecha_alta = "<?php echo $value->fecha_alta; ?>"
                                               nombre_empresa="<?php echo $value->nombre_empresa; ?>" tel = "<?php echo $value->telefono; ?>"
                                               sector = "<?php echo $value->sector; ?>" domicilio = "<?php echo $value->domicilio; ?>"
                                               colonia = "<?php echo $value->colonia; ?>" ciudad = "<?php echo $value->ciudad; ?>"
                                               codigo_postal = "<?php echo $value->codigo_postal; ?>" >

                                                <img src="<?php echo base_url(); ?>images/detalles_tiny.png"></a>
                                        </td>
                                        <td style="text-align: center;"><a href="<?php echo base_url() . $value->ruta_archivo; ?>" target="_blank" download><img src="<?php echo base_url(); ?>images/download_tiny.png"></a></td>

                                    </tr>

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
        <!-- Modal Structure -->
        <div id="modal_detalles_anteproyecto" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Nombre Proyecto</h4>
                <p>Detalles del anteproyecto</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
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
        <!-- Compiled and minified JavaScript -->
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/modals.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/funciones.js"></script>
        <?php
        $this->load->view('jfacademicoarchivo');
        ?>
    </body>
</html>
