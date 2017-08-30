<?php 
class M_generari_pdf extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	
public function show_data_by_date_range($data) {
	
$DB2 = $this->load->database('local', TRUE);
$condition = "fecha_registro BETWEEN " . "'" . $data['fecha1'] . "'" . " AND " . "'" . $data['fecha2'] . "'";
$DB2->select('*');
$DB2->from('instancia');
$DB2->where($condition);
$DB2->order_by('instancia.fecha_registro','asc');
$query = $DB2->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
	
	
	
  public function show_data_by_id($id) {

   $DB2 = $this->load->database('local', TRUE);
 
   

	
$DB2->select('*,a.*,b.*,c.*,d.*,f.*');
$DB2->from('programa_seleccionado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->join('programa_instancia a', 'a.id_solicitud = programa_seleccionado.id_solicitud');

$DB2->join('instancia f', 'f.id_instancia = a.id_instancia');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->join('tipo_programa e', 'e.id = a.id_tipoprograma');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->join('alumnos b', 'b.numero_control = programa_seleccionado.numero_control');
$DB2->join('carreras c', 'c.id_carrera = b.id_carrera');
$DB2->join('semestre d', 'd.id_semestre = b.id_semestre');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->where ( 'programa_seleccionado.numero_control', $id);
$DB2->order_by('programa_seleccionado.numero_control','asc');
$DB2->limit(1);
$query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
		
if ($query->num_rows() == 1) {
	
return $query->result();

} 
else 
{
return false;
}

}
  
}
