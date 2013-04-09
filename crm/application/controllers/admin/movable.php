<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Movable extends CI_Controller {

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
		$this -> load -> model('Movable_model');
		$data['allmovable'] = $this -> Movable_model -> list_movable();
		$this -> load -> view('admin/movable/movable_html.php', $data);
	}

	public function add() {

		// empty $msg variable
		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		$data1[] = "";
		// load necessary libraries
		
		
			$this->_validation(); // Load the validation rules and fields


		// if passed form validation (ok)
		if ($this -> form_validation -> run() !== FALSE) {

			$this -> load -> model('Movable_model');

			$data['msg'] = $this -> Movable_model -> add();

		}

		//personel listesi gelecek unutma
		$this -> load -> model('General_model');
		$data['personals'] = $this -> General_model -> list_personals();

		$this -> load -> view('admin/movable/add_movable_html.php', $data);

	}

	public function update() {

		// empty $msg variable
		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		// load necessary libraries
		
		
			$this->_validation(); // Load the validation rules and fields


		if ($this -> form_validation -> run() !== FALSE) {

			$this -> load -> model('Movable_model');
			$this -> Movable_model -> update();

			//$data['msg'] = "<p class='success'>Bilgi güncellendi</p>";
		}

		$this -> load -> model('Movable_model');

		$this -> load -> model('General_model');
		$data['movables'] = $this -> Movable_model -> get_movable();

		$data['personals'] = $this -> General_model -> list_personals();

		$this -> load -> view('admin/movable/edit_movable_html.php', $data);
	}

	public function delete() {
		// load the delete page model
		$this -> load -> model('Movable_model');
		//echo $this->uri->segment(4);
		// if no page ID in url
		if ($this -> uri -> segment(4) == FALSE) {
			redirect('admin/movable');
		}
		// model delete function
		$query = $this -> Movable_model -> delete();
		// check returned
		switch($query) {
			case 1 :
				echo " silindi??";
				break;
			case 2 :
				redirect('admin/movable');
				break;
			case 3 :
				echo "silinemedi bir sorun oluştu";
		}
	}
	
		function _validation(){
			// set validation rules
		$this -> form_validation -> set_rules('movable_number', 'Demirbaş Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('series_number', 'Seri Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('unit', 'Adet', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('give_date', 'Verildiği tarih', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('take_date', 'Alındığı tarih', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('comment', 'Açıklama', 'xss_clean|trim');
		}

}
?>