<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>:: SIV ::</title>

        <script src="http://code.jquery.com/jquery-latest.js"></script>

        <link href="<?php echo base_url(); ?>css/sintextmaterialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styletextlogin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>

            /* label color */
            .input-field label {
                color: #fff;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #000;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #fafafa;
                box-shadow: 0 1px 0 0 #000;
            }
            /* valid color */
            .input-field input[type=text].valid {
                border-bottom: 13px solid #00FF1E;
                box-shadow: 0 1px 0 0 #00FF1E;
            }
            /* invalid color */
            .input-field input[type=text].invalid {
                border-bottom: 10px solid #FF0000;
                box-shadow: 0 20px 0 0 #FF0000;
            }
            /* icon prefix focus color */
            .input-field .prefix.active {
                color: #FFA600;
            }

        </style>
        <script type="text/javascript">

            function mostrar(idCapa) {
                var obj = document.getElementById(idCapa)
                if (obj.style.visibility == "hidden")
                    obj.style.visibility = "visible";
                else
                    obj.style.visibility = "hidden";
            }
        </script>
    </head>




    <body>
        <nav>
            <div class="nav-wrapper grey lighten-5 left-align">
                <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>


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

                <br><br>
                <h3 class="thin header center amber-text darken-1-text">
                    Sistema Integral de Vinculación <br></h3>
                <p></p>
                <p> </p>



                <div class="row center">

                    Para ingresar al SIV debes utilizar el nombre de usuario y contraseña que te fueron proporcionados para tal fin.
                    Si tienes problemas de acceso informalo al Administrador del sistema, a la dirección de correo: <b>siv@ittepic.edu.mx</b> indicando tu nombre, número de control y carrera en la que estás inscrito.
                    <br>
                    <br>
                    <span class="left"><a href="#" onclick="mostrar('capa1')">ADMINISTRATIVOS</a></span><span class="center"><a href="#" onclick="mostrar('capa2')">ALUMNOS</a></span>
                    <span class="right"><a href="#" onclick="mostrar('capa3')">DOCENTES</a></span>
                        <div class="red-text"><?php echo validation_errors(); ?></div></div>
                </div>

            </div>
        </div>


        <div class="containerw">

            <div class="section">

                <!--   Icon Section   -->
                <div class="row aling-center">

                    <div class="col s12 m2 center">

                        <div class="">

                            &nbsp;


                        </div>

                    </div>
                    <div class="col m3">

                        <div  class="card-panel z-depth-0">

                            <div id="capa1" style="visibility:hidden">
                                <?php $this->load->view('login-personal'); ?>
                            </div>

                        </div>

                    </div>

                    <div class="col m3">

                        <div class="card-panel z-depth-0">

                            <div id="capa2" style="visibility:hidden">

                                <?php $this->load->view('login'); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col m3">

                        <div class="card-panel z-depth-0">

                            <div id="capa3" style="visibility:hidden">

                                <?php $this->load->view('login-docente'); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col s12 m2 center">

                        <div class="">

                            &nbsp;

                        </div>
                        <br>&nbsp;
                    </div>
                </div>

            </div>

        </div>

        <footer class="page-footer black">
            <div class="containewr">

            </div>
            <div class="footer-copyright">
                <div>
                    <div align="center ">Copyright 2016 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
                                ITTepic LOL
                            </span></a></div>
                </div>
            </div>
        </footer>


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../../bin/materialize.js"></script>
        <script src="js/init.js"></script>


    </body>
</html>
