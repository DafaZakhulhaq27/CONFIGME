<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_history extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_History');
    }

  function index()
  {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
          $data['history'] = $this->M_History->get_history();
          $data['main_view'] 		= 'Data_history';
          $this->load->view('Index', $data) ;
        } else {
            $this->load->view('Loginview');
        }
  }
  function filter_history()
  {
        if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
          $data['history'] = $this->M_History->filter_history();
          $data['main_view'] 		= 'Data_history';
          $this->load->view('Index', $data) ;
        } else {
            $this->load->view('Loginview');
        }
  }
    function filter_history_user()
  {
        if($this->session->userdata('logged_in') == TRUE ){
          $data['history'] = $this->M_History->filter_history_user();
          $data['main_view'] 		= 'Data_history_user';
          $this->load->view('Index', $data) ;
        } else {
            $this->load->view('Loginview');
        }
  }

  function history_user()
  {
        if($this->session->userdata('logged_in') == TRUE){
          $data['history'] = $this->M_History->get_history_user();
          $data['main_view'] 		= 'Data_history_user';
          $this->load->view('Index', $data);
        } else {
            $this->load->view('Loginview');
        }
  }
    public function hapus_history()
    {
         if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2){
            if($this->M_History->hapus_history() == TRUE ){
                $this->session->set_flashdata('notif', 'Success Reset History');
                $this->session->set_flashdata('type', 'success');
                redirect('C_history');
            }else {
                $this->session->set_flashdata('notif', 'Failed Reset History');
                $this->session->set_flashdata('type', 'error');
                redirect('C_history');
            }
        } else {
            $this->load->view('Loginview');
        }
    }


}
