$(document).ready(function(){
  $('#btn_sel_docente').click(function(){

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
        //alert(response.responseText);
        var a = jQuery.parseJSON(response.responseText);
        if (a.parti_asesor==false && a.parti_revisor1==false && a.parti_revisor2==false) {
          alert('El docente no tiene participacion en proyectos.');
          $('#participaciones').attr('hidden', true);
        }
        else{
          $('#participaciones').attr('hidden', false);

          var trHTML = '';
          $.each(a.parti_asesor, function (i, item) {
            trHTML += '<tr><td>Asesor'+
            '</td><td>' + a.parti_asesor[i].nombre_proyecto+
            '</td></tr>';
          });
          $.each(a.parti_revisor1, function (i, item) {
            trHTML += '<tr><td>Revisor1' +
            '</td><td>' + a.parti_revisor1[i].nombre_proyecto+
            '</td></tr>';
          });
          $.each(a.parti_revisor2, function (i, item) {
            trHTML += '<tr><td>Revisor2' +
            '</td><td>' + a.parti_revisor2[i].nombre_proyecto+
            '</td></tr>';
          });

          $('#tabla_participantes_proy tbody').html(trHTML);
        }
      },
      error: function ()
      {
        alert('Error1');
      }
    };
    $("#frm_sel_docente").ajaxForm(options);
  });
  /*DOCENTE COMPARTIDO*/
  $('#btn_sel_docente2').click(function(){

    var options = {
      beforeSend: function ()
      {
      },
      uploadProgress: function (event, position, total, percentComplete)
      {
      },
      success: function ()
      {
      },
      complete: function (response)
      {
        var a = jQuery.parseJSON(response.responseText);
        if (a.parti_asesor==false && a.parti_revisor1==false && a.parti_revisor2==false) {
          alert('El docente compartido  no tiene participacion en proyectos.');
            $('#participaciones').attr('hidden', true);
        }
        else{
          $('#participaciones').attr('hidden', false);
          var trHTML = '';
          $.each(a.parti_asesor, function (i, item) {
            trHTML += '<tr><td>Asesor'+
            '</td><td>' + a.parti_asesor[i].nombre_proyecto+
            '</td></tr>';
          });
          $.each(a.parti_revisor1, function (i, item) {
            trHTML += '<tr><td>Revisor1' +
            '</td><td>' + a.parti_revisor1[i].nombre_proyecto+
            '</td></tr>';
          });
          $.each(a.parti_revisor2, function (i, item) {
            trHTML += '<tr><td>Revisor2' +
            '</td><td>' + a.parti_revisor2[i].nombre_proyecto+
            '</td></tr>';
          });
          $('#tabla_participantes_proy tbody').html(trHTML);
        }
      },
      error: function ()
      {
        alert('Error1');
      }
    };
    $("#frm_sel_docentecompartido").ajaxForm(options);
  });
  /*DOCENTE COMPARTIDO*/
});
