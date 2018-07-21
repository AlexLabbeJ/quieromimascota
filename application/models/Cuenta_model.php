<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function errores() {
        return array(
            "required" => "Tu {field} es requerido",
            "matches" => "El campo {field} no coincide con {param}",
            "is_unique" => "El {field} ya esta registrado",
            "valid_email" => "El {field} debe tener un formato de e-mail"
        );
    }

    public function registrar($nombre, $apellidos, $email, $num_celular, $num_fijo, $password) {
        $pass = password_hash($password, PASSWORD_BCRYPT, array("cost" => 10));
        $data = array('nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email, 'numero_celular' => $num_celular, 'numero_fijo' => $num_fijo, 'pass' => $pass);
        $query = $this->db->insert('usuario', $data);
        return $query ? $this->db->insert_id() : 0;
    }

    public function login($email, $password) {
        $this->db->from('usuario')->where('email', $email);
        $q = $this->db->get();
        if ($q->num_rows() != 1) {
            return 0;
        }
        $row = $q->row();
        if (password_verify($password, $row->pass)) {
            //contraseña correcta
            $_SESSION["emailUser"] = $email;
            $_SESSION["nameUser"] = $row->nombre;
            $_SESSION["telefono"] = $row->numero_celular;
            $_SESSION["id"] = $row->id;
            $_SESSION["apellido"] = $row->apellidos;
            return 1;
        }
        return 2;
    }

    public function datosUsuario($email) {
        $this->db->from('usuario')->join('direccion', 'direccion.usuario_id = usuario.id')->where('email', $email)->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
    public function updateUser($nombre, $apellidos, $numcel, $numfijo, $region, $comuna){
        $email = $_SESSION["emailUser"];
        $sql = "UPDATE usuario as u JOIN direccion as d on d.usuario_id=u.id SET u.nombre='$nombre', u.apellidos='$apellidos', u.numero_celular='$numcel', u.numero_fijo='$numfijo', d.region_id=$region, d.comuna_id=$comuna WHERE u.email='$email'";

        return $this->db->query($sql) ? 1 : 0;
    }

    public function cambiarPass($passactual, $passnueva) {
        $email = $_SESSION["emailUser"];
        $this->db->from('usuario')->where('email', $email);
        $q = $this->db->get();
        $row = $q->row_array();
        if (password_verify($passactual, $row["pass"])) {
            $pass = password_hash($passnueva, PASSWORD_BCRYPT, array("cost" => 10));
            $this->db->set('pass', $pass);
            $this->db->where('email', $email);
            $this->db->update('usuario');
            return 1;
        } else {
            return 0;
        }
    }

}
