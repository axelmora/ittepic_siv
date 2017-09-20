<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <!-- Aqui debe cambiar dependiendo quien entre  -->
  <title>SIV :: REPORTES FINAL</title>
  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--<link href="<?php echo base_url(); ?>css/materializesinselect.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <link href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>js/DataTables/media/css/dataTables.material.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script>
  function confirmar()
  {
    $(document).ready(function () {
      $('.collapsible').collapsible({
        accordion: true// A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  }
  </script>

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

    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br>
        <div class="row center">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="section">

        <!--   Icon Section   -->
        <a class = "tooltipped" data-position="top" data-delay="50" data-tooltip="Regresar" href="<?php echo base_url(); ?>index.php/Residencia/JefeResidencia/Panel_jeferesidencia"><img src="<?php echo base_url(); ?>images/keyboard_return_tiny.png"></a>
        <br>
        <div class="col s4 center-align card-panel grey lighten-5"><br><h6 class="amber-text">LISTADO INFORME FINAL ENTREGADO</h6>
          <table id="TABLA_INFORME_FINAL" class="display responsive-table">
            <thead>
              <tr>
                <th>Numero Control</th>
                <th>Nombre</th>
                <th>Semestre Cursando</th>
                <th>Carrera</th>
                <th>Fecha Archivo</th>
                <th>Archivo</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($alumnos) {
                foreach ($alumnos as $value) {
                  ?>
                  <tr>
                    <td><?= utf8_decode($value->numero_control); ?></td>
                    <td><?= $value->nombre; ?></td>
                    <td><?= $value->semestre_cursado; ?></td>
                    <td><?= $value->carrera; ?></td>
                    <td><?= $value->fecha_guardado_documento; ?></td>
                    <td><a class="waves-effect waves-light btn orange" href="<?php  echo base_url(). $value->ruta_archivo; ?>">DESCARGAR</a></td>
                  </td>
                </tr>
                <?php
              }
            }
            ?>

          </tbody>
        </table>
        <br>
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
  <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>
  <script src="<?php echo base_url(); ?>js/materialize.js"></script>
  <script src="<?php echo base_url(); ?>js/DataTables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>js/DataTables/media/js/dataTables.material.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#TABLA_INFORME_FINAL').DataTable({
       "order": [[4 , "desc" ]],
      "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
      "autoWidth": false,
      responsive: true
    });
  } );
  </script>
</body>
</html>
