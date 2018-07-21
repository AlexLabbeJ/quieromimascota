<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAvisos($offset = 0, $limit = 5) {
        $this->db->select('aviso.id, aviso.titulo, aviso.fecha_publicacion, aviso.tipo_mascota, aviso.tipoaviso')
                ->from('aviso')->join('usuario', 'usuario.id = aviso.usuario_id')
                ->where('usuario.id', $_SESSION['id'])->limit($limit)->offset($offset);
        $query = $this->db->get();
        $this->can = $this->db->select('count(*) as total')
                        ->from('aviso')->where('usuario_id', $_SESSION['id'])->get()->row()->total;
        return $query->result();
    }

    public function getTipoAviso($id, $tipo) {
        $this->db->select('aviso.id, aviso.titulo, aviso.fecha_publicacion, aviso.tipo_mascota, aviso.genero,'
                        . 'aviso.descripcion, aviso.tipoaviso, comuna.comuna, region.region, raza.raza, usuario.nombre as nombre_usuario, usuario.apellidos,'
                        . 'usuario.numero_celular, usuario.numero_fijo')->from("aviso")
                ->join("region", "aviso.region_id = region.id")->join("comuna", "aviso.comuna_id = comuna.id")
                ->join("usuario", "aviso.usuario_id = usuario.id")->join("raza", "aviso.raza_id=raza.id");
        switch ($tipo) {
            case 'encontrada':
                $this->db->select('aviso_encontrada.fecha_encontrada, aviso_encontrada.lugar')
                        ->join('aviso_encontrada', 'aviso_encontrada.id = aviso.id');
                break;
            case 'desaparecida':
                $this->db->select('aviso_desaparecida.nombre, aviso_desaparecida.edad, '
                                . 'aviso_desaparecida.fecha, aviso_desaparecida.lugar')
                        ->join("aviso_desaparecida", "aviso_desaparecida.id = aviso.id");
                break;
            case 'adopcion':
                $this->db->select('aviso_adopcion.nombre, aviso_adopcion.edad')
                        ->join("aviso_adopcion", "aviso.id = aviso_adopcion.id");
                break;
            case 'adoptar':
                $this->db->select('aviso_adoptar.edad')->join("aviso_adoptar", "aviso_adoptar.id=aviso.id");
                break;
        }
        $this->db->where("aviso.id", $id)->limit(1);
        return $this->db->get()->row();
    }

    public function insertarAviso($idUser, $titulo, $tipomascota, $raza, $genero, $region, $comuna, $descripcion, $tipoaviso) {
        $data = array('usuario_id' => $idUser, 'tipo_mascota' => $tipomascota, 'raza_id' => $raza, 'genero' => $genero, 'region_id' => $region, 'comuna_id' => $comuna, 'descripcion' => $descripcion, 'titulo' => $titulo, 'tipoaviso' => $tipoaviso);
        $query = $this->db->insert('aviso', $data);
        return $query ? $this->db->insert_id() : 0;
    }

    public function insertarAvisoUno($idAviso, $fecha_encontrada, $lugar_encontrada) {
        $data = array('id' => $idAviso, 'fecha_encontrada' => $fecha_encontrada, 'lugar' => $lugar_encontrada);
        $query = $this->db->insert('aviso_encontrada', $data);
        return $query ? true : false;
    }

    public function insertarAvisoDos($idAviso, $nombremascota_desaparecida, $edad_desaparecida, $fecha_desaparecida, $lugar_desaparecida) {
        $data = array('id' => $idAviso, 'nombre' => $nombremascota_desaparecida, 'edad' => $edad_desaparecida, 'fecha' => $fecha_desaparecida, 'lugar' => $lugar_desaparecida);
        $query = $this->db->insert('aviso_desaparecida', $data);
        return $query ? true : false;
    }

    public function insertarAvisoTres($idAviso, $nombremascota_daradopcion, $edad_daradopcion) {
        $data = array('id' => $idAviso, 'nombre' => $nombremascota_daradopcion, 'edad' => $edad_daradopcion);
        $query = $this->db->insert('aviso_adopcion', $data);
        return $query ? true : false;
    }

    public function insertarAvisoCuatro($idAviso, $edad_adoptar) {
        $data = array('id' => $idAviso, 'edad' => $edad_adoptar);
        $query = $this->db->insert('aviso_adoptar', $data);
        return $query ? true : false;
    }

    public function listarPor($region, $cat, $texto, $offset = 0, $limit = 15) {
        $where = "";
        if ($region != null) {
            $replace = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15');
            $search = array('arica_parinacota', 'tarapaca', 'antofagasta', 'atacama', 'coquimbo', 'valparaiso', 'metropolitana', 'ohiggins', 'maule', 'biobio', 'araucania', 'losrios', 'loslagos', 'aisen', 'magallanes');
            $val = str_replace($search, $replace, $region);
            if ($region != "chile") {
                $where = " WHERE a.region_id=" . $val;
            } else {
                $where = "";
            }
        }
        if ($cat != null && $cat != 'null') {
            $buscar = "a.tipoaviso";
            $val = "'$cat'";
            if ($region == "chile") {
                $where .= " WHERE $buscar = " . $val;
            } else {
                $where .= " AND $buscar =" . $val;
            }
        }
        if ($texto != null) {
            if (str_word_count($texto, 0) == 1) {
                $buscar = "a.titulo";
                $val = "$texto";
                if ($region == "chile" && ($cat == null || $cat =='null')) {
                    $where .= "WHERE $buscar like '%$val%'";
                } else {
                    $where .= " AND ($buscar like '%$val%' OR a.descripcion like '%$val%')";
                }
            } else {
                $buscar = "MATCH (a.titulo, a.descripcion) AGAINST ('$texto')";
                if ($region == "chile" && ($cat == null || $cat =='null')) {
                    $where .= "WHERE $buscar";
                } else {
                    $where .= "AND $buscar";
                }
            }
        }
        $query = $this->db->query("SELECT a.id,a.usuario_id user,a.tipo_mascota tipo_mascota,a.raza_id raza,a.genero genero,a.region_id region,a.comuna_id comuna,a.descripcion descripcion,a.titulo titulo,a.tipoaviso tipoaviso,a.fecha_publicacion fecha_publicacion,re.region nom_region,com.comuna nom_comuna,img.url img
                    FROM aviso a
                    LEFT JOIN region re ON (a.region_id=re.id)
                    LEFT JOIN comuna com ON (a.comuna_id=com.id)
                    LEFT JOIN imagen img ON (a.id=img.aviso_id)
                    $where  ORDER BY fecha_publicacion DESC "
                . " LIMIT $offset,$limit");
        $this->query = $this->db->last_query();

        return $query->result() ? $query->result() : "0";
    }

}

