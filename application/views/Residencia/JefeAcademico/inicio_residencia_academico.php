<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL ADMINISTRATIVO :</title>
        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <h3 class="thin header center amber-text darken-1-text">
                    Residencia Profesional </h3>
                <div class="row center">
                    <?= $this->session->userdata('alias') ?> - Panel de administración de residencias
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section">
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar"
                   href="<?php echo base_url() . 'index.php/'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <!--   Icon Section   -->
                <div class="row">

                    <a href="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/panel_jefeacademico/informacion_procedimiento"><!--compartido-->
                        <div class="col s12 m4 l4 center">
                            <div class="card-panel grey lighten-5 z-depth-1">
                                <div class="row valign-wrapper">
                                    <div class="col s4">
                                        <img src="<?php echo base_url(); ?>images/info.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                    </div>
                                    <div class="col s8">
                                        <span class="black-text">
                                            <h6 class="light">Información del procedimiento</h6>
                                        </span>
                                    </div>
                                </div>
                                </div>
                            </div></a>



                <a href="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/panel_jefeacademico/info_participantes">
                    <div class="col s12 m4 l4 center">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper ">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/participantes.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Información participantes de proyecto</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div></a>

                <a href="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/panel_jefeacademico/solicitudes_anteproyecto">
                    <div class="col s12 m4 l4 center">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/solicitudes.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Solicitudes de anteproyecto</h6>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div></a>
            </div>
            <div class="row">
                <a href="<?php echo base_url(); ?>index.php/Residencia/C_asignar_asesor"><!--compartido-->
                    <div class="col s12 m4 center">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/asignar.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Asignar asesores y revisores</h6>
                                    </span>
                                </div>
                            </div>
                        </div></a>
            </div>

            <a href="<?php echo base_url(); ?>index.php/Residencia/C_banco_proyectos">
                <div class="col s12 m4 center">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper ">
                            <div class="col s4">
                                <img src="<?php echo base_url(); ?>images/banco.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s8">
                                <span class="black-text">
                                    <h6 class="light">Banco de proyectos</h6>
                                </span>
                            </div>
                        </div>
                    </div>
                </div></a>

            <a href="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/panel_jefeacademico/bitacoras_avance">
                <div class="col s12 m4 center">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper">
                            <div class="col s4">
                                <img src="<?php echo base_url(); ?>images/bitacora.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s8">
                                <span class="black-text">
                                    <h6 class="light">Bitácoras de avance</h6>
                                </span>
                            </div>
                        </div>
                    </div>

                </div></a>
        </div>

        <div class="row">

            <a href="<?php echo base_url(); ?>index.php/Residencia/c_historial_notificacion">
                <div class="col s12 m4 center">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper">
                            <div class="col s4">
                                <img src="<?php echo base_url(); ?>images/historial.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s8">
                                <span class="black-text">
                                    <h6 class="light">Historial de notificaciones</h6>
                                </span>
                            </div>
                        </div>
                    </div></a>

        </div>

        <a href="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/panel_jefeacademico/vacantes">
            <div class="col s12 m4 center">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper ">
                        <div class="col s4">
                            <img src="<?php echo base_url(); ?>images/vacantes.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s8">
                            <span class="black-text">
                                <h6 class="light">Vacantes</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div></a>

        <a href="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/panel_jefeacademico/eliminar_procesos">
            <div class="col s12 m4 center">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s4">
                            <img src="<?php echo base_url(); ?>images/e_procesos.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s8">
                            <span class="black-text">
                                <h6 class="light">Depurar documentos</h6>
                            </span>
                        </div>
                    </div>
                </div>

            </div></a>
    </div>
    <div class="row">

        <a href="<?php echo base_url(); ?>index.php/Residencia/JefeAcademico/panel_jefeacademico/docentes">
            <div class="col s12 m4 left">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s4">
                            <img src="<?php echo base_url(); ?>images/info_docentes.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s8">
                            <span class="black-text">
                                <h6 class="light">Cambiar información de docentes</h6>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </a>

        <a href="<?php echo base_url(); ?>index.php/Residencia/c_base">
            <div class="col s12 m4 center">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper ">
                        <div class="col s4">
                            <img src="<?php echo base_url(); ?>images/base_concertacion.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        <div class="col s8">
                            <span class="black-text">
                                <h6 class="light">Base de concertación</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div></a>
    </div>
</div>
<br><br>



<div class="section">



</div>
</div>

<footer class="page-footer black">
    <div class="container">

    </div>
    <div class="footer-copyright">
        <div>
            <div align="center ">Copyright 2017 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
                        ITTepic
                    </span></a></div>
        </div>
    </div>
</footer>
<!--  Scripts-->
<script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url(); ?>js/materialize.js"></script>
<?php
$this->load->view('jfacademicoarchivo');
?>
</body>
</html>
