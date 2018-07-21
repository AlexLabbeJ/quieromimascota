<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Razas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function cargaRazas() {
        if ($this->input->is_ajax_request()) {
            $tipo = $this->input->post('tipo');
            $razas = $this->razas_model->cargaRazas($tipo);
            echo json_encode($razas);
        }
    }

}
