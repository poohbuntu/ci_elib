<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrow_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
/*
  public function check_limit_book()
  {
    $student_id = $this->session->userdata('sess_student_id');
    $title_id = $this->session->userdata('sess_title_id');

    if ($title_id = 31) {
      return 5;
    } else {
      return 15;
    }

  }
*/
  public function borrow_book()
  {
    $book_id = $this->input->post('book_id');

    $this->db->select('book_id,book_name');
    $this->db->from('books');
    $this->db->where('book_id', $book_id);
    $book_query = $this->db->get();

    if ($book_query->num_rows()==1) {
      $book_rows = $book_query->row();

      $this->db->select();
      $this->db->from('lend');
      $this->db->where('book_id', $book_id);
      $lend_query = $this->db->get();

      if ($lend_query->num_rows()==null) {
        $data = array(
          'student_id'=>$this->session->userdata('sess_student_id'),
          'book_id'=>$book_rows->book_id,
          'borrow_date'=>date('Y-m-d'),
          'send_state'=>'n',
        );
        $this->db->insert('lend', $data);
      }
      else {
        return FALSE;
      }
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
    $this->db->where('lend.send_state', 'n');
    $query = $this->db->get();

    return $query;
  }
}
