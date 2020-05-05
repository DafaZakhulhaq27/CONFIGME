<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Launch extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Config');
        
    }

    function index()
    {
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
          

          $this->load->view('Landing_page',$data);
    }
    

}
