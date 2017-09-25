<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: PANEL JEFE SERVICIO :</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link href="<?php echo base_url(); ?>css/sintextmaterialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styletext.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="<?php echo base_url(); ?>js/materialize.js"></script>
  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="<?php echo base_url(); ?>js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea',  language: 'es_MX',branding: false });</script>

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

  /* put each textarea on its own row */
  xf|textarea {
    display: table-row;
  }

  xf|textarea > xf|label {
    display: table-cell;
    font-family: sans-serif;
    font-size: 10pt;
    font-weight: bold;
    vertical-align: top;
    text-align: right;
    padding-right: 3px;
  }



  .small-textarea textarea {
    height: 4.4em; /* a bit less than four lines to demonstrate scrolling */
    width: 300px;
  }

  .medium-textarea textarea {
    height: 6em;
    width: 400px;
  }

  .large-textarea textarea {
    font-family: Courier, sans-serif;
    height: 10em;
    width: 500px;
  }

  .x-large-textarea textarea {
    font-family: Courier, sans-serif;
    height: 20em;
    width: 700px;
  }

  ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #000;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    #000;
    opacity:  1;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    #000;
    opacity:  1;
  }
  :-ms-input-placeholder { /* Internet Explorer 10-11 */
    color:    #000;
  }

  textarea{
    height: 200px;
    max-height: 300px;
    max-width: 100%;
    min-height: 100px;
    min-width: 100%;
    width: 100%;
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
        <div class="row center">
          <h5 class="condensed light header center amber-text darken-1-text">
            NOTICIAS</h5>
          </div>
          <div class="row center">
            <?php /* ?><a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a><?php */ ?><br>
          </div>
        </div>
      </div>
      <div class="container">
        <?php if (isset($message)) { ?>
          <CENTER><p class="col s4 center-align card-panel green white-text">La noticia se agrego correctamente</p></CENTER><br>
        <?php } ?>
        <?php if (isset($messages)) { ?>
          <CENTER><p class="col s4 center-align card-panel red white-text">La noticia se ha eliminado</p></CENTER><br>
        <?php } ?>
        <?php if (isset($messageErrorEditar)) { ?>
          <CENTER><p class="col s4 center-align card-panel red white-text"><?php echo $messageErrorEditar; ?></p></CENTER><br>
        <?php } ?>
        <div class="row"> <a href="<?php echo base_url(); ?>index.php/">< Regresar</a>
          <div class="section">
            <div class="col s2 left-aling"><div class="input-field">
              <div id="buscador">
                &nbsp;&nbsp;
              </div></div>
            </div>
            <div class="col s8 center-align card-panel #bdbdbd grey lighten-2"><div class="input-field">
              <div id="buscador">
                <br>
                <button class="btn orange darken-1 right-align z-depth-0 "  id="AgregarNoticiaBoton">
                  <div class="text-orange"><i class="material-icons right">description</i>Nueva Noticia</div>
                </button>
                <div id="formulario1" style="display: none;">
                  <?php echo form_open('c_noticias/validar'); ?>

                  <br>&nbsp;

                  <div class="rowsa">
                    <input class="slide-up" type="text" name="tnoticia" id="tnoticia" value="<?php echo set_value('tnoticia'); ?>" placeholder="Introduce el titulo" /><label for="tnoticia">&nbsp;&nbsp;&nbsp;&nbsp;Titulo de la noticia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <div class="red-text left"><?php echo form_error('tnoticia'); ?></div>
                  </div>

                  <br>&nbsp;
                  <br>&nbsp;

                  <div class="rowa">
                    <textarea style="background:white; resize: none" rows="10" class="large-textarea" name="cnoticia" id="cnoticia" type="text" value="<?php echo set_value('cnoticia'); ?>" placeholder="Introduce el contenido de la noticia"></textarea>
                    <div class="red-text left"><?php echo form_error('cnoticia'); ?></div>
                  </div>
                  <br>
                  <br>
                  <button class="btn orange darken-1 right-align z-depth-0 " type="submit">
                    <div class="text-orange"><i class="material-icons right">description</i>Agregar noticia</div>
                  </button>


                  <br>&nbsp;
                  <?= form_close() ?>
                </div>
                <br> &nbsp;
                <?php
                if (!$noticias) {
                  ?>

                  <div class="red-text">No hay noticias.</div>
                <?php } else {
                  ?>
                  <table class="striped">
                    <tr class=" grey darken-1 right-align z-depth-0 ">
                      <td class="white-text">
                        &nbsp;&nbsp;Actividad
                      </td>
                      <td class="white-text">
                        Fecha de publicación
                      </td>
                      <td class="white-text center">
                        Editar
                      </td>
                      <td class="white-text center">
                        Eliminar
                      </td>
                    </tr>
                    <?php foreach ($noticias as $item): ?>
                      <tr class="white">
                        <td >
                          &nbsp;&nbsp;<?= $item->titulo_n; ?>
                        </td>
                        <td >
                          &nbsp;&nbsp;<?= $item->fecha_noticia; ?>
                        </td>
                        <td class="center">
                          <a href="<?php echo base_url(); ?>index.php/C_noticias/indexEditar/<?= $item->id_noticia; ?>">
                            <input type="text" name="idnot" size="1" style="visibility: hidden"  value="<?= $item->id_noticia; ?>" id="idnot" />
                            <button type="submit" style="background: transparent; border: 0; ">
                              <i class="material-icons green-text">edit</i>
                            </button>
                          </td>
                          <td class="center">
                            <?= form_open(base_url() . 'index.php/c_noticias/delete') ?>
                            <input type="text" name="idnot" size="1" style="visibility: hidden"  value="<?= $item->id_noticia; ?>" id="idnot" />
                            <button type="submit" style="background: transparent; border: 0; ">
                              <img src="<?php echo base_url(); ?>images/button-bg.png" width="0" height="0"  alt="submit" /><i class="material-icons red-text">delete</i>
                            </button>
                            <input type="text" name="idact" size="1" style="visibility: hidden"  value="" id="idact" />
                            <?= form_close() ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php
                    }
                    ?>
                  </table>
                  <br>&nbsp;
                </div></div>
              </div>
              <div class="col s2 right-align"><div class="input-field">
              </div>
            </div>
          </div>
          <!--   Icon Section   -->
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
      <div align="center ">Copyright 2017 - <a class=" amber-text text-lighten-3" href="http://www.ittepic.edu.mx"><span class="amber-text">
        ITTepic
      </span></a></div>
    </div>
  </div>
</footer>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/materialize.js"></script>
<script src="<?php echo base_url(); ?>js/init.js"></script>
<script>
$(document).ready(function(){
  /*$("#hide").click(function(){
  $("formulario1").hide();
});*/
$("#AgregarNoticiaBoton").click(function(){
  //  $("#formulario1").show();
  $("#formulario1")  .slideDown( "slow", function() {
    // Animation complete.
  });
  $('#tnoticia').val("");
});

});
</script>
<?php if (isset($errorInsertar)) { ?>
  <script>
  $(document).ready(function(){
    $("#AgregarNoticiaBoton").hide();
    $("#formulario1")  .slideDown( "slow", function() {
  });
  });
  </script>
<?php } ?>
</body>
</html>
