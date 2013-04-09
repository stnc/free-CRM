<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
date_default_timezone_set('Europe/Istanbul');
class prize extends CI_Controller {

	public function __Construct() {
		parent::__construct();
	//user control		
	if ($this->session->userdata('logged_in') == TRUE)
    {  $session_data = $this->session->userdata('logged_in');
	} else { //If no session, redirect to login page
     redirect('admin/login', 'refresh');}
	}



	function index() {

		$this -> load -> model('prize_model');
		$data["department"] = $this -> prize_model -> position_get();

		$data["prizes"] = $this -> prize_model -> prizes_get();
		//print_r ($data["prizes"]);
		$this -> load -> view('admin/prize/prize_html', $data);

	}


	function add() {
		//ekleme sayfas�n�n goster�m�
		$this -> load -> model('prize_model');
		$data["department"] = $this -> prize_model -> position_get();
		$data["prizes"] = $this -> prize_model -> prizes_get();

		$this -> load -> view('admin/prize/prize_add_html', $data);

	}


	function insert() {
		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		$data1[] = "";
		// load necessary libraries
		
		

		$this -> form_validation -> set_rules('personal_id', 'personal_id', 'required|xss_clean|trim|trim');

		$this -> form_validation -> set_rules('prize_name', 'prize_name', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('prize_type', 'prize_type', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('prize_accept_place', 'prize_accept_place', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('prize_accept_date', 'prize_accept_date', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('prize_record_date', 'prize_record_date', 'required|xss_clean|trim');
		/* if ( $this->form_validation->run() !== FALSE ) // val�da

		 {
		 */

		$this -> load -> model('prize_model');

		$id = $data['msg'] = $this -> prize_model -> insert_prize();
		redirect(base_url() . 'admin/prize/update/' . $id . '/?success=ok');

	}

	/*
	 buraya gelecek t�m kodlar
	 */
	function update() {
		$prizeid = $this -> uri -> segment(4);
		$this -> load -> model('prize_model');
		//$data["department"]=$this->prize_model->position_get();
		$data["updateprizes"] = $this -> prize_model -> update_prizes_get($prizeid);

		$this -> load -> view('admin/prize/prize_update_html', $data);
	}

	/*
	 ilerde buran�n yokedilmesi gerekiyor
	 * ikincil hata view kısmını benimki gibi yapmamaış 
	 */
	function updatework() {
		$id = $this -> uri -> segment(4);
		// empty $msg variable
		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		// load necessary libraries
		
		

		// set validation rules
		$this -> form_validation -> set_rules('prize_name', '�d�l Ad�', 'required|xss_clean|trim|trim');

		$this -> form_validation -> set_rules('prize_accept_date', '�d�l Al�nma Tarihi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('prize_type', '�d�l T�r�', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('prize_accept_place', '�d�l� Veren Yer', 'required|xss_clean|trim');

		if ($this -> form_validation -> run() !== FALSE) {
			$this -> load -> model('prize_model');
			$this -> prize_model -> update_prize();

			redirect(base_url() . 'admin/prize/update/' . $id . '/?success=ok');

			//$data['msg'] = "<p class='success'>Bilgi g�ncellendi</p>";
		} else {
			redirect(base_url() . 'admin/prize/update/' . $id . '/?success=error');
		}

	}

	function delete() {

		$this -> load -> model('prize_model');
		$this -> prize_model -> delete_prize();
		redirect(base_url() . 'admin/prize');

	}

}
?>