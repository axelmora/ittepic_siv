<!DOCTYPE HTML>
<html lang="es" xml:lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>SIV :: PANEL JEFE SERVICIO :</title>
        <link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/view.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/marketdeco.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/soberanasanslight.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>type/merriweather.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/queries.css" media="all" />
        <style type="text/css">
            body {
                background-color: #878787;
            }

            .CSSTable {
                margin:0px;padding:0px;
                width:100%;
                border:1px solid #fff2ad;

                -moz-border-radius-bottomleft:15px;
                -webkit-border-bottom-left-radius:15px;
                border-bottom-left-radius:15px;

                -moz-border-radius-bottomright:15px;
                -webkit-border-bottom-right-radius:15px;
                border-bottom-right-radius:15px;

                -moz-border-radius-topright:15px;
                -webkit-border-top-right-radius:15px;
                border-top-right-radius:15px;

                -moz-border-radius-topleft:15px;
                -webkit-border-top-left-radius:15px;
                border-top-left-radius:15px;
            }.CSSTable table{
                border-collapse: collapse;
                border-spacing: 0;
                width:100%;
                height:100%;
                margin:0px;padding:0px;
            }.CSSTable tr:last-child td:last-child {
                -moz-border-radius-bottomright:15px;
                -webkit-border-bottom-right-radius:15px;
                border-bottom-right-radius:15px;
            }
            .CSSTable table tr:first-child td:first-child {
                -moz-border-radius-topleft:15px;
                -webkit-border-top-left-radius:15px;
                border-top-left-radius:15px;
            }
            .CSSTable table tr:first-child td:last-child {
                -moz-border-radius-topright:15px;
                -webkit-border-top-right-radius:15px;
                border-top-right-radius:15px;
            }.CSSTable tr:last-child td:first-child{
                -moz-border-radius-bottomleft:15px;
                -webkit-border-bottom-left-radius:15px;
                border-bottom-left-radius:15px;
            }.CSSTable tr:hover td{
                background-color:#fff2aa;


            }
            .CSSTable td{
                vertical-align:middle;
                background:-o-linear-gradient(bottom, #ffffff 5%, #fff2aa 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #fff2aa) ); 
                background:-moz-linear-gradient( center top, #ffffff 5%, #fff2aa 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#fff2aa");	background: -o-linear-gradient(top,#ffffff,fff2aa);

                background-color:#ffffff;

                border:1px solid #fff2ad;
                border-width:0px 1px 1px 0px;
                text-align:left;
                padding:13px;
                font-size:11px;
                font-family:Arial;
                font-weight:normal;
                color:#000000;
            }.CSSTable tr:last-child td{
                border-width:0px 1px 0px 0px;
            }.CSSTable tr td:last-child{
                border-width:0px 0px 1px 0px;
            }.CSSTable tr:last-child td:last-child{
                border-width:0px 0px 0px 0px;
            }
            .CSSTable tr:first-child td{
                background:-o-linear-gradient(bottom, #ff9d00 5%, #ff9d00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff9d00), color-stop(1, #ff9d00) );
                background:-moz-linear-gradient( center top, #ff9d00 5%, #ff9d00 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff9d00", endColorstr="#ff9d00");	background: -o-linear-gradient(top,#ff9d00,ff9d00);

                background-color:#ff9d00;
                border:0px solid #fff2ad;
                text-align:center;
                border-width:0px 0px 1px 1px;
                font-size:11px;
                font-family:Arial;
                font-weight:bold;
                color:#ffffff;
            }
            .CSSTable tr:first-child:hover td{
                background:-o-linear-gradient(bottom, #ff9d00 5%, #ff9d00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff9d00), color-stop(1, #ff9d00) );
                background:-moz-linear-gradient( center top, #ff9d00 5%, #ff9d00 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff9d00", endColorstr="#ff9d00");	background: -o-linear-gradient(top,#ff9d00,ff9d00);

                background-color:#ff9d00;
            }
            .CSSTable tr:first-child td:first-child{
                border-width:0px 0px 1px 0px;
            }
            .CSSTable tr:first-child td:last-child{
                border-width:0px 0px 1px 1px;
            }

            #container {
                width:622px;
                height:auto;
                margin:50px auto
            }
            #wraar {
                width:520px;
                height:auto;
                padding:0 80px 20px;
                background:linear-gradient(#fff,#FFD173);
                border:1px solid #ccc;
                box-shadow:0 0 5px;
                font-family:'Marcellus',serif;
                float:left;
                margin-top:10px
            }
            #menuform {
                float:left;
                width:200px;
                margin-top:-30px
            }
            #detail {
                float:left;
                width:320px;
                margin-top:-27px
            }
            a {
                text-decoration:none;
                color:blue
            }
            a:hover {
                color:red
            }
            li {
                padding:4px 0
            }

            hr {
                border:0;
                border-bottom:1.5px solid #ccc;
                margin-top:-10px;
                margin-bottom:30px
            }
            #hide {
                display:none
            }
            form {
                margin-top:0px
            }
            label {
                font-size:17px
            }
            input {
                width:100%;
                margin:6px 0 20px;
                border:none;
                box-shadow:0 0 5px
            }
            input#submit {
                background:linear-gradient(#22abe9 5%,#36caf0 100%);
                border:1px solid #0F799E;
                color:#fff;
                font-weight:500;
                cursor:pointer;
                text-shadow:0 1px 0 #13506D
            }
            input#submit:hover {
                background:linear-gradient(#36caf0 5%,#22abe9 100%)
            }
            p {
                font-size:18px;
                font-weight:700;
                color:#30322F
            }
        </style>
        <!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
        <![endif]-->
        <!--[if IE 9]>
        <link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
        <![endif]-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
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
                    </h1>

                    <div class="social">
                        <ul>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-facebook.png" alt="Facebook" /></a></li>
                            <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>images/icon-twitter.png" alt="Twitter" /></a></li>
                        </ul>
                    </div>
                    <nav id="access" class="access" role="navigation">
                        <div id="menu" class="menu">
                            <ul id="tiny">
                                <li><a href="<?php echo base_url(); ?>index.php/panel_servicio">Inicio</a>
                                </li>
                                <li><a href="#">Servicio Social
                                    </a><ul>
                                        <li><a href="#">Noticias</a></li>
                                        <li><a href="#">Alumnos</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/c_instancias">Instancias</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </nav>
                    <!-- #access --> 
                </header>
                <!-- #branding -->

                <div id="main">

                    <div id="primary">
                        <div id="content" role="main">

                            <div class="intro">





                            </div>

                            <!-- begin article -->
                            <!-- begin article -->
                            <!-- end article -->

                            <!-- begin article --><!-- end article -->

                            <!-- begin article --><!-- end article --></div><!-- #content -->
                    </div><!-- #primary -->


                </div><!-- #main -->


                <div id="centrar">

                    <div id="container">
                        <!-- OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->

                        <div class="CSSTable" >
                            <table >
                                <tr>
                                    <td>
                                        Nombre
                                    </td>
                                    <td >
                                        Descripcion
                                    </td>
                                    <td>
                                        Sector
                                    </td>
                                    <td>
                                        Usuario
                                    </td>
                                    <td>
                                        Contraseña
                                    </td>
                                </tr>
                                <?php foreach ($search as $item): ?>
                                    <tr>
                                        <td >
                                            <?= $item->nombre_instancia; ?>
                                        </td>
                                        <td>
                                            <?= $item->descripcion_instancia; ?>
                                        </td>
                                        <td>
                                            <?= $item->sector_instancia; ?>
                                        </td>
                                        <td>
                                            <?= $item->usuario_instancia; ?>
                                        </td>
                                        <td>
                                            <?= $item->pass_instancia; ?>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </table>
                        </div>

                        <!-- OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->

                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                        <?php foreach ($search as $instancia): ?>
                            <p>Menu de modificacion:</p>
                            <form method="post" action="<?php echo base_url() . "index.php/c_instancias_u/update_instancia_id1" ?>">
                                <label id="hide">Id :</label>
                                <input type="text" id="hide" name="did" value="<?php echo $instancia->id_instancia; ?>">
                                <label>Nombre :</label>
                                <input type="text" name="nombrei" value="<?php echo $instancia->nombre_instancia; ?>">
                                <label>Descripcion :</label>
                                <input type="text" name="descripcioni" value="<?php echo $instancia->descripcion_instancia; ?>">
                                <label>Sector :</label>
                                <input type="text" name="sectori" value="<?php echo $instancia->sector_instancia; ?>">
                                <label>Usuario :</label>
                                <input type="text" name="usuarioi" value="<?php echo $instancia->usuario_instancia; ?>">
                                <label>Contraseña :</label>
                                <input type="text" name="passi" value="<?php echo $instancia->pass_instancia; ?>">

                                <input type="submit" id="submit" name="submit" value="Modificar">
                            </form>
                        <?php endforeach; ?>
                    </div>

                </div>
                <footer id="colophon" role="contentinfo">

                    <div id="site-generator">
                        Copyright 2015 - ITTepic
                    </div>
                </footer>
                <!-- #colophon -->
            </div><!-- #wrapper -->
        </div><!-- #page -->

        <script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
    </body>
</html>