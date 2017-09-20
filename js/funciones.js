$(document).ready(function () {
  //editamos datos del usuario
  $(".editar").on('click', function () {

    var id = $(this).attr('id');
    var nombre = $("#nombre" + id).html();
    var email = $("#email" + id).html();

    $("<div class='edit_modal'><form name='edit' id='edit' method='post' action='http://localhost/crud_ci/crud/multi_user'>" +
    "<label>Nombre</label><input type='text' name='nombre' class='nombre' value='" + nombre + "' id='nombre' /><br/>" +
    "<input type='hidden' name='id' class='id' id='id' value=" + id + ">" +
    "<label>Email</label><input type='email' name='email' class='email' value='" + email + "' id='email' /><br/>" +
    "</form><div class='respuesta'></div></div>").dialog({
      resizable: false,
      title: 'Editar usuario.',
      height: 300,
      width: 450,
      modal: true,
      buttons: {
        "Editar": function () {
          $.ajax({
            url: $('#edit').attr("action"),
            type: $('#edit').attr("method"),
            data: $('#edit').serialize(),
            success: function (data) {
              var obj = JSON.parse(data);
              if (obj.respuesta == 'error')
              {
                $(".respuesta").html(obj.nombre + '<br />' + obj.email);
                return false;
              } else {
                $('.edit_modal').dialog("close");
                $("<div class='edit_modal'>El usuario fué editado correctamente</div>").dialog({
                  resizable: false,
                  title: 'Usuario editado.',
                  height: 200,
                  width: 450,
                  modal: true
                });
                setTimeout(function () {
                  window.location.href = "http://localhost/crud_ci/crud";
                }, 2000);
              }
            }, error: function (error) {
              $('.edit_modal').dialog("close");
              $("<div class='edit_modal'>Ha ocurrido un error!</div>").dialog({
                resizable: false,
                title: 'Error editando!.',
                height: 200,
                width: 450,
                modal: true
              });
            }
          });
          return false;
        },
        Cancelar: function () {
          $(this).dialog("close");
        }
      }
    });
  });
  //eliminamos datos del usuario
  $(".eliminar").on('click', function () {
    var id = $(this).attr('id');
    var nombre = $("#nombre" + id).html();
    $("<div class='delete_modal'>¡Estás seguro que deseas eliminar al usuario " + nombre + "?</div>").dialog({
      resizable: false,
      title: 'Eliminar al usuario ' + nombre + '.',
      height: 200,
      width: 450,
      modal: true,
      buttons: {
        "Eliminar": function () {
          $.ajax({
            type: 'POST',
            url: 'http://localhost/crud_ci/crud/delete_user',
            async: true,
            data: {id: id},
            complete: function () {
              $('.delete_modal').dialog("close");
              $("<div class='delete_modal'>El usuario " + nombre + " fué eliminado correctamente</div>").dialog({
                resizable: false,
                title: 'Usuario eliminado.',
                height: 200,
                width: 450,
                modal: true
              });

              setTimeout(function () {
                window.location.href = "http://localhost/crud_ci/crud";
              }, 2000);

            }, error: function (error) {

              $('.delete_modal').dialog("close");
              $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                resizable: false,
                title: 'Error eliminando al usuario!.',
                height: 200,
                width: 550,
                modal: true

              });

            }

          });
          return false;
        },
        Cancelar: function () {
          $(this).dialog("close");
        }
      }
    });
  });

  //añadimos usuarios nuevos
  $(".agregar").on('click', function () {

    var id = $(this).attr('id');

    var nombre = $("#nombre" + id).html();

    $("<div class='insert_modal'><form name='insert' id='insert' method='post' action='http://localhost/crud_ci/crud/multi_user'>" +
    "<label>Nombre</label><input type='text' name='nombre' class='nombre' id='nombre' /><br/>" +
    "<label>Email</label><input type='email' name='email' class='email' id='email' /><br/>" +
    "</form><div class='respuesta'></div></div>").dialog({
      resizable: false,
      title: 'Añadir nuevo usuario.',
      height: 300,
      width: 450,
      modal: true,
      buttons: {
        "Insertar": function () {
          $.ajax({
            url: $('#insert').attr("action"),
            type: $('#insert').attr("method"),
            data: $('#insert').serialize(),
            success: function (data) {

              var obj = JSON.parse(data);

              if (obj.respuesta == 'error')
              {

                $(".respuesta").html(obj.nombre + '<br />' + obj.email);
                return false;

              } else {

                $('.insert_modal').dialog("close");
                $("<div class='insert_modal'>El usuario fué añadido correctamente</div>").dialog({
                  resizable: false,
                  title: 'Usuario añadido.',
                  height: 200,
                  width: 450,
                  modal: true
                });
                setTimeout(function () {
                  window.location.href = "http://localhost/crud_ci/crud";
                }, 2000);
              }

            }, error: function (error) {
              $('.insert_modal').dialog("close");
              $("<div class='insert_modal'>Ha ocurrido un error!</div>").dialog({
                resizable: false,
                title: 'Error añadiendo!.',
                height: 200,
                width: 450,
                modal: true
              });
            }
          });
          return false;
        },
        Cancelar: function () {
          $(this).dialog("close");
        }
      }
    });
  });

  $('a.detalles_anteproyecto').click(function () {
    var nombre_proyecto = $(this).attr('nombre_proyecto'),
    residentes = $(this).attr('resid_req'),
    lugares = $(this).attr('lugares_disponibles'),
    banco = $(this).attr('banco'),
    aprobado = $(this).attr('aprobado'),
    titulacion = $(this).attr('titulacion'),
    departamento = $(this).attr('departamento'),
    pos_asesor = $(this).attr('pos_asesor'),
    fecha = $(this).attr('fecha_alta'),
    nombre_empresa = $(this).attr('nombre_empresa'),
    tel = $(this).attr('tel'),
    sector = $(this).attr('sector'),
    domicilio = $(this).attr('domicilio'),
    colonia = $(this).attr('colonia'),
    ciudad = $(this).attr('ciudad'),
    codigo_postal = $(this).attr('codigo_postal');
    if (banco) {
      banco = 'No';
    } else {
      banco = 'Si';
    }
    if (titulacion) {
      titulacion = 'Si';
    } else {
      titulacion = 'No';
    }
    if (aprobado) {
      aprobado = 'Si';
    } else {
      aprobado = 'No';
    }

    $("#modal_detalles_anteproyecto .modal-content").
    html('\
    <div class=\"flow-text\">\n\
    <div class=\"header center-align amber-text\"><h4>DETALLES DEL ANTEPROYECTO</h4></div>\n\
    Nombre del anteproyecto: ' + nombre_proyecto + '\n\
    <br>\n\
    Residentes requeridos: ' + residentes + '\n\
    <br>\n\
    Lugares disponibles: ' + lugares + '\n\
    <br>\n\
    Aprobado: ' + aprobado + '\n\
    <br>\n\
    Opcion para titulación: ' + titulacion + '\n\
    <br>\n\
    Departamento del anteproyecto: ' + departamento + '\n\
    <br>\n\
    Propuesta de alumno: ' + banco + '\n\
    <br>\n\
    Posible asesor: ' + pos_asesor + '\n\
    <br>\n\
    Fecha de alta: ' + fecha + '\n\
    <br>\n\
    Nombre de la empresa: ' + nombre_empresa + '\n\
    <br>\n\
    Teléfono: ' + tel + '\n\
    <br>\n\
    Sector: ' + sector + '\n\
    <br>\n\
    Domicilio: ' + domicilio + '\n\
    <br>\n\
    Colonia: ' + colonia + '\n\
    <br>\n\
    Ciudad: ' + ciudad + '\n\
    <br>\n\
    Código postal: ' + codigo_postal + '\n\
    <br>\n\
    </div>'
  );


  $("#modal_detalles_anteproyecto").openModal();
});

