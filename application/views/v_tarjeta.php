<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE SERVICIO SOCIAL :</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>


        <script>

            function confirmar()
            {
                if (confirm('¿Esta seguro de quiere eliminarlo?'))
                    return true;
                else
                    return false;
            }

        </script>
        <script>

            $(document).ready(function () {
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal({
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    in_duration: 300, // Transition in duration
                    out_duration: 200, // Transition out duration

                });




            });

        </script>

        <style>
            input[type=checkbox]:checked + label {
                color: #000;
            } 


            ul.tsc_pagination { margin:4px 0; padding:0px; height:100%; overflow:hidden; font:12px 'Tahoma'; list-style-type:none; }
            ul.tsc_pagination li { float:left; margin:0px; padding:0px; margin-left:5px; }

            ul.tsc_pagination li a { color:black; display:block; text-decoration:none; padding:7px 10px 7px 10px; }


            ul.tsc_paginationA li a { color:#FFFFFF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }

            ul.tsc_paginationA01 li a { color:#474747; border:solid 1px #B6B6B6; padding:6px 9px 6px 9px; background:#E6E6E6; background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6); background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6)); }
            ul.tsc_paginationA01 li:hover a,
            ul.tsc_paginationA01 li.current a { background:#FFFFFF; }
            
                        /* label color */
            .input-field label {
                color: #FFA600;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #FFA600;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #000;
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
                color: #000;
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


        <div class="section no-pad-bot" id="index-banner">
            <div class="container">

                <br><br>
                <br>
                <div class="row center">

                    Tarjeta de control

                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <a href="<?php echo base_url(); ?>index.php/c_alumnos">< Regresar</a>   
                <br>

                &nbsp;


                <div class="striped">

                    <div class="container_12">

                        <?php if (!$tarjeta) { ?>
                            No haz generado los reportes iniciales
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                        <?php } else { ?>	    
                            <?php foreach ($tarjeta as $item) { ?>
                                <?php foreach ($programa as $it) { ?>
                                    <div class="row">

                                        <div class="col s5 lighten-5 z-depth-1">
                                            <br>
                                            Documentos iniciales:
                                            <hr>
                                            <p align="right">
                                            <table width="10" cellspacing="0" border="0">
                                                <tr>
                                                    <td width="600"><input type="checkbox" class="filled-in" <?php if ($item->solicitud == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Solicitud de inicio </label> 
                                                    </td>
                                                    <td ><?php if ($item->solicitud == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_solicitud" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;   transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>

                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_solicitud/" ?>">	
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;   transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>

                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>

                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>



                                            <p align="left">
                                            <table width="10" cellspacing="0" border="0">
                                                <tr>
                                                    <td width="600"><input type="checkbox" class="filled-in" <?php if ($item->cartaasignacion == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Carta de asignación </label> 
                                                    </td>
                                                    <td><?php if ($item->cartaasignacion == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_casignacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;   transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>

                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_casignacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;   transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>


                                            <p align="left">
                                            <table width="10" cellspacing="0" border="0">
                                                <tr>
                                                    <td width="600"><input type="checkbox" class="filled-in" <?php if ($item->cartacompromiso == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Carta de compromiso </label> 
                                                    </td>
                                                    <td><?php if ($item->cartacompromiso == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_ccompromiso" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_ccompromiso" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td width="600"><input type="checkbox" class="filled-in" <?php if ($item->tarjetacontrol == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Tarjeta de control </label> 
                                                    </td>
                                                    <td><?php if ($item->tarjetacontrol == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_tcontrol" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_tcontrol" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td width="600"><input type="checkbox" class="filled-in" <?php if ($item->cartapresentacion == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Carta de presentación </label> 
                                                    </td>
                                                    <td><?php if ($item->cartapresentacion == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_cpresentacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_cpresentacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style=" vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>





                                        </div>
                                        <div class="col s2">
                                            &nbsp;
                                        </div>
                                        <div class="col s5 z-depth-1">
                                            <br>
                                            Reportes:
                                            <hr>


                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td width="600"><input type="checkbox" class="filled-in" <?php if ($item->reporteb1 == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>1er. Reporte bimestral (<?php echo $it->fecha_reporte1 ?>)</label> 
                                                    </td>
                                                    <td><?php if ($item->reporteb1 == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_rb1" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style=" vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_rb1" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td width="600"><input type="checkbox" class="filled-in" <?php if ($item->reporteb2 == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>2do. Reporte bimestral (<?php echo $it->fecha_reporte2 ?>) </label> 
                                                    </td>
                                                    <td><?php if ($item->reporteb2 == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_rb2" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_rb2" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td  width="600"><input type="checkbox" class="filled-in" <?php if ($item->reporteb3 == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>3er. Reporte bimestral (<?php echo $it->fecha_reporte3 ?>)</label> 
                                                    </td>
                                                    <td><?php if ($item->reporteb3 == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_rb3" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_rb3" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td  width="600"><input type="checkbox" class="filled-in" <?php if ($item->reportefinal == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Reporte Final</label> 
                                                    </td>
                                                    <td><?php if ($item->reportefinal == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_rf" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_rf" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                        </div>



                                    </div>
                                    <br>&nbsp;
                                    <div class="row">

                                        <div class="col s5 z-depth-1">
                                            <br>
                                            Documentos de la Instancia:
                                            <hr>
                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td  width="600"><input type="checkbox" class="filled-in" <?php if ($item->cartaaceptacioninstancia == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Carta de aceptación</label> 
                                                    </td>
                                                    <td><?php if ($item->cartaaceptacioninstancia == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_caceptacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_caceptacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td  width="600"><input type="checkbox" class="filled-in" <?php if ($item->cartaterminacioninstancia == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Carta de terminación</label> 
                                                    </td>
                                                    <td><?php if ($item->cartaterminacioninstancia == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_cterminacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_cterminacion" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>

                                        </div>
                                        <div class="col s2">
                                            &nbsp;
                                        </div>
                                        <div class="col s5 z-depth-1">
                                            <br>
                                            Liberación:
                                            <hr>
                                            <p align="center">
                                            <table cellspacing="0" border="0">
                                                <tr>
                                                    <td  width="600"><input type="checkbox" class="filled-in" <?php if ($item->constanciaoficial == 't') { ?> echo checked="checked"<?php } else { ?> <?php } ?>  /> 
                                                        <label>Constancia Oficial</label> 
                                                    </td>
                                                    <td><?php if ($item->constanciaoficial == 't') { ?>
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/des_constancia" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons red-text">not_interested</i>
                                                                </button>
                                                            </form><?php } else { ?> 
                                                            <form method="post" action="<?php echo base_url() . "index.php/c_tarjeta/act_constancia" ?>">
                                                                <input type="text"style="visibility:hidden; margin-top:20px; margin-right:-40px; border: 0; vertical-align: middle;  transparent-width:0px;" name="idt"   value="<?= $item->id_tcontrol; ?>"/>
                                                                <button type="submit" style="  vertical-align: middle ;border: 0; background: transparent" >
                                                                    <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0" alt="submit" /><i class="material-icons green-text">done</i>
                                                                </button>
                                                            </form>
                                                        <?php } ?> 
                                                    </td>
                                                </tr>
                                            </table>
                                            </p>
                                        </div>
                                    </div>

                                <?php } ?>      
                            <?php } ?>	    	

                            <br>
                            <script>
                                function validar(oficio,calif) {
                                    if (oficio.value == '') {
                                        oficio.setCustomValidity('Favor de ingresar el numero de oficio');
                                        
                                    }
                                    else{
                                        oficio.setCustomValidity('');
                                        if (calif.value=='') {
                                            calif.setCustomValidity('Favor de ingresar la calificación');
                                        }
                                        else{
                                            calif.setCustomValidity('');
                                        }            
                                    }
                                    return true;
                                }
                            </script>
                            <div class="row">
                                <?php                                                                
                            if ($item->solicitud == 't' && $item->cartaasignacion == 't' && $item->cartacompromiso == 't' && $item->tarjetacontrol == 't' && $item->cartapresentacion == 't' && $item->reporteb1 == 't' && $item->reporteb2 == 't' && $item->reporteb3 == 't' && $item->reportefinal == 't' && $item->cartaaceptacioninstancia == 't' && $item->cartaterminacioninstancia == 't') { ?> 
                                <?= form_open(base_url() . 'index.php/c_alumnos_pdf/generarLiberacion') ?>
                                <div class="input-field col s4">
                                    <input type="text" placeholder="Asigna el número de oficio" name="oficio" id="no_oficio" oninput="validar(this,calif);"oninvalid="validar(this,calif);" required>
                                    <label for="no_folio">Número de oficio</label>
                                    
                                 </div>
                                <div class="input-field col s4">
                                    <input type="text" placeholder="Asigna la calificación" name="calif" id="calif" oninput="validar(no_oficio,this);"oninvalid="validar(no_oficio,this);" required>
                                    <label for="calif">Calificación</label>
                                </div>
                            
                                
                                <input class="center-align btn orange darken-1 z-depth-0 " type="submit" value="Generar constancia oficial" formtarget="_blank"/>
                                <input type="text" style="visibility:hidden"  name="idps" value="<?= $it->id_programa_seleccionado; ?>" id="idps" />      
                                <input type="text" style="visibility:hidden" oninput="maxLengthCheck(this)" name="id" value="<?= $it->numero_control; ?>"  maxlength="8" length="8" id="id" />
                                <?= form_close() ?>
                            <?php } ?>	

                                
                        <?php } ?>	        
                                
                            </div>
                            
                                
<!--
                                    
-->

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



</body>
</html>