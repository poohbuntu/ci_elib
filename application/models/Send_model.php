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

      $query_date = $query->row();
      $cal_date = (strtotime(date('Y-m-d')) - strtotime($query_date->borrow_date)) / (60*60*24);
      if ($cal_date > $query_date->limit_date) {
        $check_date = $cal_date - $query_date->limit_date;
        $fine_total = $query_date->fine * $check_date;
      }
      else {
        $check_date = 0;
        $fine_total = 0;
      }

      $data = array(
        'send_id'=>$this->session->userdata('sess_send_id'),
        'send_date'=>date('Y-m-d'),
        'late_date'=>$check_date,
        'fine_total'=>$fine_total,
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

  public function list_send_book()
  {
    $send_id = $this->session->userdata('sess_send_id');

    $this->db->select();
    $this->db->select('lend.student_id,lend.book_id,books.book_name,lend.borrow_date,lend.send_date,lend.fine,members.name,members.surename');
    $this->db->from('lend');
    $this->db->join('books','books.book_id = lend.book_id');
    $this->db->join('members','members.student_id = lend.student_id');
    $this->db->where('send_id', $send_id);
    $query = $this->db->get();

    return $query;
  }
}
