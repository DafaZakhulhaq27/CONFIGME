<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function user_check(){
    $query = $this->db->where('username', $this->input->post('username'))
              ->where('password', md5($this->input->post('password')))
              ->get('tb_login');

    if($query->num_rows() == 1){
      $data_login = $query->row();
      $session = array(
        'logged_in'		=>	TRUE,
        'id_login'			=>	$data_login->id_login,
        'username'			=>	$data_login->username,
        'nama'			=>	$data_login->nama,
        'no_ktp'			=>	$data_login->no_ktp,
        'email'			=>	$data_login->email,
        'password'	=>	$data_login->password,
        'datel'	=>	$data_login->datel,
        'level'	=>	$data_login->level,

      );
      $this->session->set_userdata($session);
      return TRUE;
    } else {
      return FALSE;
    }
  }
    public function cek_user(){
    $query = $this->db->where('username', $this->input->post('nik'))
              ->get('tb_login');

    if($query->num_rows() == 1){
       return FALSE;
    } else {
      return TRUE;
    }
  }
  public function cek_pass(){
    $query = $this->db->where('username', $this->session->userdata('username'))
              ->where('password', md5($this->input->post('old')))
              ->get('tb_login');

    if($query->num_rows() == 1){
       return TRUE;
    } else {
      return FALSE;
    }
  }
  public function cek_forgot(){
    $query = $this->db->where('username', $this->input->post('nik'))
                      ->where('no_ktp', $this->input->post('no_ktp'))
                      ->where('email', $this->input->post('email'))
                       ->get('tb_login');

    if($query->num_rows() == 1){
       return TRUE;
    } else {
      return FALSE;
    }
  }

    public function create_user()
    {
        $data = array(
            'username' => $this->input->post('nik'),
            'password' => md5("wocjos123"),
            'nama' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('ktp'),
            'email' => $this->input->post('email'),
            'datel' => $this->input->post('datel'),
            'divisi' => $this->input->post('divisi'),
            'level' => $this->input->post('level')

        );

        $this->db->insert('tb_login', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
      public function hapus_user($id)
    {
        return $this->db->where('id_login', $id)
                    ->delete('tb_login');
    }

      public function get_user()
    {
        return $this->db->where('level !=', 2)
            ->get('tb_login')
            ->result();
    }
    public function ubah_pass()
    {
        $data = array(
            'nama' =>$this->input->post('nama'),
            'no_ktp' => $this->input->post('no_ktp'),
            'email' =>$this->input->post('email'),
            'password' => md5($this->input->post('pass')),
        );

        $this->db->where('id_login', $this->session->userdata("id_login"))
            ->update('tb_login', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ubah_profile()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('no_ktp'),
            'email' => $this->input->post('email'),
        );

        $this->db->where('id_login', $this->session->userdata("id_login"))
            ->update('tb_login', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function reset_pass($pass)
    {
        $data = array(
            'password' => md5($pass) ,
        );

        $this->db->where('username', $this->input->post('nik'))
            ->update('tb_login', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_user_by_id($id)
    {
        return $this->db->where('id_login', $id)
            ->get('tb_login')
            ->row();
    }
    public function ubah_user()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'divisi' => $this->input->post('divisi'),
            'datel' => $this->input->post('datel'),
            'no_ktp' => $this->input->post('ktp'),
            'email' => $this->input->post('email'),
            'level' => $this->input->post('level')

        );

        $this->db->where('username',$this->input->post('nik'))
            ->update('tb_login', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
