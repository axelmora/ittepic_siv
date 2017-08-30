<?php 
class M_semestre extends CI_Model
{
function __construct() {
parent::__construct();
}


function show_id_semestre_actual() {

$DB2 = $this->load->database('local', TRUE);
$DB2->select('*');
$DB2->from('semestre');
$DB2->order_by('id_semestre','desc');
$DB2->limit(1);

$query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
		
if ($query->num_rows() == 1) {
    foreach ($query->result() as $value) {
        $datos[] = $value;
    }
return $datos;
} else {
return 1;
    
}
}

}
?>
