<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: MI USUARIO</title>

        <!-- CSS  -->

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">

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
                    MI USUARIO</h5>
            </div>                

        </div>

        <div class="container">
            <div class="section">             
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                   href="<?php echo base_url() . 'index.php/Residencia/Docente/panel_docente/'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <div class="center-align col m6 card-panel grey lighten-5">
                    <table class="bordered highlight responsive-table">                        
                        <tr>
                            <th>NOMBRE</th>
                            <th>CORREO</th>
                            <th>NUEVA CONTRASEÑA</th>
                            <th>MODIFICAR</th>
                        </tr>
                        <?php
                        if ($info_usuario) {
                            foreach ($info_usuario as $value) {
                                ?>
                                <tr>
                                <form method="post" action="<?php echo base_url() . 'index.php/c_info_usuarios/actualizar_docente/' ?>">
                                    <td><?= utf8_decode($value->nombres . ' ' . $value->apellidos); ?></td>
                                    <td><?= $value->correo ?></td>
                                    <td><input type="password" name="contrasena" id="contrasena" value="" required/></td>
                                    <td><button type="submit" style=" border: 0; background: transparent"><img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons blue-text">autorenew</i>
                                        </button></td>
                                </form>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </table>

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
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/funciones.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.form.min.js"></script>
    </body>
</html>
