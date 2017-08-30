$(document).ready(function(){
    $('#clai').change(function (event) {
        event.preventDefault();
        //var titu = $(this).attr('checked');        
//        var ante_id = $("#anteproyecto_id").val();
        if ($(this).is(':checked')) {
            titu = 'TRUE';            
        }
        else {
            titu = 'FALSE';
        }
        alert(titu);
//        var base = $('#anteproyecto_id').attr('base');
//        jQuery.ajax({
//            type: "POST",
//            url: base + "index.php/Residencia/Docente/c_bitacora_avance_docente/actualizar_titulacion",
//            dataType: 'json',
//            data: {titulacion: titu, anteproyecto_id: ante_id},
//            success: function (res) {
//                if (res)
//                {
//                    alert('Se actualizó la opción a titulación del proyecto ');
//                }
//            },
//            error: function (XMLHttpRequest, textStatus, errorThrown) {
//                alert(textStatus);
//            }
//        });

    });
});
function registrar(campo,valor,nc,base){
//    alert(campo+'%'+valor+'%'+nc+'%'+base);
    jQuery.ajax({
            type: "POST",
            url: base + "index.php/Residencia/JefeResidencia/C_registrar_documentos/entregas",
            dataType: 'json',
            data: {c: campo, v: valor, numero_control: nc},
            success: function (res) {
                if (res.a)
                {
                    alert('Se actualizó.');
                }
                else{
                    alert('No se actualizó');
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
}