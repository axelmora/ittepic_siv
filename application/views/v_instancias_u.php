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

        <!-- Page Layout here -->
        <div class="row">

            <div class="col s3">
                <!-- Grey navigation panel -->
            </div>

            <div class="col s9">
                <!-- Teal page content  -->
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

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">

                <br><br>
                <br>
                <div class="row center">

                    <h5 class="condensed light header center amber-text darken-1-text">      
                        MODIFICAR INSTANCIA</h5>

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

                <br>&nbsp; <br>&nbsp; 
                <div class="row">

                    <div class="col s2 left-aling"><div class="input-field">
                            <div id="buscador">
                                &nbsp;&nbsp;
                            </div></div>

                    </div>


                    <div class="col s8 center-align card-panel #bdbdbd grey lighten-2"><br><h5 class="medium"></h5><div class="input-field">
                            <div id="buscador">



                                <?php foreach ($single_instancia as $instancia): ?>
                                    <form method="post" action="<?php echo base_url() . "index.php/c_instancias_u/update_instancia_id1" ?>">
                                        <br>
                                        <button class="btn orange darken-1 right z-depth-0 " type="reset">
                                            <div class="text-orange"><i class="material-icons right">subtitles</i>Limpiar formulario</div>
                                        </button>
                                        <br>&nbsp; 
                                        <hr>

                                        <br>&nbsp; 
                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="did" id="did" value="<?php echo $instancia->id_instancia; ?>" placeholder="Introduce los datos" readonly /><label for="did">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Id Instancia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <div class="red-text left"><?php echo form_error('did'); ?></div>
                                        </div>

                                        <br>&nbsp; 
                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="nombrei" id="nombrei" value="<?php echo $instancia->nombre_instancia; ?>" placeholder="Introduce los datos" /><label for="nombreid">Nombre de la instancia</label>
                                            <div class="red-text left"><?php echo form_error('nombrei'); ?></div>
                                        </div>

                                        <br>&nbsp; 


                                        <div class="input-field">
                                            <div class="left-align"> Selecciona una opcion:</div>
                                            <select  id="sectori" name="sectori" value=" <?php echo $instancia->sector_instancia; ?>" class="browser-default">
                                                <option value="<?php echo $instancia->sector_instancia; ?>">Actual: <?php echo $instancia->sector_instancia; ?></option>
                                                <option value="Social">Social</option>
                                                <option value="Productivo">Productivo</option>
                                                <option value="Gobernamental">Gubernamental</option>
                                                <option value="Educativo">Educativo</option>
                                            </select>
                                            <div class="red-text left"><?php echo form_error('sectori'); ?></div>
                                        </div>

                                        <br>&nbsp;

                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="titulari" id="titulari" value=" <?php echo $instancia->titular_instancia; ?>" placeholder="Introduce los datos" /><label for="titulari">&nbsp;&nbsp;&nbsp;&nbsp;Nombre del Titular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <div class="red-text left"><?php echo form_error('titulari'); ?></div>
                                        </div>

                                        <br>&nbsp;
                                        <br>&nbsp;

                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="ptitulari" id="ptitulari" value=" <?php echo $instancia->puesto_titular_instancia; ?>" placeholder="Introduce los datos" /><label for="ptitulari">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Puesto del Titular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <div class="red-text left"><?php echo form_error('ptitulari'); ?></div>
                                        </div>


                                        <br>&nbsp;
                                        <br>&nbsp;

                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="domicilioi" id="domicilioi" value=" <?php echo $instancia->domicilio_instancia; ?>" placeholder="Introduce los datos" /><label for="domicilioi">Domicilio de la Instancia</label>
                                            <div class="red-text left"><?php echo form_error('domicilioi'); ?></div>
                                        </div>


                                        <br>&nbsp;
                                        <br>&nbsp;

                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="telefonoi" id="telefonoi" value=" <?php echo $instancia->telefono_instancia; ?>" placeholder="Introduce los datos" /><label for="telefonoi">&nbsp;Telefono de la Instancia</label>
                                            <div class="red-text left"><?php echo form_error('telefonoi'); ?></div>
                                        </div>

                                        <br>&nbsp;
                                        <br>&nbsp;

                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="usuarioi" id="usuarioi" value=" <?php echo $instancia->usuario_instancia; ?>" placeholder="Introduce los datos" /><label for="usuarioi">&nbsp;&nbsp;Usuario de la Instancia&nbsp;&nbsp;</label>
                                            <div class="red-text left"><?php echo form_error('usuarioi'); ?></div>
                                        </div>

                                        <br>&nbsp;
                                        <br>&nbsp;

                                        <div class="rowsa">
                                            <input class="slide-up" type="text" name="passi" id="passi" value=" <?php echo $instancia->pass_instancia; ?>" placeholder="Introduce los datos" /><label for="passi">&nbsp;&nbsp;Contraseña del usuario&nbsp;&nbsp;</label>
                                            <br>&nbsp;
                                            <div class="red-text left"><?php echo form_error('passi'); ?></div>
                                        </div>

                                        <button class="btn orange darken-1 right-align z-depth-0 " type="submit">
                                            <div class="text-orange"><i class="material-icons right">description</i>Agregar</div>
                                        </button>


                                        <br>&nbsp;
                                    </form>
                                <?php endforeach; ?>
                            </div></div>

                    </div>

                    <div class="col s2 right-align"><div class="input-field">
                        </div>

                    </div>
                </div>

                <br>
                <br>
                <!--IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII-->

                <!--IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII-->
                <!--IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII-->


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