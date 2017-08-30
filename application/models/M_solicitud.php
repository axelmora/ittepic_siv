 <?php
 
class M_solicitud extends CI_Model{
 
    public function construct() {
        parent::__construct();
    }
 
 
 public function show_programa($numero_control) {

 $DB2 = $this->load->database('local', TRUE);
 
   

	
$DB2->select('*,a.*,b.*,c.*,d.*,f.*,a.solicitudes_ocupadas');
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
$array = array('programa_seleccionado.numero_control' => $numero_control, 'programa_seleccionado.estado !=' => 'cancelado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->where ($array);
$DB2->order_by('programa_seleccionado.numero_control','asc');
$DB2->limit(1);
$query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
		
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

 public function show_programaporid($id) {

 $DB2 = $this->load->database('local', TRUE);
 
   

	
$DB2->select('*,a.*,b.*,c.*,d.*,f.*,a.solicitudes_ocupadas');
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
$array = array('programa_seleccionado.id_programa_seleccionado' => $id, 'programa_seleccionado.estado !=' => 'cancelado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->where ($array);
$DB2->order_by('programa_seleccionado.id_programa_seleccionado','asc');
$DB2->limit(1);
$query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
		
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}


 public function t_solicitudes() {

 $DB2 = $this->load->database('local', TRUE);
 
   

	
$DB2->select('*,e.*,f.*');

$DB2->from('programa_instancia');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->join('instancia f', 'f.id_instancia = programa_instancia.id_instancia');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->join('tipo_programa e', 'e.id = programa_instancia.id_tipoprograma');


//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$DB2->order_by('programa_instancia.id_solicitud','asc');
$query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
		
if ($query->num_rows()>0) {
return $query->result();
} else {
return false;
}
}

}
 
 
