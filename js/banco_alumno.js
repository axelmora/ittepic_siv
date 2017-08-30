function confirmar(base, ida, s)
{
    jQuery.ajax({
        type: "POST",
        url: base + 'index.php/Residencia/Alumno/c_banco/esta_disponible/',
        dataType: 'json',
        data: {id_anteproyecto: ida},
        success: function (res) {
            if (res.respuesta)
            {
                if (confirm('¿Desea seleccionar este proyecto?\n\
        Recuerda que si no tienes el 80% de avance reticular o más\n\
        no se te asignará el proyecto que seleccionaste.')) {
                    document.getElementById('periodo').value = document.getElementById('periodo' + s).value;
                    document.getElementById('numero_afiliacion').value = document.getElementById('numero_afiliacion' + s).value;
                    document.getElementById('atencion_medica').value = document.getElementById('atencion_medica' + s).value;
                    document.getElementById('lugares_d').value = document.getElementById('lugares_d' + s).value;
                    document.getElementById('disponible').value = document.getElementById('disponible' + s).value;
                    document.getElementById('anteproyecto_pk').value = document.getElementById('anteproyecto_pk' + s).value;
                    //alert(document.getElementById('periodo').value + '%' + document.getElementById('numero_afiliacion').value + '%' + document.getElementById('atencion_medica').value + '%' + document.getElementById('lugares_d').value + '%' + document.getElementById('disponible').value + '%' + document.getElementById('anteproyecto_pk').value);
                    $('#frm_postular').submit();
                } else {
                    return false;
                    //$('#frm_postular').submit();
                }
            } else {
                alert('El anteproyecto ya no está disponible.');
                return false;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}
function confirmar2(clave, s)//cuando es de propuesta
{
    if (clave == document.getElementById('clave' + s).value) {
        if (confirm('¿Desea seleccionar este proyecto?\n\
        Recuerda si no tienes el 80% de avance reticular o mas\n\
        No se te asignara el proyecto que seleccionaste')) {
            document.getElementById('periodo').value = document.getElementById('periodo' + s).value;
            document.getElementById('numero_afiliacion').value = document.getElementById('numero_afiliacion' + s).value;
            document.getElementById('atencion_medica').value = document.getElementById('atencion_medica' + s).value;
            document.getElementById('lugares_d').value = document.getElementById('lugares_d' + s).value;
            document.getElementById('disponible').value = document.getElementById('disponible' + s).value;
            document.getElementById('anteproyecto_pk').value = document.getElementById('anteproyecto_pk' + s).value;
            //alert(document.getElementById('periodo').value + '%' + document.getElementById('numero_afiliacion').value + '%' + document.getElementById('atencion_medica').value + '%' + document.getElementById('lugares_d').value + '%' + document.getElementById('disponible').value + '%' + document.getElementById('anteproyecto_pk').value);

            $('#frm_postular').submit();
        } else {
            return false;
        }
    } else
        alert('La clave compartida es incorrecta favor de comunicarte con \n\ el alumno que dio de alta el proyecto');
    return false;
}
