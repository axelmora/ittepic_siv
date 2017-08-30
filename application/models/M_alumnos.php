<?php
 
class M_alumnos extends CI_Model{
 
    public function construct() {
        parent::__construct();
    }
 
    //obtenemos el total de filas para hacer la paginación del buscador
    function alumnos($buscador) {
    	$condition = "numero_control =" . "'" . $buscador . "  '";
		$this->db->select('*');
		$this->db->from('programa_seleccionado');
		$this->db->where($condition);
		$this->db->limit(1);
		
		$consulta = $this->db->get();
		
		
        return $consulta->num_rows();
    }
	
	
 public function show_actividades_by_id($idsolicitud) {

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
	
 public function show_data_by_id($id) {

   $id=$id.'  ';
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
$array = array('programa_seleccionado.numero_control' => $id, 'programa_seleccionado.estado !=' => 'cancelado');
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
    //obtenemos todos los posts a paginar con la función
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_paginados($buscador, $por_pagina, $segmento) {
    	$condition = "numero_control =" . "'" . $buscador . "  '";
		$this->db->select('*');
		$this->db->from('programa_seleccionado');
		$this->db->where($condition);
		$this->db->limit($por_pagina, $segmento);
		
		$consulta = $this->db->get();
		
		if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }

    }



function insert_soli($id, $datas){
	$DB2 = $this->load->database('local', TRUE);
$DB2->where('id_solicitud', $id);
	$DB2->update('programa_instancia', $datas);

}
	
//IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII	
	function filas()
	{
		$consulta = $this->db->get('programa_seleccionado');
		return  $consulta->num_rows() ;
	}
	
	function total_posts($por_pagina, $segmento) {
        
        $consulta = $this->db->get('programa_seleccionado', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }
    
    function actualizar_semestre($id,$data) {
        
        $DB2 = $this->load->database('local', TRUE);        
        $array = array('numero_control' => $id);
        $DB2->where($array);
	$DB2->update('alumnos', $data);
    }
	
}
