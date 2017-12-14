function saltoDelineaAchivos(cadena) {
  var resultado = '';
  while (cadena.length > 0) {
    resultado += cadena.substring(0, 15) + '<br>';
    cadena = cadena.substring(15);
  }
  return resultado;
}
$(document).ready(function () {
  //v_bitacora_avance_asesor
  $('#revision_anteproyecto').click(function () {
    $('#modal_agregar_revision #nombre_archivo_r').html($(this).attr('nombre_archivo'));
    $('#modal_agregar_revision #id_archivo_alu').attr('value', $(this).attr('id_archivo_alumno'));
    $('#modal_agregar_revision #id_asesor').attr('value', $(this).attr('id_asesor'));
    //$('#modal_agregar_revision #descripcion_archivo_revision').attr('value', '');
    switch ($(this).attr('tipo_doc')) {
      case 'A  '://ANTEPROYECTO
      $('#modal_agregar_revision #estado_a').attr('hidden', false);
      $('#modal_agregar_revision #lbl_adj_archivo').html('Adjuntar Formato de Revisión de Anteproyecto');
      $('#modal_agregar_revision #descargar_formato').html('Descargar Formato de Revisión de Anteproyecto<img src="' + $(this).attr('base') + 'images/download_tiny.png">');
      $('#modal_agregar_revision #descargar_formato').attr('href', $(this).attr('base') + '');//AGREGAR RUTA DE LOS FORMATOS
      $('#modal_agregar_revision #tipo_documento_revision').attr('value', 'FRA');
      switch ($(this).attr('estado')) {
        case 'A  '://Aprobado
        $('#modal_agregar_revision #estado_anteproyecto #A').attr('selected', true);
        $('#modal_agregar_revision #estado_anteproyecto #N').attr('selected', false);
        break;
        case 'R  '://Rechazado
        $('#modal_agregar_revision #estado_anteproyecto #N').attr('selected', true);
        $('#modal_agregar_revision #estado_anteproyecto #A').attr('selected', false);
        break;
        //                case 'ER '://En revision
        //                    $('#modal_agregar_revision #estado_anteproyecto #A').attr('selected', true);
        //                    break;
        default:

        break;
      }
      break;
      case 'R  '://REPORTE
      $('#modal_agregar_revision #estado_a').attr('hidden', true);
      $('#modal_agregar_revision #lbl_adj_archivo').html('Adjuntar archivo de revisión');
      $('#modal_agregar_revision #descargar_formato').attr('hidden', true);
      $('#modal_agregar_revision #tipo_documento_revision').attr('value', 'R  ');
      break;
      case 'RF '://REPORTE FINAL
      $('#modal_agregar_revision #estado_a').attr('hidden', true);
      $('#modal_agregar_revision #lbl_adj_archivo').html('Adjuntar Formato de Evaluación de Reporte de Residencia');
      $('#modal_agregar_revision #descargar_formato').html('Descargar Formato de Evaluación de Reporte de Residencia<img src="' + $(this).attr('base') + 'images/download_tiny.png">');
      $('#modal_agregar_revision #descargar_formato').attr('href', $(this).attr('base') + 'uploads/docentes/Formato_seguimiento_de_revisión.docx');//AGREGAR RUTA DE LOS FORMTATOS
      $('#modal_agregar_revision #tipo_documento_revision').attr('value', 'FER');
      break;
    }
    $('#modal_agregar_revision').openModal();
  });

  $('#titulacion').change(function (event) {
    event.preventDefault();
    //var titu = $(this).attr('checked');
    var ante_id = $("#anteproyecto_id").val();
    if ($(this).is(':checked')) {
      titu = 'TRUE';
    } else {
      titu = 'FALSE';
    }
    var base = $('#anteproyecto_id').attr('base');
    jQuery.ajax({
      type: "POST",
      url: base + "index.php/Residencia/Docente/c_bitacora_avance_docente/actualizar_titulacion",
      dataType: 'json',
      data: {titulacion: titu, anteproyecto_id: ante_id},
      success: function (res) {
        if (res)
        {
          alert('Se actualizó la opción a titulación del proyecto ');
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus);
      }
    });

  });

  $('#btn_sel_asesorado').click(function () {

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
        //complete: this function is called when the form upload is completed.
        //                $('#tipo_documento_revision').attr('value', '');
        //                $('#id_archivo_alu').attr('value', '');
        //                $('#id_asesor').attr('value', '');
        var a = jQuery.parseJSON(response.responseText);
        $('#anteproyecto_id').attr('value', a.info_asesorado[0].anteproyecto_pk);
        $('#anteproyecto_id2').attr('value', a.info_asesorado[0].anteproyecto_pk);
        $('#ncontrol').attr('value', a.info_asesorado[0].numero_control);
        $('#ncontrol2').attr('value', a.info_asesorado[0].numero_control);
        $('#datos').attr('hidden', false);
        //info alumno
        $('#nombre').html(a.info_asesorado[0].nombre);
        $('#nc').html(a.info_asesorado[0].numero_control);
        $('#carrera').html(a.info_asesorado[0].carrera);
        $('#semestre').html(a.info_asesorado[0].semestre_cursado);
        $('#tel').html(a.info_asesorado[0].telefono);
        $('#correo').html(a.info_asesorado[0].correo);
        $('#dom').html(a.info_asesorado[0].domicilio);

        //info proyecto
        $('#nombre_proyecto').html(a.info_asesorado[0].nombre_proyecto);
        $('#nombre_empresa').html(a.info_asesorado[0].nombre_empresa);
        $('#departamento_ante').html(a.info_asesorado[0].departamento_anteproyecto);
        $('#anteproyecto_id').attr('value', a.info_asesorado[0].anteproyecto_pk);

        $('#id_asesor_revisor').attr('value', a.info_asesorado[0].asesor);


        if (a.info_asesorado[0].banco == 't') {
          $('#origen').html('Banco de proyectos');
        } else {
          $('#origen').html('Propuesta de residente');
        }
        if (a.info_asesorado[0].titulacion == 't') {
          //$('#titulacion').attr('checked', 'checked');
          $('#titulacion').prop("checked", true);
        } else {
          $('#titulacion').prop("checked", false);
        }

        $('#avance').attr('hidden', false);
        var avance = ['Selección de anteproyecto', 'Validación de solicitud de residencia',
        'Validación de anteproyecto', 'Revisiones parciales',
        'Reporte final', 'Liberación residencia'];
        $('#steps1').html('');
        $('#steps2').html('');
        $('#steps3').html('');
        if ((a.avance[0].estado - 1) >= 2) {
          $('#steps2').append('<div class="step done col s3 m6 l12" data-desc="Residencia Profesional">4</div>');
        } else {
          $('#steps2').append('<div class="step active col s3 m6 l12" data-desc="Residencia Profesional">4</div>');
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

        $('#doc_asesorado').attr('hidden', false);

        var trHTML = '';
        $.each(a.archivos_residente, function (i, item) {
          var nombrearchivo="";
          if(a.archivos_residente[i].nombre_archivo.length > 15)  nombrearchivo= a.archivos_residente[i].nombre_archivo.substring(0,15);

          trHTML += '<tr><td>' + saltoDelineaAchivos(nombrearchivo) +
          '</td><td>' + tipo_documento_residente(a.archivos_residente[i].tipo_documento) +
          '</td><td>' + estado(a.archivos_residente[i].estado) +
          '</td><td>' + a.archivos_residente[i].fecha_guardado_documento +
          '</td><td>' + a.archivos_residente[i].fecha_limite_revision +
          '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_residente[i].ruta_archivo + '" download target="_blank"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
          '</td><td style="text-align: center;"><a href="#!" onclick="modal_detalles_asesorado(\'' + a.archivos_residente[i].nombre_archivo + '\',\'' + tipo_documento_residente(a.archivos_residente[i].tipo_documento) + '\',\'' + a.archivos_residente[i].descripcion_archivo + '\',\'' + estado(a.archivos_residente[i].estado) + '\',\'' + a.archivos_residente[i].fecha_guardado_documento + '\',\'' + a.archivos_residente[i].fecha_limite_revision + '\',\'' + a.base_url + '' + a.archivos_residente[i].ruta_archivo + '\');"><img src="' + a.base_url + 'images/detalles_tiny.png"></a>' +
          '</td><td style="text-align: center;"><a href="#!" onclick="agregar_revision(\'' + a.archivos_residente[i].nombre_archivo + '\',\'' + a.archivos_residente[i].archivos_pk + '\',\'' + a.id_asesor + '\',\'' + a.archivos_residente[i].tipo_documento + '\',\'' + a.archivos_residente[i].estado + '\',\'' + a.base_url + '\');"><img src="' + a.base_url + 'images/queue_tiny.png"></a>' +
          '</td></tr>';
        });                                                                                                                                                                             //nombre_archivo,id_archivo_alumno,id_asesor,tipo_doc,estado,base/

        $('#tabla_asesorado tbody').html(trHTML);
        $('#btn_agregar_revision').attr('idp', a.id_participantes);
        $('#btn_agregar_revision').attr('base', a.base_url);
        $('#btn_agregar_archivo').attr('idp', a.id_participantes);
        $('#btn_agregar_archivo').attr('base', a.base_url);
        //    console.log("y el avanze?"+a.avance[0].estado );
        if (a.avance[0].estado > 3) {
          $('#doc_rev_ase').attr('hidden', false);
          trHTML = '';
          $.each(a.archivos_revision_asesor, function (i, item) {
            trHTML += '<tr><td>' + saltoDelineaAchivos(a.archivos_revision_asesor[i].nombre_archivo) +
            '</td><td>' + (tipo_documento_asesor(a.archivos_revision_asesor[i].tipo_documento)) +
            '</td><td>' + a.archivos_revision_asesor[i].fecha_guardado_documento +
            '</td><td style="text-align: center;">' + saltoDelineaAchivos(a.archivos_revision_asesor[i].nombre_archivo_alumno) +
            '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_revision_asesor[i].ruta_archivo_asesor + '" download target="_blank"><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
            '</td><td style="text-align: center;"><a href="#!" onclick="modal_detalles_revisiones_asesor(\'' + a.archivos_revision_asesor[i].nombre_archivo + '\',\'' + tipo_documento_asesor(a.archivos_revision_asesor[i].tipo_documento) + '\',\'' + a.archivos_revision_asesor[i].descripcion_archivo + '\',\'' + a.archivos_revision_asesor[i].fecha_guardado_documento + '\',\'' + a.base_url + '' + a.archivos_revision_asesor[i].ruta_archivo_asesor + '\',\'' + a.archivos_revision_asesor[i].nombre_archivo_alumno + '\');"><img src="' + a.base_url + 'images/detalles_tiny.png"></a>' +
            '</td></tr>';
          });
          //
          $('#archivos_rev_asesor tbody').html(trHTML);
          $('#doc_asesor').attr('hidden', false);
          trHTML = '';
          var cantidadarchivos=0;
          $.each(a.archivos_asesor, function (i, item) {
            trHTML += '<tr><td>' + saltoDelineaAchivos(a.archivos_asesor[i].nombre_archivo) +
            '</td><td>' + tipo_documento_asesor(a.archivos_asesor[i].tipo_documento) +
            '</td><td>' + a.archivos_asesor[i].fecha_guardado_documento +
            '</td><td style="text-align: center;"><a href="' + a.base_url + '' + a.archivos_asesor[i].ruta_archivo_asesor + '" target="_blank" download><img src="' + a.base_url + 'images/download_tiny.png"></a>' +
            '</td><td style="text-align: center;"><a href="#!" onclick="modal_detalles_asesor(\'' + a.archivos_asesor[i].nombre_archivo + '\',\'' + tipo_documento_asesor(a.archivos_asesor[i].tipo_documento) + '\',\'' + a.archivos_asesor[i].descripcion_archivo + '\',\'' + a.archivos_asesor[i].fecha_guardado_documento + '\',\'' + a.base_url + '' + a.archivos_asesor[i].ruta_archivo_asesor + '\');"><img src="' + a.base_url + 'images/detalles_tiny.png"></a>' +
            '</td></tr>';
            cantidadarchivos++;
          });
          if(cantidadarchivos>=3){
            $('#panel_archivos').hide();
            $('#panel_archivos2').hide();
          }
          $('#archivosadjuntadoscantidad').val(cantidadarchivos);
          $('#limite_archivos').html("Archivos adjuntados "+cantidadarchivos+" de 3");
          $('#archivos_asesor tbody').html(trHTML);
          //alert(response.responseText);
        } else {
          $('#doc_rev_ase').attr('hidden', true);
          $('#doc_asesor').attr('hidden', true);
        }
      },
      error: function ()
      {
        alert('Error1');
      }
    };
    $("#frm_sel_asesorado").ajaxForm(options);
  });
  $('#btn_agregar_revision').click(function () {
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
        //complete: this function is called when the form upload is completed.
        //                $('#tipo_documento_revision').attr('value', '');
        //                $('#id_archivo_alu').attr('value', '');
        //                $('#id_asesor').attr('value', '');
        $('#userfile').val('');
        $('#descripcion_archivo_revision').val('');
        alert(response.responseText);
        //alert($('#btn_agregar_revision').attr('idp'));
        $('#doc_rev_ase').attr('hidden', false);
        $('#doc_asesor').attr('hidden', false);

        recargar_archivos_asesorado($('#btn_agregar_revision').attr('idp'), $('#btn_agregar_revision').attr('base'));
        recargar_archivos_asesor($('#btn_agregar_revision').attr('idp'), $('#btn_agregar_revision').attr('base'));
        recargar_revisiones_asesor($('#btn_agregar_revision').attr('idp'), $('#btn_agregar_revision').attr('base'));
        recargar_avance($('#ncontrol').attr('value'), $('#btn_agregar_revision').attr('base'));
        $('#modal_agregar_revision').closeModal();
      },
      error: function ()
      {
        alert('Error2');
      }
    };

    $("#frm_revision").ajaxForm(options);
  });

  $('#salir_modal_agregar_revision').click(function () {
    $('#modal_agregar_revision #nombre_archivo_r').html('');
    $('#modal_agregar_revision #id_archivo_alu').attr('value', '');
    $('#modal_agregar_revision #id_asesor').attr('value', '');
    $('#modal_agregar_revision #tipo_documento_revision').attr('value', '');
    $('#modal_agregar_revision #userfile').val('');
    $('#descripcion_archivo_revision').val('');

    $('#modal_agregar_revision').closeModal();
  });

  $('#btn_agregar_archivo').click(function () {
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
        //complete: this function is called when the form upload is completed.
        $('#userfile').val('');
        $('#descripcion_archivo').val('');
        alert(response.responseText);
        recargar_archivos_asesor($('#btn_agregar_archivo').attr('idp'), $('#btn_agregar_archivo').attr('base'));
        recargar_avance($('#ncontrol').attr('value'), $('#btn_agregar_archivo').attr('base'));
        $('#modal_adjuntar_archivo_asesor').closeModal();
      },
      error: function ()
      {
        alert('Error3');
      }
    };
    $("#frm_agregar_archivo").ajaxForm(options);
  });
  $('#btn_salir_modal_agregar_archivo').click(function () {
    $('#modal_adjuntar_archivo_asesor #userfile').val('');
    $('#modal_adjuntar_archivo_asesor #descripcion_archivo').val('');
    //$('#modal_adjuntar_archivo_asesor').closeModal();
  });
});
function modal_detalles_asesorado(nombre, tipo_archivo, descripcion, estado, fecha_guardado, fecha_revision, descargar) {

  switch (tipo_archivo) {
    case  'A  ':
    var tipo_archivo = 'Anteproyecto';
    break;
    case 'R  ':
    tipo_archivo = 'Reporte';
    break;
    case 'RF ':
    tipo_archivo = 'Reporte final';
    break;
  }
  switch (estado) {
    case 'A  ':
    estado = 'Aprobado';
    break;
    case 'N  ':
    estado = 'No aprobado';
    break;
    case 'R  ':
    estado = 'Revisado';
    break;
    case 'ER ':
    estado = 'Por revisar';
    break;
  }

  $("#modal_detalles_archivo .modal-content").
  html('\
  <div class=\"flow-text\">\n\
  <div class=\"header center-align amber-text\"><h4>DETALLES DEL ARCHIVO</h4></div>\n\
  Nombre del archivo: ' + nombre + '\n\
  <br>\n\
  Tipo de archivo: ' + tipo_archivo + '\n\
  <br>\n\
  Descripción: ' + descripcion + '\n\
  <br>\n\
  Estado: ' + estado + '\n\
  <br>\n\
  Se guardó el: ' + fecha_guardado + '\n\
  <br>\n\
  Fecha límite de revisión: ' + fecha_revision + '\n\
  <br>\n\
  <a href="' + descargar + '" target="_blank" download>Descargar archivo</a>\n\
  <br>\n\
  </div>'
);


$("#modal_detalles_archivo").openModal();
}

