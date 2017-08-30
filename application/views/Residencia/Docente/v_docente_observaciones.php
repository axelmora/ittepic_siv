<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL DOCENTE:</title>

        <!-- CSS  -->

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>       -->

        
        <link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>               

        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
        <script
            src="https://code.jquery.com/jquery-2.2.3.js"
            integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4="
            crossorigin="anonymous">
        </script>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>

       

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
            <div class="row center">
                <h5 class="condensed light header center amber-text darken-1-text">      
                    OBSERVACIONES</h5>
            </div>                

        </div>
 

        <div class="container">
            <div class="section">             
                


                <div class="left-align col s3 m6 l3 card-panel z-depth-0">
                    <div class="input-field">
<!--                        <form method="post" action="<?php echo base_url() . "index.php/c_alumnos_ds/cambiar_estado/" ?>">-->
                        <form method="post" no action="">                          
                            <label>Selecciona tu asesorado</label>
                            <br>
                            <br>
                            <select  id="residenteid" name="residenteid">
                                <option value="" disabled selected="">Residentes</option>
                                <option value="Residente1">Residente1</option>
                                <option value="Residente2">Residente2</option>
                                <option value="Residente3">Residente3</option>
                            </select>

                            <br>
                            <br>
                            <button class="btn orange darken-1 right-align z-depth-0" type="submit">
                                Seleccionar Asesorado</button>                                                            


                        </form>
                    </div>
                </div>
 <div class="col s6 center-align card-panel grey lighten-5">
                <table id="table_id2" class="display">
                    <thead>
                    <caption>ARCHIVOS DEL ALUMNO</caption>
                    <tr>
                        <th>id_archivo</th>
                        <th>nombre archivo</th>
                        <th>descripcion</th>
                        <th>tipo documento</th>
                        <th>estado</th>
                        <th>fecha guardado</th>
                        <th>fecha limite revision</th>
                        <th>link archivo</th>
                        <th>revision</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>archivo.docx</td>
                            <td>el archivo</td>
                            <td>anteproyecto</td>
                            <td>revisado</td>
                            <td>ayer</td>
                            <td>mañana</td>
                            <td>el link</td>
                            <td>1</td>
                        </tr>
                    </tbody>                      
                </table>                              
            </div>                                  
              
                <div class="col s6 center-align card-panel grey lighten-5"><br>ADJUNTAR OBSERVACIÓN<div class="input-field center-align">
                            <div id="buscador">
                                
                                <?= form_open_multipart(base_url() . 'index.php/Residencia/Docente/panel_docente/informe')//base_url() . 'index.php/Residencia/adjuntar_descargar/do_upload') ?>
                               <label>Selecciona el id del archivo de anteproyecto al que se hará la observación</label>
                            <br>
                            <br>
                            <select  id="archivoid" name="archivoid">
                                <option value="" disabled selected="">id archivo</option>
                                <option value="Residente1">archivo1</option>
                                <option value="Residente2">archivo2</option>
                                <option value="Residente3">archivo3</option>
                            </select>
                            <br>
                            <br>
                                <i class="material-icons prefix">assignment_ind</i>
                                <input type="file" accept=".pdf,.docx,.doc" name="userfile" />                                
                                <br>
                                <br>
                                <input class="btn orange darken-1 z-depth-0 " type="submit" value="ACEPTAR" />

                                <?= form_close() ?>
                                <br>
                                <br>
                            </div></div>

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
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../../bin/materialize.js"></script>
        <script src="js/init.js"></script>


    </body>
</html>
