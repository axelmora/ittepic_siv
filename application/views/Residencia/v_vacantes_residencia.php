<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: VACANTES RESIDENCIA PROFESIONAL</title>

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
                    VACANTES RESIDENCIA PROFESIONAL</h5>
            </div>      
        </div>

        <div class="container">
            <?php if ($info == 'jefevinculacion') { ?>
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/Residencia/JefeVinculacion/panel_jefevinculacion'; ?>">
                    <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
            <?php } else { ?>
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/panel_academico/residencia'; ?>">
                    <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
            <?php } ?>
            <div class="section">

                <a href="#modal_nueva_vacante" class="btn orange darken-1 right-align z-depth-0 modal-trigger" type="submit">
                    NUEVA VACANTE</a>
                <div class="col s6 center-align card-panel grey lighten-5">
                    <table id="table_id" class="display">
                        <thead>                    
                            <tr>                               
                                <th>NOMBRE EMPRESA</th>                        
                                <th>DEPARTAMENTO</th>                        
                                <th>FECHA</th>                        
                                <th style="text-align: center;">DETALLES</th>                                                                               
                                <th style="text-align: center;">ELIMINAR</th>                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($vacantes) {
                                foreach ($vacantes as $item):
                                    ?>
                                    <tr>                                                        
                                        <td><?php echo $item->nombre_empresa; ?></td>
                                        <td><?php echo $item->carreras; ?></td>                            
                                        <td><?php echo $item->fecha_vacante; ?></td>                            
                                        <td style="text-align: center;"><a class="detalles_vacantes" href="#!" onclick=" mostrar_vacantes('<?php echo $item->nombre_empresa; ?>'
                                                        , '<?php echo $item->domicilio; ?>', '<?php echo $item->nombre_contacto; ?>', '<?php echo $item->correo_contacto; ?>',
                                                        '<?php echo $item->proyecto_a_desarrollar; ?>', '<?php echo $item->horario_atencion; ?>', '<?php echo $item->carreras; ?>', '<?php echo $item->fecha_vacante; ?>');"
                                                                           >
                                                <img src="<?php echo base_url(); ?>images/detalles_tiny.png" alt="Delete" /></a></td>                                                        
                                        <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/Residencia/C_vacantes_residencia/elimina_vacante/<?php echo $item->id_vacante; ?>" ><img src="<?php echo base_url(); ?>images/delete.png" alt="Delete" /></a></td>                        
                                    </tr>
                                    <?php
                                endforeach;
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
        <div id="modal_detalles_vacantes" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Detalles de la vacante</h4>
            </div>

            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn orange">Salir</a>
            </div>
        </div> 

        <!-- Modal modal_nueva_vacante -->
        <div id="modal_nueva_vacante" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="header center-align amber-text"><h4>AGREGAR NUEVA VACANTE</h4></div>                    
                <div class="row">
                    <form action="<?php echo base_url(); ?>index.php/Residencia/c_vacantes_residencia/insertar" method="post" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="nombre_empresa" id="nombre_empresa" type="text" class="validate" required>
                                <label for="nombre_empresa">Nombre de la empresa</label>
                            </div>        
                        </div>            
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="domicilio" id="domicilio" type="text" class="validate" required>
                                <label for="domicilio">Domicilio</label>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="contacto" id="contacto" type="text" class="validate" required>
                                <label for="contacto">Nombre del contacto</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="correo_contacto" id="correo_contacto" type="email" class="validate" required>
                                <label for="correo_contacto">Correo del contacto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="proyecto" id="proyecto" type="text" class="validate" required>
                                <label for="proyecto">Proyecto a desarrollar</label>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="horario" id="horario" type="text" class="validate" required>
                                <label for="horario">Horario de atención</label>
                            </div>
                            <div class="input-field col s6">
                                <?php if ($info == 'jefevinculacion' || $info == 'jeferesidencia') { ?>
                                    <select name="carreras" id="carreras" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Departamento" required>        
                                        <option value="DEPARTAMENTO DE CIENCIAS DE LA TIERRA">DEPARTAMENTO DE CIENCIAS DE LA TIERRA</option>
                                        <option value="DEPARTAMENTO DE SISTEMAS Y COMPUTACION">DEPARTAMENTO DE SISTEMAS Y COMPUTACION</option>
                                        <option value="DEPARTAMENTO DE QUIMICA Y BIOQUIMICA">DEPARTAMENTO DE QUIMICA Y BIOQUIMICA</option>
                                        <option value="DEPTO. DE INGENIERIA INDUSTRIAL">DEPTO. DE INGENIERIA INDUSTRIAL</option>
                                        <option value="DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA">DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA</option>
                                        <option value="DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS">DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS</option>
                                    </select>

                                <?php } ?>

                                <!--<input name="carreras" id="carreras" type="text" hidden="true" class="validate" required>-->
                            </div>                                                                                        
                        </div>                        
                        <div class="row center">                        
                            <button class="btn orange darken-1 right-align z-depth-0" type="submit">
                                GUARDAR</button>    
                        </div>
                    </form>
                </div>
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
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>               
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/modals.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/funciones.js"></script>

    </body>
</html>
