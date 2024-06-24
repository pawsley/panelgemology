<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {


  public function saveGallery($id, $judul, $sub, $img_gallery)
  {
    $data = array(
      'id_gallery' => $id,
      'judul' => $judul,
      'img_gallery' => $img_gallery,
      'sub' => $sub
    );  
    $this->db->insert('gallery',$data);
  }

  public function getWhere($id)
  {   
    $query = $this->db->get_where('gallery', array('id_gallery' => $id));
    return $query->result_array();
  }
  public function deleteGallery($id)
  {
    return $this->db->delete('gallery', array("id_gallery" => $id));
  }  

}

/* End of file Gallery_model.php */
/* Location: ./application/models/Gallery_model.php */