<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE SERVICIO:</title>

        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>

        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <link href="<?php echo base_url(); ?>js/materialize.css" type="text/javascript" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            function confirmar()
            {
                $(document).ready(function () {
                    $('.collapsible').collapsible({
                        accordion: true// A setting that changes the collapsible behavior to expandable instead of the default accordion style
                    });
                });
            }
        </script>
        <style>
            input.button-add {
                background-image: url(/images/buttons/add.png); /* 16px x 16px */
                background-color: transparent; /* make the button transparent */
                background-repeat: no-repeat;  /* make the background image appear only once */
                background-position: 0px 0px;  /* equivalent to 'top left' */
                border: none;           /* assuming we don't want any borders */
                cursor: pointer;        /* make the cursor like hovering over an <a> element */
                /* make text start to the right of the image */
                vertical-align: middle; /* align the text vertically centered */
            }	



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
                        INSTANCIAS</h5>

                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <a href="<?php echo base_url(); ?>index.php">< Regresar</a>


                <br><p>&nbsp;</p>
                <div class="row">


                    <div class="col s6 aling-right">
                        <br>    <a href="<?php echo base_url(); ?>index.php/c_instancias_i" class="btn left-align amber darken-1"><i class="material-icons left">input</i>Agregar Instancia</a>


                        <br><br><a href="<?php echo base_url(); ?>index.php/c_programasi" class="btn left-align amber darken-1"><i class="material-icons left">assignment</i>Programas</a>

                        <a href="<?php echo base_url(); ?>index.php/c_generari" class="btn left-align amber darken-1"><i class="material-icons left">description</i>Reportes</a>

                    </div>

                    <div class="col s6"><div class="input-field">
                            <div id="buscador">
                                <i class="material-icons prefix">search</i>
                                <span><?php echo validation_errors(); ?></span>
                                <?= form_open(base_url() . 'index.php/instancias_r/validar') ?>
                                <input type="search" name="buscando" value="" placeholder="Introduce el nombre de la instancia o sector" id="buscando" />
                                <label for="search"></label>
                                <input class="btn amber darken-1" type="submit" value="Buscar" />
                                <?= form_close() ?>
                            </div></div>
                    </div>
                </div>
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


                <div class="striped">


                    <table class="bordered">
                        <tr>
                            <td>
                                Nombre
                            </td>
                            <td >
                                Sector
                            </td>
                            <td>
                                Titular
                            </td>
                            <td >
                                Puesto T.
                            </td>
                            <td>
                                Domicilio
                            </td>
                            <td>
                                Telefono
                            </td>


                            <td>
                                Eliminar
                            </td>
                            <td>
                                Editar
                            </td>
                            <td>
                                Programas
                            </td>
                        </tr>
                        <?php foreach ($instancias as $item): ?>
                            <tr>
                                <td >
                                    <?= $item->nombre_instancia; ?>
                                </td>
                                <td>
                                    <?= $item->sector_instancia; ?>
                                </td>
                                <td>
                                    <?= $item->titular_instancia; ?>
                                </td>
                                <td>
                                    <?= $item->puesto_titular_instancia; ?>
                                </td>
                                <td>
                                    <?= $item->domicilio_instancia; ?>
                                </td>
                                <td width="10%">
                                    <?= $item->telefono_instancia; ?>
                                </td>


                                <td>
                                    <a href="<?php echo base_url() . "index.php/c_instancias_d/show_instancia_idd/" . $item->id_instancia; ?>">&nbsp;&nbsp;&nbsp;<i class="material-icons red-text">delete</i></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "index.php/c_instancias_u/show_instancia_id/" . $item->id_instancia; ?>">&nbsp;&nbsp;&nbsp;<i class="material-icons">settings</i></a>
                                </td>
                                <td>


                                    <form method="post" action="<?php echo base_url() . "index.php/c_instancias_pt/" ?>">
                                        <input type="text"style="visibility:hidden; margin-top:-60px; margin-right:20px; vertical-align:" name="id"   value="<?= $item->id_instancia; ?>"/>


                                        <button type="submit" style="margin-top:-50px; margin-right:20px; vertical-align: middle ;border: 0; background: transparent">
                                            <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons green-text">description</i>
                                        </button>

                                    </form>	

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <?php
                    if (!$instancias) {
                        ?>
                        No hay nada que mostrar
                        <?php
                    } else {
                        foreach ($instancias as $fila) {
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
