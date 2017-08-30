function detalles_vacante(id_vacante, base) {
//    alert(id_vacante+'%'+base);
//                    $("#modal_detalles_vacante").openModal();
    jQuery.ajax({
        type: "POST",
        url: base + "index.php/Residencia/JefeAcademico/panel_jefeacademico/info_vacante",
        dataType: 'json',
        data: {idv: id_vacante},
        success: function (res) {
            if (res!='false')
            {
                $("#modal_detalles_vacante .modal-content").
                        html('\
                    <div class=\"flow-text\">\n\
<div class=\"header center-align amber-text\"><h4>VACANTE ATENDIDA</h4></div>\n\
Nombre de la empresa: ' + res[0].nombre_empresa + '\n\
<br>\n\
Domicilio: ' + res[0].domicilio + '\n\
<br>\n\
Nombre del contacto: ' + res[0].nombre_contacto + '\n\
<br>\n\
Proyecto a desarrollar: ' + res[0].proyecto_a_desarrollar + '\n\
<br>\n\
Horario de atención: ' + res[0].horario_atencion + '\n\
<br>\n\
Departamento: ' + res[0].carreras + '\n\
<br>\n\
</div>'
                                );


                $("#modal_detalles_vacante").openModal();
            }
            else{
                alert('No se atendió una vacante');
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
//            alert(textStatus);
            alert(errorThrown);
        }
    });

}