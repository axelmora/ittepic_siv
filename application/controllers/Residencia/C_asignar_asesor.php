<?php
/**
* Description of C_asignar_asesor
*
* @author javier
*/
date_default_timezone_set('America/Mazatlan');
class C_asignar_asesor extends CI_Controller {
  var $mensajes = '';
  public function __construct() {
    parent::__construct();
    $this->load->database('local');
    $this->load->model('Residencia/m_asignar_asesor');
    $this->load->model('Residencia/m_historial');
    if ($this->session->userdata('perfil') == 'jefeacademico' || $this->session->userdata('perfil') == 'coordinadorresidencia') {//coordinador de residencia, jefe academico
    } else {
      redirect(base_url() . 'index.php/logeo');
    }
  }
  public function index() {

    $data['info'] = $this->session->userdata('perfil');
    $data['residentes'] = $this->m_asignar_asesor->consulta_numeros_control_participantes($this->session->userdata('id_usuario'));
    $data['residente_info'] = false;
    $data['mensajes'] = $this->mensajes;
    $this->load->view('Residencia/v_asignar_asesor', $data);
  }

  public function info_residente_sin_asesor() {

    $data['info'] = $this->session->userdata('perfil');
    $data['residentes'] = $this->m_asignar_asesor->consulta_numeros_control_participantes($this->session->userdata('id_usuario'));
    $data['residente_info'] = $this->m_asignar_asesor->consulta_residentes_sin_asesor($this->input->post('participantes_id'));
    $data['id_participantes'] = $this->input->post('participantes_id');
    $data['docentes'] = $this->m_asignar_asesor->consulta_docentes($this->session->userdata('id_usuario'));
    $data['docentes_otros'] = $this->m_asignar_asesor->consulta_docentes2();
    $data['mensajes'] = $this->mensajes;
    $this->load->view('Residencia/v_asignar_asesor', $data);
  }

