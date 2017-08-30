<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE VINCULACION :</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <style>

            ul.tsc_pagination { margin:4px 0; padding:0px; height:100%; overflow:hidden; font:12px 'Tahoma'; list-style-type:none; }
            ul.tsc_pagination li { float:left; margin:0px; padding:0px; margin-left:5px; }

            ul.tsc_pagination li a { color:black; display:block; text-decoration:none; padding:7px 10px 7px 10px; }


            ul.tsc_paginationA li a { color:#FFFFFF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }

            ul.tsc_paginationA01 li a { color:#474747; border:solid 1px #B6B6B6; padding:6px 9px 6px 9px; background:#E6E6E6; background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6); background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6)); }
            ul.tsc_paginationA01 li:hover a,
            ul.tsc_paginationA01 li.current a { background:#FFFFFF; }

        </style>
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
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large orange darken-1">
                <i class="large material-icons">stars</i>
            </a>
            <ul>

                <li><a class="btn-floating grey lighten-1" href="<?php echo base_url(); ?>index.php/c_alumnos"><i class="material-icons">assignment_ind</i></a></li>
                <li><a class="btn-floating grey lighten-1" href="<?php echo base_url(); ?>index.php/c_instancias"><i class="material-icons">business</i></a></li>
                <li><a class="btn-floating grey lighten-1" href="<?php echo base_url(); ?>index.php/c_noticias"><i class="material-icons">comment</i></a></li>
            </ul>
        </div>
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
                <br>
                <div class="row center">

                    <h5 class="condensed light header center amber-text darken-1-text">      
                        PROGRAMAS</h5>

                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <a href="<?php echo base_url(); ?>index.php/c_instancias">< Regresar</a>


                <br><p>&nbsp;</p>




                <div class="striped">


                    <table class="bordered">
                        <tr>
                            <td>
                                Nombre del programa
                            </td>
                            <td >
                                Instancia
                            </td>
                            <td>
                                Encargado
                            </td>

                            <td>
                                Telefono
                            </td>
                            <td>
                                Correo
                            </td>
                            <td>
                                Eliminar
                            </td>
                            <td>
                                Editar
                            </td>
                            <td>
                                Agregar Act.
                            </td>
                        </tr>
                        <?php foreach ($programas as $item): ?>
                            <tr>
                                <td >

                                    <?= $item->nombre_programa; ?>
                                </td>
                                <td>

                                    <?= $item->nombre_instancia; ?>
                                </td>
                                <td>
                                    <?= $item->nombre_encargado; ?>
                                </td>

                                <td WIDTH="120">
                                    <?= $item->telefono_instancia; ?>
                                </td>
                                <td>
                                    <?= $item->correo_encargado; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "index.php/c_programasi_d/show_programa_idd/" . $item->id_solicitud; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons red-text">delete</i></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "index.php/c_programasi_u/show_programa_id/" . $item->id_solicitud; ?>">&nbsp;&nbsp;&nbsp;<i class="material-icons">settings</i></a>
                                </td>
                                <td>


                                    <?= form_open(base_url() . 'index.php/c_iactg/show_id') ?>
                                    <input type="text" name="ids" style="visibility:hidden; margin-top:-60px; margin-right:20px; vertical-align:" value="<?= $item->id_solicitud; ?>" id="ids" />


                                    <button type="submit" style="margin-top:-50px; margin-right:20px; vertical-align: middle ;border: 0; background: transparent">
                                        <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons yellow-text accent-4-text">queue</i>
                                    </button>
                                    <?= form_close() ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <?php
                    if (!$programas) {
                        ?>
                        No hay nada que mostrar
                        <?php
                    } else {
                        foreach ($programas as $fila) {
                            ?>

                            <?php
                        }
                        ?>
                        <?= $this->pagination->create_links() ?>
                        <?php
                    }
                    ?>




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
                    <div align="center ">Copyright 2015 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
                                ITTepic
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
