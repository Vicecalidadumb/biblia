<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends CI_Controller {

    private $module_sigla;

    public function __construct() {
        parent::__construct();
        $this->load->helper('miscellaneous');
        $this->load->model('principal_model');
    }

    public function asignacion() {
        //$data['registros'] = $this->user_model->get_all_users('ALL');
        //$this->load->view('template/template', $data);
        echo "el viejo sergio";
    }

}
