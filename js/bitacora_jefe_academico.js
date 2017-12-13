function saltoDelineaAchivos(cadena) {
  var resultado = '';
  while (cadena.length > 0) {
    resultado += cadena.substring(0, 15) + '<br>';
    cadena = cadena.substring(15);
  }
  return resultado;
}
$(document).ready(function () {
  $('#btn_sel_residente').click(function () {
    var options = {
      beforeSend: function ()
      {
        //beforeSend : this function called before form submission
      },
      uploadProgress: function (event, position, total, percentComplete)
      {
        //uploadProgress : this function called when the upload is in progress
      },
      success: function ()
      {
        //success : this function is called when the form upload is successful.
      },
      complete: function (response)
      {
        //complete: this function is called when the form upload is completed.  //
        $('#info').attr('hidden', false);
        var a = jQuery.parseJSON(response.responseText);
        //info alumno
        $('#nombre').html(a.info_residente[0].nombre);
        $('#num_con').html(a.info_residente[0].numero_control);
        $('#carrera').html(a.info_residente[0].carrera);
        $('#semestre').html(a.info_residente[0].semestre_cursado);
        $('#tel').html(a.info_residente[0].telefono);
        $('#correo').html(a.info_residente[0].correo);
        $('#dom').html(a.info_residente[0].domicilio);

        //info proyecto
        $('#np').html(a.info_residente[0].nombre_proyecto);
        $('#empresa').html(a.info_residente[0].nombre_empresa);
        $('#dep').html(a.info_residente[0].departamento_anteproyecto);
        //dictamen
        if (a.dictamen[0].jefe_academico == 't') {
          //$('#autorizacion_dictamen').attr('checked', 'checked');
          $('#estado_dictamen').val(true);
          $('#autorizacion_dictamen').prop("checked", true);
        } else {
          //$('#autorizacion_dictamen').removeAttr('checked');
            $('#estado_dictamen').val(false);
          $('#autorizacion_dictamen').prop("checked", false);
        }


        $('#participantes_id').attr('value', a.info_residente[0].id);
        $('#anteproyecto_id').attr('value', a.info_residente[0].anteproyecto_pk);
        $('#nc').attr('value', a.info_residente[0].numero_control);
        $('#asesor_id').attr('value', a.info_residente[0].asesor);
        $('#revisor1_id').attr('value', a.info_residente[0].revisor1);
        $('#revisor2_id').attr('value', a.info_residente[0].revisor2);
        $('#asesore_id').attr('value', a.info_residente[0].asesor_externo);
        //                alert($('#participantes_id').attr('value') + '&' +
        //                        $('#anteproyecto_id').attr('value') + '&' +
        //                        $('#nc').attr('value') + '&' +
        //                        $('#asesor_id').attr('value') + '&' +
        //                        $('#revisor1_id').attr('value') + '&' +
        //                        $('#revisor2_id').attr('value') + '&' +
        //                        $('#asesore_id').attr('value'));

        if (a.info_residente[0].banco == 't') {
          $('#origen').html('Banco de proyectos');
        } else {
          $('#origen').html('Propuesta de residente');
        }
        if (a.info_residente[0].titulacion == 't') {
          $('#tit').html('Si');
        } else {
          $('#tit').html('No');
        }

        if (a.dictamen[0].doc_finales == 't') {
          $('#dic').attr('hidden', false);
          $('#documentosR').html('Si');
        } else {
          $('#dic').attr('hidden', true);
        }

        $('#progreso').attr('hidden', false);
        var avance = ['Selección de anteproyecto', 'Validación de solicitud de residencia',
        'Validación de anteproyecto', 'Revisiones parciales',
        'Reporte final', 'Liberación residencia'];
        $('#steps1').html('');
        $('#steps2').html('');
        $('#steps3').html('');
        if ((a.avance[0].estado - 1) >= 2) {
          $('#steps2').append('<div class="step done col s3 m6 l12" data-desc="Residencia profesional">4</div>');

        } else {
          $('#steps2').append('<div class="step active col s3 m6 l12" data-desc="Residencia profesional">4</div>');
        }
        for (var i = 0, max = 6; i < max; i++) {
          var tmp = '';
          if (i <= a.avance[0].estado - 1) {
            tmp = '<div class="step done col s3 m6 l12" data-desc="' + avance[i] + '">';
          } else {
            tmp = '<div class="step active col s3 m6 l12" data-desc="' + avance[i] + '">';
          }
          if (i < 3) {
            $('#steps1').append(tmp + (i + 1) + '</div>');
          } else if (i < 5) {
            $('#steps2').append(tmp + (i + 2) + '</div>');
          } else {
            $('#steps3').append(tmp + (i + 2) + '</div>');
          }
        }

        $('#a_residente').attr('hidden', false);
        $('#a_ase').attr('hidden', false);
        $('#a_rev_ase').attr('hidden', false);

        var trHTML = '';

        $.each(a.archivos_asesor, function (i, item) {
          trHTML += '<tr><td>' + a.archivos_asesor[i].nombre_archivo +
          '</td><td>' + a.archivos_asesor[i].descripcion_archivo +
          '</td><td>' + tipo_documento_asesor(a.archivos_asesor[i].tipo_documento) +
          '</td><td>' + a.archivos_asesor[i].fecha_guardado_documento +
          '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_asesor[i].ruta_archivo_asesor + '"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
          '</td></tr>';
        });

        $('#a_ase tbody').html(trHTML);

        trHTML = '';
        $.each(a.archivos_residente, function (i, item) {
          trHTML += '<tr><td>' + saltoDelineaAchivos(a.archivos_residente[i].nombre_archivo) +
          '</td><td>' + a.archivos_residente[i].descripcion_archivo +
          '</td><td>' + tipo_documento_residente(a.archivos_residente[i].tipo_documento) +
          '</td><td>' + estado(a.archivos_residente[i].estado) +
          '</td><td>' + a.archivos_residente[i].fecha_guardado_documento +
          '</td><td>' + a.archivos_residente[i].fecha_limite_revision +
          '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_residente[i].ruta_archivo + '"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
          '</td></tr>';
        });
        $('#a_residente tbody').html(trHTML);

        trHTML = '';
        $.each(a.archivos_revision_asesor, function (i, item) {
          trHTML += '<tr><td>' + saltoDelineaAchivos(a.archivos_revision_asesor[i].nombre_archivo) +
          '</td><td>' + a.archivos_revision_asesor[i].descripcion_archivo +
          '</td><td>' + tipo_documento_asesor(a.archivos_revision_asesor[i].tipo_documento) +
          '</td><td>' + a.archivos_revision_asesor[i].fecha_guardado_documento +
          '</td><td>' + saltoDelineaAchivos(a.archivos_revision_asesor[i].nombre_archivo_alumno) +
          '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_revision_asesor[i].ruta_archivo_asesor + '"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
          '</td></tr>';
        });
        $('#a_rev_ase tbody').html(trHTML);

        $('#id_opciones').attr('hidden', false);
        //alert(a.base_url);
      },
      error: function ()
      {
        alert('Error');
      }
    };
    $("#frm_sel_residente").ajaxForm(options);
  });
  $('#btn_sel_residente2').click(function () {
    var options = {
      beforeSend: function ()
      {
        //beforeSend : this function called before form submission
      },
      uploadProgress: function (event, position, total, percentComplete)
      {
        //uploadProgress : this function called when the upload is in progress
      },
      success: function ()
      {
        //success : this function is called when the form upload is successful.
      },
      complete: function (response)
      {
        //complete: this function is called when the form upload is completed.  //
        try {
          $('#info').attr('hidden', false);
          var a= jQuery.parseJSON(response.responseText);
          //info alumno
          $('#nombre').html(a.info_residente[0].nombre);
          $('#num_con').html(a.info_residente[0].numero_control);
          $('#carrera').html(a.info_residente[0].carrera);
          $('#semestre').html(a.info_residente[0].semestre_cursado);
          $('#tel').html(a.info_residente[0].telefono);
          $('#correo').html(a.info_residente[0].correo);
          $('#dom').html(a.info_residente[0].domicilio);

          //info proyecto
          $('#np').html(a.info_residente[0].nombre_proyecto);
          $('#empresa').html(a.info_residente[0].nombre_empresa);
          $('#dep').html(a.info_residente[0].departamento_anteproyecto);
          //dictamen
          if (a.dictamen[0].jefe_academico == 't') {
            //$('#autorizacion_dictamen').attr('checked', 'checked');
              $('#estado_dictamen').val(true);
            $('#autorizacion_dictamen').prop("checked", true);
          } else {
            //$('#autorizacion_dictamen').removeAttr('checked');
                $('#estado_dictamen').val(false);
            $('#autorizacion_dictamen').prop("checked", false);
          }


          $('#participantes_id').attr('value', a.info_residente[0].id);
          $('#anteproyecto_id').attr('value', a.info_residente[0].anteproyecto_pk);
          $('#nc').attr('value', a.info_residente[0].numero_control);
          $('#asesor_id').attr('value', a.info_residente[0].asesor);
          $('#revisor1_id').attr('value', a.info_residente[0].revisor1);
          $('#revisor2_id').attr('value', a.info_residente[0].revisor2);
          $('#asesore_id').attr('value', a.info_residente[0].asesor_externo);
          //                alert($('#participantes_id').attr('value') + '&' +
          //                        $('#anteproyecto_id').attr('value') + '&' +
          //                        $('#nc').attr('value') + '&' +
          //                        $('#asesor_id').attr('value') + '&' +
          //                        $('#revisor1_id').attr('value') + '&' +
          //                        $('#revisor2_id').attr('value') + '&' +
          //                        $('#asesore_id').attr('value'));

          if (a.info_residente[0].banco == 't') {
            $('#origen').html('Banco de proyectos');
          } else {
            $('#origen').html('Propuesta de residente');
          }
          if (a.info_residente[0].titulacion == 't') {
            $('#tit').html('Si');
          } else {
            $('#tit').html('No');
          }

          if (a.dictamen[0].doc_finales == 't') {
            $('#dic').attr('hidden', false);
            $('#documentosR').html('Si');
          } else {
            $('#dic').attr('hidden', true);
          }

          $('#progreso').attr('hidden', false);
          var avance = ['Selección de anteproyecto', 'Validación de solicitud de residencia',
          'Validación de anteproyecto', 'Revisiones parciales',
          'Reporte final', 'Liberación residencia'];
          $('#steps1').html('');
          $('#steps2').html('');
          $('#steps3').html('');
          if ((a.avance[0].estado - 1) >= 2) {
            $('#steps2').append('<div class="step done col s3 m6 l12" data-desc="Residencia profesional">4</div>');

          } else {
            $('#steps2').append('<div class="step active col s3 m6 l12" data-desc="Residencia profesional">4</div>');
          }
          for (var i = 0, max = 6; i < max; i++) {
            var tmp = '';
            if (i <= a.avance[0].estado - 1) {
              tmp = '<div class="step done col s3 m6 l12" data-desc="' + avance[i] + '">';
            } else {
              tmp = '<div class="step active col s3 m6 l12" data-desc="' + avance[i] + '">';
            }
            if (i < 3) {
              $('#steps1').append(tmp + (i + 1) + '</div>');
            } else if (i < 5) {
              $('#steps2').append(tmp + (i + 2) + '</div>');
            } else {
              $('#steps3').append(tmp + (i + 2) + '</div>');
            }
          }

          $('#a_residente').attr('hidden', false);
          $('#a_ase').attr('hidden', false);
          $('#a_rev_ase').attr('hidden', false);

          var trHTML = '';
          $.each(a.archivos_asesor, function (i, item) {
            trHTML += '<tr><td>' +  saltoDelineaAchivos(a.archivos_asesor[i].nombre_archivo) +
            '</td><td>' + a.archivos_asesor[i].descripcion_archivo +
            '</td><td>' + tipo_documento_asesor(a.archivos_asesor[i].tipo_documento) +
            '</td><td>' + a.archivos_asesor[i].fecha_guardado_documento +
            '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_asesor[i].ruta_archivo_asesor + '"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
            '</td></tr>';
          });
          $('#a_ase tbody').html(trHTML);
          trHTML = '';
          $.each(a.archivos_residente, function (i, item) {

            trHTML += '<tr><td>' +  saltoDelineaAchivos(a.archivos_residente[i].nombre_archivo) +
            '</td><td>' + a.archivos_residente[i].descripcion_archivo +
            '</td><td>' + tipo_documento_residente(a.archivos_residente[i].tipo_documento) +
            '</td><td>' + estado(a.archivos_residente[i].estado) +
            '</td><td>' + a.archivos_residente[i].fecha_guardado_documento +
            '</td><td>' + a.archivos_residente[i].fecha_limite_revision +
            '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_residente[i].ruta_archivo + '"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
            '</td></tr>';
          });
          $('#a_residente tbody').html(trHTML);

          trHTML = '';
          $.each(a.archivos_revision_asesor, function (i, item) {
            trHTML += '<tr><td>' +  saltoDelineaAchivos(a.archivos_revision_asesor[i].nombre_archivo) +
            '</td><td>' + a.archivos_revision_asesor[i].descripcion_archivo +
            '</td><td>' + tipo_documento_asesor(a.archivos_revision_asesor[i].tipo_documento) +
            '</td><td>' + a.archivos_revision_asesor[i].fecha_guardado_documento +
            '</td><td>' +  saltoDelineaAchivos(a.archivos_revision_asesor[i].nombre_archivo_alumno) +
            '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_revision_asesor[i].ruta_archivo_asesor + '"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
            '</td></tr>';
          });
          $('#a_rev_ase tbody').html(trHTML);
          $('#id_opciones').attr('hidden', false);
          //alert(a.base_url);
        }
        catch(err) {
          $('#info').attr('hidden', true);
          $('#dic').attr('hidden', true);
          $('#a_residente').attr('hidden', true);
          $('#a_ase').attr('hidden', true);
          $('#a_rev_ase').attr('hidden', true);
          $('#id_opciones').attr('hidden', true);
          $('#progreso').attr('hidden', true);
          alert('Numero de control invalido o no existe residente.');
        }
      },
      error: function ()
      {
        alert('Error');
      }
    };
    $("#frm_sel_residente2").ajaxForm(options);
  });
  $('#cancelar_residencia').click(function () {
    var c = confirm('¿Esta seguro que desea cancelar la residencia profesional?. Esta acción no se podrá deshacer.');
    if (c) {
      //alert('Residencia cancelada');
      $('#frm_cancelar_residencia').submit();
    } else {
      //alert('OK no');
    }
  });

  $('#autorizacion_dictamen').change(function (event) {
    event.preventDefault();
    if ($('#estado_dictamen').val()=="true") {
      $('#autorizacion_dictamen').prop("checked", true);
      alert("NO ES POSIBLE DESAUTORIZAR EL DICTAMEN");
    }else {
      //var titu = $(this).attr('checked');
      var ante_id = $("#anteproyecto_id").val();
      var nc = $("#nc").val();
      if ($(this).is(':checked')) {
        aut = 'TRUE';
      } else {
        aut = 'FALSE';
      }
      var base = $('#anteproyecto_id').attr('base');
      jQuery.ajax({
        type: "POST",
        url: base + "index.php/Residencia/JefeAcademico/c_bitacora_avance_academico/actualizar_dictamen",
        dataType: 'json',
        data: {autorizacion: aut, anteproyecto_id: ante_id, numero_control: nc},
        success: function (res) {
          alert(res.msj);
          $('#estado_dictamen').val(true);
          //alert('Se actualizó la opción de dictamen.');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert(textStatus);
        }
      });
    }
  });
});

