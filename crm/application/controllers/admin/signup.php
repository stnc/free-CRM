<?php
class Signup extends CI_Controller {
        
        function __construct()
            {
                parent::__construct();
               
            }
            
            
        public function index()
        {

             $data['logged_in']  = $this->session->userdata('email');
            $data['signup_error'] = "";

            if( $this->session->userdata('email') )
                
             {
                 redirect('myaccount');
                 }   
             
            
            
            $this->form_validation->set_rules('email_address', 'Email Address', 'valid_email|required');
            $this->form_validation->set_rules('password', 'Password ', 'required|min_length[6]');
            $this->form_validation->set_rules('first_name', 'First Name ', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name ', 'required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirm', 'matches[password]');
            $this->form_validation->run();
            
            if($this->form_validation->run() !== false)
                {
                    
                $this->load->model('signup_model');
                $dojob = $this->signup_model->is_available($this->input->post('email_address'));
                if($dojob == false)
                
                {
                 
                        $adduser = $this->signup_model->register(
                        $this->input->post('email_address'),
                        $this->input->post('first_name'),
                        $this->input->post('last_name'),
                        $this->input->post('password')
                        );   
                    
                        redirect('login');  
                    
                    }
                
                    
                    else
                        {
                        $data['signup_error'] =  "<p>Username already registered by another member! Please choose another one</p>";
                        }
            }
                
                    $this->load->view('front/signup_html', $data);    
        }    
        
    }
    
    ?>