$('a.detalles_empresa').click(function () {
  var id = $(this).attr('data-id'),
  nombre_empresa = $(this).attr('empresa'),
  tel = $(this).attr('tel'),
  sector = $(this).attr('sector'),
  rfc = $(this).attr('rfc'),
  domicilio = $(this).attr('domicilio'),
  colonia = $(this).attr('colonia'),
  ciudad = $(this).attr('ciudad'),
  codigo_postal = $(this).attr('codigo_postal'),
  titular = $(this).attr('titular'),
  puesto = $(this).attr('puesto'),
  fecha = $(this).attr('fecha_alta');

  $("#modal_detalles_empresa .modal-content").
  html('\
  <div class=\"flow-text\">\n\
  <div class=\"header center-align amber-text\"><h4>DETALLES DE LA EMPRESA</h4></div>\n\
  Nombre de la empresa: ' + nombre_empresa + '\n\
  <br>\n\
  Teléfono: ' + tel + '\n\
  <br>\n\
  Sector: ' + sector + '\n\
  <br>\n\
  RFC: ' + rfc + '\n\
  <br>\n\
  Domicilio: ' + domicilio + '\n\
  <br>\n\
  Colonia: ' + colonia + '\n\
  <br>\n\
  Ciudad: ' + ciudad + '\n\
  <br>\n\
  Código postal: ' + codigo_postal + '\n\
  <br>\n\
  Titular de la empresa: ' + titular + '\n\
  <br>\n\
  Puesto: ' + puesto + '\n\
  <br>\n\
  Fecha de alta: ' + fecha + '\
  <br>\n\
  </div>'
);


$("#modal_detalles_empresa").openModal();
});

