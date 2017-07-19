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
    $student_id = $this->session->userdata('sess_student_id');
    $title_id = $this->session->userdata('sess_title_id');
    $book_id = $this->input->post('book_id');

    if ($title_id==8) {
      $limit_date=15;
    }
    else {
      $limit_date=7;
    }

    $this->db->select();
    $this->db->from('lend');
    $this->db->where('student_id',$student_id);
    $this->db->where('send_state', 'n');
    $lend_count = $this->db->get();

    if ($lend_count->num_rows()<5) {

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
            'limit_date'=>$limit_date,
            'send_state'=>'n',
          );
          $this->db->insert('lend', $data);
        }
        else {
          $this->db->select();
          $this->db->from('lend');
          $this->db->where('book_id', $book_id);
          $this->db->where('send_state', 'n');
          $lend_query2 = $this->db->get();

          if ($lend_query2->num_rows()!=null) {
            return FALSE;
          }
          else {
            $data = array(
              'student_id'=>$this->session->userdata('sess_student_id'),
              'book_id'=>$book_rows->book_id,
              'borrow_date'=>date('Y-m-d'),
              'send_state'=>'n',
            );
            $this->db->insert('lend', $data);
          }
        }
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
