<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class C_programasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_programasi');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jefevinculacion' || $this->session->userdata('perfil') == 'jefeservicio') {









            //--------------------------------------------------------------------------------------------------------------------



            $pages = 3; //Número de registros mostrados por páginas
            $this->load->library('pagination'); //Cargamos la librería de paginación

            $config['base_url'] = base_url() . '/index.php/c_programasi/index/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->m_programasi->filas(); //calcula el número de filas
            $config['uri_segment'] = 3;
            $config['per_page'] = $pages; //Número de registros mostrados por páginas
            $config['num_links'] = 20; //Número de links mostrados en la paginación

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
            $data["programas"] = $this->m_programasi->total_posts($config['per_page'], $this->uri->segment(3));

            //cargamos la vista y el array data
            $this->load->view('v_programasi', $data);
        }

        $this->load->view('notienespermisos');
    }

    //--------------------------------------------------------------------------------------------------------------------
}
