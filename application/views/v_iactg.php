<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE SERVICIO :</title>

        <script src="http://code.jquery.com/jquery-latest.js"></script>

        <link href="<?php echo base_url(); ?>css/sintextmaterialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styletext.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
                        ACTIVIDADES</h5>
                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <?php if (isset($message)) { ?>
                <CENTER><p class="col s4 center-align card-panel green white-text">La actividad se agrego correctamentee</p></CENTER><br> 
            <?php } ?>
            <div class="row"> <a href="<?php echo base_url(); ?>index.php/c_instancias">< Regresar</a>


                <div class="section">


                    <div class="col s2 left-aling"><div class="input-field">
                            <div id="buscador">
                                &nbsp;&nbsp;
                            </div></div>

                    </div>


                    <div class="col s8 center-align card-panel #bdbdbd grey lighten-2"><div class="input-field">
                            <div id="buscador">

                                <?php echo form_open('c_iactg'); ?>

                                <div class="rowsa">
                                    <input class="slide-up" type="text" style="visibility: hidden" name="ids" id="ids" value="<?php echo set_value('ids'); ?>" placeholder="Introduce los datos" />
                                    <div class="red-text left"><?php echo form_error('ids'); ?></div>
                                </div>

                                <div class="rowsa">
                                    <input class="slide-up" type="text" name="actividadgi" id="actividadgi" value="<?php echo set_value('actividadgi'); ?>" placeholder="Introduce la actividad" /><label for="actividadgi">&nbsp;&nbsp;&nbsp;Actividades a realizar&nbsp;&nbsp;&nbsp;</label>
                                    <div class="red-text left"><?php echo form_error('actividadgi'); ?></div>
                                </div>


                                <button class="btn orange darken-1 right-align z-depth-0 " type="submit">
                                    <div class="text-orange"><i class="material-icons right">description</i>Agregar actividad</div>
                                </button>


                                <br>&nbsp;
                                <?= form_close() ?>
                                <br> &nbsp;
                                <?php
                                if (!$actividades) {
                                    ?>
                                    <?php foreach ($single_id as $item): ?>
                                        <div class="red-text">No actividades para el programa <b><?= $item->nombre_programa; ?></b>, por favor agregalas en el formulario de arriba.</div>
                                    <?php endforeach; ?>
                                    <?php }else {
                                    ?>


                                    <table class="striped">
                                        <tr class=" grey darken-1 right-align z-depth-0 ">
                                            <td class="white-text">
                                                &nbsp;&nbsp;Actividad
                                            </td>
                                            <td class="white-text center">
                                                Eliminar
                                            </td>

                                        </tr>

                                        <?php foreach ($actividades as $item): ?>

                                            <tr class="white">
                                                <td >
                                                    &nbsp;&nbsp;<?= $item->descripcion_act; ?>
                                                </td>
                                                <td class="center">
                                                    <?= form_open(base_url() . 'index.php/c_iactg/delete') ?>
                                                    <input type="text" name="ids" size="1" style="visibility: hidden"  value="<?= $item->id_solicitud; ?>" id="ids" />
                                                    <button type="submit" style="background: transparent; border: 0; ">
                                                        <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0"  alt="submit" /><i class="material-icons red-text">delete</i>
                                                    </button>

                                                    <input type="text" name="idact" size="1" style="visibility: hidden"  value="<?= $item->id_actividadesg; ?>" id="idact" />



                                                    <?= form_close() ?>
                                                </td>


                                            </tr>
                                        <?php endforeach; ?>
                                        <?php
                                    }
                                    ?>      
                                </table>
                                <br>&nbsp;
                            </div></div>

                    </div>

                    <div class="col s2 right-align"><div class="input-field">
                        </div>

                    </div>
                </div>
                <!--   Icon Section   -->

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



<div class="section">



</div>
</div>
</div>
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