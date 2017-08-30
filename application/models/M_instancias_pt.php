<?php
 
class M_instancias_pt extends CI_Model{
 
    public function construct() {
        parent::__construct();
    }
 
    //obtenemos el total de filas para hacer la paginación del buscador
    function programas($id) {
    	$DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('programa_instancia');
        $DB2->where('id_instancia', $id);
        $consulta = $DB2->get();
		
        return $consulta->num_rows();
    }
	
	 
	 function instancias($id) {
    	$DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('instancia');
        $DB2->where('id_instancia', $id);
        $consulta = $DB2->get();
		
		if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }
	
 
    //obtenemos todos los posts a paginar con la función
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_paginados($id, $por_pagina, $segmento) {
    	$DB2 = $this->load->database('local', TRUE);
        $DB2->select('*, t.id, i.id_instancia');
        $DB2->from('programa_instancia p');
		$DB2->join('tipo_programa t', 't.id = p.id_tipoprograma');
        $DB2->join('instancia i', 'i.id_instancia = p.id_instancia');
        $DB2->where('p.id_instancia', $id);
		$DB2->limit($por_pagina, $segmento);
		$consulta = $DB2->get();

		
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }
	
//IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII	
	function filas()
	{
		$consulta = $this->db->get('instancia');
		return  $consulta->num_rows() ;
	}
	
	function total_posts($por_pagina, $segmento) {
        
        $consulta = $this->db->get('instancia', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }
	
}
