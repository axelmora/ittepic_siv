<?php
class M_instancias_u2 extends CI_Model{
	
		
function get_search() {
	
  $match = $this->input->post('search');
  $DB2 = $this->load->database('local', TRUE);
  
  $DB2->like('nombre_instancia',$match);
  $DB2->or_like('sector_instancia',$match);
  
  $query = $DB2->get('instancia');
  $querysearch = $query->result();
  return $querysearch;
	}

}
?>
