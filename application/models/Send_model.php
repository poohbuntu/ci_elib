<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function find_last_send_id()
  {
    $this->db->select('send_id');
    $this->db->from('lend');
    $this->db->order_by('send_id', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();

    return $query;
  }

  public function send_book()
  {
    $book_id = $this->input->post('book_id');

    $this->db->select();
    $this->db->from('lend');
    $this->db->where('book_id', $book_id);
    $this->db->where('send_state', 'n');
    $query = $this->db->get();

    if ($query->num_rows()==1) {
      $data = array(
        'send_id'=>$this->session->userdata('sess_send_id'),
        'send_date'=>date('Y-m-d'),
        'send_state'=>'y',
      );
      $this->db->where('book_id', $book_id);
      $this->db->where('send_state', 'n');
      $this->db->update('lend', $data);
    }
    else {
      return FALSE;
    }
  }

}
