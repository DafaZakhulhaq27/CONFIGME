<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Config extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Config');
    }
  
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
          $data['main_view'] 		= 'Configview';
          $data['data_profil'] = $this->M_Config->get_profil();
          $data['data_olt'] = $this->M_Config->get_olt();
          $data['replace'] = $this->M_Config->replace_script();
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
    }
    function config()
    {
        if($this->session->userdata('logged_in') == TRUE){
          $data['main_view'] 		= 'Configview';
          $id = $this->uri->segment(6) ;
          $data['replace_profile'] = $this->M_Config->get_profile_by_id($id);
          $data['data_profil'] = $this->M_Config->get_profil();
          $data['data_olt'] = $this->M_Config->get_olt();
          $data['replace'] = $this->M_Config->replace_script();
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
    }
    function config_unreg()
    {
        if($this->session->userdata('logged_in') == TRUE){
          $data['main_view'] 		= 'Configview_Unreg';
          $data['replace'] = $this->M_Config->replace_script();
          $data['data_olt'] = $this->M_Config->get_olt();
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
    }
    function dashboard()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
          $data['grafik_jan'] = $this->M_Config->grafik_count(1);
          $data['grafik_feb'] = $this->M_Config->grafik_count(2);
          $data['grafik_mar'] = $this->M_Config->grafik_count(3);
          $data['grafik_apr'] = $this->M_Config->grafik_count(4);
          $data['grafik_may'] = $this->M_Config->grafik_count(5);
          $data['grafik_jun'] = $this->M_Config->grafik_count(6);
          $data['grafik_jul'] = $this->M_Config->grafik_count(7);
          $data['grafik_aug'] = $this->M_Config->grafik_count(8);
          $data['grafik_sep'] = $this->M_Config->grafik_count(9);
          $data['grafik_oct'] = $this->M_Config->grafik_count(10);
          $data['grafik_nov'] = $this->M_Config->grafik_count(11);
          $data['grafik_dec'] = $this->M_Config->grafik_count(12);
          $data['grafik_all'] = $this->M_Config->grafik_count_all();
          $data['user_count'] = $this->M_Config->user_count();
          $data['olt_count'] = $this->M_Config->olt_count();
          $data['get_date_history'] = $this->M_Config->get_date_history();
          $data['get_olt_history'] = $this->M_Config->get_olt_history();
//           echo  $this->M_Config->get_date_history();
          $data['main_view'] 		= 'Dashboard';
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
    }
    public function ubah_config_unreg()
    {
        $olt = trim(''.$this->input->post('interface').'') ;
        $port_eth = $this->input->post('port_eth') ;
        $daftar_eth = implode(",",$port_eth) ;      
        $lenoltall = strlen($olt) ;
//         $start_int = 0 ;
        $length_int = 0 ;
        $olttrim = 0 ;
        $interface1 = NULL ;
        $typesn = NULL ;
        $trimtype = NULL ;
        $snfinal = NULL ;
//         $length_sn = 0 ;
        $oltsub = substr($olt,0,20) ;
        $snsub = substr($olt,20,17) ;
        $oltalsub = substr($olt,0,10) ;
        $snalsub = substr($olt,10,14) ;
//         $olttrim = trim($oltsub) ;
        $sntrim = trim($snsub) ;
        $oltaltrim = trim($oltalsub) ;
        $snaltrim = trim($snalsub) ;
        $snaltrim2 = substr($snaltrim,4,8) ;
        $lenolt = strlen(trim($oltsub)) ;
        $lenalolt = strlen($oltaltrim) ;

        // x/x/x
       if($lenolt == 16)
        {
          $length_int = 5 ;
          $olttrim = trim($oltsub) ;
        }
        elseif($lenolt == 17)
        {
          $length_int = 6 ;
          $olttrim = trim($oltsub) ;
        }elseif($lenolt == 18)
        {
          $length_int = 7 ;
          $olttrim = trim($oltsub) ;
        }elseif($lenalolt == 7){
          $length_int = 7 ;
          $olttrim = trim($oltalsub) ;
        }elseif($lenalolt == 8){
          $length_int = 8 ;
          $olttrim = trim($oltalsub) ;
        }elseif($lenalolt == 9){
          $length_int = 9 ;
          $olttrim = trim($oltalsub) ;
        }          
        // x/x/x
        if($lenoltall == 37)
        {
          $interface1 = substr($oltsub,9,$length_int) ;
          $typesn = substr($sntrim,0,3) ;
          $trimtype = trim(''.$typesn.'') ;
          $snfinal = $sntrim ;
        }elseif($lenoltall == 23 || $lenoltall == 22){
          $interface1 = substr($olttrim,0,$length_int) ;
          $typesn = substr($snaltrim,0,3) ;
          $trimtype = trim(''.$typesn.'') ;
          $snfinal = $snaltrim2 ;
        }

        if($this->session->userdata('logged_in') == TRUE){
           if($this->input->post('ontex') == NULL || $this->input->post('interface') == NULL  || $this->input->post('port') == NULL)
           {
           if($this->input->post('ontex') != NULL || $this->input->post('interface') != NULL  || $this->input->post('port') != NULL)
             {
             if($this->input->post('ontex') == NULL)
               {
                if($lenoltall == 37 || $lenoltall == 23 || $lenoltall == 22){
                   if($this->input->post('namapelanggan') != NULL || $this->input->post('alamatpelanggan') != NULL){
                        if($this->M_Config->ubah_config_unreg($interface1,$snfinal) == TRUE ){
                            $this->M_Config->input_history_unreg() ;
                            $this->session->set_flashdata('notif', ''.$interface1.'');
                            $this->session->set_flashdata('type', 'config');
                            redirect(base_url('C_Config/config_unreg/'.$this->input->post('olt').'/'.$trimtype.'/'.$this->input->post('inet').'/'.$this->input->post('vport').''));

                        }else {
                          if($this->M_Config->reset_config($interface1,$snfinal) == TRUE ){
                              if($this->M_Config->ubah_config($interface1,$snfinal) == TRUE ){
                            $this->M_Config->input_history_unreg() ;
                                  $this->session->set_flashdata('notif', ''.$interface1.'');
                                  $this->session->set_flashdata('type', 'config');
                            redirect(base_url('C_Config/config_unreg/'.$this->input->post('olt').'/'.$trimtype.'/'.$this->input->post('inet').'/'.$this->input->post('vport').''));
                              }else {
                                $this->session->set_flashdata('notif', 'Gagal Membuat Script');
                                $this->session->set_flashdata('type', 'error');
                                redirect('C_Config/config_unreg');
                              }
                          }else {
                              $this->session->set_flashdata('notif', 'Gagal Membuat Script');
                              $this->session->set_flashdata('type', 'error');
                                redirect('C_Config/config_unreg');
                          }
                        }
                    }else{
                              $this->session->set_flashdata('notif', 'Harus Nama Dan Alamat Pelanggan');
                              $this->session->set_flashdata('type', 'error');
                                redirect('C_Config/config_unreg');
                    }
                }else{
                           $this->session->set_flashdata('notif', 'Format SN salah');
                           $this->session->set_flashdata('type', 'error');
                                redirect('C_Config/config_unreg');
                }
              }else{
                   if($this->input->post('namapelanggan') != NULL || $this->input->post('alamatpelanggan') != NULL){
                        if($this->M_Config->ubah_config_unreg($this->input->post('ontex'),$snfinal) == TRUE ){
                            $this->M_Config->input_history_unreg() ;
                            $this->session->set_flashdata('notif', ''.$this->input->post('ontex').'');
                            $this->session->set_flashdata('type', 'config');
                            redirect(base_url('C_Config/config_unreg/'.$this->input->post('olt').'/ZTE/'.$this->input->post('inet').'/'.$this->input->post('vport').''));

                        }else {
                          if($this->M_Config->reset_config($this->input->post('ontex'),$snfinal) == TRUE ){
                              if($this->M_Config->ubah_config($this->input->post('ontex'),$snfinal) == TRUE ){
                            $this->M_Config->input_history_unreg() ;
                                  $this->session->set_flashdata('notif', ''.$this->input->post('ontex').'');
                                  $this->session->set_flashdata('type', 'config');
                            redirect(base_url('C_Config/config_unreg/'.$this->input->post('olt').'/ZTE/'.$this->input->post('inet').'/'.$this->input->post('vport').''));
                              }else {
                                $this->session->set_flashdata('notif', 'Gagal Membuat Script');
                                $this->session->set_flashdata('type', 'error');
                                redirect('C_Config/config_unreg');
                              }
                          }else {
                              $this->session->set_flashdata('notif', 'Gagal Membuat Script');
                              $this->session->set_flashdata('type', 'error');
                                redirect('C_Config/config_unreg');
                          }
                        }
                    }else{
                              $this->session->set_flashdata('notif', 'Harus Nama Dan Alamat Pelanggan');
                              $this->session->set_flashdata('type', 'error');
                                redirect('C_Config/config_unreg');
                    }
             }
             }else{
                         $this->session->set_flashdata('notif', 'Tidak Boleh Kosong Semua');
                         $this->session->set_flashdata('type', 'error');
                              redirect('C_Config/config_unreg');
           }
           }else{
                         $this->session->set_flashdata('notif', 'Tidak Boleh Terisi Semua');
                         $this->session->set_flashdata('type', 'error');
                              redirect('C_Config/config_unreg');
           }
        } else {
            $this->load->view('Loginview');
        }
    }
    public function ubah_config()
    {
        $olt = trim(''.$this->input->post('interface').'') ;
        $lenoltall = strlen($olt) ;
//         $start_int = 0 ;
        $length_int = 0 ;
        $olttrim = 0 ;
        $interface1 = NULL ;
        $typesn = NULL ;
        $trimtype = NULL ;
        $snfinal = NULL ;
//         $length_sn = 0 ;
        $oltsub = substr($olt,0,20) ;
        $snsub = substr($olt,20,17) ;
        $oltalsub = substr($olt,0,10) ;
        $snalsub = substr($olt,10,14) ;
//         $olttrim = trim($oltsub) ;
        $sntrim = trim($snsub) ;
        $oltaltrim = trim($oltalsub) ;
        $snaltrim = trim($snalsub) ;
        $snaltrim2 = substr($snaltrim,4,8) ;
        $lenolt = strlen(trim($oltsub)) ;
        $lenalolt = strlen($oltaltrim) ;

        // x/x/x
       if($lenolt == 16)
        {
          $length_int = 5 ;
          $olttrim = trim($oltsub) ;
        }
        elseif($lenolt == 17)
        {
          $length_int = 6 ;
          $olttrim = trim($oltsub) ;
        }elseif($lenolt == 18)
        {
          $length_int = 7 ;
          $olttrim = trim($oltsub) ;
        }elseif($lenalolt == 7){
          $length_int = 7 ;
          $olttrim = trim($oltalsub) ;
        }elseif($lenalolt == 8){
          $length_int = 8 ;
          $olttrim = trim($oltalsub) ;
        }elseif($lenalolt == 9){
          $length_int = 9 ;
          $olttrim = trim($oltalsub) ;
        }          
        // x/x/x
        if($lenoltall == 37)
        {
          $interface1 = substr($oltsub,9,$length_int) ;
          $typesn = substr($sntrim,0,3) ;
          $trimtype = trim(''.$typesn.'') ;
          $snfinal = $sntrim ;
        }elseif($lenoltall == 23 || $lenoltall == 22){
          $interface1 = substr($olttrim,0,$length_int) ;
          $typesn = substr($snaltrim,0,3) ;
          $trimtype = trim(''.$typesn.'') ;
          $snfinal = $snaltrim2 ;
        }

        if($this->session->userdata('logged_in') == TRUE){
          if($lenoltall == 37 || $lenoltall == 23 || $lenoltall == 22){
             if($this->input->post('username') != NULL || $this->input->post('username2') != NULL){
                  if($this->M_Config->ubah_config($interface1,$snfinal) == TRUE ){
                      $this->M_Config->input_history() ;
                      $this->session->set_flashdata('notif', ''.$interface1.'');
                      $this->session->set_flashdata('type', 'config');
                      redirect(base_url('C_Config/config/'.$this->input->post('olt').'/'.$trimtype.'/'.$this->input->post('voip').'/'.$this->input->post('profile').'/'.$this->input->post('domain').''));
                  }else {
                    if($this->M_Config->reset_config($interface1,$snfinal) == TRUE ){
                        if($this->M_Config->ubah_config($interface1,$snfinal) == TRUE ){
                            $this->M_Config->input_history() ;
                            $this->session->set_flashdata('notif', ''.$interface1.'');
                            $this->session->set_flashdata('type', 'config');
                            redirect(base_url('C_Config/config/'.$this->input->post('olt').'/'.$trimtype.'/'.$this->input->post('voip').'/'.$this->input->post('profile').''));
                        }else {
                          $this->session->set_flashdata('notif', 'Gagal Membuat Script');
                          $this->session->set_flashdata('type', 'error');
                          redirect('C_Config');
                        }
                    }else {
                        $this->session->set_flashdata('notif', 'Gagal Membuat Script');
                        $this->session->set_flashdata('type', 'error');
                        redirect('C_Config');
                    }
                  }
              }else{
                        $this->session->set_flashdata('notif', 'Harus Mengisi salah satu username(voip/inet)');
                        $this->session->set_flashdata('type', 'error');
                        redirect('C_Config');
              }
          }else{
                     $this->session->set_flashdata('notif', 'Format SN salah');
                     $this->session->set_flashdata('type', 'error');
                     redirect('C_Config');            
          }
        } else {
            $this->load->view('Loginview');
        }
    }
    public function get_vlan_by_id($id)
    {
        $data_vlan_by_id = $this->M_Config->get_vlan_by_id($id);
        echo json_encode($data_vlan_by_id);
    }
    public function get_history_json()
    {
        $history = $this->M_Config->get_date_history();
        echo json_encode($history);
    }




    //DATA OLT
     public function create_olt()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
                if($this->M_Config->create_olt() == TRUE ){
                  if($this->M_Config->update_date() == TRUE ){
                    $this->session->set_flashdata('notif', 'Success Create OLT');
                    $this->session->set_flashdata('type', 'success');
                    redirect(base_url('C_Config/data_config'));
                  }else{
                    $this->session->set_flashdata('notif', 'Success Create OLT');
                    $this->session->set_flashdata('type', 'success');                
                    redirect('C_Config/data_config');
                  }
                }else{
                  $this->session->set_flashdata('notif', 'FAILED CREATE PROFILE');
                  $this->session->set_flashdata('type', 'error');                
                    redirect('C_Config/data_config');
                }
        } else {
            $this->load->view('Loginview');
        }
    }
    function data_config()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3){
          $data['main_view'] 		= 'Data_Config';
          $data['data_olt'] = $this->M_Config->get_olt();
          $data['last_update'] = $this->M_Config->last_update();
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
    }
    function data_config_user()
    {
        if($this->session->userdata('logged_in') == TRUE){
          $data['main_view'] 		= 'Data_Config';
          $data['data_olt'] = $this->M_Config->get_olt_user();
          $data['last_update'] = $this->M_Config->last_update();
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
    }
  
    public function ubah_olt()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_Config->ubah_olt() == TRUE ){
              if($this->M_Config->update_date() == TRUE ){
                $this->session->set_flashdata('notif', 'Success Change OLT');
                $this->session->set_flashdata('type', 'success');
                redirect(base_url('C_Config/data_config'));
              }else{
                $this->session->set_flashdata('notif', 'Success Change OLT');
                $this->session->set_flashdata('type', 'success');                redirect('C_Config/data_config');
              }
            }else {
                $this->session->set_flashdata('notif', 'Failed Change OLT');
                $this->session->set_flashdata('type', 'error');
                redirect('C_Config/data_config');
            }
        } else {
            $this->load->view('Loginview');
        }
    }
    public function hapus_olt($id)
    {
         if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_Config->hapus_olt($id) == TRUE ){
              if($this->M_Config->update_date() == TRUE ){
                $this->session->set_flashdata('notif', 'Success Delete OLT');
                $this->session->set_flashdata('type', 'success');
                redirect(base_url('C_Config/data_config'));
              }else{
                $this->session->set_flashdata('notif', 'Success Delete OLT');
                $this->session->set_flashdata('type', 'success');
                redirect('C_Config/data_config');
              }
            }else {
                $this->session->set_flashdata('notif', 'Faield Delete OLT');
                $this->session->set_flashdata('type', 'error');
                redirect('C_Config/data_config');
            }
        } else {
            $this->load->view('Loginview');
        }
    }
    //DATA OLT

      //DATA Profile
    function data_profil()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
          $data['main_view'] 		= 'Data_Profil';
          $data['data_profil'] = $this->M_Config->get_profil();
