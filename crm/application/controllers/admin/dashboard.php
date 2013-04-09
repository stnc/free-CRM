<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard Extends CI_Controller {

	public function __Construct() {
			parent::__construct();
	//user control		
	if ($this->session->userdata('logged_in') == TRUE)
    {  $session_data = $this->session->userdata('logged_in');
	} else { //If no session, redirect to login page
     redirect('admin/login', 'refresh');}
	 
			}

	public function index() {

			if ( $this->session->userdata('logged_in') !== FALSE )
				
			{
			$this -> load -> view('admin/dashboard_html.php');
			}
			
			else
			
			{
				redirect('admin/login');
			}

	}

}
?>