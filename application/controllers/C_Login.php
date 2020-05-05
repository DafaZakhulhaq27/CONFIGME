<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
    }

  function index()
  {
    if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
  			redirect('C_Config/Dashboard');
  	}elseif($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1 ){
        redirect('C_Config/config');
    } else {
  			$this->load->view('Loginview');
  	}
  }
  public function do_login()
  {
    if($this->session->userdata('logged_in') == TRUE){
  			redirect('C_Config/config');
    } else {
        if($this->M_Login->user_check() == TRUE){
          $this->session->set_flashdata('notif', 'Selamat Datang');
          $this->session->set_flashdata('type', 'login');
    			redirect('C_Login');
        } else {
          $this->session->set_flashdata('notif', 'Usernamae atau password salah!');
          $this->session->set_flashdata('type', 'error');
          redirect('C_Login');
        }
      }
   }

     public function create_user()
    {
        
//         $email= $this->input->post("email")  ;
//         $validasi_domain =strpos($kalimat,"telkomakses");

        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_Login->cek_user() == TRUE ){
//               if($email >= 1){
                if($this->M_Login->create_user() == TRUE ){
                  $this->session->set_flashdata('notif', 'SUCCESS CREATE USER');
                  $this->session->set_flashdata('type', 'success');
                  redirect(base_url('C_Login/data_user'));
                }else{
                  $this->session->set_flashdata('notif', 'FAILED CREATE USER');
                  $this->session->set_flashdata('type', 'error');                
                  redirect('C_Login/data_user');
                }
//               }else{
//                 $this->session->set_flashdata('notif', 'Email Must Using TelkomAkes');
//                 $this->session->set_flashdata('type', 'error');
//                 redirect('C_Login/data_user');
//               }
            }else {
                $this->session->set_flashdata('notif', 'NIK Already Avaible');
                $this->session->set_flashdata('type', 'error');
                redirect('C_Login/data_user');
            }
        } else {
            $this->load->view('Loginview');
        }
    }
     public function data_user()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
          $data['main_view'] 		= 'Data_user';
          $data['data_user'] = $this->M_Login->get_user();
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }    
     }
    public function hapus_user($id)
    {
         if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_Login->hapus_user($id) == TRUE ){
                $this->session->set_flashdata('notif', 'Success Delete User');
                $this->session->set_flashdata('type', 'success');
                redirect('C_Login/data_user');
            }else {
                $this->session->set_flashdata('notif', 'Failed Delete User');
                $this->session->set_flashdata('type', 'error');
                redirect('C_Login/data_user');
            }
        } else {
            $this->load->view('Loginview');
        }
    }
    public function ubah_pass()
    {
        if($this->session->userdata('logged_in') == TRUE){
            if($this->input->post('old') != NULL && $this->input->post('new') != NULL && $this->input->post('pass') != NULL ){
                  if($this->M_Login->cek_pass() == TRUE ){
                    if($this->input->post('new') == $this->input->post('pass') ){
                      if($this->M_Login->ubah_pass() == TRUE ){
                      $this->session->set_flashdata('notif', 'Success Change Password');
                      $this->session->set_flashdata('type', 'success');
                      $this->load->view('Loginview');
                      $this->session->sess_destroy();
                      }else{
                      $this->session->set_flashdata('notif', 'Failed Change Password');
                      $this->session->set_flashdata('type', 'error');
                      redirect('C_Config');
                      }
                  }else {
                      $this->session->set_flashdata('notif', 'Confirmation Password Wrong');
                      $this->session->set_flashdata('type', 'error');
                      redirect('C_Config');
                  }
              } else {
                      $this->session->set_flashdata('notif', 'Please Check Your Old Password');
                      $this->session->set_flashdata('type', 'error');
                      redirect('C_Config');
              }
            }else{
                      if($this->M_Login->ubah_profile() == TRUE ){
                      $this->session->set_flashdata('notif', 'Success Change Profile');
                      $this->session->set_flashdata('type', 'success');
                      $this->load->view('Loginview');
                      $this->session->sess_destroy();
                      }else{
                      $this->session->set_flashdata('notif', 'Failed Change Profile');
                      $this->session->set_flashdata('type', 'error');
                      redirect('C_Config');
                      }
            }
    }else {
            $this->load->view('Loginview');
        }
 }
    public function get_user_by_id($id)
    {
        $data_user_by_id = $this->M_Login->get_user_by_id($id);
        echo json_encode($data_user_by_id);
    }
      public function ubah_user()
    {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_Login->ubah_user() == TRUE ){
                $this->session->set_flashdata('notif', 'Success Update User');
                $this->session->set_flashdata('type', 'success');
                redirect(base_url('C_Login/data_user'));
            }else {
                $this->session->set_flashdata('notif', 'Failed Update User');
                $this->session->set_flashdata('type', 'error');
                redirect('C_Login/data_user');
            }
        } else {
            $this->load->view('Loginview');
        }
    }




  public function logout(){
    if($this->session->userdata('logged_in') == TRUE){
      $this->session->sess_destroy();
          redirect('https://configme.win/');
    }
  }

}