$('a.detalles_anteproyecto').click(function () {
  var nombre_proyecto = $(this).attr('nombre_proyecto'),
  residentes = $(this).attr('resid_req'),
  lugares = $(this).attr('lugares_disponibles'),
  banco = $(this).attr('banco'),
  aprobado = $(this).attr('aprobado'),
  titulacion = $(this).attr('titulacion'),
  departamento = $(this).attr('departamento'),
  pos_asesor = $(this).attr('pos_asesor'),
  fecha = $(this).attr('fecha_alta'),
  nombre_empresa = $(this).attr('nombre_empresa'),
  tel = $(this).attr('tel'),
  sector = $(this).attr('sector'),
  domicilio = $(this).attr('domicilio'),
  colonia = $(this).attr('colonia'),
  ciudad = $(this).attr('ciudad'),
  codigo_postal = $(this).attr('codigo_postal');
  if (banco) {
    banco = 'No';
  } else {
    banco = 'Si';
  }
  if (titulacion) {
    titulacion = 'Si';
  } else {
    titulacion = 'No';
  }
  if (aprobado) {
    aprobado = 'Si';
  } else {
    aprobado = 'No';
  }

  $("#modal_detalles_anteproyecto .modal-content").
  html('\
  <div class=\"flow-text\">\n\
  <div class=\"header center-align amber-text\"><h4>DETALLES DEL ANTEPROYECTO</h4></div>\n\
  Nombre del anteproyecto: ' + nombre_proyecto + '\n\
  <br>\n\
  Residentes requeridos: ' + residentes + '\n\
  <br>\n\
  Lugares disponibles: ' + lugares + '\n\
  <br>\n\
  Aprobado: ' + aprobado + '\n\
  <br>\n\
  Opcion para titulación: ' + titulacion + '\n\
  <br>\n\
  Departamento del anteproyecto: ' + departamento + '\n\
  <br>\n\
  Propuesta de alumno: ' + banco + '\n\
  <br>\n\
  Posible asesor: ' + pos_asesor + '\n\
  <br>\n\
  Fecha de alta: ' + fecha + '\n\
  <br>\n\
  Nombre de la empresa: ' + nombre_empresa + '\n\
  <br>\n\
  Teléfono: ' + tel + '\n\
  <br>\n\
  Sector: ' + sector + '\n\
  <br>\n\
  Domicilio: ' + domicilio + '\n\
  <br>\n\
  Colonia: ' + colonia + '\n\
  <br>\n\
  Ciudad: ' + ciudad + '\n\
  <br>\n\
  Código postal: ' + codigo_postal + '\n\
  <br>\n\
  </div>'
);


$("#modal_detalles_anteproyecto").openModal();
});