  public function asignar() {
    try {
      //recopilo informacion de docentes para ponerla en la tabla
      //SE VERIFICA SI SOLO SE SELECIONO 1 ASESOR O REVISORES
      $datos_asesor = array(
        'id_docente' => $this->input->post('rfc_asesor'),
        'tipo' => 'A'
      );
      $id_asesor = $this->m_asignar_asesor->insertar_asesor_revisor($datos_asesor);
      if ($this->input->post('rfc_revisor1')=="0") {
        //  echo "VACIO1";
      }else {
        $datos_revisor1 = array(
          'id_docente' => $this->input->post('rfc_revisor1'),
          'tipo' => 'R'
        );
        $id_revisor1 = $this->m_asignar_asesor->insertar_asesor_revisor($datos_revisor1);
      }
      if ($this->input->post('rfc_revisor2')=="0") {
        //  echo "VACIO2";
      }else {
        $datos_revisor2 = array(
          'id_docente' => $this->input->post('rfc_revisor2'),
          'tipo' => 'R'
        );
        $id_revisor2 = $this->m_asignar_asesor->insertar_asesor_revisor($datos_revisor2);
      }

      if ($this->input->post('banco') == 't') {
        $datos_asesore = array(
          'empresafk' => mb_strtoupper($this->input->post('id_empresa'), 'UTF-8'),
          'nombre' => mb_strtoupper($this->input->post('nombre_asesore'), 'UTF-8'),
          'correo' => $this->input->post('correo_ae'),
          'puesto' => mb_strtoupper($this->input->post('puesto_ae'), 'UTF-8'),
          'area' => mb_strtoupper($this->input->post('area_ae'), 'UTF-8'),
          'anteproyecto_fk' => mb_strtoupper($this->input->post('id_anteproyecto'), 'UTF-8')
        );

        $id_asesore = $this->m_asignar_asesor->insertar_asesor_externo($datos_asesore);

        foreach ($id_asesore as $value) {
          $tmp = $value->ultimo;
          $datos_participantes['asesor_externo'] = $tmp;
        }
      }

      foreach ($id_asesor as $value) {
        $tmp = $value->ultimo;
        $datos_participantes['asesor'] = $tmp;
      }

      if ($this->input->post('rfc_revisor1')!="0") {
        foreach ($id_revisor1 as $value) {
          $tmp = $value->ultimo;
          $datos_participantes['revisor1'] = $tmp;
        }
      }
      if ($this->input->post('rfc_revisor2')!="0") {
        foreach ($id_revisor2 as $value) {
          $tmp = $value->ultimo;
          $datos_participantes['revisor2'] = $tmp;
        }

      }
      $this->m_asignar_asesor->actualizar_participantes_proyecto($this->input->post('id_participantes'), $datos_participantes);
      $this->mensajes = 'Asignación exitosa';

      $consulta_correo_Alu = $this->m_historial->consulta_correo_alumno2($this->input->post('id_participantes'));
      $consulta_correo_A = $this->m_historial->consulta_correo_docente($this->input->post('rfc_asesor'));
      if ($this->input->post('rfc_revisor1')!=0) {
        $consulta_correo_R1 = $this->m_historial->consulta_correo_docente($this->input->post('rfc_revisor1'));
      }
      if ($this->input->post('rfc_revisor2')!=0) {
        $consulta_correo_R2 = $this->m_historial->consulta_correo_docente($this->input->post('rfc_revisor2'));
      }
      $info_alumno = $this->m_asignar_asesor->NombreAlumno_NombreAnteproyecto($this->input->post('id_participantes'));

      $NC = '';
      $correoAlu = '';
      $correoA = '';
      $correoR1 = '';
      $correoR2 = '';
      $nombreAlu = '';
      $proyecto = '';

      foreach ($consulta_correo_Alu as $value) {
        $correoAlu = $value->correo;
        $NC = $value->numero_control;
      }
      foreach ($consulta_correo_A as $value) {
        $correoA = $value->correo;
      }
      if ($this->input->post('rfc_revisor1')!=0) {
        foreach ($consulta_correo_R1 as $value) {
          $correoR1 = $value->correo;
        }
      }
      if ($this->input->post('rfc_revisor2')!=0) {
        foreach ($consulta_correo_R2 as $value) {
          $correoR2 = $value->correo;
        }
      }
      foreach ($info_alumno as $value) {
        $nombreAlu = $value->nombre;
        $proyecto = $value->nombre_proyecto;
      }

      $this->enviar_correo($NC, $correoAlu, 'Asignación de asesor y revisores', 'Tu asesor y revisores han sido asignados, ingresa a http://siv.ittepic.edu.mx/ para mas información.'); //enviar correo a asesor
      $this->enviar_correo($this->input->post('rfc_asesor'), $correoA, 'Asignación en anteproyecto', 'Ha sido asignado como asesor de '.$nombreAlu.' en el anteproyecto: '.$proyecto.', ingresa a http://siv.ittepic.edu.mx/ para mas información.'); //enviar correo a asesor

      if ($this->input->post('rfc_revisor1')!=0) {
        $this->enviar_correo($this->input->post('rfc_revisor1'), $correoR1, 'Asignación en anteproyecto', 'Ha sido asignado como revisor de '.$nombreAlu.' en el anteproyecto: '.$proyecto.', ingresa a http://siv.ittepic.edu.mx/ para mas información.'); //enviar correo a revisor1

      }
      if ($this->input->post('rfc_revisor2')!=0) {
        $this->enviar_correo($this->input->post('rfc_revisor2'), $correoR2, 'Asignación en anteproyecto', 'Ha sido asignado como revisor de '.$nombreAlu.' en el anteproyecto: '.$proyecto.', ingresa a http://siv.ittepic.edu.mx/ para mas información.'); //enviar correo a revisor2

      }

      redirect('Residencia/C_asignar_asesor');
    } catch (Exception $ex) {
      $this->mensajes = $ex->getMessage();
      $this->index();
    }
  }

  public function tiene_asesor() {
    echo json_encode(array('respuesta' =>$this->m_asignar_asesor->tiene_asesor_y_revisores($this->input->post('id_participantes'))));
  }

  private function enviar_correo($id_usuario, $to, $subject, $message) {
      if ($to != null || $to != '') {
    //cargamos la libreria email de ci
    $this->load->library("email");
    //configuracion para gmail
    $configGmail = array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'avisosiv@ittepic.edu.mx',
    'smtp_pass' => 'sivittepic',
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'newline' => "\r\n"
  );
  //cargamos la configuración para enviar con gmail
  $this->email->initialize($configGmail);

  $this->email->from('avisosiv@ittepic.edu.mx', 'Sistema Integral de Vinculación');
  $this->email->to($to);
  $this->email->subject($subject);
  $this->email->message('<h2>' . $message . '</h2>');
  $this->email->send();
  $a = array(
  'destinatario' => $id_usuario,
  'asunto' => $subject,
  'fecha' => date('Y-m-d'),
);
$this->m_historial->insertar_historial($a);
//var_dump('Se envió');
//con esto podemos ver el resultado
//var_dump($this->email->print_debugger());
//  }
}

}
