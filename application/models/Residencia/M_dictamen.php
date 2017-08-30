<?php

class M_dictamen extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function mostrar_jefe($id) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('usuarios');
        $DB2->where('id', $id);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_externo($empresa_pk, $anteproyecto) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('asesor_externo');
        $DB2->where('empresafk', $empresa_pk);
        $DB2->where('anteproyecto_fk', $anteproyecto);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_participantes2($id_participantes) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('participantes_proyecto');
        $DB2->where('id', $id_participantes);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_alumno($numero_control) {
        $numero_control = $numero_control . '  ';
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('alumnos');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_alumno3($nombre) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('alumnos');
        $DB2->like('nombre', $nombre);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_atencion($numero_control) {
        $numero_control = $numero_control . '  ';
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('atencion_medica');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_dictamen($numero_control) {
        $numero_control = $numero_control . '  ';
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_dictamen4($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_alumno2($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('alumnos');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_atencion2($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('atencion_medica');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_dictamen2($anteproyecto) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto');
        $DB2->where('anteproyecto', $anteproyecto);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_participantes($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('participantes_proyecto');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_nombre_docente($asesor_revisor) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('docentes d');
        $DB2->join('asesor_revisor a', 'a.id_docente=d.rfc');
        $DB2->where('a.asesor_revisor_pk', $asesor_revisor);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_carrera($id_carrera) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('carreras');
        $DB2->where('id_carrera', $id_carrera);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_dictamenes() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto da');
        $DB2->join('alumnos a', 'a.numero_control = da.numero_control');
        $DB2->where('doc_finales=false');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_dictamenes2() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto');
        $DB2->where('jefe_oficina_residencia=false');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function dictamenes($perfil) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto d');
        $DB2->join('anteproyecto a', 'a.anteproyecto_pk=d.anteproyecto');
        $DB2->join('alumnos al', 'al.numero_control=d.numero_control');
        $DB2->join('empresa e', 'e.empresa_pk=a.empresa_fk');
        $DB2->where('a.aprobado', 'A  ');
        $DB2->where($perfil . '!=true');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function dictamenes2($perfil, $departamento) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto d');
        $DB2->join('anteproyecto a', 'a.anteproyecto_pk=d.anteproyecto');
        $DB2->join('alumnos al', 'al.numero_control=d.numero_control');
        $DB2->join('empresa e', 'e.empresa_pk=a.empresa_fk');
        $DB2->where('a.departamento_anteproyecto', $departamento);
        $DB2->where('a.aprobado', 'A  ');
        $DB2->where('d.' . $perfil . '!=true');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function dictamenes3($perfil, $departamento, $carrera) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('dictamen_anteproyecto d');
        $DB2->join('anteproyecto a', 'a.anteproyecto_pk=d.anteproyecto');
        $DB2->join('alumnos al', 'al.numero_control=d.numero_control');
        $DB2->join('empresa e', 'e.empresa_pk=a.empresa_fk');
        $DB2->where('a.departamento_anteproyecto', $departamento);
        $DB2->where('al.id_carrera', $carrera);
        $DB2->where('a.aprobado', 'A  ');
        $DB2->where('d.' . $perfil . '!=true');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function actualiza_dictamen($numero_control, $datos) {
        $numero_control = $numero_control . '  ';
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control', $numero_control);
        return $DB2->update('dictamen_anteproyecto', $datos);
    }

    function actualiza_bitacora($numero_control, $datos) {
        $numero_control = $numero_control . '  ';
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control', $numero_control);
        return $DB2->update('bitacora_avance_alumno', $datos);
    }

    function obtener_id_carrera($nc) {
        $numero_control = $nc . '  ';
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('id_carrera');
        $DB2->from('alumnos');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
