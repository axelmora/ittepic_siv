<?php

class M_programasalumno extends CI_Model {

    public function construct() {
        parent::__construct();
    }

    //obtenemos el total de filas para hacer la paginación del buscador
    function programas($buscador) {
        $this->db->like('nombre_programa', $buscador);
        $this->db->or_like('nombre_instancia', $buscador);
        $consulta = $this->db->get('programa_instancia');
        return $consulta->num_rows();
    }

    //obtenemos todos los posts a paginar con la función
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_paginados($buscador, $por_pagina, $segmento) {
        $this->db->like('nombre_programa', $buscador);
        $this->db->or_like('nombre_instancia', $buscador);
        $consulta = $this->db->get('programa_instancia', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    function datosporid($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('programa_instancia');
        $DB2->join('tipo_programa', 'id_tipoprograma = tipo_programa.id_tipoprograma');
        $DB2->where('id_programa', $data);
        $query = $DB2->get();
        $result = $query->result();
        return $result;
    }

//IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII	
    function filas() {
        $consulta = $this->db->get('programa_instancia', 'instancia', 'tipo_programa');
        return $consulta->num_rows();
    }

    function total_instancias() {

        $this->db->select('*');
        $this->db->from('instancia');
        $this->db->order_by('instancia.nombre_instancia', 'asc');

        $consulta = $this->db->get();


        return $consulta->result();

        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    function total_PxI() {

        $this->db->select('*');
        $this->db->from('programa_instancia');
        $this->db->join('tipo_programa', 'tipo_programa.id = programa_instancia.id_tipoprograma');
        $this->db->join('instancia', 'instancia.id_instancia = programa_instancia.id_instancia');
        $this->db->order_by('programa_instancia.id_instancia', 'asc');

        $consulta = $this->db->get();


        return $consulta->result();

        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    function total_posts($limit, $segmento) {

        $this->db->select('*, tipo_programa.id, instancia.id_instancia');
        $this->db->from('programa_instancia');
        $this->db->join('tipo_programa', 'tipo_programa.id = programa_instancia.id_tipoprograma');
        $this->db->join('instancia', 'instancia.id_instancia = programa_instancia.id_instancia');
        $this->db->order_by('programa_instancia.id_instancia', 'asc');
        $this->db->limit($limit, $segmento);
        $consulta = $this->db->get();


        return $consulta->result();

        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    function form_insert($data) {
// Inserting in Table(students) of Database(college

        $DB2 = $this->load->database('local', TRUE);

        $DB2->insert('programa_seleccionado', $data);
    }

    function insert_soli($id, $datas) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_solicitud', $id);
        $DB2->update('programa_instancia', $datas);
    }

}
?>
	



