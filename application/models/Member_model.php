<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function check_member()
  {
    $student_id = $this->input->post('student_id');

    $this->db->select('student_id');
    $this->db->from('members');
    $this->db->where('student_id', $student_id);
    $query = $this->db->get();

    if ($query->num_rows()==1) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function check_member_session()
  {
    if ($this->session->userdata('logged_in') != 'OK') {
      redirect('/member/index');
    }
  }

  public function get_member()
  {
    $student_id = $this->input->post('student_id');

    $this->db->select('members.title_id, members.name, members.surename, members.std_status_id, std_status.*, title.title_name');
    $this->db->from('members');
    $this->db->join('title','title.title_id = members.title_id', 'left');
    $this->db->join('std_status','std_status.id = members.std_status_id', 'left');
    $this->db->where('student_id', $student_id);
    $query = $this->db->get();
    $rows = $query->row();
    return $rows;
  }
}
