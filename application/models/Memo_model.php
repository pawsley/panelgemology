<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Memo_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Memo_model extends CI_Model {

  public function saveMemo($nomemo, $date, $qr, $stat)
  {
    $data = array(
      'no_memo' => $nomemo,
      'date' => $date,
      'qr_memo' => $qr,
      'status' => $stat
    );  
    $this->db->insert('memo',$data);
  }

  public function updateMemo($nomemo,$img_memo){
    $data = [
      'no_memo' => $nomemo,
      'img_memo' => $img_memo,
      'status' => '2'
    ];
    $this->db->where('no_memo', $nomemo);
    $this->db->update('memo', $data);
    $this->db->db_debug = true;
  }

  public function deleteMemo($id)
  {
    return $this->db->delete('memo', array("no_memo" => $id));
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
    $query = $this->db->get_where('memo', array('no_memo' => $id));
    return $query->result_array();
  }  

}

/* End of file Memo_model.php */
/* Location: ./application/models/Memo_model.php */