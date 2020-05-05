<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SSH extends CI_Controller{
  function __construct() {
     parent::__construct();
     require_once(APPPATH.'libraries/ssh/Net/SSH2.php');
     require_once(APPPATH.'libraries/ssh/Math/BigInteger.php');
     require_once(APPPATH.'libraries/ssh/Crypt/Random.php');
     require_once(APPPATH.'libraries/ssh/Crypt/Hash.php');
     require_once(APPPATH.'libraries/ssh/Crypt/Base.php');

 
  }
  function index()
  {

      $data['main_view'] 		= 'ssh';
      $this->load->view('Index', $data);
    
  }
}