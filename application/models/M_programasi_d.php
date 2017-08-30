<?php
class M_programasi_d extends CI_Model{
// Function To Fetch All Students Record
function show_programas(){
$DB2 = $this->load->database('local', TRUE);
$query = $DB2->get('programa_instancia');
$query_result = $query->result();
return $query_result;
}
// Function To Fetch Selected Student Record
function show_programa_idd($data){
$DB2 = $this->load->database('local', TRUE);
$DB2->select('*');
$DB2->from('programa_instancia');
$DB2->where('id_solicitud', $data);
$query = $DB2->get();
$result = $query->result();
return $result;
}
// Update Query For Selected Student
function delete_programa_id($id){
$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_solicitud', $id);
$DB2->delete('programa_instancia');
}
}
?>
