<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certi_model extends CI_Model {
  public function saveCerti($noserti, $date, $qr, $bar)
  {
    $data = array(
      'no_serti' => $noserti,
      'date' => $date,
      'qr_code' => $qr,
      'barcode' => $bar,
      'status' => '1'
    );  
    $this->db->insert('serti',$data);
  }

  public function updateCerti($noserti,$img_memo){
    $data = [
      'no_serti' => $noserti,
      'gem_img' => $img_memo,
      'status' => '2'
    ];
    $this->db->where('no_serti', $noserti);
    $this->db->update('serti', $data);
    $this->db->db_debug = true;
  }

  public function deleteCerti($id)
  {
    return $this->db->delete('serti', array("no_serti" => $id));
  }  

  public function getDataTemp() {
    $query = $this->db->get('memo');
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return array();
    }
  }
  public function getWhere($id)
  {   
    $query = $this->db->get_where('serti', array('no_serti' => $id));
    return $query->result_array();
  }  

}

/* End of file Certi_model.php */
/* Location: ./application/models/Certi_model.php */