<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class W_error_control extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('user');
    $this->load->library(array('session', 'form_validation'));
    $this->load->helper(array('url', 'form'));
    $this->load->database('default');
  }
  function index() {
    $this->load->view('vista_error');
  }
}

?>