$('#asesor').click(function () {
  $('#rfc_asesor').attr('bandera', '1');
  $('#rfc_revisor1').attr('bandera', '0');
  $('#rfc_revisor2').attr('bandera', '0');
});
$('#asesor-2').click(function () {
  $('#rfc_asesor').attr('bandera', '1');
  $('#rfc_revisor1').attr('bandera', '0');
  $('#rfc_revisor2').attr('bandera', '0');
});
$('#revisor1').click(function () {
  $('#rfc_asesor').attr('bandera', '0');
  $('#rfc_revisor1').attr('bandera', '1');
  $('#rfc_revisor2').attr('bandera', '0');
  //        alert('asesor: ' + $('#rfc_asesor').attr('bandera') + ' Revisor1: ' +
  //            $('#rfc_revisor1').attr('bandera') + ' Revisor2: ' +
  //            $('#rfc_revisor2').attr('bandera'));
});
$('#revisor1-2').click(function () {
  $('#rfc_asesor').attr('bandera', '0');
  $('#rfc_revisor1').attr('bandera', '1');
  $('#rfc_revisor2').attr('bandera', '0');
  //        alert('asesor: ' + $('#rfc_asesor').attr('bandera') + ' Revisor1: ' +
  //            $('#rfc_revisor1').attr('bandera') + ' Revisor2: ' +
  //            $('#rfc_revisor2').attr('bandera'));
});
$('#revisor2').click(function () {
  $('#rfc_asesor').attr('bandera', '0');
  $('#rfc_revisor1').attr('bandera', '0');
  $('#rfc_revisor2').attr('bandera', '1');
});
$('#revisor2-2').click(function () {
  $('#rfc_asesor').attr('bandera', '0');
  $('#rfc_revisor1').attr('bandera', '0');
  $('#rfc_revisor2').attr('bandera', '1');
});

//    $('#btn_asignar').click(function () {
//        if ($('#rfc_asesor').attr('value') != '' && $('#rfc_revisor1').attr('value') != ''
//                && $('#rfc_revisor2').attr('value') != '' && valida_ae()) {
//            jQuery.ajax({
//                type: "POST",
//                url: $('btn_asignar').attr('b'),
//                dataType: 'json',
//                data: {id_participantes: $('id_participantes').attr('value')},
//                success: function (res) {
//                    if (res.respuesta)
//                    {
//                        // var a = jQuery.parseJSON(res.responseText);
//                        alert('El alumno ya tiene asesor y revisores asignados.');
//                    } else {
//                        alert('FALSE');
//                        //$('#frm_asignar').submit();
//                    }
//                },
//                error: function (XMLHttpRequest, textStatus, errorThrown) {
//                    alert(errorThrown);
//                }
//            });
//
//        } else {
//            alert('No ha asignado algún asesor o revisor.');
//        }
//    });

$('#cancelar_asignacion').click(function () {
  $('#rfc_asesor').attr('value', '');
  $('#rfc_revisor1').attr('value', '');
  $('#rfc_revisor2').attr('value', '');

  $('#rfc_asesor').attr('bandera', '0');
  $('#rfc_revisor1').attr('bandera', '0');
  $('#rfc_revisor2').attr('bandera', '0');

  $('#rfc_asesor').attr('nombres', '');
  $('#rfc_revisor1').attr('nombres', '');
  $('#rfc_revisor2').attr('nombres', '');

  $('#id_empresa').attr('value', '');
  $('#id_anteproyecto').attr('value', '');
  $('#nombre_asesore').attr('value', '');
  $('#area_ae').attr('value', '');
  $('#correo_ae').attr('value', '');
  $('#puesto_ae').attr('value', '');

  $('#a').html('Sin asesor');
  $('#r1').html('Sin revisor');
  $('#r2').html('Sin revisor');
  $('#ae').html('Sin asesor');
});

$('#aceptar_modal_asig_ae').click(function () {
  $('#id_empresa').attr('value', $('#id_empresa_modal').val());
  $('#id_anteproyecto').attr('value', $('#id_anteproyecto_modal').val());
  $('#nombre_asesore').attr('value', $('#nombre_ae_modal').val());
  $('#area_ae').attr('value', $('#area_modal').val());
  $('#correo_ae').attr('value', $('#email_ae_modal').val());
  $('#puesto_ae').attr('value', $('#puesto_modal').val());
  $('#ae').html($('#nombre_asesore').attr('value'));
  if (valida_ae()) {
    $('#modal_asignar_asesorE').closeModal();
  } else {
    alert('Llene todos los campos.');
  }

});

});
// Initialize collapse button
$(".button-collapse").sideNav();
// Initialize collapsible (uncomment the line below if you use the dropdown variation)
//$('.collapsible').collapsible();
function aceptar_rechazar_solicitud(nc, ida, e, b) {

  $('#nc').attr('value', nc + '  ');
  $('#id_anteproyecto').attr('value', ida);
  $('#estado').attr('value', e);
  $('#banco').attr('value', b);
  //alert($('#banco').attr('value'));
  $('#solicitud').submit();
}

