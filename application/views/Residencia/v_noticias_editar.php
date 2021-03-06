<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: PANEL JEFE ACADÉMICO</title>
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
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <div class="row center">
          <h5 class="condensed light header center amber-text darken-1-text">
            EDITAR NOTICIA
          </h5>
        </div>
      </div>
    </div>
    <div class="container">
      <?php if (isset($message)) { ?>
        <CENTER><p class="col s4 center-align card-panel green white-text">La noticia se actualizo correctamente</p></CENTER><br>
      <?php } ?>
      <div class="row">
        <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" href="<?php echo base_url(); ?>index.php/C_noticias/indexR">
          <img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
          <div class="section">
            <div class="col s2 left-aling"><div class="input-field">
              <div id="buscador">
                &nbsp;&nbsp;
              </div></div>
            </div>
            <?php foreach ($noticiasResidenciaEditar as $item):  ?>
            <div class="col s8 center-align card-panel #bdbdbd grey lighten-2"><div class="input-field">
              <div id="buscador">
                <?php echo form_open('c_noticias/validarREditar/'.$item->id_noticia); ?>
                <br>&nbsp;
                <div class="rowsa">
                  <div class="col s12">
                    <input class="slide-up" type="text" name="tnoticia" id="tnoticia" value="<?php echo set_value('tnoticia'); ?> <?= $item->titulo_n; ?>" placeholder="Introduce el titulo" /><label for="tnoticia">&nbsp;&nbsp;&nbsp;&nbsp;Titulo de la noticia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <div class="red-text left"><?php echo form_error('tnoticia'); ?></div>
                  </div>
                </div>
                <br>&nbsp;
                <br>&nbsp;
                <div class="rowa">
                  <textarea style="background:white; resize: none" rows="10" class="large-textarea" name="cnoticia" id="cnoticia" type="text" value="<?php echo set_value('cnoticia'); ?>" placeholder="Introduce el contenido de la noticia"> <?= $item->contenido_n; ?></textarea>
                  <div class="red-text left"><?php echo form_error('cnoticia'); ?></div>
                </div>
                <br>
                <button class="btn orange darken-1 right-align z-depth-0 " type="submit">
                  <div class="text-orange"><i class="material-icons right">description</i>Actualizar noticia</div>
                </button>
                <br>&nbsp;
                <?= form_close() ?>
                <br> &nbsp;

                <br>&nbsp;
              </div></div>
            </div>
            <?php endforeach; ?>
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
