<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Config extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function replace_script()
    {
        return $this->db->where('id_device', $this->uri->segment(3))
            ->get('tb_device')
            ->row();
    }
    public function get_olt()
    {
        return $this->db->get('tb_device')
            ->result();
    }
    public function get_olt_user()
    {
        return $this->db->where('datel', $this->session->userdata('datel'))
            ->get('tb_device')
            ->result();
    }
  
    public function ubah_config($interface1,$sn)
    {
        $data = array(
            'interface' => $interface1,
            'ont' => $sn,
            'port' => $this->input->post('port'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'username2' => $this->input->post('username2'),
            'password2' => $this->input->post('password2'),
            'jenisconfig' => 'regular'
        );

        $this->db->where('id_device', $this->input->post('olt'))
            ->update('tb_device', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ubah_config_unreg($interface1,$sn)
    {
        $port_eth = $this->input->post('port_eth') ;
        $daftar_eth = implode(",",$port_eth) ;
        $data = array(
            'interface' => $interface1,
            'ont' => $sn,
            'port' => $this->input->post('port'),
            'namapelanggan' => $this->input->post('namapelanggan'),
            'alamatpelanggan' => $this->input->post('alamatpelanggan'),
            'port_eth' => $daftar_eth,
            'jenisconfig' => 'unreguler'
        );

        $this->db->where('id_device', $this->input->post('olt'))
            ->update('tb_device', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function reset_config($interface1,$sn)
    {
        $data = array(
            'interface' => $interface1,
            'ont' => $sn,
            'port' => 0,
            'username' => 0,
            'password' => 0,
            'username2' => 0,
            'password2' => 0

        );

        $this->db->where('id_device', $this->input->post('olt'))
            ->update('tb_device', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_vlan_by_id($id)
    {
        return $this->db->where('id_device', $id)
            ->get('tb_device')
            ->row();
    }
  
  
  // DATA OLT
    public function ubah_olt()
    {
        $data = array(
            'vlan_voip' => $this->input->post('voip'),
        );

        $this->db->where('id_device', $this->input->post('edit_id'))
            ->update('tb_device', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function hapus_olt($id)
    {
        return $this->db->where('id_device', $id)
                    ->delete('tb_device');
    }
    public function update_date()
    {
        $data = array(
            'last_update' => date("Y-m-d"),
        );

        $this->db->update('tb_device', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function last_update()
    {
        return $this->db->where('id_device', 5)
            ->get('tb_device')
            ->row()->last_update ;
    }
  // DATA OLT


  // DATA OLT
    public function ubah_profile()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'up' => $this->input->post('up'),
            'down' => $this->input->post('down'),
        );

        $this->db->where('id_profile', $this->input->post('edit_id'))
            ->update('tb_profile', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function hapus_profil($id)
    {
        return $this->db->where('id_profile', $id)
                    ->delete('tb_profile');
    }
    public function get_profil()
    {
        return $this->db->get('tb_profile')
            ->result();
    }
    public function get_profile_by_id($id)
    {
        return $this->db->where('id_profile', $id)
            ->get('tb_profile')
            ->row();
    }
      public function create_olt()
    {
        $data = array(
            'datel' => $this->input->post('datel'),
            'device' => $this->input->post('device'),
            'ip' => $this->input->post('ip'),
            'vlan_inet' => $this->input->post('vlan_inet'),
            'vlan_voip' => $this->input->post('vlan_voip'),
        );

        $this->db->insert('tb_device', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

  // DATA PROFILE

  
  
  
  
  
  // History
      public function input_history()
    {
        $data = array(
            'olt' => $this->input->post('olt'),
            'interface_history' => $this->input->post('interface'),
            'port' => $this->input->post('port'),
            'username_voip' => $this->input->post('username'),
            'password_voip' => $this->input->post('password'),
            'username_inet' => $this->input->post('username2'),
            'password_inet' => $this->input->post('password2'),
            'profile' => $this->input->post('profile'),
            'vlan_voip' => $this->input->post('voip'),
            'date' => date("Y-m-d"),
            'id_login' => $this->session->userdata('id_login')
        );

        $this->db->insert('tb_history', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

        public function input_history_unreg()
    {
        $port_eth = $this->input->post('port_eth') ;
        $daftar_eth = implode(",",$port_eth) ;
        $data = array(
            'olt' => $this->input->post('olt'),
            'interface_history' => $this->input->post('interface'),
            'port' => $this->input->post('port'),
            'namapelanggan' => $this->input->post('namapelanggan'),
            'alamatpelanggan' => $this->input->post('alamatpelanggan'),
            'port_eth' => $daftar_eth,
            'date' => date("Y-m-d"),
            'profile' => 6 ,
            'jenisconfig' => 'unreguler',
            'id_login' => $this->session->userdata('id_login')
          
        );
  

        $this->db->insert('tb_history', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

  
  
  // History
  
  
  //Grafik
    public function grafik_count($m)
    {
        return $this->db->join('tb_profile', 'tb_history.profile = tb_profile.id_profile')
                        ->join('tb_device', 'tb_history.olt = tb_device.id_device')
                        ->join('tb_login', 'tb_history.id_login = tb_login.id_login')
                        ->where('MONTH(date)', $m)
                        ->where('YEAR(date)', date('Y'))
                        ->from('tb_history')
                        ->count_all_results();
    }
    public function grafik_count_all()
    {
        return $this->db->join('tb_profile', 'tb_history.profile = tb_profile.id_profile')
                        ->join('tb_device', 'tb_history.olt = tb_device.id_device')
                        ->join('tb_login', 'tb_history.id_login = tb_login.id_login')
                        ->from('tb_history')
                        ->count_all_results();
    }
    public function user_count()
    {
        return $this->db->from('tb_login')
                        ->count_all_results();
    }
    public function olt_count()
    {
        return $this->db->from('tb_device')
                        ->count_all_results();
    }
      public function get_date_history()
    {
        return $this->db->select('date, COUNT(date) as total')
                        ->group_by('date')
                        ->get('tb_history')
                        ->result();
    }
    public function get_olt_history()
    {
        return $this->db->join('tb_profile', 'tb_history.profile = tb_profile.id_profile')
                        ->join('tb_device', 'tb_history.olt = tb_device.id_device')
                        ->join('tb_login', 'tb_history.id_login = tb_login.id_login')
                        ->select('device, COUNT(olt) as total')
                        ->group_by('olt')
                        ->order_by("total", "ASC")
                        ->get('tb_history')
                        ->result();
    }

  //Grafik
  
}
