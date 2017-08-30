<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_programas extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('m_programasalumno');
        $this->load->model('m_solicitud');
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

            $pages = 100; //Número de registros mostrados por páginas
            $this->load->library('pagination'); //Cargamos la librería de paginación

            $config['base_url'] = base_url() . '/index.php/alumnos/c_programas/index/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
            $config['total_rows'] = $this->m_programasalumno->filas(); //calcula el número de filas
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


            $numero_control = $data['username'];



            $data['programa'] = $this->m_solicitud->show_programa($numero_control);



            $this->pagination->initialize($config); //inicializamos la paginación
            //el array con los datos a paginar ya preparados
            $data['instancias'] = $this->m_programasalumno->total_instancias();


            $data['PxI'] = $this->m_programasalumno->total_PxI();




            //_________________________________________________________________________________________________________

            $data["programas"] = $this->m_programasalumno->total_posts($config['per_page'], $this->uri->segment(3));



            foreach ($data['programas'] as $item) {

                $idsolicitud = $item->id_solicitud;
            }




            $data['tsolicitudesxprograma'] = $this->m_solicitud->t_solicitudes();

            //cargamos la vista y el array data
            $this->load->view('v_programasalumno', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }




        //--------------------------------------------------------------------------------------------------------------------
        //Setting values for tabel columns






        $this->load->helper('url');
    }

    function insertar() {

        $id = $this->input->post('solicitudpi');
        $datas = array(
            'solicitudes_ocupadas' => $this->input->post('numerosolicitudes')
        );

        $this->m_programasalumno->insert_soli($id, $datas);

        $datax['hoy'] = date("Y-m-d");
        $fecha1 = date('Y-m-d', strtotime($datax['hoy'] . ' + 2 months'));
        $fecha2 = date('Y-m-d', strtotime($datax['hoy'] . ' + 4 months'));
        $fecha3 = date('Y-m-d', strtotime($datax['hoy'] . ' + 6 months'));

        $data = array(
            'numero_control' => $this->input->post('ncontroli'),
            'id_solicitud' => $this->input->post('solicitudpi'),
            'fecha_inicio2' => date('Y-m-d H:i:s'),
            'fecha_reporte1' => $fecha1,
            'fecha_reporte2' => $fecha2,
            'fecha_reporte3' => $fecha3,
            'estado' => 'seleccionado');




//Transfering data to Model
        $this->m_programasalumno->form_insert($data);

//Loading View
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


        $numero_control = $data['username'];



        $data['programa'] = $this->m_solicitud->show_programa($numero_control);

        $this->load->view('inicio', $data);
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('logeo', 'refresh');
    }

}
