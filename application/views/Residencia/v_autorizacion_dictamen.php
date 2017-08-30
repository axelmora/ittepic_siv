
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>::SIV::AUTORIAZACIÓN DE DICTAMEN DE RESIDENCIA</title>

        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Select/css/select.dataTables.min.css">

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
                        Autorización de dictamen de residencia</h5>

                </div>
                <?php if ($info == 'directivo') { ?>
                    <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" href="<?php echo base_url(); ?>index.php/Residencia/SubdirectorAcademico/Panel_subdirectoracademico">
                        <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <?php } else {
                    ?>
                    <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" href="<?php echo base_url(); ?>index.php">
                        <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <?php }
                ?>

            </div>
        </div>


        <div class="container">
            <div class="section">

                <div class="col s6 center-align card-panel grey lighten-5">
                    <table id="tabla_autorizacion_dictamen" class="bordered responsive-table">
                        <thead>                    
                            <tr>
                                <th>Nombre</th>
                                <th>Proyecto</th>
                                <th>Empresa</th>
                                <?php if ($info == 'jefeacademico') { ?>
                                    <th>Presidente Academia</th>                        
                                    <th>Subdirector Académico</th>   
                                <?php } ?>
                                <?php if ($info == 'presidenteacademia') { ?>
                                    <th>Jefe Académico</th>                        
                                    <th>Subdirector Académico</th>   
                                <?php } ?>
                                <?php if ($info == 'directivo') { ?>
                                    <th>Jefe Académico</th>   
                                    <th>Presidente Academia</th>                        
                                <?php } ?>
                                <th>Autorizar</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            <?php
                            if ($dictamen) {
                                foreach ($dictamen as $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value->nombre; ?></td>
                                        <td><?= $value->nombre_proyecto; ?></td>
                                        <td><?= $value->nombre_empresa; ?></td>
                                        <?php if ($info == 'jefeacademico') { ?>
                                            <?php if ($value->presidente_academia == 't') { ?>
                                                <td>Autorizado</td>
                                            <?php } else { ?>
                                                <td>Sin Autorizar</td>
                                            <?php } ?>
                                            <?php if ($value->subdirector_academico == 't') { ?>
                                                <td>Autorizado</td>
                                            <?php } else { ?>
                                                <td>Sin Autorizar</td>
                                            <?php } ?>
                                            <td><form id="frm_autorizar<?= $s=$s+1;?>" method="post" action="<?php echo base_url(); ?>index.php/Residencia/c_consulta_dictamen/a_jefe/<?php echo $value->numero_control; ?> " class="form-horizontal">
                                                    <input type="checkbox" onclick="$('#frm_autorizar<?= $s;?>').submit();" id="autorizar<?= $s;?>"/>
                                                    <label for="autorizar<?= $s;?>"></label>
                                                    <!--<button type="submit" class="btn orange btn-warning btn-sm">Aceptar</button>-->
                                                </form>
                                            </td>
                                        <?php } ?>
                                        <?php if ($info == 'presidenteacademia') { ?>
                                            <?php if ($value->jefe_academico == 't') { ?>
                                                <td>Autorizado</td>
                                            <?php } else { ?>
                                                <td>Sin Autorizar</td>
                                            <?php } ?>
                                            <?php if ($value->subdirector_academico == 't') { ?>
                                                <td>Autorizado</td>
                                            <?php } else { ?>
                                                <td>Sin Autorizar</td>
                                            <?php } ?>
                                            <td style="text-align: center;">
                                                <form id="frm_autorizar<?= $s=$s+1;?>" method="post" action="<?php echo base_url(); ?>index.php/Residencia/c_consulta_dictamen/a_pre/<?php echo $value->numero_control; ?> " class="form-horizontal">
                                                    <input type="checkbox" onclick="$('#frm_autorizar<?= $s;?>').submit();" id="autorizar<?= $s;?>"/>
                                                    <label for="autorizar<?= $s;?>"></label>
                                                    <!--<button type="submit" class="btn orange btn-warning btn-sm">Aceptar</button>-->
                                                </form>
                                            </td>
                                        <?php } ?>
                                        <?php if ($info == 'directivo') { ?>
                                            <?php if ($value->jefe_academico == 't') { ?>
                                                <td>Autorizado</td>
                                            <?php } else { ?>
                                                <td>Sin Autorizar</td>
                                            <?php } ?>
                                            <?php if ($value->presidente_academia == 't') { ?>
                                                <td>Autorizado</td>
                                            <?php } else { ?>
                                                <td>Sin Autorizar</td>
                                            <?php } ?>
                                            <td>
                                                <form id="frm_autorizar<?= $s=$s+1;?>" method="post" action="<?php echo base_url(); ?>index.php/Residencia/c_consulta_dictamen/a_sub/<?php echo $value->numero_control; ?> " class="form-horizontal">
                                                    <input type="checkbox" onclick="$('#frm_autorizar<?= $s;?>').submit();" id="autorizar<?= $s;?>"/>
                                                    <label for="autorizar<?= $s;?>"></label>
                                                    <!--<button type="submit" class="btn orange btn-warning btn-sm" >Aceptar</button>-->
                                                </form>
                                            </td>
                                        <?php } ?>
                                    </tr>    
                                    <?php
                                }
                            }
                            ?>                            
                        </tbody>                      
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


        <!--  Scripts-->
        <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>                       
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>        
        


    </body>
</html>
