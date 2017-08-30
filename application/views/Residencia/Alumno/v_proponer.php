<!DOCTYPE HTML>
<html lang="es" xml:lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>SIV :: ITTEPIC</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/jquery.validate.min.js"></script>


        <!-- Tu compa -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/marketdeco.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/soberanasanslight.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/merriweather.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/queries.css" media="all" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/javascript" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/proceso.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/flow.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <script>
            $(document).ready(function () {
                $('.step').each(function (index, element) {
                    // element == this
                    $(element).not('.active').addClass('done');
                    $('.done').html('<i class="icon-ok"></i>');
                    if ($(this).is('.active')) {
                        return false;
                    }
                });
            });</script>

        <script>
            function confirmar()
            {
                if (confirm('***REVISA QUE ESTEN CORRECTOS TODOS LOS CAMPOS DE LO CONTRARIO\n\NO SE DARA DE ALTA EL PROYECTO QUE PROPUSISTE'))
                    return true;
                else
                    return false;
            }
        </script>

        <style type="text/css">

            body {
                background-color: #F0F0F0;
            }
        </style>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/ddsmoothmenu.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/html5.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/selectnav.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/twitter.min.js"></script>

    </head>

    <body>

        <div id="page" class="hfeed">
            <div id="wrapper">
                <header id="branding" role="banner">
                    <h1 id="site-title"> 
                        <img src="<?php echo base_url(); ?>images/sep.gif" alt="SIG" width="287" height="86" />
                        <img src="<?php echo base_url(); ?>images/titulo.png" alt="SIG" width="380" height="76" /> <img src="<?php echo base_url(); ?>images/logotecchico.png" alt="SIG" width="76" height="76" />
                    </h1><div align="right" class="right"> Bienvenido (a): <?php echo $nombre; ?>  
                        <?= anchor(base_url() . 'index.php/Inicio/logout', '( Cerrar sesión )&nbsp;&nbsp;&nbsp;&nbsp;') ?>  </div> 
                    <div class="social">
                        <ul>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-facebook.png" alt="Facebook" /></a></li>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-twitter.png" alt="Twitter" /></a></li>
                        </ul>
                    </div>
                    <nav id="access" class="access" role="">
                        <div id="menu" class="menu">
                            <ul id="tiny">
                                <li><a href="<?php echo base_url(); ?>index.php/inicio">Inicio</a>
                                </li>
                                <li><a href="#">Servicio Social
                                    </a><ul>
                                        <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_anoticias">Noticias</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_proceso">Información</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/alumnos/c_avance">Avance</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Residencia Profesional
                                    </a><ul>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_informacion">Información del procedimiento</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_participantes">Información de participantes del proyecto</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_banco">Banco de proyectos</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_base">Convenios</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_proponer">Proponer un proyecto</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_avance">Bitacora de avance</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_noticias">Noticias</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_historial">Historial de notificaciones</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Centro de Idiomas</a></li>
                                <li><a href="#">Servicio Externo</a></li>
                                <li><a href="#">Visitas a Empresas</a></li>
                                
                            </ul>
                        </div>
                    </nav>
                    <!-- #access --> 
                </header>
                <!-- #branding -->
                <div id="main">
                    <div id="primary" align="center">
                        <?php if ($solicitud) { ?>
                            <br>
                            <h4> Ya tienes un proyecto </h4>
                            <h2>&nbsp;</h2>
                            <h2>&nbsp;</h2>
                        <?php } else { ?>
                            <br>
                            <h3>Datos del anteproyecto</h3>                               
                            <form method="post" action="<?php echo base_url(); ?>index.php/Residencia/Alumno/c_proponer/insertar" enctype="multipart/form-data" class="form-horizontal" id="formid">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Insertar el nombre del proyecto que desarrollaras">Nombre del proyecto:</label><br>
                                    <div class="col-xs-6">
                                        <input type="text"  class="form-control" oninput="maxLengthCheck(this)" minlength="1" maxlength="255" length="255" name="nombre_proyecto" id="nombre_proyecto" value="<?php echo set_value('nombre_proyecto'); ?>" placeholder="Nombre del proyecto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Periodo en el cual realizaras tu proyecto. Ej. Enero-Junio Abril-Septiembre">Periodo Proyectado:</label><br>
                                    <div class="col-xs-6">
                                        <input type="text"  class="form-control" name="periodo" id="periodo" value="<?php echo set_value('periodo'); ?>" placeholder="Periodo de realización del proyecto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Residentes que necesita tu proyecto (Del ITT)">Residentes requeridos:</label><br>
                                    <div class="col-xs-6">
                                        <input type="number"  class="form-control" min="1" max="10" step="0" oninput="maxLengthCheck(this)" minlength="1" maxlength="2" name="residentes_requeridos"  id="residentes_requeridos" value="<?php echo set_value('residentes_requeridos'); ?>" placeholder="Residentes Requeridos">
                                    </div>
                                </div>
                                <br>
                                <h3>Datos del archivo del alumno</h3>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Añade una descripción general de tu archivo">Descripción del archivo:</label><br>
                                    <div class="col-xs-6">
                                        <textarea class="form-control" oninput="maxLengthCheck(this)" minlength="1" maxlength="300" length="300" name="descripcion_archivo" id="descripcion_archivo" value="<?php echo set_value('descripcion_archivo'); ?>" placeholder="Descripción del archivo"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Adjunta el archivo de tu proyecto">Adjuntar Archivo:</label><br>
                                    <div class="col-xs-6">
                                        <input type="file" accept=".pdf,.docx,.doc" name="ruta_archivo" class="form-control">                               
                                    </div>                           
                                </div>                        
                                <!-- Aqui esta el modal -->
                                <input id="empresa_fk" name="empresa_fk" type="text" value="" hidden="true">
                                <input id="valida_empresa" name="valida_empresa" type="text" value="false" hidden="true">

                                <h3>Datos de la Empresa</h3>
                                <!-- Trigger the modal with a button --><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2">Selecciona empresa</button><br>

                                <div id="formulario_empresa" style="display:none;">
                                    <div class="form-group">
                                        <label id="lbl_nombre_empresa" class="control-label col-xs-3" title="Nombre de la empresa en la que realizaras tu proyecto">Nombre de la empresa:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  class="form-control" name="nombre_empresa" id="nombre_empresa" value="<?php echo set_value('nombre_empresa'); ?>" placeholder="Nombre de la empresa">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" title="Telefono de la empresa donde realizaras tu proyecto">Telefono:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text" data-mask="+00 (000)-000-0000" data-mask-clearifnotmatch="true" placeholder="+00 (000)-000-0000" class="form-control validate" name="telefono" id="telefono" value="<?php echo set_value('telefono'); ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl_sector" class="control-label col-xs-3" title="Sector al que pertenece la empresa">Sector:</label><br>
                                        <div class="col-xs-6">
                                            <select class="form-control"  name="sector" id="sector" placeholder="Sector de la empresa">
                                                <option>INDUSTRIAL</option>
                                                <option>SERVICIOS</option>
                                                <option>PUBLICO</option>
                                                <option>PRIVADO</option>
                                                <option>OTRO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" title="RFC de la empresa en la que realizaras tu proyecto">RFC:</label><br>
                                        <div class="col-xs-6 has-feedback">
                                            <input type="text"  oninput="maxLengthCheck(this)" length="13" minlength="13" maxlength="13"  class="form-control" name="rfc" id="rfc" value="<?php echo set_value('rfc'); ?>" placeholder="RFC">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl_domicilio" class="control-label col-xs-3" title="Domicilio de la empresa en la que realizaras tu proyecto">Domicilio:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"   class="form-control" name="domicilio" id="domicilio" value="<?php echo set_value('domicilio'); ?>" placeholder="Domicilio">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" title="Colonia de la empresa en la que realizaras tu proyecto">Colonia:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"   class="form-control" name="colonia" id="colonia" value="<?php echo set_value('colonia'); ?>" placeholder="Colonia">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl_ciudad" class="control-label col-xs-3" title="Ciudad de la empresa en la que realizaras tu proyecto">Ciudad:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  class="form-control" name="ciudad" id="ciudad" value="<?php echo set_value('ciudad'); ?>" placeholder="Ciudad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" title="Código postal de la empresa en la que realizaras tu proyecto">Código Postal:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  oninput="maxLengthCheck(this)" minlength="5" maxlength="5"  class="form-control" name="codigo_postal" id="codigo_postal" value="<?php echo set_value('codigo_postal'); ?>" placeholder="Código Postal">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" title="Titular de la empresa en la que realizaras tu proyecto">Titular de la empresa:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"   class="form-control" name="titular_empresa" id="titular_empresa" value="<?php echo set_value('titular_empresa'); ?>" placeholder="Titular de la empresa">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" title="Puesto del titular de la empresa en la que realizaras tu proyecto Ej. Director, CEO, etc.">Puesto del titular:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  class="form-control" name="puesto_titular" id="puesto_titular" value="<?php echo set_value('puesto_titular'); ?>" placeholder="Puesto del Titular">                                  
                                        </div>
                                    </div>
                                </div>
                                <div id="formulario_empresa2" style="display:none;">
                                    <div class="form-group">
                                        <label  class="control-label col-xs-3">Nombre de la empresa:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  class="form-control" name="nombre_empresa2" disabled="true" value="<?php echo set_value('nombre_empresa2'); ?>" id="nombre_empresa2" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label col-xs-3">Domicilio:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  class="form-control" name="domicilio2" disabled="true" value="<?php echo set_value('domicilio2'); ?>"id="domicilio2" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label col-xs-3">Sector:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  class="form-control" name="sector2" disabled="true" value="<?php echo set_value('sector2'); ?>" id="sector2"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label col-xs-3">Ciudad:</label><br>
                                        <div class="col-xs-6">
                                            <input type="text"  class="form-control" name="ciudad2" disabled="true" value="<?php echo set_value('ciudad2'); ?>" id="ciudad2" >
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <h3>Datos del Asesor externo</h3>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Nombre del asesor externo con quien realizaras tu proyecto">Nombre:</label><br>
                                    <div class="col-xs-6">
                                        <input type="text"  class="form-control" name="nombre_asesor" id="nombre_asesor" value="<?php echo set_value('nombre_asesor'); ?>" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Correo del asesor externo con quien realizaras tu proyecto">Correo:</label><br>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" name="correo" id="correo" value="<?php echo set_value('correo'); ?>" placeholder="Correo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Puesto del asesor externo con quien realizaras tu proyecto. Ej. Administrador general, Gerente de planta, etc.">Puesto:</label><br>
                                    <div class="col-xs-6">
                                        <input type="text"  class="form-control" name="puesto" id="puesto" value="<?php echo set_value('puesto'); ?>" placeholder="Puesto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Area del asesor externo dentro de la empresa. Ej. Administración, Control de calidad, Sistemas, etc.">Área:</label><br>
                                    <div class="col-xs-6">
                                        <input type="text"  class="form-control" name="area" id="area" value="<?php echo set_value('area'); ?>" placeholder="Área a la que pertenece el asesor externo">
                                    </div>
                                </div>
                                <br>

                                <h3>Datos de Atención Médica</h3>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Institución que te provee seguridad social">Atención Médica:</label><br>
                                    <div class="col-xs-6">
                                        <select class="form-control" name="atencion_medica" id="atencion_medica" placeholder="Con que seguro cuentas">
                                            <option>IMSS</option>
                                            <option>ISSSTE</option>
                                            <option>Seguro Popular</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" title="Número de afiliación de tu seguridad social">Número de Afiliación:</label><br>
                                    <div class="col-xs-6">
                                        <input type="text" oninput="maxLengthCheck(this)" minlength="12" maxlength="20" class="form-control" name="numero_afiliacion" id="numero_afiliacion" value="<?php echo set_value('numero_afiliacion'); ?>" placeholder="Numero de Afiliación">
                                    </div>
                                </div>
                                <br>
                                <?php if ($id_vacante) { ?>
                                    <input id="id_vacante" name="id_vacante" type="text" value="<?php echo $id_vacante; ?>" hidden="true">
                                    <input id="valida_vacante" name="valida_vacante" type="text" value="true" hidden="true">
                                <?php } else { ?>
                                    <input id="valida_vacante" name="valida_vacante" type="text" value="false" hidden="true">
                                <?php } ?>
                                <br><br>
                                <input type="submit" value="Proponer" onclick="return confirmar()" class="btn btn-warning btn-lg">
                            </form>
                            <br>
                            <!-- Modal Empresa -->
                            <div id="myModal2" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Selecciona empresa en la que realizaras residencia</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table id="table_id2" class="table-responsive table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><b>Nombre de la empresa</b></th>
                                                        <th><b>Ciudad</b></th>
                                                        <th><b>Domicilio</b></th>
                                                        <th><b>Sector</b></th>
                                                        <th><b>Seleccionar</b></th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($empresas) {
                                                        foreach ($empresas as $item2):
                                                            ?>
                                                            <tr>
                                                                <td><?= $item2->nombre_empresa; ?></td>                                   
                                                                <td><?= $item2->ciudad; ?></td>                                   
                                                                <td><?= $item2->domicilio; ?></td> 
                                                                <td><?= $item2->sector; ?></td> 
                                                                <td> <button type="button" class="btn btn-warning btn-sm" onclick="
                                                                                    document.getElementById('empresa_fk').value =<?php echo $item2->empresa_pk; ?>;
                                                                                    document.getElementById('valida_empresa').value = 'true';
                                                                                    document.getElementById('nombre_empresa2').value = '<?php echo $item2->nombre_empresa; ?>';
                                                                                    document.getElementById('ciudad2').value = '<?php echo $item2->ciudad; ?>';
                                                                                    document.getElementById('sector2').value = '<?php echo $item2->sector; ?>';
                                                                                    document.getElementById('domicilio2').value = '<?php echo $item2->domicilio; ?>';
                                                                                    esconde_empresa();">Aceptar</button></td>                                   
                                                            </tr>
                                                            <?php
                                                        endforeach;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="Nuevo" class="btn btn-primary" data-dismiss="modal" onclick="mostrar_empresa();">Nueva Empresa</button>
                                            <button type="button" id="envia" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- #primary -->
                </div><!-- #main -->

                <footer id="colophon" role="contentinfo">
                    <div id="site-generator">
                        Copyright 2016 - ITTepic
                    </div>
                </footer>
                <!-- #colophon -->
            </div><!-- #wrapper -->
        </div><!-- #page -->

        <script>
            function esconde_empresa() {
                document.getElementById('formulario_empresa').style = "display:none;";
                document.getElementById('formulario_empresa2').style = "display:block;";
                document.getElementById('nombre_empresa').required = false;
                document.getElementById('telefono').required = false;
                document.getElementById('sector').required = false;
                document.getElementById('domicilio').required = false;
                document.getElementById('rfc').required = false;
                document.getElementById('colonia').required = false;
                document.getElementById('codigo_postal').required = false;
                document.getElementById('ciudad').required = false;
                document.getElementById('titular_empresa').required = false;
                document.getElementById('puesto_titular').required = false;
            }
            function mostrar_empresa() {
                document.getElementById('formulario_empresa').style = "display:block;";
                document.getElementById('formulario_empresa2').style = "display:none;";
                document.getElementById('empresa_fk').value = '';
                document.getElementById('valida_empresa').value = 'false';
                document.getElementById('nombre_empresa2').value = '';
                document.getElementById('ciudad2').value = '';
                document.getElementById('sector2').value = '';
                document.getElementById('domicilio2').value = '';
                document.getElementById('nombre_empresa').required = true;
                document.getElementById('telefono').required = true;
                document.getElementById('sector').required = true;
                document.getElementById('domicilio').required = true;
                document.getElementById('rfc').required = true;
                document.getElementById('colonia').required = true;
                document.getElementById('codigo_postal').required = true;
                document.getElementById('ciudad').required = true;
                document.getElementById('titular_empresa').required = true;
                document.getElementById('puesto_titular').required = true;
            }
        </script>

        <script>

            function valida_rfc() {
                var entrante = document.getElementById('rfc').value;
                var rfc = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
                var validaRfc = new RegExp(rfc);
                var matchArray = entrante.match(validaRfc);
                if (matchArray === null) {
                    return false;
                } else {
                    return true;
                }
            }

            $.validator.addMethod("validaRFC", valida_rfc, "No es un RFC válido");

            $(document).ready(function () {

                $.validator.setDefaults({
                    errorElement: 'span',
                    errorClass: 'error-message',
                    errorPlacement: function (error, element) {
                        if (element.parent('.form-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });

                $('#formid').validate(
                        {
                            rules: {
                                nombre_proyecto: {
                                    minlength: 1,
                                    required: true
                                },
                                periodo: {
                                    minlength: 16,
                                    required: true
                                },
                                residentes_requeridos: {
                                    minlength: 1,
                                    required: true
                                },
                                nombre_asesor: {
                                    minlength: 5,
                                    required: true
                                },
                                rfc: {
                                    minlength: 13,
                                    validaRFC: true,
                                    required: true
                                },
                                telefono: {
                                    required: true
                                },
                                codigo_postal: {
                                    minlength: 5,
                                    maxlength: 5,
                                    digits: true,
                                    required: true
                                },
                                correo: {
                                    email: true,
                                    required: true
                                },
                                puesto: {
                                    minlength: 1,
                                    required: true
                                },
                                area: {
                                    minlength: 1,
                                    required: true
                                },
                                descripcion_archivo: {
                                    minlength: 1,
                                    required: true
                                },
                                atencion_medica: {
                                    minlength: 1,
                                    required: true
                                },
                                numero_afiliacion: {
                                    minlength: 1,
                                    required: true
                                },
                                ruta_archivo: {
                                    minlength: 1,
                                    required: true
                                }
                            },
                            messages: {
                                nombre_proyecto: "Introduce nombre del proyecto",
                                periodo: "Introduce el periodo proyectado para tu residencia. Ej. Enero - Junio 2016",
                                residentes_requeridos: "Introduce los residentes requeridos(del ITT)",
                                nombre_asesor: "Introduce el nombre del que sera tu asesor externo en el proyecto",
                                correo: "Ingresa un correo válido",
                                rfc: "Ingresa un RFC válido",
                                nombre_empresa: "Ingresa el nombre de la empresa en la que realizaras tu proyecto",
                                domicilio: "Ingresa un domicilio válido",
                                telefono: "Ingresa un telefono válido. El telefono solo puede contener digitos y comenzar con el área",
                                colonia: "Ingresa una colonia válida",
                                ciudad: "Ingresa una ciudad válida",
                                codigo_postal: "Ingresa un código postal válido",
                                titular_empresa: "Ingresa una al titular de la empresa en la que realizaras tu proyecto",
                                puesto_titular: "Ingresa el puesto del titular de la empresa en la que realizaras tu proyecto",
                                puesto: "Ingresa el puesto que tiene tu asesor externo",
                                area: "Ingresa el área a la que pertenece tu asesor externo",
                                descripcion_archivo: "Ingresa una descripción al archivo de tu anteproyecto",
                                ruta_archivo: "Ingresa el archivo de tu anteproyecto",
                                numero_afiliacion: "Ingresa tu número de afiliación o el número de la póliza de tu seguro",
                                atencion_medica: "Ingresa quien te provee de atención medica",
                                required: "Campo obligatorio"
                            },
                            highlight: function (element) {
                                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                            },
                            onfocusout: function (element) {
                                $(element).valid();
                            },
                            success: function (element) {
                                element
                                        .addClass('valid')
                                        .closest('.form-group').removeClass('has-error').addClass('has-success');
                            }

                        });
            }); // end document.ready
        </script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>js/jquery.mask.min.js"></script>   
    </body>
</html>