//           $data['last_update'] = $this->M_Config->last_update();
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
    }
    public function ubah_profile()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_Config->ubah_profile() == TRUE ){
                $this->session->set_flashdata('notif', 'Success Update Profil');
                $this->session->set_flashdata('type', 'success');
                redirect(base_url('C_Config/data_profil'));
            }else {
                $this->session->set_flashdata('notif', 'Failed Update Profil');
                $this->session->set_flashdata('type', 'error');
                redirect('C_Config/data_profil');
            }
        } else {
            $this->load->view('Loginview');
        }
    }
    public function hapus_profil($id)
    {
         if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_Config->hapus_profil($id) == TRUE ){
                $this->session->set_flashdata('notif', 'Success Delete Profile');
                $this->session->set_flashdata('type', 'success');
                redirect('C_Config/data_profil');
            }else {
                $this->session->set_flashdata('notif', 'Failed Delete OLT');
                $this->session->set_flashdata('type', 'error');
                redirect('C_Config/data_profil');
            }
        } else {
            $this->load->view('Loginview');
        }
    }
    public function get_profile_by_id($id)
    {
        $data_profil_by_id = $this->M_Config->get_profile_by_id($id);
        echo json_encode($data_profil_by_id);
    }
     public function create_profile()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
                if($this->M_Config->create_profile() == TRUE ){
                  $this->session->set_flashdata('notif', 'SUCCESS CREATE PROFILE');
                  $this->session->set_flashdata('type', 'success');
                redirect(base_url('C_Config/data_profil'));
                }else{
                  $this->session->set_flashdata('notif', 'FAILED CREATE PROFILE');
                  $this->session->set_flashdata('type', 'error');                
                redirect(base_url('C_Config/data_profil'));
                }
        } else {
            $this->load->view('Loginview');
        }
    }
  
    //DATA Profile



}
