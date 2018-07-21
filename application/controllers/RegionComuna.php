<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegionComuna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function cargarRegion() {
        if ($this->input->is_ajax_request()) {
            $regiones = $this->regioncomuna_model->cargaRegiones();
            echo json_encode($regiones);
        }
    }

    public function cargarComunas() {
        if ($this->input->is_ajax_request()) {
            $valueRegion = $this->input->post('value');
            $comunas = $this->regioncomuna_model->cargaComunas($valueRegion);
            echo json_encode($comunas);
        }
    }

}
