<?php 
class M_iactg extends CI_Model
{
function __construct() {
parent::__construct();
}


function show_id($id){
$DB2 = $this->load->database('local', TRUE);
$DB2->select('*');
$DB2->from('programa_instancia');
$DB2->where('id_solicitud', $id);
$query = $DB2->get();
$result = $query->result();
return $result;
}
function delete($idact){
$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_actividadesg', $idact);
$DB2->delete('actividades_g');
}
function show_actividades_by_id($idsolicitud) {

$DB2 = $this->load->database('local', TRUE);
$DB2->select('*');
$DB2->from('actividades_g');
$DB2->where ('id_solicitud', $idsolicitud);

$query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
		
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}

function form_insert($data){
// Inserting in Table(students) of Database(college

$DB2 = $this->load->database('local', TRUE);
		
$DB2->insert('actividades_g', $data);
}
}
?>
