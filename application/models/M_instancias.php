<?php
 
class M_instancias extends CI_Model{
 
    public function construct() {
        parent::__construct();
    }
 
    //obtenemos el total de filas para hacer la paginación del buscador
    function instancias($buscador) {

        $this->db->like('nombre_instancia', $buscador);
		$this->db->or_like('sector_instancia', $buscador);
        $consulta = $this->db->get('instancia');
        return $consulta->num_rows();
    }
	
	
 
    //obtenemos todos los posts a paginar con la función
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_paginados($buscador, $por_pagina, $segmento) {
        $this->db->like('nombre_instancia', $buscador);
		$this->db->or_like('sector_instancia', $buscador);
        $consulta = $this->db->get('instancia', $por_pagina, $segmento);
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
