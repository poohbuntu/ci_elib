<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['a'] = 5;
    $data['b'] = 15;
    $this->load->view('test',$data);
  }

}
