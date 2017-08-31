<!DOCTYPE html>
<html lang="es">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>SIV :: PANEL JEFE SERVICIO:</title>

        <script src="http://code.jquery.com/jquery-latest.js"></script>

        <link href="<?php echo base_url(); ?>css/sintextmaterialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styletextlogin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="<?php echo base_url(); ?>js/materialize.js"></script>
        <!-- CSS  -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>

            /* label color */
            .input-field label {
                color: #fff;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #000;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #fafafa;
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
                color: #FFA600;
            }

        </style>
    </head>

    <body>
        <form class="grey lighten-2" method="post" action="<?php echo base_url() . "index.php/verifylogin" ?>">
            <br>&nbsp;
            <br>&nbsp;
            <div class="rowsa">
                <input class="slide-up" type="text" name="username" size="6" id="username" placeholder="Introduce tu numero de control" /><label  for="actividadgi">&nbsp;&nbsp;&nbsp;Numero de control&nbsp;&nbsp;&nbsp;</label>
            </div>
            <br>&nbsp;
            <br>&nbsp;
            <br>&nbsp;
            <div class="rowsa">
                <input class="slide-up" type="password" name="password" size="6"  id="password" placeholder="Introduce tu contraseña" /><label for="actividadgi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contraseña&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </div>
            <br>&nbsp;
            <br>&nbsp;
            <button style="margin-right:31px;" class="btn grey darken-1 right right-align z-depth-0 " type="submit">
                <div class="text-orange"><i class="material-icons right">chevron_right</i>Iniciar sesión</div>
            </button>
            <br>&nbsp;
        </form>
    </body>
</html>
