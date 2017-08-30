<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE VINCULACION :</title>

        <script src="http://code.jquery.com/jquery-latest.js"></script>

        <link href="<?php echo base_url(); ?>css/sintextmaterialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styletext.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script>
            $(document).ready(function () {
                $('#idinstanciai').change(function () {
                    selectedOption = $('option:selected', this);
                    $('input[name=titulari]').val(selectedOption.data('titular'));
                    $('input[name=ptitulari]').val(selectedOption.data('ptitular'));
                    $('input[name=telefonoi]').val(selectedOption.data('telefono'));
                });
            });

        </script>
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
                        PROGRAMAS</h5>
                </div>

            </div>
            <div class="row center">
<?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
            </div>
        </div>
    </div>


    <div class="container">

        <?php if (isset($message)) { ?>
            <CENTER><p class="col s4 center-align card-panel green white-text">El programa se agrego correctamentee</p></CENTER><br> 
<?php } ?>
        <div class="section">

            <!--   Icon Section   -->


            <a href="<?php echo base_url(); ?>index.php/c_instancias">< Regresar</a>

            <br>&nbsp; <br>&nbsp; 
            <div class="row">

                <div class="col s2 left-aling"><div class="input-field">
                        <div id="buscador">
                            &nbsp;&nbsp;
                        </div></div>

                </div>

                        <?php foreach ($arrInstancias as $instancia): ?> 
                    <div class="col s8 center-align card-panel #bdbdbd grey lighten-2"><br><h5 class="medium">Agregar programa para: <?php echo $instancia->nombre_instancia; ?></h5><div class="input-field">
<?php endforeach; ?>
                        <div id="buscador">



<?php echo form_open('c_programasi_i'); ?>
                            <br>
                            <button class="btn orange darken-1 right z-depth-0 " type="reset">
                                <div class="text-orange"><i class="material-icons right">subtitles</i>Limpiar formulario</div>
                            </button>
                            <br>&nbsp; 
                            <hr>


                            <br>&nbsp;

<?php foreach ($arrInstancias as $instancia): ?> 
                                <div class="rowsa">
                                    <input class="slide-up" type="text"  name="did" id="did" value="<?php echo $instancia->id_instancia; ?>" placeholder="Introduce los datos" readonly /><label for="nombreid">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID de la instancia&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div class="red-text left"><?php echo form_error('did'); ?></div>
                                </div>
<?php endforeach; ?>
                            <br>&nbsp; 


                            <div class="left-align"> Selecciona una opcion:</div>
                            </select>
                            <select id="tprogramai" name="tprogramai" value="<?php echo set_value('tprogramai'); ?>" class="browser-default"> 
                                <option value="<?php echo set_value('tprogramai'); ?>"><?php echo set_value('tprogramai'); ?></option>
                                <?php
                                foreach ($arrPrograma as $programa)
                                    echo '<option value="', $programa->id, '">', $programa->nombre_tipoprograma, '</option>';
                                ?>
                            </select>
                            <div class="red-text left"><?php echo form_error('tprogramai'); ?></div>



                            <br>&nbsp;

                            <div class="rowsa">
                                <input class="slide-up" type="text" name="departamentoi" id="departamentoi" value="<?php echo set_value('departamentoi'); ?>" placeholder="Introduce los datos" /><label for="departamentoi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Departamento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <div class="red-text left"><?php echo form_error('departamentoi'); ?></div>
                            </div>

                            <br>&nbsp;
                            <br>&nbsp;

                            <div class="rowsa">
                                <input class="slide-up" type="text" name="encargadoi" id="encargadoi" value="<?php echo set_value('encargadoi'); ?>" placeholder="Introduce los datos" /><label for="encargadoi">Encargado del programa</label>
                                <div class="red-text left"><?php echo form_error('encargadoi'); ?></div>
                            </div>


                            <br>&nbsp;
                            <br>&nbsp;

                            <div class="rowsa">
                                <input class="slide-up" type="text" name="correoi" id="correoi" value="<?php echo set_value('correoi'); ?>" placeholder="Introduce los datos" /><label for="correoi">&nbsp;&nbsp;&nbsp;&nbsp;Correo del Encargado&nbsp;&nbsp;</label>
                                <div class="red-text left"><?php echo form_error('correoi'); ?></div>
                            </div>


                            <br>&nbsp;
                            <br>&nbsp;

                            <div class="rowsa">
                                <input class="slide-up" type="text" name="nombrepi" id="nombrepi" value="<?php echo set_value('nombrepi'); ?>" placeholder="Introduce los datos" /><label for="nombrepi">&nbsp;&nbsp;Nombre del programa&nbsp;&nbsp;</label>
                                <div class="red-text left"><?php echo form_error('nombrepi'); ?></div>
                            </div>

                            <br>&nbsp;
                            <br>&nbsp;

                            <div class="rowsa">
                                <input class="slide-up" type="text" name="objetivoi" id="objetivoi" value="<?php echo set_value('objetivoi'); ?>" placeholder="Introduce los datos" /><label for="objetivoi">&nbsp;&nbsp;Objetivo del programa&nbsp;&nbsp;</label>
                                <div class="red-text left"><?php echo form_error('objetivoi'); ?></div>
                            </div>

                            <br>&nbsp;
                            <br>&nbsp;

                            <div class="rowsa">
                                <input class="slide-up" type="text" name="modalidadi" id="modalidadi" value="<?php echo set_value('modalidadi'); ?>" placeholder="Introduce los datos" /><label for="modalidadi">Modalidad del programa</label>
                                <br>&nbsp;
                                <div class="red-text left"><?php echo form_error('modalidadi'); ?></div>
                            </div>

                            <div class="rowsa">
                                <input class="slide-up" type="text" name="tvacantesi" id="tvacantesi" value="<?php echo set_value('tvacantesi'); ?>" placeholder="Introduce los datos" /><label for="tvacantesi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total de vacantes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <br>&nbsp;
                                <div class="red-text left"><?php echo form_error('tvacantesi'); ?></div>
                            </div>

                            <button class="btn orange darken-1 right-align z-depth-0 " type="submit">
                                <div class="text-orange"><i class="material-icons right">description</i>Agregar</div>
                            </button>


                            <br>&nbsp;
<?= form_close() ?>
                        </div></div>

                </div>

                <div class="col s2 right-align"><div class="input-field">
                    </div>

                </div>
            </div>

            <br>
            <br>



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