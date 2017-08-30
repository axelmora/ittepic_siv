<?php
class M_alumnos_ds extends CI_Model{
// Function To Fetch All Students Record

// Update Query For Selected Student
function cancelar_solicitud($id, $datas){
$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_programa_seleccionado', $id);
$DB2->update('programa_seleccionado', $datas);
}

function cambiar_solicitud($ids, $datas){
$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_programa_seleccionado', $ids);
$DB2->update('programa_seleccionado', $datas);
}

function insert_soli($ids, $data){
	$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_solicitud', $ids);
	$DB2->update('programa_instancia', $data);

}
}
?>
