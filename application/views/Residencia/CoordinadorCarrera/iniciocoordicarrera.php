<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL COORDINADOR DE RESIDENCIA PROFESIONAL :</title>

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
                <div class="right-align hide-on-med-and-down">
                    <a href="<?php echo base_url(); ?>index.php/c_info_usuarios/administrativo"><span class="grey-text text-darken-2 right-align hide-on-med-and-down">Mi usuario<img src="<?php echo base_url(); ?>images/perm_identity_tiny.png"></span></a>
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

                    Coordinador de Programa Académico - Panel de Administración

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

                    <a href="<?php echo base_url(); ?>index.php/Residencia/CoordinadorCarrera/Panel_coordicarrera/consultar_info_procedimiento">
                        <div class="col s12 m5 right">       
                            <div class="card-panel grey lighten-5 z-depth-1">
                                <div class="row valign-wrapper ">
                                    <div class="col s6">
                                        <img src="<?php echo base_url(); ?>images/info.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                    </div>
                                    <div class="col s6">
                                        <span class="black-text">
                                            <h5 class="light">Consultar informacion del procedimiento</h5>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div></a>

                    <a href="<?php echo base_url(); ?>index.php/Residencia/CoordinadorCarrera/Panel_coordicarrera/consultar_banco_proyectos">
                        <div class="col s12 m5 right">

                            <div class="card-panel grey lighten-5 z-depth-1">
                                <div class="row valign-wrapper">
                                    <div class="col s6">
                                        <img src="<?php echo base_url(); ?>images/banco.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                    </div>
                                    <div class="col s6">
                                        <span class="black-text">
                                            <h5 class="light">Consultar banco de proyectos</h5>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div></a>
                    <a href="<?php echo base_url(); ?>index.php/C_noticias/indexR">
                        <div class="col s12 m5 right">

                            <div class="card-panel grey lighten-5 z-depth-1">
                                <div class="row valign-wrapper">
                                    <div class="col s6">
                                        <img src="<?php echo base_url(); ?>images/noticias.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                    </div>
                                    <div class="col s6">
                                        <span class="black-text">
                                            <h5 class="light">Noticias</h5>
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