function modal_detalles_revisiones_asesor(nombre, tipo_archivo, descripcion, fecha_guardado, descargar, revision_de) {
  /*
  Formato de Revision de Anteproyecto(FRA)
  Registro Asesoria Residencias Profesionales(RAR)
  Formato de Evaluacion y Seguimiento de Residencia(FES) (anexo 29)
  Formato de Evalucion de Reporte de Residencia(RER) (anexo 30)
  Carta de Liberacion de Residencia Profesional(CLR)
  */
  switch (tipo_archivo) {
    case 'FRA':
    tipo_archivo = 'Formato de Revision de Anteproyecto';
    break;
    case 'RAR':
    tipo_archivo = 'Registro Asesoria Residencias Profesionales';
    break;
    case 'FES':
    tipo_archivo = 'Reporte Formato de Evaluacion y Seguimiento de Residencia';
    break;
    case 'FER':
    tipo_archivo = 'Formato de Evalucion de Reporte de Residencia';
    break;
    case 'CLR':
    tipo_archivo = 'Carta de Liberacion de Residencia Profesional';
    break;
    case 'R  ':
    tipo_archivo = 'Revision avance';
    break;
    default:
    break;
  }

  $("#modal_detalles_archivo_asesor .modal-content").
  html('\
  <div class=\"flow-text\">\n\
  <div class=\"header center-align amber-text\"><h4>DETALLES DEL ARCHIVO</h4></div>\n\
  Nombre del archivo: ' + nombre + '\n\
  <br>\n\
  Tipo de archivo: ' + tipo_archivo + '\n\
  <br>\n\
  Descripción: ' + descripcion + '\n\
  <br>\n\
  Se guardó el: ' + fecha_guardado + '\n\
  <br>\n\
  <a href="' + descargar + '" target="_blank" download>Descargar archivo</a>\n\
  <br>\n\
  Es revisión del archivo del asesorado: ' + revision_de + '\n\
  <br>\n\
  </div>'
);


$("#modal_detalles_archivo_asesor").openModal();
}

