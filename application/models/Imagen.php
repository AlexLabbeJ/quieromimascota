<?php

class Imagen extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function subir($file,$idImg) {
        if (isset($file)) {
                $ruta = $file["tmp_name"];
                $max_width = 800;
                $max_height = 600;
                list($ancho, $alto) = getimagesize($ruta);
                $uniqNom = sha1(md5(time()));
                if ($ancho > $max_width || $alto > $max_height) {
                    //Redimensionar imagen
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $ruta;
                    $config['maintain_ratio'] = TRUE;
                    $config['create_thumb'] = FALSE;
                    $config['width'] = $max_width;
                    $config['height'] = $max_height;
                    $this->image_lib->initialize($config);
                    //$this->image_lib->clear();
                    if (!$this->image_lib->resize()) {
                        echo $this->image_lib->display_errors();
                        return;
                    }
                }
                $carpeta = "./uploaded/tmp_avisos/";
                $config['upload_path'] = $carpeta; //Donde se guarda la imagen
                $config['file_name'] = $uniqNom; //nombre
                $config['allowed_types'] = "jpg|png|jpeg|bmp"; //formatos permitidos
                $config['max_size'] = "0";
                $config['max_width'] = "0";
                $config['max_height'] = "0";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload("imgUp" . $idImg)) {
                    //Error
                    echo $this->upload->display_errors();
                } else {
                    $dato_imagen = $this->upload->data();
                    
                    echo $dato_imagen["file_name"];
                }
            }
    }
    public function getImagenes($idAviso) {
        return $this->db->select("url")->from("imagen")->where("aviso_id",$idAviso)->get()->result();
    }
    public function insertarImagenAviso($idAviso,$img1,$img2,$img3,$img4,$img5,$img6){
        if($img1!=""){
            $data[] = array('url' => $img1, 'aviso_id' => $idAviso);
        }
        if($img2!=""){
            $data[] = array('url' => $img2, 'aviso_id' => $idAviso);
        }
        if($img3!=""){
            $data[] = array('url' => $img3, 'aviso_id' => $idAviso);
        }
        if($img4!=""){
            $data[] = array('url' => $img4, 'aviso_id' => $idAviso);
        }
        if($img5!=""){
            $data[] = array('url' => $img5, 'aviso_id' => $idAviso);
        }
        if($img6!=""){
            $data[] = array('url' => $img6, 'aviso_id' => $idAviso);
        }
        return $this->db->insert_batch('imagen', $data);
    }
    public function move_to($img){ 
        $origen = "./uploaded/tmp_avisos/".$img;
        $destino = "./uploaded/img_avisos/".$img;
        if(file_exists($origen)){    
            copy($origen,$destino); 
            unlink($origen); 
        }
    }
}
