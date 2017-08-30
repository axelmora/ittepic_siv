$(document).ready(function () {
    $('#btn_sel_alu_revision').click(function () {

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

                var a = jQuery.parseJSON(response.responseText);

                //info alumno
                $('#nombre').html(a.alu_info[0].nombre);
                $('#nc').html(a.alu_info[0].numero_control);
                $('#carrera').html(a.alu_info[0].carrera);
                $('#semestre').html(a.alu_info[0].semestre);
                $('#tel').html(a.alu_info[0].telefono);
                $('#correo').html(a.alu_info[0].correo);
                $('#dom').html(a.alu_info[0].domicilio);

                //info proyecto
                $('#nombre_proyecto').html(a.alu_info[0].nombre_proyecto);
                $('#nombre_empresa').html(a.alu_info[0].nombre_empresa);
                $('#departamento_ante').html(a.alu_info[0].departamento_anteproyecto);
                $('#anteproyecto_id').attr('value', a.alu_info[0].anteproyecto_pk);

                if (a.alu_info[0].banco == 't') {
                    $('#origen').html('Banco de proyectos');
                } else {
                    $('#origen').html('Propuesta de residente');
                }
                if (a.alu_info[0].titulacion == 't') {
                    $('#titulacion').html('Si');
                } else {
                    $('#titulacion').html('No');
                }
                $('#datos').attr('hidden', false);

                $('#archivos_alumno').attr('hidden', false);
                var trHTML = '';
                $.each(a.alu_archivos, function (i, item) {
                    trHTML += '<tr><td>' + a.alu_archivos[i].nombre_archivo +
                            '</td><td>' + tipo_documento_residente(a.alu_archivos[i].tipo_documento) +
                            '</td><td>' + estado(a.alu_archivos[i].estado) +
                            '</td><td>' + a.alu_archivos[i].fecha_guardado_documento +
                            '</td><td>' + a.alu_archivos[i].fecha_limite_revision +
                            '</td><td style="text-align: center;"><a href="#!" onclick="modal_detalles_rev(\'' + a.alu_archivos[i].nombre_archivo + '\',\'' + tipo_documento_residente(a.alu_archivos[i].tipo_documento) + '\',\'' + a.alu_archivos[i].descripcion_archivo + '\',\'' + estado(a.alu_archivos[i].estado) + '\',\'' + a.alu_archivos[i].fecha_guardado_documento + '\',\'' + a.alu_archivos[i].fecha_limite_revision + '\',\'' + a.base_url + '' + a.alu_archivos[i].ruta_archivo + '\');"><img src="' + a.base_url + 'images/detalles_tiny.png"></a>' +
                            '</td></tr>';
                });                                                                                                                                                                             //nombre_archivo,id_archivo_alumno,id_asesor,tipo_doc,estado,base/

                $('#tabla_revisiones tbody').html(trHTML);

            },
            error: function ()
            {
                alert('Error1');
            }
        };

        $("#frm_sel_revision").ajaxForm(options);

    });
});

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

function modal_detalles_rev(nombre, tipo_archivo, descripcion, estado, fecha_guardado, fecha_revision, descargar) {

    switch (tipo_archivo) {
        case 'A  ':
            var tipo_archivo = 'Anteproyecto';
            break;
        case 'R  ':
            tipo_archivo = 'Reporte Parcial';
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
            estado = 'En revisión';
            break;
    }

    $("#modal_detalles_archivo_revision .modal-content").
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


    $("#modal_detalles_archivo_revision").openModal();
}