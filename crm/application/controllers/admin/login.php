<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    class Login extends CI_Controller {
        
		public function __Construct() {
			parent::__construct();

	 
			}
			
			
        function index(){
		          // $this->load->model('user_model');
		$this->load->model('user_model','',TRUE);
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email_address', 'Email adres', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Şifre', 'trim|required|xss_clean|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
	        $this->load->view('admin/login/login_html');
    }
    else
    {
      //Go to private area güvenli alan
      //redirect('admin/personal', 'refresh');
	   redirect('admin/personal', 'refresh');
    }
    
  }
  
  function check_database($password)
  {
   
    $email_address = $this->input->post('email_address');
    
    //query  database
    $result = $this->user_model->login($email_address, $password);
    
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'email_address' => $row->email_address
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'kullanıcı adı veya şifre yanlış');
      return false;
    }
  }
            
            
    }
    
    
    
    ?>