function asignar_asesor_revisores(rfc, nombres) {
  //alert(rfc);
  if ($('#rfc_asesor').attr('bandera') === '1') {
    if ($('#rfc_revisor1').attr('value')!=rfc && $('#rfc_revisor2').attr('value')!=rfc) {
      $('#rfc_asesor').attr('value', rfc);
      $('#rfc_asesor').attr('nombres', nombres);
      $('#a').html($('#rfc_asesor').attr('nombres'));
    }else{
      alert("ERROR docente  ya selecionado.")
    }
  }
  else if ($('#rfc_revisor1').attr('bandera') === '1') {
    if ($('#rfc_asesor').attr('value')!=rfc && $('#rfc_revisor1').attr('value')!=rfc) {
      $('#rfc_revisor1').attr('value', rfc);
      $('#rfc_revisor1').attr('nombres', nombres);
      $('#r1').html($('#rfc_revisor1').attr('nombres'));
    }else {
      alert("ERROR docente ya selecionado.")
    }
  } else {
    if ($('#rfc_asesor').attr('value')!=rfc && $('#rfc_revisor2').attr('value')!=rfc) {
      $('#rfc_revisor2').attr('value', rfc);
      $('#rfc_revisor2').attr('nombres', nombres);
      $('#r2').html($('#rfc_revisor2').attr('nombres'));
    }
    else {
      alert("ERROR docente ya selecionado.")
    }
  }
  $("#modal_seleccionar_asesor-revisores").closeModal();
  $("#modal_seleccionar_asesor-revisores2").closeModal();
  //    alert('asesor: ' + $('#rfc_asesor').attr('value') + ' Revisor1: ' +
  //            $('#rfc_revisor1').attr('value') + ' Revisor2: ' +
  //            $('#rfc_revisor2').attr('value'));
}

function valida_ae() {
  if ($('#id_empresa').attr('value') != '' && $('#id_anteproyecto').attr('value') != '' &&
  $('#nombre_asesore').attr('value') != '' && $('#correo_ae').attr('value') != '' &&
  $('#puesto_ae').attr('value') != '' && $('#area_ae').attr('value') != '') {
    return true;
  }
  return false;
}
function actualizar_info_docente(rfc, esp, disp) {
  $('#rfc').attr('value', rfc);
  $('#especialidad').attr('value', rfc);
}

function mostrar_vacantes(nombre_empresa, domicilio, nombre_contacto, correo_contacto, proyecto_a_desarrollar, horario_atencion, carreras, fecha_vacante) {
  $("#modal_detalles_vacantes .modal-content").
  html('\
  <div class=\"flow-text\">\n\
  <div class=\"header center-align amber-text\"><h4>DETALLES DE LA EMPRESA</h4></div>\n\
  Nombre de la empresa: ' + nombre_empresa + '\n\
  <br>\n\
  Domicilio: ' + domicilio + '\n\
  <br>\n\
  Nombre del contacto: ' + nombre_contacto + '\n\
  <br>\n\
  Correo del contacto: ' + correo_contacto + '\n\
  <br>\n\
  Proyecto a desarrollar: ' + proyecto_a_desarrollar + '\n\
  <br>\n\
  Horario de atención: ' + horario_atencion + '\n\
  <br>\n\
  Departamento: ' + carreras + '\n\
  <br>\n\
  Fecha de la vacante: ' + fecha_vacante + '\n\
  <br>\n\
  </div>'
);
$("#modal_detalles_vacantes").openModal();
}
function btn_asignar(idp, base) {
  /*if ($('#rfc_asesor').attr('value') != '' && $('#rfc_revisor1').attr('value') != ''
  && $('#rfc_revisor2').attr('value') != '' && valida_ae()) {*/
  if ($('#rfc_asesor').attr('value') != '' && valida_ae()) {
    jQuery.ajax({
      type: "POST",
      url: base + 'index.php/Residencia/c_asignar_asesor/tiene_asesor/',
      dataType: 'json',
      data: {id_participantes: idp},
      success: function (res) {
        if (res.respuesta)
        {
          alert('El alumno ya tiene asesor y revisores asignados.');
        } else {
          $('#frm_asignar').submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
  } else {
    alert('No ha asignado algún asesor o revisor.');
  }
}
