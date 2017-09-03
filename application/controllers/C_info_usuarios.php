<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
/**
*
*/
class C_info_usuarios extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->library(array('session','form_validation'));
    $this->load->helper(array('url'));
    $this->load->model('m_usuarios');
  }
  public function index() {
    if ($this->session->userdata('perfil') == FALSE) {
      redirect(base_url() . 'index.php/logeo');
    }
    if ($this->session->userdata('perfil') == 'jefevinculacion') {
      $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
      $this->load->view('Residencia/JefeVinculacion/inicio_residencia_vinculacion', $data);
    } else {
      $this->load->view('notienespermisos');
    }
  }
  //ADMINISTRATIVO------------------------------------------------------------------------------
  public function administrativo() {
    if ($this->session->userdata('perfil') == FALSE) {
      redirect(base_url() . 'index.php/logeo');
    }
    if ($this->session->userdata('perfil') == 'jefevinculacion' || $this->session->userdata('perfil') == 'jefeacademico' ||
    $this->session->userdata('perfil') == 'coordinadorresidencia' || $this->session->userdata('perfil') == 'presidenteacademia' ||
    $this->session->userdata('perfil') == 'coordinadorprogac' || $this->session->userdata('perfil') == 'jeferesidencia') {
      $data['info'] = $this->session->userdata('perfil');
      $data['info_usuario'] = $this->m_usuarios->consulta_info_administrativo($this->session->userdata('id_usuario'));
      $this->load->view('v_info_administrativo', $data);
    } else {
      $this->load->view('notienespermisos');
    }
  }

  public function actualizar_administrativo() {
    $data = array(
      'nombre_usuariosistema' => $this->input->post('usuario'),
      'correo' => $this->input->post('correo')
    );
    $this->m_usuarios->actualizar($this->session->userdata('id_usuario'), $data);
    $data['info'] = $this->session->userdata('perfil');
    $data['info_usuario'] = $this->m_usuarios->consulta_info_administrativo($this->session->userdata('id_usuario'));
    $this->load->view('v_info_administrativo', $data);
  }

  public function validarEditarContrasena() {
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('contraacutal', 'Contraseña Actual', 'required|min_length[1]|max_length[20]');
    $this->form_validation->set_rules('contranueva1', 'Contraseña nueva', 'required|min_length[1]|max_length[20]');
    $this->form_validation->set_rules('contranueva2', 'Contraseña nueva repetida', 'required|min_length[1]|max_length[20]|matches[contranueva1]');
    $this->form_validation->set_message('required', '<i class="material-icons ">error</i>El campo no puede ir vacío');
    $this->form_validation->set_message('min_length', '<i class="material-icons ">error</i>El  campo debe tener al menos %s carácteres');
    $this->form_validation->set_message('max_length', '<i class="material-icons ">error</i>El campo no puede tener más de %s carácteres');
    $this->form_validation->set_message('matches', '<i class="material-icons ">error</i> Debe ser la misma contraseña.');
    if ($this->form_validation->run() == TRUE) {

      /*    $data = array(
      'contenido_n' => $this->input->post('cnoticia'),
      'fecha_noticia' => date('Y-m-d H:i:s'),
      'titulo_n' => $this->input->post('tnoticia')
    );*/
    //Transfering data to Model
    /*  $this->m_noticias->form_insert_residencia($data);
    $data['message'] = 'Los datos se insertaron correctamente';

    $data['noticiasResidencia'] = $this->m_noticias->shownoticiasResidencia();
    $this->load->view('Residencia/v_noticias_agregar_quitar', $data);*/
  } else {
    if ($this->session->userdata('perfil') == FALSE) {
      redirect(base_url() . 'index.php/logeo');
    }
    if ($this->session->userdata('perfil') == 'jefevinculacion' || $this->session->userdata('perfil') == 'jefeacademico' ||
    $this->session->userdata('perfil') == 'coordinadorresidencia' || $this->session->userdata('perfil') == 'presidenteacademia' ||
    $this->session->userdata('perfil') == 'coordinadorprogac' || $this->session->userdata('perfil') == 'jeferesidencia')
    {
      $data['messageerror'] = '<i class="material-icons ">error</i> Las contraseñas fueron incorrectas intente de nuevo.';
      $data['info'] = $this->session->userdata('perfil');
      $data['info_usuario'] = $this->m_usuarios->consulta_info_administrativo($this->session->userdata('id_usuario'));
      $this->load->view('v_info_administrativo', $data);
    } else {
      $this->load->view('notienespermisos');
    }
    //echo "error";
  }
}
//DOCENTES------------------------------------------------------------------------------
public function docente() {
  if ($this->session->userdata('perfil') == FALSE) {
    redirect(base_url() . 'index.php/logeo');
  }
  if ($this->session->userdata('perfil') == 'docente') {
    $data['info'] = $this->session->userdata('perfil');
    $data['nombres'] = $this->session->userdata('nombres');
    $data['apellidos'] = $this->session->userdata('apellidos');
    $data['info_usuario'] = $this->m_usuarios->consulta_info_docente($this->session->userdata('rfc'));
    $this->load->view('v_info_docente', $data);
  } else {

    $this->load->view('notienespermisos');
  }
}

