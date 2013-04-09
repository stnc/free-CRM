<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	
	class Cars extends CI_Controller {

		
		public function __Construct() {
			parent::__construct();
	//user control		
	if ($this->session->userdata('logged_in') == TRUE)
    {  $session_data = $this->session->userdata('logged_in');
	} else { //If no session, redirect to login page
     redirect('admin/login', 'refresh');}
	 
			}

			
			public function index() {
				  
	  
			$this->load->model('Cars_model');
			$data['allcar'] = $this->Cars_model->list_cars();
			/*//$data[$allpages->id];
			//	echo '<pre>';
			//print_r ( $data);
			//echo '</pre>';	*/
			$this->load->view('admin/cars/car_html.php', $data);
		
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
			
			
				$this->load->model('Cars_model');	
				
			


$data['msg'] = $this->Cars_model->add_car();	

			}
			
			
			
	 $this->load->view('admin/cars/add_car_html.php', $data);		

			
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

	$this->load->model('Cars_model');
	$this->Cars_model->update_car();

	
	
	//$data['msg'] = "<p class='success'>Bilgi güncellendi</p>";
	}

	
	$this->load->model('Cars_model');
	
	$data['cars'] = $this->Cars_model->get_cars();

	$this->load->view('admin/cars/edit_car_html.php', $data);
}		
		
		
		
		


		
public function delete() {
// load the delete page model
$this->load->model('Cars_model');


// if no page ID in url
if ($this->uri->segment(4) === FALSE ) {redirect('admin/cars');}

// model delete function
$query = $this->Cars_model->delete();

// check returned 

switch($query){
case 1:
echo "sayfa silindi";
break;
case 2:
redirect('admin/cars');
break;
case 3:
echo "sayfa silnmedi bir sorun oluştu";		
}

}	
function _validation(){
	// set validation rules
			$this->form_validation->set_rules('license_plate', 'Araç plakası', 'required|xss_clean|trim|trim');
	
			$this->form_validation->set_rules('delivery_date', 'Teslim Tarihi', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('delivery_km', 'Teslim Kilometresi', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('back_to_date', 'Geri alış tarihi', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('back_to_km', 'Geri alış kilometresi', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('total_accident', 'Toplam kaza', 'required|xss_clean|trim');

			$this->form_validation->set_rules('total_equivalent', 'Toplam kaza harcamaları', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('first_accident_date', 'İlk kaza tarihi', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('last_accident_date', 'Son kaza tarihi', 'required|xss_clean|trim');
			
			$this->form_validation->set_rules('notes', 'Notlar', 'xss_clean|trim');
  
	}
	
	}
	
	?>