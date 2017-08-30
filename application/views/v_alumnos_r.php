<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE VINCULACION :</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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

            /* label color */
            .input-field label {
                color: #000;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #000;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #000;
                box-shadow: 0 1px 0 0 #000;
            }
            /* valid color */
            .input-field input[type=text].valid {
                border-bottom: 1px solid #000;
                box-shadow: 0 1px 0 0 #000;
            }
            /* invalid color */
            .input-field input[type=text].invalid {
                border-bottom: 1px solid #000;
                box-shadow: 0 1px 0 0 #000;
            }
            /* icon prefix focus color */
            .input-field .prefix.active {
                color: #000;
            }

            .custom-dropdown--large {
                font-size: 1.5em;
            }

            .custom-dropdown--small {
                font-size: .7em;
            }

            .custom-dropdown__select{
                font-size: inherit; /* inherit size from .custom-dropdown */
                padding: .5em; /* add some space*/
                margin: 0; /* remove default margins */
            }

            .custom-dropdown__select--white {
                background-color: #fff;
                color: #444;    
            }

            
                .custom-dropdown {
                    position: relative;
                    display: inline-block;
                    vertical-align: middle;
                }

                .custom-dropdown__select {
                    padding-right: 2.5em; /* accommodate with the pseudo elements for the dropdown arrow */
                    border: 0;
                    border-radius: 3px;
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none;    
                }

                .custom-dropdown::before,
                .custom-dropdown::after {
                    content: "";
                    position: absolute;
                    pointer-events: none;
                }

                .custom-dropdown::after { /*  Custom dropdown arrow */
                    content: "\25BC";
                    height: 1em;
                    font-size: .625em;
                    line-height: 1;
                    right: 1.2em;
                    top: 50%; margin-top: -.5em;
                }

                .custom-dropdown::before { /*  Custom dropdown arrow cover */
                    width: 2em;
                    right: 0; top: 0; bottom: 0;
                    border-radius: 0 3px 3px 0;
                }

                .custom-dropdown__select[disabled] {
                    color: rgba(0,0,0,.3);
                }

                .custom-dropdown.custom-dropdown--disabled::after {
                    color: rgba(0,0,0,.1);
                }

                /* White dropdown style */
                .custom-dropdown--white::before {
                    background-color: #fff;
                    border-left: 1px solid rgba(0,0,0,.1);
                }

                .custom-dropdown--white::after {
                    color: rgba(0,0,0,.9);
                }

                /* FF only temp fix */
                @-moz-document url-prefix() {
                    .custom-dropdown__select             { padding-right: .9em }
                    .custom-dropdown--large .custom-dropdown__select { padding-right: 1.3em }
                    .custom-dropdown--small .custom-dropdown__select { padding-right: .5em }
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

                    <h5 class="condensed light header center amber-text darken-1-text">      
                        RESULTADO</h5>
                </div>

            </div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <a href="<?php echo base_url(); ?>index.php/c_alumnos">< Regresar</a>   


                <br>&nbsp;


                <div class="striped">

                    <div class="container_12">

                        <div class="row">

                            <?php if (!$alumno) { ?>
                                <span class="red-text text-darken-2">El alumno no tiene un programa asignado.</span>
                                <br>&nbsp;
                                <br>&nbsp;
                                <br>&nbsp;<br /><br>&nbsp;
                                <br>&nbsp;




                                <?php
                            } else {
                                ?>
                                <?php
                                foreach ($alumno as $item) {
                                    ?>
                                    <div class="col s5 left-align card-panel grey lighten-5"><div class="input-field left-align">
                                            <div id="buscador">
                                                DATOS DEL ALUMNO
                                                <hr>
                                                <b>Nombre completo:</b> <?= $item->nombre; ?>
                                                <br>
                                                <b>No. de control:</b> <?= $item->numero_control; ?>
                                                <br>
                                                <b>Carrera:</b> <?= $item->carrera; ?>
                                                <br>
                                                <b>Periodo:</b> <?= $item->semestre; ?>
                                                <br>
                                                <b>Semestre:</b> <?= $item->semestre_cursado; ?>
                                                <br>
                                            </div></div>

                                    </div>


                                    <div class="col s2 left-align"><br><div class="input-field left-align">
                                            <div id="buscador">


                                            </div></div>

                                    </div>

                                    <div class="col s5 left-align card-panel grey lighten-5	"><div class="input-field left-align">
                                            DATOS DEL PROGRAMA
                                            <hr>
                                            <b>Nombre del Programa:</b> <?= $item->nombre_programa; ?>
                                            <br>
                                            <b>Dependencia Oficial:</b> <?= $item->nombre_instancia; ?>

                                            <br> 
                                            <b>Unidad orgánica ó Departamento:</b> <?= $item->departamento; ?>
                                            <br>
                                            <b>Nombre del encargado:</b> <?= $item->nombre_encargado; ?>
                                            <br>
                                            <b>Fecha de inicio:</b> <?= $item->fecha_inicio; ?>
                                            <br>

                                            <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 left-align card-panel grey lighten-5"><div class="input-field left-align">
                                        ACTIVIDADES:<hr>
                                        <?php if (!$actividades) { ?>

                                            <?php foreach ($alumno as $item) { ?>

                                                <?= form_open(base_url() . 'index.php/c_iactg/show_id') ?>
                                                <span class="red-text text-darken-2">El Programa de nombre <b><?= $item->nombre_programa; ?></b> no tiene actividades asignadas, por favor asignalas ➜ &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                <button type="submit" class="btn-floating btn-large red">
                                                    <i class="large material-icons">add</i></button>

                                                <input type="text" name="ids" style="visibility: hidden" value="<?= $item->id_solicitud; ?>" id="ids" />
                                                <?= form_close() ?>

                                            <?php } ?>    

                                        <?php } else { ?>

                                            <?php foreach ($actividades as $item) { ?>

                                                <br>·  <?= $item->descripcion_act; ?>

                                            <?php } ?>    
                                            <br>&nbsp;
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                            <?php foreach ($alumno as $item) { ?>
                                <div class="row center-align">

                                    <div class="col s3 center-align card-panel  z-depth-0"><div class="input-field center-align">
                                            <form method="post" action="<?php echo base_url() . "index.php/c_alumnos_ds/cambiar_estado/" . $item->id_programa_seleccionado; ?>">
                                                <div class="styled-select">
                                                    <button class="btn orange darken-1 right-align z-depth-0" type="submit" >
                                                        <div class="text-orange">Cambiar estado	</div></button>
                                                    <br>&nbsp;
                                                    <select  id="estadoi"   name="estadoi" value="<?php echo $item->estado; ?>" >
                                                        <option value="<?php echo $item->estado; ?>">Estado actual: <?php echo $item->estado; ?></option>
                                                        <option value="seleccionado">seleccionado</option>
                                                        <option value="aceptado">aceptado</option>
                                                    </select>

                                                    <input type="text" style="visibility: hidden"  name="numeroi" value="<?= $item->numero_control; ?>" id="numeroi" />
                                                    <input type="text" style="visibility: hidden"  name="idsolicitudi" value="<?= $item->id_solicitud; ?>" id="idsolicitudi" />
                                                </div>
                                            </form>
                                        </div></div>

<script>
                                function validar(oficio) {
                                    if (oficio.value == '') {
                                        oficio.setCustomValidity('Favor de ingresar el numero de oficio');
                                    }
                                    else{
                                        oficio.setCustomValidity('');
                                    }
                                    return true;
                                }
                            </script>
                                    <div class="col s3 center-align card-panel  z-depth-0"><div class="input-field center-align">
                                            <form method="post" action="<?php echo base_url() . "index.php/c_alumnos_ds/delete_solicitud/" . $item->id_programa_seleccionado; ?>">
                                                <button class="btn orange darken-1 right-align z-depth-0" href="#modal1" type="submit" onclick="return confirmar()"  >
                                                    <div class="text-orange">Cancelar solicitud	</div></button>
                                                <input type="text" style="visibility: hidden"  name="id" value="<?= $item->id_programa_seleccionado; ?>" id="id" />
                                                <input type="text" style="visibility: hidden"  name="ids" value="<?= $item->id_solicitud ?>" id="ids" />
                                                <input type="text" style="visibility: hidden" name="ns" id="ns"  value="<?= $item->solicitudes_ocupadas - 1; ?>">
                                            </form>
                                        </div></div>

                                    <div class="col s3 center-align card-panel z-depth-0"><div class="input-field center-align">
                                            <?php if ($item->estado == 'aceptado') { ?> 
                                                <span><?php echo validation_errors(); ?></span>

                                                <?= form_open(base_url() . 'index.php/c_alumnos_pdf/generar') ?>
                                                <div class="input-field">
                                    <input type="text" placeholder="Asigna el número de oficio" name="oficio" id="no_oficio" oninput="validar(this);"oninvalid="validar(this);" required>
                                    <label for="no_folio">Número de oficio para carta de presentación</label>
                                 </div>
                                                <input class="center-align btn orange darken-1 z-depth-0 " type="submit" value="Generar pdf" formtarget="_blank" />
                                                
                                                <input type="text" style="visibility:hidden"  name="idps" value="<?= $item->id_programa_seleccionado; ?>" id="idps" />      
                                                <input type="text" style="visibility:hidden" oninput="maxLengthCheck(this)" name="id" value="<?= $item->numero_control; ?>"  maxlength="8" length="8" id="id" />
                                       
                                                <?= form_close() ?>
                                            <?php } ?>
                                        </div></div>

                                    <div class="col s3 center-align card-panel  z-depth-0"><div class="input-field center-align">
                                            <?php if ($item->estado == 'aceptado') { ?> 
                                                <span><?php echo validation_errors(); ?></span>
                                                <?= form_open(base_url() . 'index.php/c_tarjeta') ?>
                                                <input class="center-align btn orange darken-1 z-depth-0 " type="submit" value="Tarjeta de control" />
                                                <input type="text" style="visibility:hidden"  name="idps" value="<?= $item->id_programa_seleccionado; ?>" id="idps" />
                                                <?= form_close() ?>
                                            <?php } ?> 
                                        </div></div>
                                </div>
                        <!--
                        <div class="col s3 center-align card-panel  z-depth-0"><div class="input-field center-align">
                                            <form method="post" action="<?php echo base_url() . "index.php/Residencia/C_email/sendMailGmail"?>">
                                                <button class="btn orange darken-1 right-align z-depth-0" type="submit">
                                                    <div class="text-orange">Enviar correo</div></button>
                                                <input type="text" style="visibility: hidden"  name="nc" value="<?=  $item->numero_control; ?>" id="nc" />                                                
                                            </form>
                                        </div></div>
                        -->
                            <?php } ?>




                            </form>

                                        



                        </div>
                        <?php
                    }
                    ?>






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