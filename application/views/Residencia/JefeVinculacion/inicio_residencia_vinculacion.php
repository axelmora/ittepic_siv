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
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">                
                <h3 class="thin header center amber-text darken-1-text">      
                    Residencia Profesional <br></h3>
                <p></p>                                
                <div class="row center">

                    <?= $this->session->userdata('alias') ?> - Panel de administración de residencias

                </div>
            </div>
        </div>


        <div class="container">



            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    
                    <a href="<?php echo base_url(); ?>index.php/Residencia/JefeVinculacion/panel_jefevinculacion/informacion_procedimiento">
                        
                        <div class="col s12 m6 center">

                            <div class="card-panel grey lighten-5 z-depth-1">
                                <div class="row valign-wrapper">
                                    <div class="col s4">
                                        <img src="<?php echo base_url(); ?>images/info.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                    </div>
                                    <div class="col s8">
                                        <span class="black-text">
                                            <h5 class="light">Información del procedimiento</h5>
                                        </span>
                                    </div>
                                </div>
                            </div></a>

                </div>

                <a href="<?php echo base_url(); ?>index.php/Residencia/JefeVinculacion/panel_jefevinculacion/banco_proyectos">
                    <div class="col s12 m6 center">

                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper ">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/banco.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h5 class="light">Banco de proyectos</h5>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div></a>

            </div>
            <div class="row">

                <a href="<?php echo base_url(); ?>index.php/Residencia/JefeVinculacion/panel_jefevinculacion/base_concertacion">
                    <div class="col s12 m6 center">

                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                    <img src="<?php echo base_url(); ?>images/base_concertacion.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                                </div>
                                <div class="col s8">
                                    <span class="black-text">
                                        <h5 class="light">Base de concertación</h5>
                                    </span>
                                </div>
                            </div>
                        </div></a>

            </div>

            <a href="<?php echo base_url(); ?>index.php/Residencia/JefeVinculacion/panel_jefevinculacion/vacantes">            
                <div class="col s12 m6 center">

                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper ">
                            <div class="col s4">
                                <img src="<?php echo base_url(); ?>images/vacantes.png" alt="" class="responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s8">
                                <span class="black-text">
                                    <h5 class="light">Vacantes</h5>
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
