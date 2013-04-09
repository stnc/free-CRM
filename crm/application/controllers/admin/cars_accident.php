<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	
	class Cars_accident extends CI_Controller {

		
		public function __Construct() {
			parent::__construct();
//user control		
	if ($this->session->userdata('logged_in') == TRUE)
    {  $session_data = $this->session->userdata('logged_in');
	} else { //If no session, redirect to login page
     redirect('admin/login', 'refresh');}
			}

			
	
			
			public function index() {
			
			$this->load->model('Cars_accident_model');
			$data['all_accident_car'] = $this->Cars_accident_model->list_accident_cars();
			$this->load->view('admin/car_accident/car_accident_html.php', $data);
			}
			
		
			
			
		  public function add() {

		// empty $msg variable
			$data['msg'] = '';
			$data['err'] = '';
			$data['lastid'] ='';
			  $data1[] ="";
			// load necessary libraries
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			
	$this->_validation(); // Load the validation rules and fields
			
			
			// if passed form validation (ok)
			if ( $this->form_validation->run() !== FALSE ) 
			{
			$this->load->model('Cars_accident_model');	
			$data['msg'] = $this->Cars_accident_model->add_car_accident();	}
		   $this->load->view('admin/car_accident/add_car_accident_html.php', $data);		
			}
			
			
			
			public function update() {
		
		// empty $msg variable
			$data['msg'] = '';
			$data['err'] = '';
			$data['lastid'] = '';
			// load necessary libraries
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->_validation(); // Load the validation rules and fields
	
	if ( $this->form_validation->run() !== FALSE )
	{

	$this->load->model('Cars_accident_model');
	$this->Cars_accident_model->update_car_accident();

	//$data['msg'] = "<p class='success'>Bilgi güncellendi</p>";
	}
	$this->load->model('Cars_accident_model');
	
	$data['cars'] = $this->Cars_accident_model->get_cars_accident();

	$this->load->view('admin/car_accident/edit_car_accident_html.php', $data);
}		
			
			
		
		
		
		
		
public function delete() {
// load the delete page model
$this->load->model('Cars_accident_model');

// if no page ID in url
if ($this->uri->segment(4) === FALSE ) {redirect('admin/cars_accident/cars_accident/');}

// model delete function
$query = $this->Cars_accident_model->delete_accident();
// check returned 
switch($query){
case 1:
echo "sayfa silindi";
break;
case 2:
redirect('admin/cars_accident/cars_accident/');
break;
case 3:
echo "sayfa silnmedi bir sorun oluştu";		
}
}	

	function _validation(){
	
	// set validation rules
			$this->form_validation->set_rules('accident_date', 'Kaza Tarihi', 'required|xss_clean|trim|trim');
	
			$this->form_validation->set_rules('repairs_price', 'Tamirat bedeli', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('comment', 'Açıklama', 'xss_clean|trim');
			
			
	
}	

	
	}
	
	?>