function modal_detalles_asesor(nombre, tipo_archivo, descripcion, fecha_guardado, descargar) {
  /*
  Formato de Revision de Anteproyecto(FRA)
  Registro Asesoria Residencias Profesionales(RAR)
  Formato de Evaluacion y Seguimiento de Residencia(FES) (anexo 29)
  Formato de Evalucion de Reporte de Residencia(RER) (anexo 30)
  Carta de Liberacion de Residencia Profesional(CLR)
  */
  switch (tipo_archivo) {
    case 'FRA':
    tipo_archivo = 'Formato de Revision de Anteproyecto';
    break;
    case 'RAR':
    tipo_archivo = 'Registro Asesoria Residencias Profesionales';
    break;
    case 'FES':
    tipo_archivo = 'Reporte Formato de Evaluacion y Seguimiento de Residencia';
    break;
    case 'FER':
    tipo_archivo = 'Formato de Evalucion de Reporte de Residencia';
    break;
    case 'CLR':
    tipo_archivo = 'Carta de Liberacion de Residencia Profesional';
    break;
    case 'R  ':
    tipo_archivo = 'Revision avance';
    break;
    default:
    break;
  }

  $("#modal_detalles_archivo_asesor .modal-content").
  html('\
  <div class=\"flow-text\">\n\
  <div class=\"header center-align amber-text\"><h4>DETALLES DEL ARCHIVO</h4></div>\n\
  Nombre del archivo: ' + nombre + '\n\
  <br>\n\
  Tipo de archivo: ' + tipo_archivo + '\n\
  <br>\n\
  Descripción: ' + descripcion + '\n\
  <br>\n\
  Se guardó el: ' + fecha_guardado + '\n\
  <br>\n\
  <a href="' + descargar + '" target="_blank" download>Descargar archivo</a>\n\
  <br>\n\
  </div>'
);


$("#modal_detalles_archivo_asesor").openModal();
}

