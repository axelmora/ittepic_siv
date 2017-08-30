<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: CONSULTAR PROYECTOS Y ANTEPROYECTOS
        </title>

        <!-- CSS  -->

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    </head>
    <body>
        <nav>
            <div class="nav-wrapper grey lighten-5 left-align">
                <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

                <div class="right-align hide-on-med-and-down">
                    <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down"><?php echo $nombres . ' ' . $apellidos; ?>
                            <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
                </div>
            </div>
        </nav>
        <!-- Navbar goes here -->


        <div class="section no-pad-bot" id="index-banner">            
            <div class="row center">
                <h5 class="condensed light header center amber-text darken-1-text">      
                    CONSULTAR PROYECTOS Y ANTEPROYECTOS</h5>
            </div>                

        </div>

        <div class="container">
            <div class="section">             
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/Residencia/Docente/panel_docente'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>

                <div class="center-align col s3 m6 l3 card-panel grey lighten-5">
                    <div class="input-field">
                        <form id="frm_sel_revision" method="post" action="<?php echo base_url() . "index.php/Residencia/Docente/panel_docente/revisiones_alumnos" ?>">
                            <?php if ($alu_revisiones) { ?>
                                <label>Selecciona alumno a revisar</label>
                                <br>
                                <br>
                                <select  id="id_participantes" name="id_participantes">  
                                    <?php foreach ($alu_revisiones as $value) { ?>
                                        <option value="<?= $value->id; ?>"><?= $value->nombre; ?></option>
                                    <?php } ?>
                                </select>

                                <br>
                                <br>
                                <button id = "btn_sel_alu_revision" class="btn orange waves-effect darken-1 right-align z-depth-0">
                                    Seleccionar</button>                                                            
                                <?php
                            } else {
                                ?>
                                <p style="text-align: center;" class="blue-text"><?php echo 'No tienes revisiones pendientes.'; ?></p>
                            <?php }
                            ?>

                        </form>
                    </div>
                </div>

                <div id="datos" class="row" hidden>                                
                    <div class="col s5 center-align card-panel grey lighten-5">
                        <div class="left-align">
                            <div id="buscador">
                                DATOS DEL ALUMNO
                                <hr>                                
                                <b>Nombre completo: </b><span id="nombre"></span>
                                <br>
                                <b>No. de control: </b><span id="nc"></span>
                                <br>
                                <b>Carrera: </b><span id="carrera"></span>
                                <br>
                                <b>Semestre: </b><span id="semestre"></span>
                                <br>
                                <b>Teléfono: </b><span id="tel"></span>
                                <br>
                                <b>Correo: </b><span id="correo"></span>
                                <br>
                                <b>Domicilio: </b><span id="dom"></span>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>                    
                    <div class="col s2"><br></div>
                    <div class="col s5 right-align card-panel grey lighten-5 ">
                        <div class="switch left-align">
                            DATOS DEL PROYECTO
                            <hr>                            
                            <b>Nombre del Proyecto: </b><span id="nombre_proyecto"></span>
                            <br>                                    
                            <b>Departamento del anteproyecto: </b><span id="departamento_ante"></span>
                            <br>
                            <b>Origen de anteproyecto: </b><span id="origen"></span>
                            <br>
                            <b>Empresa: </b><span id="nombre_empresa"></span>
                            <br>                                    
                            <b>Proyecto opción para titulación: </b><span id="titulacion"></span>
                            <br>                                                                
                        </div>
                    </div>

                </div>

                <div id = "archivos_alumno" class="center-align col s3 m6 l3 card-panel grey lighten-5" hidden>
                    <table id="tabla_revisiones" class="bordered responsive-table">
                        <h5 class="amber-text center-align">ARCHIVOS DE AVANCE DEL ALUMNO</h5>
                        <thead>                        
                        <tr>                        
                            <th>Nombre del archivo</th>                            
                            <th>Tipo de documento</th>
                            <th>Estado</th>
                            <th>Fecha de guardado</th>
                            <th>Fecha límite de revisión</th>
                            <th>Detalles</th>                        
                        </tr>
                        </thead>
                        <tbody>                            
                        </tbody>                      
                    </table>
                </div>
<!-- modal_detalles_archivo revision-->
        <div id="modal_detalles_archivo_revision" class="modal modal-fixed-footer">
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


        <!--  Scripts-->
        <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>               
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>js/modals.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/revisiones_docente.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/jquery.form.min.js"></script>
        <script src="js/init.js"></script>


    </body>
</html>
