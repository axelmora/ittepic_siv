<?php

class M_asignar_asesor extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function consulta_numeros_control_participantes($id_usuario) {

        $DB2 = $this->load->database('local', TRUE);
        $tmp = '';
        ///Aqui esta mal la consulta hay que corregirla
        switch ($id_usuario) {
            case '7':
                $tmp = ' AND A.ID_CARRERA = 3';
                break;
            case '15':
                $tmp = ' AND A.ID_CARRERA = 3';
                break;
            case '8':
                $tmp = ' AND (A.ID_CARRERA = 2 OR A.ID_CARRERA = 7 OR A.ID_CARRERA = 15 OR A.ID_CARRERA = 11)';
                break;
            case '16':
                $tmp = ' AND (A.ID_CARRERA = 2 OR A.ID_CARRERA = 7 OR A.ID_CARRERA = 15 OR A.ID_CARRERA = 11)';
                break;
            case '9':
                $tmp = ' AND (A.ID_CARRERA = 8 OR A.ID_CARRERA = 9)';
                break;
            case '17':
                $tmp = ' AND (A.ID_CARRERA = 8 OR A.ID_CARRERA = 9)';
                break;
            case '10':
                $tmp = ' AND A.ID_CARRERA = 6';
                break;
            case '18':
                $tmp = ' AND A.ID_CARRERA = 6';
                break;
            case '11':
                $tmp = ' AND (A.ID_CARRERA = 5 OR A.ID_CARRERA = 13)';
                break;
            case '19':
                $tmp = ' AND (A.ID_CARRERA = 5 OR A.ID_CARRERA = 13)';
                break;
            case '12':
                $tmp = ' AND A.ID_CARRERA = 4';
                break;
            case '20':
                $tmp = ' AND A.ID_CARRERA = 4';
                break;
            case '13':
                $tmp = ' AND (A.ID_CARRERA = 10 OR A.ID_CARRERA = 14)';
                break;
            case '21':
                $tmp = ' AND (A.ID_CARRERA = 10 OR A.ID_CARRERA = 14)';
                break;
        }
        $query = $DB2->query('
            SELECT PP.*,A.NOMBRE
            FROM PARTICIPANTES_PROYECTO PP, ALUMNOS A
            WHERE PP.NUMERO_CONTROL = A.NUMERO_CONTROL AND PP.ASESOR IS NULL' . $tmp);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_residentes_sin_asesor($id_participantes) {

        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT PP.*,A.*,AP.*,S.SEMESTRE, C.CARRERA, E.EMPRESA_PK, E.NOMBRE_EMPRESA
            FROM PARTICIPANTES_PROYECTO PP,ALUMNOS A, ANTEPROYECTO AP, SEMESTRE S, CARRERAS C, EMPRESA E
            WHERE PP.ID = ' . $id_participantes . ' AND PP.NUMERO_CONTROL = A.NUMERO_CONTROL AND AP.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK AND A.ID_SEMESTRE = S.ID_SEMESTRE AND A.ID_CARRERA = C.ID_CARRERA AND E.EMPRESA_PK = AP.EMPRESA_FK');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function NombreAlumno_NombreAnteproyecto($idp) {

        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT AL.NOMBRE,A.NOMBRE_PROYECTO FROM ALUMNOS AL, ANTEPROYECTO A, PARTICIPANTES_PROYECTO PP
 WHERE PP.ID = '.$idp.' AND PP.NUMERO_CONTROL = AL.NUMERO_CONTROL AND PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_docentes($id_usuario) {
        $DB2 = $this->load->database('local', TRUE);
        $tmp = '';
        switch ($id_usuario) {
            case '7':
                $tmp = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '15':
                $tmp = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '8':
                $tmp = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '16':
                $tmp = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '9':
                $tmp = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '17':
                $tmp = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '10':
                $tmp = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '18':
                $tmp = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '11':
                $tmp = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '19':
                $tmp = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '12':
                $tmp = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '20':
                $tmp = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '13':
                $tmp = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            case '21':
                $tmp = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;

            default:
                break;
        }
        $query = $DB2->query("SELECT D.* FROM DOCENTES D
WHERE D.DEPARTAMENTO = '" . $tmp . "' AND D.DISPONIBLE = TRUE
 UNION
SELECT D.* FROM DOCENTE_PRESTADO DP,DOCENTES D
WHERE DP.RFC = D.RFC AND DP.DEPARTAMENTO_DESTINO = '" . $tmp . "' AND D.DISPONIBLE = TRUE ORDER BY NOMBRES");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function consulta_docentes2() {
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

    public function insertar_participantes_proyecto($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('participantes', $datos);
    }

    public function insertar_asesor_revisor($datos) {
        $DB2 = $this->load->database('local', TRUE);
        echo "$datos";
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

    public function insertar_asesor_externo($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $ae = $DB2->insert('asesor_externo', $datos);
        if ($ae) {
            $query = $DB2->query('
            SELECT MAX(AE.ASESOR_EXTERNOPK) AS ULTIMO
            FROM ASESOR_EXTERNO AE');

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

    function consulta_ultimo_insertado() {

        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT MAX(AR.ASESOR_REVISOR)
            FROM ASESOR_REVISOR AR');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function tiene_asesor_y_revisores($ppid) {

        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('select * from participantes_proyecto where id = '.$ppid.' and asesor is not null');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
