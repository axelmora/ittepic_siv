<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: INFORMACIÓN DOCENTES</title>

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
                    INFORMACIÓN DOCENTES</h5>
            </div>                

        </div>

        <div class="container">
            <div class="section">             
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>                       
                <br>
                <br>
                <div class="center-align col m6 card-panel grey lighten-5 black">
                    <table id="table_id" class="display">
                        <!--bordered highlight responsive-table-->   
                        <thead>
                            <tr>
                            <th>NOMBRE</th>
                            <th>ESPECIALIDAD</th>
                            <th style="text-align: center;">DIPONIBLE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th style="text-align: center;">ACTUALIZAR</th>
                            <th style="text-align: center;">COMPARTIR</th>                            
                            <th style="text-align: center;">NO COMPARTIR</th>                            
                        </tr>
                        </thead>
                        

                        <?php
                        if ($info_docentes) { ?>
                        <tbody>
                            <?php foreach ($info_docentes as $value) {
                                ?>
                                <tr>                                                                           
                                    <td><?= utf8_decode($value->nombres . ' ' . $value->apellidos); ?></td>
                                    <td>
                                        <form method="post" action="<?php echo base_url() . "index.php/Residencia/JefeAcademico/panel_jefeacademico/actualizar_docentes" ?>">
                                            <input type="text" name = "rfc" id = "rfc" value="<?php echo $value->rfc; ?>" hidden="true"/>
                                        <input type="text" name="especialidad" id="especialidad" value="<?php echo $value->especialidad; ?>" required/></td>                                    
                                    <td style="text-align: center;">
                                        <div class="switch">
                                            <label>
                                                No
                                                <input type="checkbox" id="disponible" name="disponible" <?php
                                                if ($value->disponible == 't') {
                                                    echo 'checked = "checked"';
                                                }
                                                ?>/>
                                                <span class="lever"></span>
                                                Si
                                            </label>
                                        </div>
                                    </td>
                                    <td style="text-align: center;"><button type="submit" style=" border: 0; background: transparent">
                                            <img src="<?php echo base_url(); ?>images/autorenew.png" alt="submit" />
                                        </button></form>
                                    </td>  
                                    <td style="text-align: center;">
                                        <a href="#!" onclick="prestar('<?= $value->rfc; ?>', '<?= $value->nombres; ?>', '<?= base_url(); ?>');"class="waves-effect waves-light">
                                            <img src="<?php echo base_url(); ?>images/add.png"/>
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="#!" onclick="quitar('<?= $value->rfc; ?>', '<?= $value->nombres; ?>', '<?= base_url(); ?>');"class="waves-effect waves-light">
                                            <img src="<?php echo base_url(); ?>images/remove.png"/>
                                        </a>
                                    </td>

                                    <?php
                                } ?>
                                    </tbody>
                            <?php }
                            ?>                        
                    </table>
                </div>                                                                

                <!-- Modal prestar-->
                <div id="prestar" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <h4 id="nombre_docente"></h4>
                        <br>
                        <b>Docente compartido con:</b>
                        <div id="prestado_con">

                        </div>

                        <br>
                        <div class="row">                            
                            <div class="col s6">                              
                                <form id="frm_compartir_docente" method="post" action="<?php echo base_url() . "index.php/Residencia/JefeAcademico/panel_jefeacademico/prestar_docente"; ?>">
                                    <span><b>Compartir docente:</b></span>
                                    <br>                                

                                    <label>Departamento:</label>
                                    <br>                                
                                    <select  id="dep" name="dep">
                                        <?php
                                        $departamentos = array('DEPARTAMENTO DE CIENCIAS DE LA TIERRA',
                                            'DEPARTAMENTO DE SISTEMAS Y COMPUTACION',
                                            'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA',
                                            'DEPTO. DE INGENIERIA INDUSTRIAL',
                                            'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA',
                                            'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS');
                                        for ($index = 0; $index < count($departamentos); $index++) {
                                            if ($dep_jefe != $departamentos[$index]) {
                                                ?>
                                                <option value="<?php echo $departamentos[$index]; ?>"><?= $departamentos[$index] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input id="rfc_prestar" name="rfc_prestar" type="text" value="" hidden="true"/>
                                    <input id="doc_origen" name="doc_origen" type="text" value="<?php echo $dep_jefe; ?>" hidden="true"/>
                                    <br>
                                    <br>
                                    <button id="btn_compartir_docente" class="btn orange waves-effect">Compartir</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn orange">SALIR</a>
                    </div>
                </div>

                <!-- Modal quitar_docente-->
                <div id="quitar_docente" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <h4 id="nombre_docente_quitar"></h4>
                        <br>

                        <div class="row">                            
                            <table id="tbl_quitar_docente" class="bordered highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Compartido en</th>
                                        <th>Quitar</th>
                                    </tr>
                                </thead>
                                <tbody>                                 
                                </tbody>
                            </table>
                            <span id="no_compartido"></span>                            
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn orange">SALIR</a>
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
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/informacion_docentes.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.form.min.js"></script>
        <!--<script src="http://malsup.github.com/jquery.form.js"></script>-->

    </body>
</html>
