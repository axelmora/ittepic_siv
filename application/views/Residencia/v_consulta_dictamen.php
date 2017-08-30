<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <!-- Aqui debe cambiar dependiendo quien entre  -->
        <title>SIV :: Consulta Dictamen de Residencia:</title>

        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>

        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <link href="<?php echo base_url(); ?>js/materialize.css" type="text/javascript" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
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

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">             
                <div class="row center">
                    <h5 class="condensed light header center amber-text darken-1-text">      
                        Consulta de autorización de dictamen de residencia</h5>
                </div>                
            </div>
        </div>

        <div class="container">
            <div class="section">
                <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" href="<?php echo base_url(); ?>index.php">
                    <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a> 
                <!--   Icon Section   -->
                <br><p>&nbsp;</p> 
                <?php if ($problema) { ?>
                    <h4><?php echo $problema; ?></h4>
                <?php } ?>

                <?php if ($jefe_academico) { ?>
                    <?php if ($jefe_academico == 't') { ?>
                        <input type="checkbox"  id="dictamen_jacademico" checked="checked" disabled="disabled"/>
                    <?php } else { ?>
                        <input type="checkbox"  id="dictamen_jacademico"  disabled="disabled"/>
                    <?php } ?>
                    <label for="dictamen_jacademico">Autorizado por Jefe Académico</label>
                    <br>
                    <?php if ($presidente_academia == 't') { ?>
                        <input type="checkbox"  id="dictamen_presidente" checked="checked" disabled="disabled"/>
                    <?php } else { ?>
                        <input type="checkbox"  id="dictamen_presidente"  disabled="disabled"/>
                    <?php } ?>
                    <label for="dictamen_jacademico">Autorizado por Presidente Académico</label>
                    <br>
                    <?php if ($subdirector_academico == 't') { ?>
                        <input type="checkbox"  id="dictamen_subdirector" checked="checked" disabled="disabled"/>
                    <?php } else { ?>
                        <input type="checkbox"  id="dictamen_subdirector"  disabled="disabled"/>
                    <?php } ?>
                    <label for="dictamen_jacademico">Autorizado por Subdirector Académico</label>
                    <br>
                    <?php if ($jefe_oficina_residencia == 'f' && $info == 'jeferesidencia') { ?>
                        <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/c_consulta_dictamen/registrar/<?php echo $numero_control; ?>" class="form-horizontal">
                            <button class="btn orange darken-1 z-depth-0 " type="submit">
                                <div class="text-orange">Registrar recepción de dictamen</div>
                            </button>
                        </form>
                        <br> <br>
                    <?php } ?>
                    <?php if ($jefe_oficina_residencia == 't') { ?>
                        <input type="checkbox"  id="dictamen_jefe" checked="checked" disabled="disabled"/>
                        <label for="dictamen_jefe">Dictamen recibido</label>
                        <br> <br>
                    <?php } ?>
                    <?php if ($info == 'jeferesidencia' && (($jefe_academico == 't' && $presidente_academia == 't' && $subdirector_academico == 't') || $jefe_oficina_residencia == 't')) { ?>
                        <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/c_consulta_dictamen/generar_carta/<?php echo $numero_control; ?>" class="form-horizontal">
                            <input id="oficio" name ="oficio" type="text" placeholder="Numero de oficio de la carta de presentacion" required />
                            <button class="btn orange darken-1 z-depth-0 " formtarget="_blank" type="submit">
                                <div class="text-orange">Generar carta de presentación</div>
                            </button>
                        </form>
                    <?php } ?>
                <?php } ?>
                <br>
                <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/c_consulta_dictamen/buscar" class="form-horizontal">
                    <label for="numero_control">Número de control</label>
                    <input type="text" oninput="maxLengthCheck(this)" id="numero_control" maxlength="8" length="8" name="numero_control" class="col-lg-3" required/>
                    <button class="btn orange darken-1 z-depth-0 " type="submit">
                        <div class="text-orange">Consultar</div>
                    </button>
                </form>
                <br>
                <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/c_consulta_dictamen/buscar2" class="form-horizontal">
                    <label for="nombre">Nombre del alumno</label>
                    <input type="text" id="nombre_alumno" name="nombre_alumno" class="col-lg-3" required/>
                    <button class="btn orange darken-1 z-depth-0 " type="submit">
                        <div class="text-orange">Consultar</div>
                    </button>
                </form>


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


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../../bin/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
