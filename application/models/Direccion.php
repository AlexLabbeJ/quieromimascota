<?php

class Direccion extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    /**
     * 
     * @param type $data un array asociativo
     * @return type boolean
     */
    public function insertar($data){
        return $this->db->insert("direccion",$data);
    }
    public function obtenerDireccionPorUsuario($id){
        $this->db->select('region_id, comuna_id')->from('direccion')
                ->where('usuario_id',$id)->limit(1);
        return $this->db->get()->row();
    }
}
