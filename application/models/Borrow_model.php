<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrow_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function borrow_book()
  {
    $book_id = $this->input->post('book_id');

    $this->db->select();
    $this->db->from('books');
    $this->db->where('book_id', $book_id);
    $query = $this->db->get();

    if ($query->num_rows()==1) {
      $rows = $query->row();
      $data = array(
        'student_id'=>$this->session->userdata('sess_student_id'),
        'book_id'=>$rows->book_id,
        'borrow_date'=>date('Y-m-d'),
        'send_state'=>'n',
      );
      $this->db->insert('lend', $data);
    }
    else {
      return FALSE;
    }
  }

  public function list_borrow_book()
  {
    $student_id = $this->session->userdata('sess_student_id');

    $this->db->select('lend.student_id,lend.book_id,books.book_name,lend.borrow_date');
    $this->db->from('lend');
    $this->db->join('books','books.book_id = lend.book_id');
    $this->db->where('lend.student_id', $student_id);
    $query = $this->db->get();

    return $query;
  }
}
