<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('send_model');
  }

  function index()
  {
    $result = $this->send_model->find_last_send_id()->row();
    $result_send_id = $result->send_id + 1;
    $sess_send = array(
      'sess_send_id'=>$result_send_id,
    );
    $this->session->set_userdata($sess_send);
    $this->load->view('/send/send_form');
  }

  public function send_book()
  {
    $this->send_model->send_book();
    $data['result'] = $this->send_model->list_send_book()->result();
    $this->load->view('/send/send_list', $data);
  }

}
