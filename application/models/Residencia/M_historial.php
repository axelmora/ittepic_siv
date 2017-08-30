<?php

class M_historial extends CI_Model {

    function __construct() {
        parent::__construct();
    }
//para alumno el numero de control, para docente su rfc y para administrador su id_usuario(ver si se puede usar el id, si no el usuario)
    function mostrar_historial($destinatario) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('historial_notificacion');
        $DB2->where('destinatario',$destinatario);
        $DB2->order_by('fecha', 'desc');
        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function insertar_historial($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('historial_notificacion', $datos);
    }
    
    function consulta_correo_alumno($nc) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('correo');
        $DB2->from('alumnos');
        $DB2->where('numero_control', $nc);

        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function consulta_correo_alumno2($idp) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT A.NUMERO_CONTROL,A.CORREO FROM ALUMNOS A
WHERE A.NUMERO_CONTROL = (SELECT PP.NUMERO_CONTROL FROM PARTICIPANTES_PROYECTO PP WHERE PP.ID = '.$idp.')');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function consulta_correo_docente($rfc) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('correo');
        $DB2->from('docentes');
        $DB2->where('rfc', $rfc);

        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }    
    function consulta_correo_docente2($nc) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT D.RFC,D.CORREO FROM DOCENTES D, PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR
WHERE PP.ID = (SELECT PP.ID FROM PARTICIPANTES_PROYECTO PP WHERE NUMERO_CONTROL = \''.$nc.'\') 
AND PP.ASESOR = AR.ASESOR_REVISOR_PK AND AR.ID_DOCENTE = D.RFC');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }    
    
    function consulta_correo_asesor($nc) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT D.RFC, D.CORREO FROM DOCENTES D, DICTAMEN_ANTEPROYECTO DA, PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR
WHERE PP.NUMERO_CONTROL = \''.$nc.'\' AND
PP.ASESOR = AR.ASESOR_REVISOR_PK AND AR.ID_DOCENTE = D.RFC');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }    
    
    function consulta_correo_usuario($usuario) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('correo');
        $DB2->from('usuarios');
        $DB2->where('usuario', $usuario);

        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }                
    function NombreAlu_NombreProyecto($nc,$aid) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT AL.NOMBRE,A.NOMBRE_PROYECTO FROM ALUMNOS AL, ANTEPROYECTO A
 WHERE AL.NUMERO_CONTROL = \''.$nc.'\' AND A.ANTEPROYECTO_PK = '.$aid.'');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }                

}
