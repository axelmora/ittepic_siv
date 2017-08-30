<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL DOCENTE :</title>

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
                <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down"><?php echo $nombres . ' ' . $apellidos; ?><!-- <?= $this->session->userdata('perfil') ?> AGREGAR NOMBRE DEL DOCENTE-->
                            <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
                </div>
                <div class="right-align hide-on-med-and-down">
                    <a href="<?php echo base_url(); ?>index.php/c_info_usuarios/docente"><span class="amber-text text-darken-2 right-align hide-on-med-and-down">Mi usuario<img src="<?php echo base_url(); ?>images/perm_identity_tiny.png"></span></a>
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

                <h3 class="thin header center amber-text darken-1-text">      
                    Sistema Integral de Vinculación <br></h3>
                <p></p>      




                <div class="row center">

                    Docente - Panel de Administración

                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?>
                </div>


            </div>
        </div>

        <div class="container">    

            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <a href="<?php echo base_url(); ?>index.php/Residencia/Docente/panel_docente/info_procedimiento">
                        <div class="col s12 m4 center">
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
                            </div></a>

                </div></a>

                <a href="<?php echo base_url(); ?>index.php/Residencia/Docente/panel_docente/informe">
                    <div class="col s12 m4 center">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/informe.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Informe Semestral</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="<?php echo base_url(); ?>index.php/Residencia/Docente/panel_docente/asesorados">
                    <div class="col s12 m4 right">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper ">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/asesorados.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Asesorados</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div></a>                    
            </div>


            <div class="row align-center">
                <a href="<?php echo base_url(); ?>index.php/Residencia/Docente/panel_docente/revisiones">
                    <div class="col s12 m4 ">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/revisiones.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Revisiones</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div></a>

                <a href="<?php echo base_url(); ?>index.php/Residencia/c_historial_notificacion">
                    <div class="col s12 m4 ">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/historial.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Historial Notificaciones</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div></a>

                <a href="<?php echo base_url(); ?>index.php/Residencia/c_info_participantes_proyecto">
                    <div class="col s12 m4 ">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/participantes.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h6 class="light">Información de participantes de proyectos</h6>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div></a>

                <a href="<?php echo base_url(); ?>index.php/Residencia/c_base">
                    <div class="col s12 m4 right">       
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
            <div align="center ">Copyright 2016 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
                        ITTepic
                    </span></a></div>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>               
<script src="<?php echo base_url(); ?>js/materialize.js"></script> 


</body>
</html>

