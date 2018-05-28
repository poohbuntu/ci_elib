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
    $sess_std_status_id = $this->session->userdata('sess_std_status_id');
    $sess_status_book_day = $this->session->userdata('sess_status_book_day');
    $sess_status_book_unit = $this->session->userdata('sess_status_book_unit');
    $book_id = $this->input->post('book_id');

    $borrow_date = date('Y-m-d');

    $count_return_date = date('Y-m-d', strtotime('+'.$sess_status_book_day.'day', strtotime($borrow_date)));

    $this->db->select();
    $this->db->from('holiday');
    $this->db->where('date', $count_return_date);
    $holiday_query = $this->db->get();

    if ($holiday_query->num_rows()==1) {
      $holiday_rows = $holiday_query->row();
      //$this->db->count_all_results('holiday');
      $this->db->where('title', $holiday_rows->title);
      $this->db->where('type', $holiday_rows->type);
      $this->db->from('holiday');
      $count_holiday = $this->db->count_all_results();

      $count_all_holiday = $count_holiday;
      $will_return_date = date('Y-m-d', strtotime('+'.$count_holiday.'day', strtotime($count_return_date)));

      $day_of_week = date("w", strtotime($will_return_date));
      if ($day_of_week == 6) {
        $count_day_of_week = 2;
        $will_return_date = date('Y-m-d', strtotime('+'.$count_day_of_week.'day', strtotime($will_return_date)));

        $this->db->select();
        $this->db->from('holiday');
        $this->db->where('date', $will_return_date);
        $sub_holiday_query = $this->db->get();
        if ($sub_holiday_query->num_rows()==1) {
          $sub_holiday_rows = $sub_holiday_query->row();
          $this->db->where('title', $sub_holiday_rows->title);
          $this->db->where('type', $sub_holiday_rows->type);
          $this->db->from('holiday');
          $count_sub_holiday = $this->db->count_all_results();

          $count_all_holiday = $count_holiday+$count_day_of_week+$count_sub_holiday;
          $will_return_date = date('Y-m-d', strtotime('+'.$count_all_holiday.'day', strtotime($count_return_date)));
        }
        else {
          $count_all_holiday = $count_holiday+$count_day_of_week;
          $will_return_date = $will_return_date;
        }
      }

      elseif ($day_of_week == 0) {
        $count_day_of_week = 1;
        $will_return_date = date('Y-m-d', strtotime('+'.$count_day_of_week.'day', strtotime($will_return_date)));

        $this->db->select();
        $this->db->from('holiday');
        $this->db->where('date', $will_return_date);
        $sub_holiday_query = $this->db->get();
        if ($sub_holiday_query->num_rows()==1) {
          $sub_holiday_rows = $sub_holiday_query->row();
          $this->db->where('title', $sub_holiday_rows->title);
          $this->db->where('type', $sub_holiday_rows->type);
          $this->db->from('holiday');
          $count_sub_holiday = $this->db->count_all_results();

          $count_all_holiday = $count_holiday+$count_day_of_week+$count_sub_holiday;
          $will_return_date = date('Y-m-d', strtotime('+'.$count_all_holiday.'day', strtotime($count_return_date)));
        }
        else {
          $count_all_holiday = $count_holiday+$count_day_of_week;
          $will_return_date = $will_return_date;
        }
      }

      else {
        $this->db->select();
        $this->db->from('holiday');
        $this->db->where('date', $will_return_date);
        $sub_holiday_query = $this->db->get();
        if ($sub_holiday_query->num_rows()==1) {
          $sub_holiday_rows = $sub_holiday_query->row();
          $this->db->where('title', $sub_holiday_rows->title);
          $this->db->where('type', $sub_holiday_rows->type);
          $this->db->from('holiday');
          $count_sub_holiday = $this->db->count_all_results();

          $count_all_holiday = $count_holiday+$count_sub_holiday;
          $will_return_date = date('Y-m-d', strtotime('+'.$count_all_holiday.'day', strtotime($count_return_date)));
        }
        else {
          $count_all_holiday = $count_holiday;
          $will_return_date = $will_return_date;
        }
      }

    }
    else {
      $count_all_holiday = 0;
      $will_return_date = $count_return_date;
    }

    $this->db->select();
    $this->db->from('lends');
    $this->db->where('student_id',$student_id);
    $this->db->where('send_state', 'n');
    $lends_count = $this->db->get();

    if ($lends_count->num_rows()<$sess_status_book_unit) {

      $this->db->select('book_id,book_name');
      $this->db->from('books');
      $this->db->where('book_id', $book_id);
      $book_query = $this->db->get();

      if ($book_query->num_rows()==1) {
        $book_rows = $book_query->row();

        $this->db->select();
        $this->db->from('lends');
        $this->db->where('book_id', $book_id);
        $lends_query = $this->db->get();

        if ($lends_query->num_rows()==null) {
          $data = array(
            'student_id'=>$this->session->userdata('sess_student_id'),
            'book_id'=>$book_rows->book_id,
            'borrow_date'=>date('Y-m-d'),
            'limit_day'=>$sess_status_book_day,
            'count_holiday'=>$count_all_holiday,
            'will_return_date'=>$will_return_date,
            'fine'=>3,
            'send_state'=>'n',
          );
          $this->db->insert('lends', $data);
        }
        else {
          $this->db->select();
          $this->db->from('lends');
          $this->db->where('book_id', $book_id);
          $this->db->where('send_state', 'n');
          $lends_query2 = $this->db->get();

          if ($lends_query2->num_rows()!=null) {
            return FALSE;
          }
          else {
            $data = array(
              'student_id'=>$this->session->userdata('sess_student_id'),
              'book_id'=>$book_rows->book_id,
              'borrow_date'=>date('Y-m-d'),
              'limit_day'=>$sess_status_book_day,
              'count_holiday'=>$count_all_holiday,
              'will_return_date'=>$will_return_date,
              'fine'=>3,
              'send_state'=>'n',
            );
            $this->db->insert('lends', $data);
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

    $this->db->select('lends.student_id,lends.book_id,books.book_name,lends.borrow_date,lends.limit_day,lends.will_return_date');
    $this->db->from('lends');
    $this->db->join('books','books.book_id = lends.book_id');
    $this->db->where('lends.student_id', $student_id);
    $this->db->where('lends.send_state', 'n');
    $this->db->order_by('lends.id','DESC');
    $query = $this->db->get();

    return $query;
  }
}