function tipo_documento_asesor(documento) {
  var tipo_archivo;
  switch (documento) {
    case 'FRA':
    tipo_archivo = 'Formato de Revisión de Anteproyecto';
    break;
    case 'RAR':
    tipo_archivo = 'Registro Asesoría Residencias Profesionales';
    break;
    case 'FES':
    tipo_archivo = 'Formato de Evaluación y Seguimiento de Residencia';
    break;
    case 'FER':
    tipo_archivo = 'Formato de Evalución de Reporte de Residencia';
    break;
    case 'CLR':
    tipo_archivo = 'Carta de Liberación de Residencia Profesional';
    break;
    case 'R  ':
    tipo_archivo = 'Revisión avance';
    break;
    default:
    tipo_archivo = documento;
    break;
  }
  return tipo_archivo;
}

function tipo_documento_residente(documento) {
  var tipo_archivo;
  switch (documento) {
    case 'A  ':
    tipo_archivo = 'Anteproyecto';
    break;
    case 'R  ':
    tipo_archivo = 'Reporte Parcial';
    break;
    case 'RF ':
    tipo_archivo = 'Reporte Final';
    break;

    default:
    tipo_archivo = documento;
    break;
  }
  return tipo_archivo;
}

function estado(estado) {
  var e;
  switch (estado) {
    case 'A  ':
    e = 'Aprobado';
    break;
    case 'N  ':
    e = 'No aprobado';
    break;
    case 'R  ':
    e = 'Revisado';
    break;
    case 'ER ':
    e = 'En revisión';
    break;
    default:
    e = estado;
    break;
  }
  return e;
}
