    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_forgotpass extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_Login');
    }
      public function randomString($length = 20) {
      $str = "";
      $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
      $max = count($characters) - 1;
      for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
      }
      return $str ;
      }

    public function send_mail() {
        $random = $this->randomString() ;
        $to_mail = $this->input->post('email') ;
        $from_email = "dafa27890@gmail.com";
        $this->email->from($from_email, 'CONFIGME');
        $this->email->to($to_mail);
        $this->email->subject('FORGOT PASSWORD');
        $this->email->message('<h1>Your Password Has Been Reset</h1><p>NIK : '.$this->input->post("nik").'<br>This is your New Password : <strong>'.$random.'</strong></p> <p>Have A Nice Day </p>');
        $this->email->set_mailtype('html');
        //Send mail
        if($this->M_Login->cek_forgot() == TRUE)
        {
          if($this->M_Login->reset_pass($random) == TRUE)
          {
                if($this->email->send()){
                        $this->session->set_flashdata('notif', 'Success, Cek your own email');
                        $this->session->set_flashdata('type', 'success');
                        redirect('C_Login');
                }
                else{
                        $this->session->set_flashdata('notif', 'Failed Send Mail');
                        $this->session->set_flashdata('type', 'success');
                        redirect('C_Login');
                }
          }else{
                    $this->session->set_flashdata('notif', 'Failed Reset Password');
                    $this->session->set_flashdata('type', 'success');
                    redirect('C_Login');
          }
        }else{ 
                  $this->session->set_flashdata('notif', 'Email or KTP not valid');
                  $this->session->set_flashdata('type', 'error');
                  redirect('C_Login');
        }
    }
}
?>    