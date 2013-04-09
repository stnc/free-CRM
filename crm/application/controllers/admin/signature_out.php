<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Signature_out extends CI_Controller {

	private $view = 'signature';

	public function __Construct() {
		parent::__construct();
//user control		
	if ($this->session->userdata('logged_in') == TRUE)
    {  $session_data = $this->session->userdata('logged_in');
	} else { //If no session, redirect to login page
     redirect('admin/login', 'refresh');}

	}

	public function index() {
		$this -> load -> model('Signature_out_model');
		$data['allsign'] = $this -> Signature_out_model -> list_signatures();
		/*//$data[$allpages->id];
		 //	echo '<pre>';
		 //print_r ( $data);
		 //echo '</pre>';	*/
		$this -> load -> view('admin/signature_out/signature_out_html.php', $data);
	}

	public function add() {

		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		$data1[] = "";
		// load necessary libraries
		
					$this->_validation(); // Load the validation rules and fields

	

		// if passed form validation (ok)
		if ($this -> form_validation -> run() !== FALSE) {

			$this -> load -> model('Signature_out_model');

			$data['msg'] = $this -> Signature_out_model -> add();

		}

		$this -> load -> view('admin/signature_out/add_signature_out_html.php', $data);

	}

	public function update() {

		// empty $msg variable
		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		// load necessary libraries
		
		
			$this->_validation(); // Load the validation rules and fields
	

		if ($this -> form_validation -> run() !== FALSE) {

			$this -> load -> model('Signature_out_model');
			$this -> Signature_out_model -> update();

			//$data['msg'] = "<p class='success'>Bilgi güncellendi</p>";
		}

		$this -> load -> model('Signature_out_model');

		$data['signature'] = $this -> Signature_out_model -> get_signature();

		$this -> load -> view('admin/signature_out/edit_signature_out_html.php', $data);
	}

	public function delete() {

		$this -> load -> model('Signature_out_model');

		if ($this -> uri -> segment(4) === FALSE) {redirect('admin/signature');
		}
		// model delete function
		$query = $this -> Signature_out_model -> delete();

		switch($query) {
			case 1 :
				echo " silindi??";
				break;
			case 2 :
				redirect('admin/signature');
				break;
			case 3 :
				echo "silinemedi bir sorun oluştu";
		}
	}
	
	function _validation(){
		$this -> form_validation -> set_rules('today_report', 'Açıklama', 'xss_clean|trim');
		}

}
?>