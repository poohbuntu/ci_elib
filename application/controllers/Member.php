<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('member_model');
    $this->load->model('borrow_model');
  }

  function index()
  {
    $this->load->view('/member/check_member');
  }

  public function index2()
  {
    $student_id = $this->input->post('student_id');

    $this->form_validation->set_rules('student_id', 'Member Barcode', 'required');

    if ($this->form_validation->run()==FALSE) {
      $this->load->view('/member/check_member');
    }
    else {
      if ($this->member_model->check_member()==TRUE) {
        $sess_member = array(
          'sess_student_id'=>$student_id,
          'sess_title_id'=>$this->member_model->get_member()->title_id,
          'sess_name'=>$this->member_model->get_member()->name,
          'sess_surename'=>$this->member_model->get_member()->surename,
          'logged_in'=>'OK',
        );
        $this->session->set_userdata($sess_member);
        $data['limit_book'] = $this->borrow_model->check_limit_book();
        $data['result'] = $this->borrow_model->list_borrow_book()->result();
        $this->load->view('/borrow/borrow_form', $data);
      }
      else {
        $this->load->view('/member/check_member');
      }
    }
  }

}
