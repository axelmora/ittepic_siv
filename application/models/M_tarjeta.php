<?php
 
class M_tarjeta extends CI_Model{
 
    public function construct() {
        parent::__construct();
    }
 


   public function show_taralumno($id) {

   $DB2 = $this->load->database('local', TRUE);

$DB2->select('*');
$DB2->from('t_control');

$array = array('id_programaseleccionado' => $id);
$DB2->where ($array);
$query = $DB2->get();
		
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
} 
	
 public function show_tarjeta($id,$data) {

   $DB2 = $this->load->database('local', TRUE);

$DB2->select('*');
$DB2->from('t_control');

$array = array('id_programaseleccionado' => $id);
$DB2->where ($array);
$query = $DB2->get();
		
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

 public function show_t($idtp) {

   $DB2 = $this->load->database('local', TRUE);

$DB2->select('*');
$DB2->from('t_control');

$array = array('id_tcontrol' => $idtp);
$DB2->where ($array);
$query = $DB2->get();
		
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
} 
   
 public function update($idtp,$datap) {
$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_tcontrol', $idtp);
$DB2->update('t_control', $datap);
}
 
 public function insert_t($idx,$data) {


   $DB2 = $this->load->database('local', TRUE);

$DB2->select('*');
$DB2->from('t_control');

$array = array('id_programaseleccionado' => $idx);
$DB2->where ($array);
$query = $DB2->get();
		
if ($query->num_rows() == 1) {
return $query->result();
} else {



//AQUI VA EL INSERT

$DB2 = $this->load->database('local', TRUE);
		
$DB2->insert('t_control', $data);

$DB2->select('*');
$DB2->from('t_control');

$array = array('id_programaseleccionado' => $idx);
$DB2->where ($array);
$query = $DB2->get();
return $query->result();
}
}
}
      
