<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE VINCULACION :</title>

        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            function confirmar()
            {
                if (confirm('¿Esta seguro de quiere eliminarlo?'))
                    return true;
                else
                    return false;
            }
        </script>
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

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">

                <br><br>
                <br>
                <div class="row center">

                    <?php foreach ($single_programa as $programa): ?>
                        <h5 class="condensed light header center amber-text darken-1-text">      
                            Eliminar programa: <?php echo $programa->nombre_programa; ?></h5>
                    <?php endforeach; ?>

                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <a href="<?php echo base_url(); ?>index.php/c_programasi">< Regresar</a> 
            <div id="detail">
                <!--====== Displaying Fetched Details from Database ========-->
                <?php foreach ($single_programa as $programa): ?>
                    <p>Detalles de eliminacion:</p>
                    <label id="hide">Id :</label>
                    <input type="text" id="hide" name="did" value="<?php echo $programa->id_solicitud; ?>">

                    <label>Id de instancia :</label>
                    <input type="text" name="idinstanciai" value="<?php echo $programa->id_instancia; ?>">


                    <label>Departamento :</label>
                    <input type="text" name="departamentoi" value="<?php echo $programa->departamento; ?>">

                    <label>Nombre del encargado :</label>
                    <input type="text" name="encargadoi" value="<?php echo $programa->nombre_encargado; ?>">

                    <label>Correo del encargado :</label>
                    <input type="text" name="correoi" value="<?php echo $programa->correo_encargado; ?>">

                    <label>Nombre del programa :</label>
                    <input type="text" name="nombrepi" value="<?php echo $programa->nombre_programa; ?>">

                    <label>Objetivo del programa :</label>
                    <input type="text" name="objetivoi" value="<?php echo $programa->objetivo_programa; ?>">

                    <label>Modalidad :</label>
                    <input type="text" name="modalidadi" value="<?php echo $programa->modalidad; ?>">


                    <label>Tipo de programa :</label>
                    <input type="text" name="tprogramai" value="<?php echo $programa->id_tipoprograma; ?>">

                    <label>Numero de solicitudes :</label>
                    <input type="text" name="tvacantesi" value="<?php echo $programa->total_solicitudes; ?>">

                    <!--====== Delete Button ========-->
                    <a href="<?php echo base_url() . "index.php/c_programasi_d/delete_programa_id/" . $programa->id_solicitud; ?>" onclick="return confirmar()"><input type="submit" id="submit" name="submit" value="Eliminar"></a>
                <?php endforeach; ?>
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