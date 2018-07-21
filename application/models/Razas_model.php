<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Razas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function cargaRazas($tipo) {
        $this->db->from('raza')->where('tipo', $tipo)->order_by('raza', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

}
