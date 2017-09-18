<?php

class M_info_participantes_proyecto extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function info_proyectos_jacademico($departamento) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT PP.ID,PP.NUMERO_CONTROL,AL.NOMBRE,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
PARTICIPANTES_PROYECTO PP,ALUMNOS AL
WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK AND AL.NUMERO_CONTROL = PP.NUMERO_CONTROL
AND A.DEPARTAMENTO_ANTEPROYECTO = \''.$departamento.'\' AND PP.ASESOR IS NOT NULL');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function info_proyectos_asesor($rfc) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT PP.ID,PP.NUMERO_CONTROL,AL.NOMBRE,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR,ALUMNOS AL
WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK AND AL.NUMERO_CONTROL = PP.NUMERO_CONTROL
AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ASESOR_REVISOR_PK = PP.ASESOR');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function info_proyectos_revisor($rfc) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT PP.ID,AL.NOMBRE,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR, ALUMNOS AL
WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK AND AL.NUMERO_CONTROL = PP.NUMERO_CONTROL
AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ASESOR_REVISOR_PK = PP.REVISOR1
UNION
SELECT PP.ID,AL.NOMBRE,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR, ALUMNOS AL
WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK AND AL.NUMERO_CONTROL = PP.NUMERO_CONTROL
AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ASESOR_REVISOR_PK = PP.REVISOR2');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function info_asesor($idp) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT PP.ID,PP.ASESOR,D.NOMBRES, D.APELLIDOS, D.CORREO,AR.TIPO
FROM PARTICIPANTES_PROYECTO PP, DOCENTES D, ASESOR_REVISOR AR
WHERE PP.ID = '.$idp.' AND D.RFC = AR.ID_DOCENTE AND AR.ASESOR_REVISOR_PK = PP.ASESOR');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function info_revisor1($idp) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT PP.ID,PP.REVISOR1,D.NOMBRES, D.APELLIDOS, D.CORREO,AR.TIPO
FROM PARTICIPANTES_PROYECTO PP, DOCENTES D, ASESOR_REVISOR AR
WHERE PP.ID = '.$idp.' AND D.RFC = AR.ID_DOCENTE AND AR.ASESOR_REVISOR_PK = PP.REVISOR1');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function info_revisor2($idp) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT PP.ID,PP.REVISOR2,D.NOMBRES, D.APELLIDOS, D.CORREO,AR.TIPO
FROM PARTICIPANTES_PROYECTO PP, DOCENTES D, ASESOR_REVISOR AR
WHERE PP.ID = '.$idp.' AND D.RFC = AR.ID_DOCENTE AND AR.ASESOR_REVISOR_PK = PP.REVISOR2');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function info_asesor_externo($idp) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT AE.* FROM ASESOR_EXTERNO AE,PARTICIPANTES_PROYECTO PP
WHERE PP.ID = '.$idp.' AND AE.ASESOR_EXTERNOPK = PP.ASESOR_EXTERNO
AND AE.ANTEPROYECTO_FK = PP.ANTEPROYECTO_FK');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function info_residente($idp) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT A.NUMERO_CONTROL,A.NOMBRE,A.CORREO
FROM ALUMNOS A, PARTICIPANTES_PROYECTO PP
WHERE PP.ID = '.$idp.' AND A.NUMERO_CONTROL = PP.NUMERO_CONTROL');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_docentes($dep) {
        $DB2 = $this->load->database('local', TRUE);

        $query = $DB2->query("SELECT D.* FROM DOCENTES D
WHERE D.DEPARTAMENTO = '" . $dep . "' AND D.DISPONIBLE = TRUE
 UNION
SELECT D.* FROM DOCENTE_PRESTADO DP,DOCENTES D
WHERE DP.RFC = D.RFC AND DP.DEPARTAMENTO_DESTINO = '" . $dep . "' AND D.DISPONIBLE = TRUE ORDER BY NOMBRES");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_docentes_otros_departamentos() {
        $DB2 = $this->load->database('local', TRUE);

        $query = $DB2->query("SELECT * FROM DOCENTES
WHERE DEPARTAMENTO NOT IN ('DEPARTAMENTO DE CIENCIAS DE LA TIERRA','DEPARTAMENTO DE SISTEMAS Y COMPUTACION',
'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA','DEPTO. DE INGENIERIA INDUSTRIAL','DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA',
'DEPARTAMENTO DE INGENIERIAS','DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS') ORDER BY NOMBRES");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

     public function insertar_asesor_revisor($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $insertar_docentes = $DB2->insert('asesor_revisor', $datos);
        if ($insertar_docentes) {//retorna el id del asesor que se inserto
            $query = $DB2->query('
            SELECT MAX(AR.ASESOR_REVISOR_PK) AS ULTIMO
            FROM ASESOR_REVISOR AR');

            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        return false;
    }

    public function actualizar_participantes_proyecto($id, $datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id', $id);
        $DB2->update('participantes_proyecto', $datos);
    }
//******************************borrar de aqui para abajo*****************
    function mostrar_vacantes($departamento) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('vacantes_residencia');
        $DB2->where('carreras', $departamento);
        $DB2->order_by('fecha_vacante', 'desc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_empresas() {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('empresa');
        $query = $DB2->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function inserta_vacante($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('vacantes_residencia', $data);
    }

    function elimina_vacante($idvacante) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_vacante', $idvacante);
        $DB2->delete('vacantes_residencia');
    }

    public function actualizardatosasesorexterno($id,$nombre)
    {
      $DB2 = $this->load->database('default', TRUE);
      $DB2->set('nombre', $nombre);
      $DB2->where('asesor_externopk', $id);
      $DB2->update('asesor_externo');
      return true;
    }

}
