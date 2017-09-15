<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mazatlan');

class C_proponer extends CI_Controller {

  private $error;

  function __construct() {
    parent::__construct();
    $this->load->helper(array('url', 'form'));
    $this->load->library(array('form_validation'));
    $this->load->model('Residencia/Alumno/m_propuesta');
    $this->load->model('Residencia/m_vacantes');
    $this->load->model('Residencia/m_banco_proyectos');
    $this->load->model('Residencia/m_historial');
    $this->load->model('m_usuarios');
    $this->load->helper(array('form', 'url'));
    $this->load->helper('download');
    $this->load->helper('path');
  }

  public function index() {
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
      $data['id_vacante'] = false;
      $data['empresas'] = $this->m_vacantes->mostrar_empresas();
      $data['solicitud'] = $this->m_propuesta->solicitud($session_data['username']);
      $data['error'] = $this->error;

      $otro = $this->m_usuarios->consulta_info_alumno($data['username']);
      foreach ($otro as $value) {
        $tmp = $value->correo;
      }
      if ($tmp == null) {
        redirect('C_info_usuarios/alumno');
      }

      //cargamos la vista y el array data
      $this->load->view('Residencia/Alumno/v_proponer', $data);
    } else {
      //If no session, redirect to login page
      redirect('logeo', 'refresh');
    }
  }

  public function inicio($id_vacante) {
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
      $data['empresas'] = $this->m_vacantes->mostrar_empresas();
      $data['solicitud'] = $this->m_propuesta->solicitud($session_data['username']);
      $data['id_vacante'] = $id_vacante;
      $data['error'] = $this->error;
      //cargamos la vista y el array data
      $this->load->view('Residencia/Alumno/v_proponer', $data);
    } else {
      //If no session, redirect to login page
      redirect('logeo', 'refresh');
    }
  }

  public function insertar() {
    $this->load->library('form_validation');

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
    $datax['hoy'] = date("Y-m-d");
    $fecha1 = date('Y-m-d', strtotime($datax['hoy'] . ' + 7 days'));
    if ($this->input->post('valida_empresa') == 'true') {


      $respuesta = $this->do_upload_Alumno();
      if (array_key_exists('error', $respuesta)) {
        $this->index();
      } else {
        $archivo_alumno = array(
          'numero_control_fk' => $data['username'],
          'descripcion_archivo' => mb_strtoupper($this->input->post('descripcion_archivo'), 'UTF-8'),
          'tipo_documento' => 'A',
          'estado' => 'ER',
          'fecha_guardado_documento' => date('Y-m-d H:i:s'),
          'fecha_limite_revision' => $fecha1,
          'ruta_archivo' => $respuesta['ruta'],
          'nombre_archivo' => mb_strtoupper($respuesta['nombre_archivo'], 'UTF-8'));

          $this->m_propuesta->insertar_archivo_alumno($archivo_alumno);

          if ($this->input->post('residentes_requeridos') - 1 == 0) {
            $disponible = FALSE;
          } else {
            $disponible = TRUE;
          }

          $nuevo2 = $this->m_banco_proyectos->obtener_departamento($data['id_carrera']);
          $anteproyecto = array(
            'nombre_proyecto' => mb_strtoupper($this->input->post('nombre_proyecto'), 'UTF-8'),
            'ruta_archivo' => $respuesta['ruta'],
            'nombre_archivo' => mb_strtoupper($respuesta['nombre_archivo'], 'UTF-8'),
            'fecha_alta' => date('Y-m-d H:i:s'),
            'banco' => FALSE,
            'empresa_fk' => $this->input->post('empresa_fk'),
            'aprobado' => 'N',
            'titulacion' => FALSE,
            'disponible' => $disponible,
            'departamento_anteproyecto' => $nuevo2,
            'periodo' => mb_strtoupper($this->input->post('periodo'), 'UTF-8'),
            'residentes_requeridos' => $this->input->post('residentes_requeridos'),
            'lugares_disponibles' => ($this->input->post('residentes_requeridos') - 1));
            if ($this->input->post('valida_vacante') == 'true') {
              $anteproyecto['id_vacante'] = $this->input->post('id_vacante');
            } else {
              $anteproyecto['id_vacante'] = 0;
            }
            $this->m_propuesta->insertar_anteproyecto($anteproyecto);

            $nuevo3 = $this->m_propuesta->obtener_anteproyecto_agregado();
            foreach ($nuevo3 as $value3) {
              $tmp3 = $value3->anteproyecto_pk;
            }
            $asesor_externo = array(
              'nombre' => mb_strtoupper($this->input->post('nombre_asesor'), 'UTF-8'),
              'correo' => $this->input->post('correo'),
              'empresafk' => $this->input->post('empresa_fk'),
              'anteproyecto_fk' => $tmp3,
              'puesto' => mb_strtoupper($this->input->post('puesto'), 'UTF-8'),
              'area' => mb_strtoupper($this->input->post('area'), 'UTF-8'));
              $this->m_propuesta->insertar_asesor_externo($asesor_externo);
              $solicitud = array(
                'numero_control' => $session_data['username'],
                'anteproyecto_id' => $tmp3,
                'estado_solicitud' => 'P',
                'fecha_solicitud' => date('Y-m-d'));
                $this->m_propuesta->insertar_solicitud($solicitud);
                $bitacora = array(
                  'numero_control' => $session_data['username'],
                  'estado' => 1);
                  $this->m_propuesta->insertar_bitacora($bitacora);
                  $dictamen = array(
                    'numero_control' => $session_data['username'],
                    'jefe_academico' => false,
                    'presidente_academia' => false,
                    'subdirector_academico' => false,
                    'jefe_oficina_residencia' => false,
                    'anteproyecto' => $tmp3,
                    'doc_finales' => false,
                    'liberacion_interno' => false,
                    'liberacion_externo' => false,
                    'calificaciones' => false,
                    'evidencias' => false
                  );
                  $this->m_propuesta->insertar_dictamen($dictamen);
                  $atencion = array(
                    'numero_control' => $session_data['username'],
                    'atencion_medica' => mb_strtoupper($this->input->post('atencion_medica'), 'UTF-8'),
                    'numero_afiliacion' => mb_strtoupper($this->input->post('numero_afiliacion'), 'UTF-8'));

                    $this->m_propuesta->insertar_atencion_medica($atencion);

                    //AQUI
                    $this->correo($data['id_carrera']);
                    redirect(base_url() . 'index.php/inicio');
                  }
                } else {
                  $respuesta = $this->do_upload_Alumno();
                  if (array_key_exists('error', $respuesta)) {
                    $this->index();
                  } else {
                    $archivo_alumno = array(
                      'numero_control_fk' => $data['username'],
                      'descripcion_archivo' => mb_strtoupper($this->input->post('descripcion_archivo'), 'UTF-8'),
                      'tipo_documento' => 'A',
                      'estado' => 'ER',
                      'fecha_guardado_documento' => date('Y-m-d H:i:s'),
                      'fecha_limite_revision' => $fecha1,
                      'nombre_archivo' => mb_strtoupper($respuesta['nombre_archivo'], 'UTF-8'),
                      'ruta_archivo' => $respuesta['ruta']);

                      $this->m_propuesta->insertar_archivo_alumno($archivo_alumno);

                      $empresa = array(
                        'nombre_empresa' => mb_strtoupper($this->input->post('nombre_empresa'), 'UTF-8'),
                        'telefono' => mb_strtoupper($this->input->post('telefono'), 'UTF-8'),
                        'sector' => mb_strtoupper($this->input->post('sector'), 'UTF-8'),
                        'rfc' => mb_strtoupper($this->input->post('rfc'), 'UTF-8'),
                        'domicilio' => mb_strtoupper($this->input->post('domicilio'), 'UTF-8'),
                        'colonia' => mb_strtoupper($this->input->post('colonia'), 'UTF-8'),
                        'ciudad' => mb_strtoupper($this->input->post('ciudad'), 'UTF-8'),
                        'fecha_alta' => date('Y-m-d H:i:s'),
                        'codigo_postal' => $this->input->post('codigo_postal'),
                        'titular_empresa' => mb_strtoupper($this->input->post('titular_empresa'), 'UTF-8'),
                        'puesto_titular' => mb_strtoupper($this->input->post('puesto_titular'), 'UTF-8'));

                        $this->m_propuesta->insertar_empresa($empresa);

                        $nuevo = $this->m_propuesta->obtener_empresapk_agregada();
                        foreach ($nuevo as $value) {
                          $tmp = $value->empresa_pk;
                        }

                        if ($this->input->post('residentes_requeridos') - 1 == 0) {
                          $disponible = FALSE;
                        } else {
                          $disponible = TRUE;
                        }

                        $nuevo2 = $this->m_banco_proyectos->obtener_departamento($data['id_carrera']);
                        $anteproyecto = array(
                          'nombre_proyecto' => mb_strtoupper($this->input->post('nombre_proyecto'), 'UTF-8'),
                          'ruta_archivo' => $respuesta['ruta'],
                          'nombre_archivo' => mb_strtoupper($respuesta['nombre_archivo'], 'UTF-8'),
                          'fecha_alta' => date('Y-m-d H:i:s'),
                          'banco' => FALSE,
                          'empresa_fk' => $tmp,
                          'aprobado' => 'N',
                          'titulacion' => FALSE,
                          'disponible' => $disponible,
                          'departamento_anteproyecto' => $nuevo2,
                          'periodo' => mb_strtoupper($this->input->post('periodo'), 'UTF-8'),
                          'residentes_requeridos' => $this->input->post('residentes_requeridos'),
                          'lugares_disponibles' => ($this->input->post('residentes_requeridos') - 1));

                          if ($this->input->post('valida_vacante') == 'true') {
                            $anteproyecto['id_vacante'] = $this->input->post('id_vacante');
                          } else {
                            $anteproyecto['id_vacante'] = 0;
                          }

                          $this->m_propuesta->insertar_anteproyecto($anteproyecto);

                          $nuevo3 = $this->m_propuesta->obtener_anteproyecto_agregado();
                          foreach ($nuevo3 as $value3) {
                            $tmp3 = $value3->anteproyecto_pk;
                          }

                          $asesor_externo = array(
                            'nombre' => mb_strtoupper($this->input->post('nombre_asesor'), 'UTF-8'),
                            'correo' => $this->input->post('correo'),
                            'empresafk' => $tmp,
                            'anteproyecto_fk' => $tmp3,
                            'puesto' => mb_strtoupper($this->input->post('puesto'), 'UTF-8'),
                            'area' => mb_strtoupper($this->input->post('area'), 'UTF-8'));

                            $this->m_propuesta->insertar_asesor_externo($asesor_externo);

                            $solicitud = array(
                              'numero_control' => $session_data['username'],
                              'anteproyecto_id' => $tmp3,
                              'estado_solicitud' => 'P',
                              'fecha_solicitud' => date('Y-m-d'));

                              $this->m_propuesta->insertar_solicitud($solicitud);

                              $bitacora = array(
                                'numero_control' => $session_data['username'],
                                'estado' => 1);

                                $this->m_propuesta->insertar_bitacora($bitacora);

                                $dictamen = array(
                                  'numero_control' => $session_data['username'],
                                  'jefe_academico' => false,
                                  'presidente_academia' => false,
                                  'subdirector_academico' => false,
                                  'jefe_oficina_residencia' => false,
                                  'anteproyecto' => $tmp3,
                                  'doc_finales' => false,
                                  'liberacion_interno' => false,
                                  'liberacion_externo' => false,
                                  'calificaciones' => false,
                                  'evidencias' => false);

                                  $this->m_propuesta->insertar_dictamen($dictamen);

                                  $atencion = array(
                                    'numero_control' => $session_data['username'],
                                    'atencion_medica' => mb_strtoupper($this->input->post('atencion_medica'), 'UTF-8'),
                                    'numero_afiliacion' => mb_strtoupper($this->input->post('numero_afiliacion'), 'UTF-8'));

                                    $this->m_propuesta->insertar_atencion_medica($atencion);

                                    $this->correo($data['id_carrera']);
                                    redirect(base_url() . 'index.php/inicio');
                                  }
                                }
                              }
                              public function do_upload_Alumno() {
                                //    /uploads
                                //	/residentes
                                //		/numero_control
                                //	/administrativos
                                //		/banco_proyectos
                                //		/bases_concertacion
                                //	/docentes
                                //		/rfc
                                $session_data = $this->session->userdata('logged_in');
                                $dir = set_realpath('./uploads/residentes/' . $session_data['username'] . '/');
                                //$dir = set_realpath('./uploads/residentes/10400312/');
                               if (!is_dir($dir)) {
                                  mkdir($dir, 0777, true); // el segundo parametro es para el permiso de mas amplio acceso posible
                                  //  mkdir($dir);
                                }
                                $config['upload_path'] = $dir;
                                $config['allowed_types'] = 'doc|docx|pdf';
                                $config['max_size'] = 10240;
                                $this->load->library('upload', $config);
                                if (!$this->upload->do_upload('ruta_archivo')) {//userfile es el nombre del form field
                                  //return $data = array('ruta' => 'hay error');
                                  $this->error = array('error' => $this->upload->display_errors());
                                  return $this->error;
                                  //$this->load->view('upload_form', $error);
                                } else {
                                  $data = array(
                                    'ruta' => 'uploads/residentes/' . $session_data['username'] . '/' . $this->upload->data('file_name'),
                                    'nombre_archivo' => $this->upload->data('file_name')
                                  );
                                  //$data = array('ruta' => 'uploads/residentes/10400312/'. $this->upload->data('file_name'));
                                  return $data;
                                  //$this->load->view('upload_success', $data);
                                }
                              }
                              private function correo($id_carrera) {
                                $consulta_correo_ja = $this->m_historial->consulta_correo_usuario($this->getJefeA($id_carrera));
                                $correoJA = '';
                                foreach ($consulta_correo_ja as $value) {
                                  $correoJA = $value->correo;
                                }

                                if ($correoJA != null || $correoJA != '') {
                                  $this->enviar_correo($this->getJefeA($id_carrera), $correoJA, 'Solicitud de residencia pendiente.', 'Tiene una solicitud de residencia pendiente, ingrese a http://siv.ittepic.edu.mx/ para mas información.'); //enviar correo a asesor
                                }
                              }
                              private function getJefeA($id_carrera) {
                                $ja = '';
                                switch ($id_carrera) {
                                  case '3':
                                  $ja = 'jacademico1'; //ciencias de la tierra
                                  break;
                                  case '4':
                                  $ja = 'jacademico6'; //ingenieria civil
                                  break;
                                  case '2':
                                  $ja = 'jacademico2'; //sistemas y computacion
                                  break;
                                  case '7':
                                  $ja = 'jacademico2'; //sistemas y computacion
                                  break;
                                  case '15':
                                  $ja = 'jacademico2'; //sistemas y computacion
                                  break;
                                  case '11':
                                  $ja = 'jacademico2'; //sistemas y computacion
                                  break;
                                  case '8':
                                  $ja = 'jacademico3'; //quimica bioquimica
                                  break;
                                  case '9':
                                  $ja = 'jacademico3'; //quimica bioquimica
                                  break;
                                  case '6':
                                  $ja = 'jacademico4'; //industrial
                                  break;
                                  case '5':
                                  $ja = 'jacademico5'; //electrica-mecatronica
                                  break;
                                  case '13':
                                  $ja = 'jacademico5'; //electrica-mecatronica
                                  break;
                                  case '10':
                                  $ja = 'jacademico7'; //admin.ige
                                  break;
                                  case '14':
                                  $ja = 'jacademico7'; //admin.ige
                                  break;

                                  default:
                                  $ja = 'jacademico2'; //sistemas y computacion
                                  break;
                                }
                                return $ja;
                              }

                              private function enviar_correo($id_usuario, $to, $subject, $message) {
                                //cargamos la libreria email de ci
                                //    $this->load->library("email");
                                //configuracion para gmail
                                /*     $configGmail = array(
                                'protocol' => 'smtp',
                                'smtp_host' => 'ssl://smtp.gmail.com',
                                'smtp_port' => 465,
                                'smtp_user' => 'avisosiv@ittepic.edu.mx',
                                'smtp_pass' => 'sivittepic',
                                'mailtype' => 'html',
                                'charset' => 'utf-8',
                                'newline' => "\r\n"
                              );*/
                              //cargamos la configuración para enviar con gmail
                              /* $this->email->initialize($configGmail);

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
                            $this->m_historial->insertar_historial($a);*/
                            //var_dump('Se envió');
                            //
                            //con esto podemos ver el resultado
                            //var_dump($this->email->print_debugger());
                          }

                        }
