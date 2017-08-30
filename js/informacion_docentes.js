$(document).ready(function () {
    $('#btn_compartir_docente').click(function () {

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

                alert(response.responseText);
                $('#prestar').closeModal();
            },
            error: function ()
            {
                alert('Error2');
            }
        };

        $("#frm_compartir_docente").ajaxForm(options);
    });
});
function prestar(rfc, nombres, base) {
    //event.preventDefault();        
    $('#nombre_docente').html('Compartir ' + nombres);
    $('#rfc_prestar').attr('value', rfc);
    jQuery.ajax({
        type: "POST",
        url: base + "index.php/Residencia/JefeAcademico/Panel_jefeacademico/docente_prestado",
        dataType: 'json',
        data: {RFC: rfc},
        success: function (res) {
            var html = '';
            if (res.exito === true) {

                $.each(res.docente_prestado, function (i, item) {
                    html += '<p>' + res.docente_prestado[i].departamento_destino + '<br>';

                });
                html += '</p>';
            }
            else {
                html = '<p>El docente no ha sido compartido</p>';
            }
            $('#prestado_con').html(html);

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    });
    $('#prestar').openModal();
}

function quitar(rfc, nombre, base) {
    $('#nombre_docente_quitar').html(nombre);
    $('#rfc_quitar').attr('value', rfc);
    jQuery.ajax({
        type: "POST",
        url: base + "index.php/Residencia/JefeAcademico/Panel_jefeacademico/docente_prestado",
        dataType: 'json',
        data: {RFC: rfc},
        success: function (res) {
            var html = '', comp = '';

            if (res.exito === true) {

                $.each(res.docente_prestado, function (i, item) {
                    html += '<tr><td>' + res.docente_prestado[i].departamento_destino + '</td>' +
                            '<td><a href=#! onclick="quitar_docente(\'' + res.docente_prestado[i].id + '\',\'' + base + '\');"><img src="' + base + 'images/remove.png"/></a></td>' +
                            '</tr>';

                });
            }
            else {
                comp = 'El docente no está compartido';
            }
            $('#tbl_quitar_docente tbody').html(html);
            $('#no_compartido').html(comp);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    });
    $('#quitar_docente').openModal();

}
function quitar_docente(id, base) {    
    jQuery.ajax({
        type: "POST",
        url: base + "index.php/Residencia/JefeAcademico/Panel_jefeacademico/quitar_docente",
        dataType: 'json',
        data: {ID: id},
        success: function (res) {
            if (res.exito === true) {
                $('#quitar_docente').closeModal();
                alert('Operación realizada correctamente.');
            }
            else {
                alert('La operación no se pudo realizar.');
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    });
}