/*$query = $this->db->query("SELECT a.id,a.usuario_id user,a.tipo_mascota tipo_mascota,a.raza_id raza,a.genero genero,a.region_id region,a.comuna_id comuna,a.descripcion descripcion,a.titulo titulo,a.tipoaviso tipoaviso,a.fecha_publicacion fecha_publicacion,a_ea.fecha_encontrada fecha_encontrada,a_ea.lugar lugar_encontrada,a_da.nombre nombre_da,a_da.edad edad,a_da.fecha fecha_desaparecida,a_da.lugar lugar_desaparecida,a_an.nombre nombre_an,a_an.edad edad_an,a_ar.edad edad_ar,re.region nom_region,com.comuna nom_comuna,img.url img FROM aviso a
LEFT JOIN aviso_encontrada a_ea ON (a.tipoaviso='encontrada' AND a.id = a_ea.id)
LEFT JOIN aviso_desaparecida a_da ON (a.tipoaviso='desaparecida' AND a.id=a_da.id)
LEFT JOIN aviso_adopcion a_an ON (a.tipoaviso='adopcion' AND a.id=a_an.id)
LEFT JOIN aviso_adoptar a_ar ON (a.tipoaviso='adoptar' AND a.id=a_ar.id)
LEFT JOIN region re ON (a.region_id=re.id)
LEFT JOIN comuna com ON (a.comuna_id=com.id)
LEFT JOIN imagen img ON (a.id=img.aviso_id)
" . $where . " ORDER BY fecha_publicacion DESC");
return $query->result();
 *
 */