function agregar_revision(nombre_archivo, id_archivo_alumno, id_asesor, tipo_doc, estado, base) {

  $('#modal_agregar_revision #nombre_archivo_r').html(nombre_archivo);
  $('#modal_agregar_revision #id_archivo_alu').attr('value', id_archivo_alumno);
  $('#modal_agregar_revision #id_asesor').attr('value', id_asesor);
  //$('#modal_agregar_revision #descripcion_archivo_revision').attr('value', '');
  switch (tipo_doc) {
    case 'A  '://ANTEPROYECTO
    $('#modal_agregar_revision #estado_a').attr('hidden', false);
    $('#modal_agregar_revision #lbl_adj_archivo').html('Adjuntar Formato de Revisión de Anteproyecto');
    $('#modal_agregar_revision #descargar_formato').html('Descargar Formato de Revisión de Anteproyecto<img src="' + base + 'images/download_tiny.png">');
    $('#modal_agregar_revision #descargar_formato').attr('href', base + 'uploads/docentes/ITTEPIC%20FRA.docx');//AGREGAR RUTA DE LOS FORMATOS
    $('#modal_agregar_revision #tipo_documento_revision').attr('value', 'FRA');
    switch (estado) {
      case 'A  '://Aprobado
      $('#modal_agregar_revision #estado_anteproyecto #A').attr('selected', true);
      $('#modal_agregar_revision #estado_anteproyecto #N').attr('selected', false);
      break;
      case 'N  '://No aprobado
      $('#modal_agregar_revision #estado_anteproyecto #N').attr('selected', true);
      $('#modal_agregar_revision #estado_anteproyecto #A').attr('selected', false);
      break;
      //                case 'ER '://En revision
      //                    $('#modal_agregar_revision #estado_anteproyecto #A').attr('selected', true);
      //                    break;
      default:
      break;
    }
    break;
    case 'R  '://REPORTE
    $('#modal_agregar_revision #estado_a').attr('hidden', true);
    $('#modal_agregar_revision #lbl_adj_archivo').html('Adjuntar archivo de revisión');
    $('#modal_agregar_revision #descargar_formato').attr('hidden', true);
    $('#modal_agregar_revision #tipo_documento_revision').attr('value', 'R  ');
    break;
    case 'RF '://REPORTE FINAL
    $('#modal_agregar_revision #estado_a').attr('hidden', true);
    $('#modal_agregar_revision #lbl_adj_archivo').html('Adjuntar Formato de Evaluación de Reporte de Residencia');
    $('#modal_agregar_revision #descargar_formato').html('Descargar Formato de Evaluación de Reporte de Residencia<img src="' +base + 'images/download_tiny.png">');
    $('#modal_agregar_revision #descargar_formato').attr('href', base + 'uploads/docentes/Formato_de_Evaluación_de_Reporte_de_Residencia.docx');//AGREGAR RUTA DE LOS FORMTATOS
    $('#modal_agregar_revision #tipo_documento_revision').attr('value', 'FER');
    break;
  }
  $('#modal_agregar_revision').openModal();
}
function recargar_archivos_asesorado(id, base) {
  jQuery.ajax({
    type: "POST",
    url: base + "index.php/Residencia/Docente/c_bitacora_avance_docente/actualizar_archivos_residente",
    dataType: 'json',
    data: {id_participantes: id},
    success: function (res) {
      if (res)
      {
        // var a = jQuery.parseJSON(res.responseText);
        var trHTML = '';
        $.each(res.archivos_residente, function (i, item) {

          trHTML += '<tr><td>' + res.archivos_residente[i].nombre_archivo +
          '</td><td>' + tipo_documento_residente(res.archivos_residente[i].tipo_documento) +
          '</td><td>' + estado(res.archivos_residente[i].estado) +
          '</td><td>' + res.archivos_residente[i].fecha_guardado_documento +
          '</td><td>' + res.archivos_residente[i].fecha_limite_revision +
          '</td><td style="text-align: center;"><a href="' + base + '' + res.archivos_residente[i].ruta_archivo + '" download target="_blank"><img src="' + base + 'images/download_tiny.png"></a>' +
          '</td><td style="text-align: center;"><a href="#!" onclick="modal_detalles_asesorado(\'' + res.archivos_residente[i].nombre_archivo + '\',\'' + tipo_documento_residente(res.archivos_residente[i].tipo_documento) + '\',\'' + res.archivos_residente[i].descripcion_archivo + '\',\'' + estado(res.archivos_residente[i].estado) + '\',\'' + res.archivos_residente[i].fecha_guardado_documento + '\',\'' + res.archivos_residente[i].fecha_limite_revision + '\',\'' + base + '' + res.archivos_residente[i].ruta_archivo + '\');"><img src="' + base + 'images/detalles_tiny.png"></a>' +
          '</td><td style="text-align: center;"><a href="#!" onclick="agregar_revision(\'' + res.archivos_residente[i].nombre_archivo + '\',\'' + res.archivos_residente[i].archivos_pk + '\',\'' + res.archivos_residente[i].asesor + '\',\'' + tipo_documento_residente(res.archivos_residente[i].tipo_documento) + '\',\'' + estado(res.archivos_residente[i].estado) + '\',\'' + base + '\');"><img src="' + base + 'images/queue_tiny.png"></a>' +
          '</td></tr>';
        });                                                                                                                                                                             //nombre_archivo,id_archivo_alumno,id_asesor,tipo_doc,estado,base/

        $('#tabla_asesorado tbody').html(trHTML);

        //alert('Se actualizó la opción a titulación del proyecto ');
        //                    jQuery("div#result").show();
        //                    jQuery("div#value").html(res.username);
        //                    jQuery("div#value_pwd").html(res.pwd);
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert(textStatus);
    }
  });

}

function recargar_archivos_asesor(id, base) {

  jQuery.ajax({
    type: "POST",
    url: base + "index.php/Residencia/Docente/c_bitacora_avance_docente/actualizar_archivos_asesor",
    dataType: 'json',
    data: {id_participantes: id},
    success: function (res) {
      if (res)
      {
        //var a = jQuery.parseJSON(res.responseText);
        var trHTML = '';
        var cantidadarchivos=0;
        $.each(res.archivos_asesor, function (i, item) {
          trHTML += '<tr><td>' + res.archivos_asesor[i].nombre_archivo +
          '</td><td>' + tipo_documento_asesor(res.archivos_asesor[i].tipo_documento) +
          '</td><td>' + res.archivos_asesor[i].fecha_guardado_documento +
          '</td><td style="text-align: center;"><a href="' + base + '' + res.archivos_asesor[i].ruta_archivo_asesor + '" target="_blank" download><img src="' + base + 'images/download_tiny.png"></a>' +
          '</td><td style="text-align: center;"><a href="#!" onclick="modal_detalles_asesor(\'' + res.archivos_asesor[i].nombre_archivo + '\',\'' + tipo_documento_asesor(res.archivos_asesor[i].tipo_documento) + '\',\'' + res.archivos_asesor[i].descripcion_archivo + '\',\'' + res.archivos_asesor[i].fecha_guardado_documento + '\',\'' + base + '' + res.archivos_asesor[i].ruta_archivo_asesor + '\');"><img src="' + base + 'images/detalles_tiny.png"></a>' +
          '</td></tr>';
          cantidadarchivos++;
        });
        if(cantidadarchivos>=3){
          $('#panel_archivos').hide();
          $('#panel_archivos2').hide();
        }
        $('#archivosadjuntadoscantidad').val(cantidadarchivos);
        $('#limite_archivos').html("Archivos adjuntados "+cantidadarchivos+" de 3");

        $('#archivos_asesor tbody').html(trHTML);

      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert(textStatus);
    }
  });

}

function recargar_revisiones_asesor(id, base) {
  jQuery.ajax({
    type: "POST",
    url: base + "index.php/Residencia/Docente/c_bitacora_avance_docente/actualizar_revisiones_asesor",
    dataType: 'json',
    data: {id_participantes: id},
    success: function (res) {
      if (res)
      {
        // var a = jQuery.parseJSON(res.responseText);
        var trHTML = '';
        $.each(res.archivos_revision_asesor, function (i, item) {
          trHTML += '<tr><td>' + res.archivos_revision_asesor[i].nombre_archivo +
          '</td><td>' + tipo_documento_asesor(res.archivos_revision_asesor[i].tipo_documento) +
          '</td><td>' + res.archivos_revision_asesor[i].fecha_guardado_documento +
          '</td><td style="text-align: center;">' + res.archivos_revision_asesor[i].nombre_archivo_alumno +
          '</td><td style="text-align: center;"><a href="' + base + '' + res.archivos_revision_asesor[i].ruta_archivo_asesor + '" download target="_blank"><img src="' + base + 'images/download_tiny.png"></a>' +
          '</td><td style="text-align: center;"><a href="#!" onclick="modal_detalles_revisiones_asesor(\'' + res.archivos_revision_asesor[i].nombre_archivo + '\',\'' + tipo_documento_asesor(res.archivos_revision_asesor[i].tipo_documento) + '\',\'' + res.archivos_revision_asesor[i].descripcion_archivo + '\',\'' + res.archivos_revision_asesor[i].fecha_guardado_documento + '\',\'' + base + '' + res.archivos_revision_asesor[i].ruta_archivo_asesor + '\',\'' + res.archivos_revision_asesor[i].nombre_archivo_alumno + '\');"><img src="' + base + 'images/detalles_tiny.png"></a>' +
          '</td></tr>';
        });
        //

        $('#archivos_rev_asesor tbody').html(trHTML);

      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert(textStatus);
    }
  });
}

function recargar_avance(nc, base) {
  jQuery.ajax({
    type: "POST",
    url: base + "index.php/Residencia/Docente/c_bitacora_avance_docente/recargar_avance",
    dataType: 'json',
    data: {numero_control: nc},
    success: function (res) {
      if (res)
      {
        var avance = ['Selección de anteproyecto', 'Validación de solicitud de residencia',
        'Validación de anteproyecto', 'Revisiones parciales',
        'Reporte final', 'Liberación residencia'];
        $('#steps1').html('');
        $('#steps2').html('');
        $('#steps3').html('');
        if ((res.bitacora[0].estado - 1) >= 2) {
          $('#steps2').append('<div class="step done col s3 m6 l12" data-desc="Residencia Profesional">4</div>');
        } else {
          $('#steps2').append('<div class="step active col s3 m6 l12" data-desc="Residencia Profesional">4</div>');
        }
        for (var i = 0, max = 6; i < max; i++) {
          var tmp = '';
          if (i <= res.bitacora[0].estado - 1) {
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

        // var a = jQuery.parseJSON(res.responseText);

        //alert('Se actualizó la opción a titulación del proyecto ');
        //                    jQuery("div#result").show();
        //                    jQuery("div#value").html(res.username);
        //                    jQuery("div#value_pwd").html(res.pwd);
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert(textStatus);
    }
  });



}

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
    tipo_archivo = 'Reporte';
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
    e = 'Por revisar';
    break;
    default:
    e = estado;
    break;
  }
  return e;
}
