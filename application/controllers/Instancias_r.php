<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Instancias_r extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('local');
        //cargamos el helper url y el helper form
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));

        $this->load->model('m_instancias');
    }

    //con esta función validamos y protegemos el buscador
    public function validar() {
        $this->form_validation->set_rules('buscando', 'buscador', 'required|min_length[2]|max_length[20]|trim');
        $this->form_validation->set_message('required', 'El campo no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {

            $buscador = $this->input->post('buscando');
            $this->session->set_userdata('buscando', $buscador);
            //todo correcto y pasamos a la función index
            redirect('instancias_r', 'refresh');
        } else {
            //mostramos de nuevo el buscador con los errores
            redirect('c_instancias');
        }
    }

    public function index() {

        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jefevinculacion' || $this->session->userdata('perfil') == 'jefeservicio') {



            $buscador = $this->session->userdata('buscando');
            $pages = 5; //Número de registros mostrados por páginas
            $this->load->library('pagination'); //Cargamos la librería de paginación

            $config['base_url'] = base_url() . '/index.php/instancias_r/index/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->m_instancias->instancias($buscador); //calcula el número de filas
            $config['uri_segment'] = 3;
            $config['per_page'] = $pages; //Número de registros mostrados por páginas
            $config['num_links'] = 2; //Número de links mostrados en la paginación

            $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
            $config['full_tag_close'] = '</ul>';
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="current"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['first_link'] = '&lt;&lt;';
            $config['last_link'] = '&gt;&gt;';


            $this->pagination->initialize($config); //inicializamos la paginación
            //el array con los datos a paginar ya preparados
            $data["instancias"] = $this->m_instancias->total_posts_paginados($buscador, $config['per_page'], $this->uri->segment(3));

            //cargamos la vista y el array data
            $this->load->view('v_instancias_r', $data);
        }

        $this->load->view('notienespermisos');
    }

//IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
}
