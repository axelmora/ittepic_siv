<?php
class M_instancias_u extends CI_Model{
	
	
// Function To Fetch All Students Record

// Function To Fetch Selected Student Record
function show_instancia_id($data){
$DB2 = $this->load->database('local', TRUE);
$DB2->select('*');
$DB2->from('instancia');
$DB2->where('id_instancia', $data);
$query = $DB2->get();
$result = $query->result();
return $result;
}
// Update Query For Selected Student
function update_instancia_id1($id,$data){
$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_instancia', $id);
$DB2->update('instancia', $data);
}
}
?>
