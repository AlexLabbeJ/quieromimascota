<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regioncomuna_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function cargaRegiones() {
        $query = $this->db->get("region");
        return $query->result();
    }

    public function cargaComunas($value) {
        $this->db->from('comuna')->where('region_id', $value)->order_by('comuna', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}
