<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrow extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('member_model');
    $this->load->model('borrow_model');
  }

  function index()
  {
    $this->member_model->check_member_session();
    $this->borrow_model->borrow_book();
    $data['result'] = $this->borrow_model->list_borrow_book()->result();
    $this->load->view('/borrow/borrow_form', $data);
  }

}
