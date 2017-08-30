<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: ADJUNTAR INFORME SEMESTRAL</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        
    </head>
    <body>
        <nav>
            <div class="nav-wrapper grey lighten-5 left-align">
                <a href="#!" class="brand-logo center"><img src="<?php echo base_url(); ?>images/logochico.png" alt="Logo" /></a>

                <div class="right-align hide-on-med-and-down">
                    <a href="#"><div class=""></div><span class="grey-text text-darken-2 right-align hide-on-med-and-down"><?php echo $nombres.' '.$apellidos; ?>
                            <?= anchor(base_url() . 'index.php/Logeo/logout_ci', '<span class=" amber-text  right-align hide-on-med-and-down">(Cerrar sesión)  </span>') ?></span></a>
                </div>
            </div>
        </nav>
        <!-- Navbar goes here -->                       

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br>
                <div class="row center">
<h5 class="condensed light header center amber-text darken-1-text">      
                        ADJUNTAR INFORME SEMESTRAL</h5>                    
                </div>
                <div class="row center">
                    <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="section">
<a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" 
                       href="<?php echo base_url() . 'index.php/Residencia/Docente/panel_docente'; ?>"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
                <!--   Icon Section   -->
                


                <div class="row center-align">

                    <div class="col s3 center-align"><div class="input-field center-align">
                            <div id="buscador">

                            </div></div>

                    </div>


                    <div class="col s6 center-align card-panel grey lighten-5"><br>ADJUNTAR INFORME SEMESTRAL<div class="input-field center-align">
                            <div id="buscador">
                                
                                <?= form_open_multipart(base_url() . 'index.php/Residencia/Docente/panel_docente/adjuntar_informe')?>
                                <img src="<?php echo base_url()?>/images/attach_file.png">
                                <input type="file" accept=".pdf,.docx,.doc" name="userfile" required/>                                
                                <br>
                                <br>
                                <input id="rfc" name="rfc" type="text" value="<?php echo $rfc; ?>" hidden>
                                <input class="btn orange darken-1 z-depth-0 " type="submit" value="ADJUNTAR" />

                                <?= form_close() ?>
                                <br>
                                <br>
                            </div></div>

                    </div>

                    
                </div>                               
               
            </div>

        </div>
        <br><br>
        <br>
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

    </body>
</html>
