$(document).ready(function () {
  $('#btn_sel_proyecto').click(function () {
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
        $('#tabla_participantes_proy').attr('hidden', false);
        $('#tabla_part').attr('hidden', false);
        $('#oficios_comision').attr('hidden', false);
        var a = jQuery.parseJSON(response.responseText);
        $('#id_participantes').attr('value', a.asesor[0].id);
        cargar_tabla(a);
      },
      error: function ()
      {
        alert('Error1');
      }
    };

    $("#frm_sel_proyecto").ajaxForm(options);
  });

  $('#ar').change(function (event) {
    event.preventDefault();
    //var titu = $(this).attr('checked');
    //var ante_id = $("#anteproyecto_id").val();
    if ($(this).is(':checked')) {
      ase_rev = 'TRUE';//true es revisor
    } else {
      ase_rev = 'FALSE';//false es asesor
    }
    var base = $(this).attr('base');
    jQuery.ajax({
      type: "POST",
      url: base + "index.php/Residencia/c_info_participantes_proyecto/proyectos_asesor_revisor",
      dataType: 'json',
      data: {asesor_revisor: ase_rev},
      success: function (res) {
        if (res.proyectos === false)
        {
          $('#frm_sel_proyecto').attr('hidden', true);
          $('#no_participas').attr('hidden', false);
          $('#tabla_part').attr('hidden', true);
          $('#no_participas').html('No participas en algún proyecto.');
          //alert('false');
        } else {
          //alert('true');
          var options = '';
          $.each(res.proyectos, function (i, item) {

            options += '<option value = "' + res.proyectos[i].id + '">' + res.proyectos[i].nombre_proyecto + ' - ' + res.proyectos[i].nombre + '</option>';
          });                                                                                                                                                                             //nombre_archivo,id_archivo_alumno,id_asesor,tipo_doc,estado,base/
          $('#frm_sel_proyecto').attr('hidden', false);
          $('#tabla_part').attr('hidden', false);
          $('#no_participas').attr('hidden', true);
          $('#ppid').html(options);
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus);
      }
    });

  });

  $('#btn_cambiar_modal').click(function () {

  });
});
function reemplazar(ppid, docente) {
  //alert(docente);
  $('#rol').attr('value', docente);
  $('#modal_cambiar').openModal();
}
function cambiar(rfc_docente, base) {
  //var titu = $(this).attr('checked');
  //var ante_id = $("#anteproyecto_id").val();
  //alert(rfc);
  var pasa=0; /*VALIDACION PARA QUE NO SE REPITA USUARIO*/
  if (($('#rfcasesor').text() != rfc_docente)) {
    pasa++;
  }
  if ($('#rfcrevisor1').text()!= rfc_docente) {
    pasa++;
  }
  if ($('#rfcrevisor2').text() != rfc_docente) {
    pasa++;
  }
  if(pasa==3) {
    var rol = $('#rol').attr('value');
    var participantes = $('#id_participantes').attr('value');
    jQuery.ajax({
      type: "POST",
      url: base + "index.php/Residencia/c_info_participantes_proyecto/cambiar_asesor_revisor",
      dataType: 'json',
      data: {ppid: participantes, rfc: rfc_docente, puesto: rol},
      success: function (res) {
        $('#modal_cambiar').closeModal();
        $('#modal_cambiar2').closeModal();
        cargar_tabla(res);
        alert('El cambio se ha hecho correctamente.');
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus);
      }
    });
  }else{
    $('#modal_cambiar').closeModal();
    $('#modal_cambiar2').closeModal();
    alert("ERROR docente anteriormente asigando");
  }
}
function reemplazar2(ppid, docente) {
  //alert(docente);
  $('#rol').attr('value', docente);
  $('#modal_cambiar2').openModal();
}
function cambiar2(rfc_docente, base) {//CREO QUE ESTA FUNCION NO SE NECESITA
  //var titu = $(this).attr('checked');
  //var ante_id = $("#anteproyecto_id").val();
  //alert(rfc);
  var rol = $('#rol2').attr('value');
  var participantes = $('#id_participantes').attr('value');
  jQuery.ajax({
    type: "POST",
    url: base + "index.php/Residencia/c_info_participantes_proyecto/cambiar_asesor_revisor",
    dataType: 'json',
    data: {ppid: participantes, rfc: rfc_docente, puesto: rol},
    success: function (res) {

      cargar_tabla(res);
      alert('El cambio se ha hecho correctamente.');
      $('#modal_cambiar2').closeModal();
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert(textStatus);
    }
  });
}

