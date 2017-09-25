<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class C_noticias extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database('local');
        //cargamos el helper url y el helper form
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));
        $this->load->model('m_noticias');
    }
    function show_id() {
        $id = $this->input->post('ids');
        $data['single_id'] = $this->m_iactg->show_id($id);
        foreach ($data['single_id'] as $item) {
            $idsolicitud = $item->id_solicitud;
        }
        $data['actividades'] = $this->m_iactg->show_actividades_by_id($idsolicitud);
        $this->load->view('v_iactg', $data);
    }
    function delete() {
        $idnot = $this->input->post('idnot');
        $this->m_noticias->delete($idnot);
        $data['messages'] = 'La noticia se ha eliminado';
        $data['noticias'] = $this->m_noticias->shownoticias();
        $this->load->view('v_noticias', $data);
    }
    public function validar() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('tnoticia', 'Titulo de la noticia', 'required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('cnoticia', 'Contenido de la noticia', 'required|min_length[1]|max_length[1000]');
        $this->form_validation->set_message('required', 'El campo no puede ir vacío');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'contenido_n' => $this->input->post('cnoticia'),
                'fecha_noticia' => date('Y-m-d H:i:s'),
                'titulo_n' => $this->input->post('tnoticia')
            );
//Transfering data to Model
            $this->m_noticias->form_insert($data);
            $data['message'] = 'Los datos se insertaron correctamente';
            $data['noticias'] = $this->m_noticias->shownoticias();
            $this->load->view('v_noticias', $data);
        } else {
            //mostramos de nuevo el buscador con los errores
            $data['noticias'] = $this->m_noticias->shownoticias();
            $this->load->view('v_noticias', $data);
        }
    }
    function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jefevinculacion' || $this->session->userdata('perfil') == 'jefeservicio') {
            $data['noticias'] = $this->m_noticias->shownoticias();
            $this->load->view('v_noticias', $data);
        }
        else{
            $this->load->view('notienespermisos');
        }
    }
////////////////////////////////////RESIDENCIA///////////////////////////////////////////////
    function indexR() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'coordinadorprogac') {
            $data['noticiasResidencia'] = $this->m_noticias->shownoticiasResidencia();
            $this->load->view('Residencia/v_noticias_agregar_quitar', $data);
        }
        else{
            $this->load->view('notienespermisos');
        }
    }
    function indexREdit($id) {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'coordinadorprogac') {
            $data['noticiasResidenciaEditar'] = $this->m_noticias->vernoticiaunicaResidencia($id);
            $this->load->view('Residencia/v_noticias_editar', $data);
        }
        else{
            $this->load->view('notienespermisos');
        }
    }
    public function validarR() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('tnoticia', 'Titulo de la noticia', 'required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('cnoticia', 'Contenido de la noticia', 'required|min_length[1]|max_length[1000]');
        $this->form_validation->set_message('required', 'El campo no puede ir vacío');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'contenido_n' => $this->input->post('cnoticia'),
                'fecha_noticia' => date('Y-m-d H:i:s'),
                'titulo_n' => $this->input->post('tnoticia')
            );
//Transfering data to Model
            $this->m_noticias->form_insert_residencia($data);
            $data['message'] = 'Los datos se insertaron correctamente';

            $data['noticiasResidencia'] = $this->m_noticias->shownoticiasResidencia();
            $this->load->view('Residencia/v_noticias_agregar_quitar', $data);
        } else {
            //mostramos de nuevo el buscador con los errores
            $data['noticiasResidencia'] = $this->m_noticias->shownoticiasResidencia();
            $this->load->view('Residencia/v_noticias_agregar_quitar', $data);
        }
    }
    public function validarREditar($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('tnoticia', 'Titulo de la noticia', 'required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('cnoticia', 'Contenido de la noticia', 'required|min_length[1]|max_length[1000]');
        $this->form_validation->set_message('required', 'El campo no puede ir vacío');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'contenido_n' => $this->input->post('cnoticia'),
                'fecha_noticia' => date('Y-m-d H:i:s'),
                'titulo_n' => $this->input->post('tnoticia')
            );
            $this->m_noticias->actualizarnoticiaR($id,$data);
            $data['messageact'] = 'Los datos se actualizaron  correctamente';
            $data['noticiasResidencia'] = $this->m_noticias->shownoticiasResidencia();
            $this->load->view('Residencia/v_noticias_agregar_quitar', $data);
        } else {
            $data['noticiasResidencia'] = $this->m_noticias->shownoticiasResidencia();
            $this->load->view('Residencia/v_noticias_agregar_quitar', $data);
        }
    }
    function deleteResidencia() {
        $idnot = $this->input->post('idnot');
        $this->m_noticias->deleteResidencia($idnot);
        $data['messages'] = 'La noticia se ha eliminado';
        $data['noticiasResidencia'] = $this->m_noticias->shownoticiasResidencia();
        $this->load->view('Residencia/v_noticias_agregar_quitar', $data);
    }

}
?>
