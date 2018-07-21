<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function ver($id, $tipo) {
        $this->load->model('aviso_model', 'aviso');
        $this->load->model('imagen');
        $data['title'] = 'Aviso';
        $data['tipo'] = $tipo;
        $data['query'] = $this->aviso->getTipoAviso($id, $tipo);
        $data['imagenes'] = $this->imagen->getImagenes($id);
        $this->load->view('includes/header', $data);
        $this->load->view('aviso/ver', $data);
        $this->load->view('includes/footer');
    }

    //values: region/categoria/text
    public function by($region = null, $cat = null, $text = null) {
        $nuevoText = str_replace('%20', ' ', $text);
        $data['text'] = $nuevoText;
        $data['title'] = 'Avisos por región';
        $list = $this->aviso_model->listarPor($region, $cat, $nuevoText);
        $data['aviso'] = $list;
        $data['q'] = $this->aviso_model->query;
        $data['controller'] = $this;
        $data['getRegion'] = $this->getRegiones($region);
        $data['getTipoAviso'] = $cat;
        $data['tipo_aviso'] = array(
            'encontrada' => 'Mascota encontrada',
            'desaparecida' => 'Mascota desaparecida',
            'adopcion' => 'Dar en adopción',
            'adoptar' => 'Adoptar mascota'
        );
        $data['regiones'] = array(
            '16' => 'Todo Chile',
            '1' => 'XV Arica y Parinacota',
            '2' => 'I Tarapacá',
            '3' => 'II Antofagasta',
            '4' => 'III Atacama',
            '5' => 'IV Coquimbo',
            '6' => 'V Valparaiso',
            '7' => 'RM Metropolitana de Santiago',
            '8' => 'VI O\'Higgins',
            '9' => 'VII Maule',
            '10' => 'VIII Biobío',
            '11' => 'IX La Araucanía',
            '12' => 'XIV Los Ríos',
            '13' => 'X Los Lagos',
            '14' => 'XI Aisén',
            '15' => 'XII Magallanes y Antártica'
        );
        $this->load->view('includes/header', $data);
        $this->load->view('aviso/by');
        $this->load->view('includes/footer');
    }

    public function nuevo() {
        $this->load->model("regioncomuna_model", "regioncomuna");
        $this->load->model('direccion');
        $data['title'] = 'Publicar Nuevo Aviso';
        if (isset($_SESSION['id'])) {
            $data['region_usuario'] = $this->direccion->obtenerDireccionPorUsuario($this->session->userdata('id'));
            $data['comunas_usuario'] = $this->regioncomuna->cargaComunas($data['region_usuario']->region_id);
            $data['query'] = $this->cuenta_model->datosUsuario($this->session->userdata('emailUser'));
            $data['region'] = $this->regioncomuna->cargaRegiones();
        }
        $this->load->view('includes/header', $data);
        $this->load->view('aviso/nuevo');
        $this->load->view('includes/footer');
    }

    public function publicar() {
        if ($this->input->is_ajax_request()) {
//$this->load->model("aviso_model");
            $this->load->model("imagen");
            $idUser = $_SESSION["id"];
            $titulo = $this->input->post("titulo");
            $tipomascota = $this->input->post("tipomascota");
            $raza = $this->input->post("raza");
            $genero = $this->input->post("genero");
            $region = $this->input->post("region");
            $comuna = $this->input->post("comuna");
            $descripcion = $this->input->post("descripcion");
            $tipoaviso = $this->input->post("tipoaviso");
            $idAviso = $this->aviso_model->insertarAviso($idUser, $titulo, $tipomascota, $raza, $genero, $region, $comuna, $descripcion, $tipoaviso);
            $img1 = $this->input->post("img1");
            $img2 = $this->input->post("img2");
            $img3 = $this->input->post("img3");
            $img4 = $this->input->post("img4");
            $img5 = $this->input->post("img5");
            $img6 = $this->input->post("img6");
            switch ($tipoaviso) {
                case "encontrada":
                    $fecha_encontrada = date("Y-m-d", strtotime($this->input->post("fecha")));
                    $lugar_encontrada = $this->input->post("lugar");
                    $result = $this->aviso_model->insertarAvisoUno($idAviso, $fecha_encontrada, $lugar_encontrada);
                    break;
                case "desaparecida":
                    $nombremascota_desaparecida = $this->input->post("nombremascota");
                    $edad_desaparecida = $this->input->post("edad");
                    $fecha_desaparecida = date("Y-m-d", strtotime($this->input->post("fecha")));
                    $lugar_desaparecida = $this->input->post("lugar");
                    $result = $this->aviso_model->insertarAvisoDos($idAviso, $nombremascota_desaparecida, $edad_desaparecida, $fecha_desaparecida, $lugar_desaparecida);
                    break;
                case "adopcion":
                    $nombremascota_daradopcion = $this->input->post("nombremascota");
                    $edad_daradopcion = $this->input->post("edad");
                    $result = $this->aviso_model->insertarAvisoTres($idAviso, $nombremascota_daradopcion, $edad_daradopcion);
                    break;
                case "adoptar":
                    $edad_adoptar = $this->input->post("edad");
                    $result = $this->aviso_model->insertarAvisoCuatro($idAviso, $edad_adoptar);
                    break;
            }
            if ($img1 != "" || $img2 != "" || $img3 != "" || $img4 != "" || $img5 != "" || $img6 != "") {
                $this->imagen->insertarImagenAviso($idAviso, $img1, $img2, $img3, $img4, $img5, $img6);
            }
            if ($idAviso != 0 && $result == true) {
                if ($img1 != "") {
                    $this->imagen->move_to($img1);
                }if ($img2 != "") {
                    $this->imagen->move_to($img2);
                }if ($img3 != "") {
                    $this->imagen->move_to($img3);
                }if ($img4 != "") {
                    $this->imagen->move_to($img4);
                }if ($img5 != "") {
                    $this->imagen->move_to($img5);
                }if ($img6 != "") {
                    $this->imagen->move_to($img6);
                }
                setcookie("publicado", "1", time() + 20);
                echo "1";
            }
        }
    }

    public function subirImagen() {
        if ($this->input->is_ajax_request()) {
            $idImg = $this->input->post('idImg');
            $file = $_FILES["imgUp" . $idImg];
            if (isset($file)) {
                echo $this->imagen->subir($file, $idImg);
            }
        }
    }

    public function eliminarImg() {
        if ($this->input->is_ajax_request()) {
            $img = $this->input->post('img');
            unlink("./uploaded/tmp_avisos/" . $img);
        }
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

    public function shortRegiones($region) {
        $search = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15');
        $replace = array('XV Arica y Parinacota', 'I Tarapacá', 'II Antofagasta', 'III Atacama', 'IV Coquimbo', 'V Valparaiso', 'RM Metropolitana', 'VI O"Higgins', 'VII Maule', 'VIII Biobío', 'IX La Araucanía', 'XIV Los Ríos', 'X Los Lagos', 'XI Aisén', 'XII Magallanes');
        return str_replace($search, $replace, $region);
    }

    public function getRegiones($region) {
        switch ($region) {
            case 'arica_parinacota':
                return '1';
            case 'tarapaca':
                return '2';
            case 'antofagasta':
                return '3';
            case 'atacama':
                return '4';
            case 'coquimbo':
                return '5';
            case 'valparaiso':
                return '6';
            case 'metropolitana':
                return '7';
            case 'ohiggins':
                return '8';
            case 'maule':
                return '9';
            case 'biobio':
                return '10';
            case 'araucania':
                return '11';
            case 'losrios':
                return '12';
            case 'loslagos':
                return '13';
            case 'aisen':
                return '14';
            case 'magallanes':
                return '15';
            default:
# code...
                break;
        }
    }

}