function actualizar_docente() {
  $datos = array(
    //'contrasena' => sha1($this->input->post('contrasena'))
    'contrasena' => $this->input->post('contrasena')
  );
  if ($this->m_usuarios->actualizar_info_docente($this->session->userdata('rfc'), $datos)) {
    redirect(base_url() . 'index.php/c_info_usuarios/docente');
  } else {
    $this->load->view('notienespermisos');
  }
}

//ALUMNOS------------------------------------------------------------------------------
public function alumno() {
  if ($this->session->userdata('logged_in')) {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['nombre'] = $session_data['nombre'];
    $data['id_carrera'] = $session_data['id_carrera'];
    $data['id_semestre'] = $session_data['id_semestre'];
    $data['plan_estudios'] = $session_data['plan_estudios'];
    $data['sexo'] = $session_data['sexo'];
    $data['telefono'] = $session_data['telefono'];
    $data['domicilio'] = $session_data['domicilio'];
    $data['semestre_cursado'] = $session_data['semestre_cursado'];
    $data['creditos'] = $session_data['creditos'];
    $data['porcentaje_avance'] = $session_data['porcentaje_avance'];

    $otro = $this->m_usuarios->consulta_info_alumno($data['username']);
    foreach ($otro as $value) {
      $tmp = $value->correo;
    }
    $data['correo'] = $tmp;

    $this->load->view('v_info_alumno', $data);
  } else {
    //If no session, redirect to login page
    redirect('logeo', 'refresh');
  }
}

public function actualizar_alumno() {
  if ($this->session->userdata('logged_in')) {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['nombre'] = $session_data['nombre'];
    $data['id_carrera'] = $session_data['id_carrera'];
    $data['id_semestre'] = $session_data['id_semestre'];
    $data['plan_estudios'] = $session_data['plan_estudios'];
    $data['sexo'] = $session_data['sexo'];
    $data['telefono'] = $session_data['telefono'];
    $data['domicilio'] = $session_data['domicilio'];
    $data['semestre_cursado'] = $session_data['semestre_cursado'];
    $data['creditos'] = $session_data['creditos'];
    $data['porcentaje_avance'] = $session_data['porcentaje_avance'];
  }

  $datos = array(
    'correo' => $this->input->post('correo')
  );
  $this->m_usuarios->actualizar_alumno($data['username'], $datos);

  $otro = $this->m_usuarios->consulta_info_alumno($data['username']);
  foreach ($otro as $value) {
    $tmp = $value->correo;
  }
  $data['correo'] = $tmp;
  //        if ($data['correo'] != null) {
  //            $this->load->view('Residencia/Alumno/v_banco', $data);
  //        } else {
  //            $this->load->view('Residencia/Alumno/v_banco', $data);
  //        }
  redirect('Residencia/Alumno/C_banco');
}
}
