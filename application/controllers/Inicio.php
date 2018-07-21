<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
    public function index() {
        $data['title'] = 'Quiero Mi Mascota';
        $data['controller'] = $this;
        $list = $this->aviso_model->listarPor($region = "chile", $cat = null, $nuevoText = null,$offset = 0, $limit = 4);
        $data['aviso'] = $list;
        $this->load->view('includes/header', $data);
        $this->load->view('index/index');
        $this->load->view('includes/footer');
    }
    public function horas($date1) {
        $now1 = date("Y-m-d H:i:s", time());
        $date = strtotime($date1);
        $horas = date("H:i", $date);
        $now = strtotime($now1);
        $dia = date("d", $date) . " " . date("M", $date) . " a las " . $horas;
        $dif = $now - $date;
        $dias = ($dif / 60 / 60) / 24;
        $ddias = (INT) ($dias);
        $val = "";
        if ($ddias == 0) {
            $val = "Hoy, a las " . $horas;
        } else if ($ddias == 1) {
            $val = "Ayer, a las " . $horas;
        } else if ($ddias > 1) {
            $val = $dia;
        }
        return $val;
    }

}
