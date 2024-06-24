<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ulasan_model extends CI_Model {

  public function saveUlasan($id, $nama, $jabatan, $img_ulasan, $ulasan)
  {
    $data = array(
      'id_ulasan' => $id,
      'nama' => $nama,
      'jabatan' => $jabatan,
      'img_ulasan' => $img_ulasan,
      'ulasan' => $ulasan
    );  
    $this->db->insert('ulasan',$data);
  }

  public function getWhere($id)
  {   
    $query = $this->db->get_where('ulasan', array('id_ulasan' => $id));
    return $query->result_array();
  }
  public function deleteUlasan($id)
  {
    return $this->db->delete('ulasan', array("id_ulasan" => $id));
  }


}

/* End of file Ulasan_model.php */
/* Location: ./application/models/Ulasan_model.php */