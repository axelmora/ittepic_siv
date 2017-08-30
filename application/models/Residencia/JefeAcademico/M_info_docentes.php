<?php

class M_info_docentes extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function consulta_docentes($departamento) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('docentes');
        $DB2->where('departamento', $departamento);
        $DB2->order_by('nombres', $departamento);

        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function consulta_docente_prestado($rfc) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('docente_prestado');
        $DB2->where('rfc', $rfc);        

        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function consulta_docente_prestamos($rfc,$dd) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('docente_prestado');
        $DB2->where('rfc', $rfc);
        $DB2->where('departamento_destino', $dd);

        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function inserar_docente_prestado($datos) {
        $DB2 = $this->load->database('local', TRUE);
        return $DB2->insert('docente_prestado', $datos);
    }
    public function borrar_docente_prestado($id){
        $DB2 = $this->load->database('local', TRUE);        
        $DB2->where('id',$id);
        $DB2->delete('docente_prestado');        
    }
    public function actualizar_info_docentes($rfc, $datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('rfc', $rfc);
        if ($DB2->update('docentes', $datos)) {
            return true;
        }
        return false;
    }

//******************************BORRAR DE AQUI PARA ABAJO*******************************************    

    function insertar_empresa($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('empresa', $datos);
    }

    function insertar_asesor_externo($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('asesor_externo', $datos);
    }

    function insertar_anteproyecto($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('anteproyecto', $datos);
    }

    function consulta_empresas_por_fecha() {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('empresa');
        $DB2->order_by('fecha_alta', 'desc');


        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_banco_proyectos_por_departamento($departamento) {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.*,e.nombre_empresa,e.telefono,e.sector,e.domicilio,e.colonia,e.ciudad,e.codigo_postal');
        $DB2->from('anteproyecto a');
        $DB2->join('empresa e', 'e.empresa_pk = a.empresa_fk');
        $array = array('departamento_anteproyecto' => $departamento, 'disponible' => true);
        $DB2->where($array);
        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $DB2->query('SELECT A.*, E.* from anteproyecto A, empresa E where A.empresa_fk = E.empresa_pk and A.departamento_anteproyecto ='.$departamento.' and A.disponible = true');
    }

    function consulta_vacantes_por_fecha() {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('vacantes_residencia');
        //$DB2->order_by('fecha_alta', 'desc');

        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function consulta_id_empresa_por_fecha() {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('empresa');
        $DB2->order_by('fecha_alta', 'desc');
        $DB2->limit(1);

        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
