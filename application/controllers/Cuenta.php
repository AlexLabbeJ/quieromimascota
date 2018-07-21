<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library(array("session", "form_validation"));
    }

    public function registrar() {
        if (isset($_SESSION["emailUser"])) {
            redirect("Inicio");
        }
        $this->load->model("regioncomuna_model");
        $data["query"] = $this->regioncomuna_model->cargaRegiones();
        $data['title'] = 'Registrar';
        if (!empty($_POST)) {
            $this->form_validation->set_message($this->cuenta_model->errores());
            if ($this->form_validation->run('registrar') == TRUE) {
                $nombre = $this->input->post('nombre');
                $apellidos = $this->input->post('apellidos');
                $email = $this->input->post('email');
                $num_celular = $this->input->post('num_celular');
                $num_fijo = $this->input->post('num_fijo');
                $region = $this->input->post('region');
                $comuna = $this->input->post('comuna');
                $password = $this->input->post('password');
                $error = "<div class='error-msj' id='alert'>Hubo un error al intentar registrarse.</div>";
                if ($num_celular != "" || $num_fijo != "") {
                    $result = $this->cuenta_model->registrar($nombre, $apellidos, $email, $num_celular, $num_fijo, $password);
                    if ($result == 0) {
                        $data["error"] = $error;
                    } else {
                        $this->load->model("direccion");
                        $data = array(
                            "usuario_id" => $result,
                            "region_id" => $region,
                            "comuna_id" => $comuna,
                        );
                        $mensaje = $this->direccion->insertar($data) ? "<div class='success-msj' id='alert'>Registrado correctamente, ya puedes iniciar sesion.</div>" : $error;
                        $data["error"] = $mensaje;
                    }
                } else {
                    $data["comuna"] = $this->regioncomuna_model->cargaComunas(set_value("region"));
                    $tel_error = '<div class="tooltipError-form"> Debe ingresar un numero fijo o numero de celular</div>';
                    $data["error"] = "
                    <script language='javascript'>
                    $('#num_celular').focus().after('$tel_error');
                    </script>";
                }
            } else {
                $error = array();
                foreach ($_POST as $item => $valor) {
                    $error[$item] = form_error($item, '', '');
                }
                $txt = "<script language='javascript'>";
                foreach ($error as $clave => $valor) {
                    if ($valor != "") {
                        $txt .= "tooltipoError('$valor','$clave');";
                    } else {
                        $txt .= "eliminarToolTip('$clave');";
                    }
                }
                $txt .= "step(3,'re');";
                $data["comuna"] = $this->regioncomuna_model->cargaComunas(set_value("region"));
                $txt .= "</script>";
                $data["error"] = $txt;
            }
        }
        $this->load->view('includes/header', $data);
        $this->load->view('cuenta/registrar', $data);
        $this->load->view('includes/footer');
    }

    public function login() {
        if (!$this->input->is_ajax_request()) {
            $data["title"] = "Ingresar";
            $this->load->view('includes/header', $data);
            $this->load->view('cuenta/login');
            $this->load->view('includes/footer');
        }
        if ($this->input->is_ajax_request() || $this->input->post()) {
            $this->form_validation->set_message($this->cuenta_model->errores());
            if ($this->form_validation->run('login') == TRUE) {
                $email = $this->input->post("email");
                $password = $this->input->post("password");
                $result = $this->cuenta_model->login($email, $password);
                echo json_encode(array("sucess" => $result), JSON_FORCE_OBJECT);
            } else {
                $error = array(
                    "email" => form_error('email', "<div class='errorInputLogin col-md-8 col-md-push-3'>", '</div>'),
                    "password" => form_error('password', "<div class='errorInputLogin col-md-6   col-md-push-3'>", '</div>'),
                );
                echo json_encode($error, JSON_FORCE_OBJECT);
            }
        }
    }

    public function index() {
        if (isset($_SESSION['id'])) {
            $data['title'] = 'Mi Cuenta';
            if ($this->input->is_ajax_request()) {
                $this->load->view('cuenta/index', $data);
            } else {
                $this->load->view('includes/header', $data);
                $this->load->view('includes/nav_perfil');
                $this->load->view('cuenta/index');
                $this->load->view('includes/footer');
            }
        } else {
            header('location:' . base_url());
        }
    }

    public function avisos($offset = 0) {
        if (isset($_SESSION['id'])) {
            $this->load->model("aviso_model");
            $this->load->library('pagination');
            $data["avisos"] = $this->aviso_model->getAvisos($offset);
            $config['base_url'] = 'http://localhost/quieromimascota/cuenta/avisos';
            $config['total_rows'] = $this->aviso_model->can;
            $config['per_page'] = 5;
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='active'><a>";
            $config['cur_tag_close'] = '</li></a>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['first_link'] = 'Primero';
            $config['last_link'] = 'Ultimo';
            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
            $data["title"] = "Mis avisos";
            if ($this->input->is_ajax_request()) {
                $this->load->view('cuenta/avisos', $data);
            } else {
                $this->load->view('includes/header', $data);
                $this->load->view('includes/nav_perfil');
                $this->load->view('cuenta/avisos');
                $this->load->view('includes/footer');
            }
        } else {
            header('location:' . base_url());
        }
    }

    public function logout() {
        if (isset($_SESSION["emailUser"]) && isset($_SESSION["nameUser"])) {
            unset($_SESSION['emailUser']);
            unset($_SESSION['nameUser']);
            unset($_SESSION['id']);
            unset($_SESSION['telefono']);
            unset($_SESSION['apellidos']);
            echo 1;
        }
    }

    public function mi_perfil() {
        if (isset($_SESSION['id'])) {
            $data["query"] = $this->regioncomuna_model->cargaRegiones();
            $data["datosUser"] = $this->cuenta_model->datosUsuario($_SESSION['emailUser']);
            $idRegion = $data['datosUser']->region_id;
            $data["datosComuna"] = $this->regioncomuna_model->cargaComunas($idRegion);
            $data['title'] = 'Pefil';
            if ($this->input->is_ajax_request()) {
                $this->load->view('cuenta/mi_perfil', $data);
            } else {
                $this->load->view('includes/header', $data);
                $this->load->view('includes/nav_perfil');
                $this->load->view('cuenta/mi_perfil');
                $this->load->view('includes/footer');
            }
        } else {
            header('location:' . base_url());
        }
    }

    public function cambiarPass() {
        if (isset($_SESSION['id'])) {
            $data['title'] = 'Mi Cuenta';
            if ($this->input->is_ajax_request()) {
                $this->load->view('cuenta/cambiarpass', $data);
            } else {
                $this->load->view('includes/header');
                $this->load->view('includes/nav_perfil');
                $this->load->view('cuenta/cambiarpass', $data);
                $this->load->view('includes/footer');
            }
        } else {
            header('location:' . base_url());
        }
    }

    public function cambiarPassword() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_message($this->cuenta_model->errores());
            if ($this->form_validation->run('cambiarContrasena') == TRUE) {
                $passactual = $this->input->post('passactual_user');
                $passnueva = $this->input->post('passnueva1_user');
                $result = $this->cuenta_model->cambiarPass($passactual, $passnueva);
                echo json_encode(array("success" => $result), JSON_FORCE_OBJECT);
            } else {
                $error = array(
                    "passactual_user" => form_error('passactual_user', "<span class='tooltipError-form'>", "</span>"),
                    "passnueva1_user" => form_error('passnueva1_user', "<span class='tooltipError-form'>", '</span>'),
                    "passnueva2_user" => form_error('passnueva2_user', "<span class='tooltipError-form'>", '</span>')
                );
                echo json_encode($error, JSON_FORCE_OBJECT);
            }
        }
    }

    public function actualizarPerfil() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_message($this->cuenta_model->errores());
            if ($this->form_validation->run('actualizarUsuario') == TRUE) {
                $nombre = $this->input->post('nombre_user');
                $apellidos = $this->input->post('apellidos_user');
                $numcel = $this->input->post('numcelu_user');
                $numfijo = $this->input->post('numfijo_user');
                $region = $this->input->post('region_user');
                $comuna = $this->input->post('comuna_user');
                $result = $this->cuenta_model->updateUser($nombre, $apellidos, $numcel, $numfijo, $region, $comuna);
                echo json_encode(array("success" => $result), JSON_FORCE_OBJECT);
            } else {
                $error = array(
                    "nombre_user" => form_error('nombre_user', "<span class='tooltipError-form'>", "</span>"),
                    "apellidos_user" => form_error('apellidos_user', "<span class='tooltipError-form'>", '</span>'),
                    "numcelu_user" => form_error('numcelu_user', "<span class='tooltipError-form'>", '</span>'),
                    "region_user" => form_error('region_user', "<span class='tooltipError-form'>", '</span>'),
                    "comuna_user" => form_error('comuna_user', "<span class='tooltipError-form'>", '</span>')
                );
                echo json_encode($error, JSON_FORCE_OBJECT);
            }
        }
    }

}
