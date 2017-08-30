<?php

class M_banco_proyectos extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function obtener_departamento($id_carrera) {
        if ($id_carrera == 2 || $id_carrera == 7 || $id_carrera == 15) {
            return 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
        }
        if ($id_carrera == 3) {
            return 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
        }
        if ($id_carrera == 8 || $id_carrera == 9) {
            return 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
        }
        if ($id_carrera == 6) {
            return 'DEPTO. DE INGENIERIA INDUSTRIAL';
        }
        if ($id_carrera == 4) {
            return 'DEPARTAMENTO DE INGENIERIAS';
        }
        if ($id_carrera == 5 || $id_carrera == 13) {
            return 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
        }
        if ($id_carrera == 10 || $id_carrera == 14) {
            return 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
        }
        return 'Sin Departamento';
    }

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

    public function obtener_anteproyecto($id_anteproyecto) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('anteproyecto');
        $DB2->where('anteproyecto_pk', $id_anteproyecto);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function obtener_anteproyecto2($id_anteproyecto) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('anteproyecto');
        $DB2->where('anteproyecto_pk', $id_anteproyecto);
        $DB2->where('lugares_disponibles >',0 );
        $DB2->where('disponible',true );
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function obtener_coordi($id_coordi) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('usuarios');
        $DB2->where('id', $id_coordi);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function obtener_alumno($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('alumnos');
        $DB2->where('numero_control', $numero_control);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function obtener_empresa($id_empresa) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('empresa');
        $DB2->where('empresa_pk', $id_empresa);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
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

    function consulta_banco_proyectos() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.*,e.nombre_empresa,e.telefono,e.sector,e.domicilio,e.colonia,e.ciudad,e.codigo_postal,,(SELECT D.NOMBRES FROM DOCENTES D WHERE D.RFC = A.POSIBLE_ASESOR),(SELECT D.APELLIDOS  FROM DOCENTES D WHERE D.RFC = A.POSIBLE_ASESOR)');
        $DB2->from('anteproyecto a');
        $DB2->join('empresa e', 'e.empresa_pk = a.empresa_fk');
        $array = array('disponible' => true);
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

    function consulta_banco_proyectos_por_departamento($departamento) {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.*,e.nombre_empresa,e.telefono,e.sector,e.domicilio,e.colonia,e.ciudad,e.codigo_postal,(SELECT D.NOMBRES FROM DOCENTES D WHERE D.RFC = A.POSIBLE_ASESOR),(SELECT D.APELLIDOS  FROM DOCENTES D WHERE D.RFC = A.POSIBLE_ASESOR)');
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
        $query = $DB2->query('SELECT VR.* FROM VACANTES_RESIDENCIA VR WHERE VR.ID_VACANTE NOT IN(SELECT A.ID_VACANTE FROM ANTEPROYECTO A WHERE A.ID_VACANTE IS NOT NULL) ORDER BY VR.FECHA_VACANTE DESC');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_posible_asesor($departamento) {
        $DB2 = $this->load->database('local', TRUE);
        $array = array('departamento' => $departamento, 'disponible' => true);        

        $DB2->select('nombres,apellidos,rfc');
        $DB2->from('docentes');
        $DB2->where($array);
        $DB2->order_by('nombres', 'asc');

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
