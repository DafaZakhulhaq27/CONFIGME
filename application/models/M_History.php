<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_History extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function get_history()
    {
        return $this->db->join('tb_profile', 'tb_history.profile = tb_profile.id_profile')
                        ->join('tb_device', 'tb_history.olt = tb_device.id_device')
                        ->join('tb_login', 'tb_history.id_login = tb_login.id_login')
                        ->get('tb_history')
                        ->result();
    }
    public function filter_history()
    {
        return $this->db->join('tb_profile', 'tb_history.profile = tb_profile.id_profile')
                        ->join('tb_device', 'tb_history.olt = tb_device.id_device')
                        ->join('tb_login', 'tb_history.id_login = tb_login.id_login')
                        ->where('MONTH(date)', $this->input->post('bulan'))
                        ->where('YEAR(date)', $this->input->post('tahun'))
                        ->get('tb_history')
                        ->result();
    }
  
    public function get_history_user()
    {
        return $this->db->join('tb_profile', 'tb_history.profile = tb_profile.id_profile')
                        ->join('tb_device', 'tb_history.olt = tb_device.id_device')
                        ->join('tb_login', 'tb_history.id_login = tb_login.id_login')
                        ->where('tb_history.id_login', $this->session->userdata("id_login"))
                        ->get('tb_history')
                        ->result();
    }
    public function filter_history_user()
    {
        return $this->db->join('tb_profile', 'tb_history.profile = tb_profile.id_profile')
                        ->join('tb_device', 'tb_history.olt = tb_device.id_device')
                        ->join('tb_login', 'tb_history.id_login = tb_login.id_login')
                        ->where('MONTH(date)', $this->input->post('bulan'))
                        ->where('YEAR(date)', $this->input->post('tahun'))
                        ->where('tb_history.id_login', $this->session->userdata("id_login"))
                         ->get('tb_history')
                        ->result();
    }
    public function hapus_history()
    {
        return $this->db->empty_table('tb_history');
    }  
}