function cargar_tabla(a) {
  var trHTML = '', cad = '';
  $.each(a.residente, function (i, item) {
    trHTML += '<tr><td>Residente ' + a.residente[i].numero_control +
    '</td><td>' + a.residente[i].nombre +
    '</td><td>' + a.residente[i].correo +
    '</td><td colspan="2">' +
    '</td></tr>';
  });
  $.each(a.asesor, function (i, item) {
    if (a.user == 'jefeacademico') {
      cad = '<td style="text-align: center;"><a style="display:none" id="rfcasesor">' + a.asesor[i].rfc + '</a><a href="#!" onclick="reemplazar(\'' + a.asesor[i].id + '\',\'asesor\')"><img src="' + a.base_url + 'images/swap_horiz.png"></a>' +
      '</td><td style="text-align: center;"><a href="#!" onclick="reemplazar2(\'' + a.asesor[i].id + '\',\'asesor\')"><img src="' + a.base_url + 'images/swap_horiz.png"></a>' +
      '</td>';
    }
    trHTML += '<tr><td>Asesor Interno' +
    '</td><td>' + decodeURIComponent(escape(a.asesor[i].nombres)) + ' ' + decodeURIComponent(escape(a.asesor[i].apellidos)) +
    '</td><td>' + a.asesor[i].correo +
    '</td>' + cad + '</tr>';
  });
  cad = '';
  $.each(a.revisor1, function (i, item) {
    if (a.user == 'jefeacademico') {
      cad = '<td style="text-align: center;"><a style="display:none" id="rfcrevisor1">' + a.revisor1[i].rfc + '</a><a href="#!" onclick="reemplazar(\'' + a.revisor1[i].id + '\',\'revisor1\')"><img src="' + a.base_url + 'images/swap_horiz.png"></a>' +
      '</td><td style="text-align: center;"><a href="#!" onclick="reemplazar2(\'' + a.revisor1[i].id + '\',\'revisor1\')"><img src="' + a.base_url + 'images/swap_horiz.png"></a>' +
      '</td>';
    }
    //alert("valor : "+ Object.keys(a.revisor1[i]).length);
    trHTML += '<tr><td>Revisor1' +
    '</td><td>' + decodeURIComponent(escape(a.revisor1[i].nombres)) + ' ' + decodeURIComponent(escape(a.revisor1[i].apellidos)) +
    '</td><td>' + a.revisor1[i].correo +
    '</td>' + cad + '</tr>';
  });
  cad = '';
  $.each(a.revisor2, function (i, item) {
    if (a.user == 'jefeacademico') {
      cad = '<td style="text-align: center;"><a style="display:none" id="rfcrevisor2">' + a.revisor2[i].rfc + '</a><a href="#!" onclick="reemplazar(\'' + a.revisor2[i].id + '\',\'revisor2\')"><img src="' + a.base_url + 'images/swap_horiz.png"></a>' +
      '</td><td style="text-align: center;"><a href="#!" onclick="reemplazar2(\'' + a.revisor2[i].id + '\',\'revisor2\')"><img src="' + a.base_url + 'images/swap_horiz.png"></a>' +
      '</td>';
    }
    trHTML += '<tr><td>Revisor2' +
    '</td><td>' + decodeURIComponent(escape(a.revisor2[i].nombres)) + ' ' + decodeURIComponent(escape(a.revisor2[i].apellidos)) +
    '</td><td>' + a.revisor2[i].correo +
    '</td>' + cad + '</tr>';
  });
  cad = '';
  $.each(a.asesore, function (i, item) {
    var valorboton="";
    if($('#ar').prop('checked')) {
    valorboton="none";
    } else {
    valorboton="block";
    }
    trHTML += '<tr><td>Asesor externo' +
    '</td><td id="asxnombre">' + a.asesore[i].nombre +
    '</td><td>' + a.asesore[i].correo +
    '</td><td colspan="2"><a style="display:'+valorboton+'"  class="waves-effect orange waves-light btn modal-trigger"  data-target="modalexterno" href="#" onclick="editarasesorexterno(\'' + a.asesore[i].asesor_externopk + '\',\'' + a.asesore[i].nombre + '\')"> <i class="large material-icons">edit</i>EDITAR NOMBRE</a>' +
    '</td></tr>';
  });

  $('#tabla_participantes_proy tbody').html(trHTML);
}
function editarasesorexterno(idacesor,nombre) {
  $('#idasesorexterno').attr('value', idacesor);
  $('#nombreasesorexternoactual').attr('value', nombre);
  if($('#ar').prop('checked')) {
   alert("Error un revisor no puede cambiar el nombre.")
  } else {
    $('#modalexterno').openModal();
  }
}
