<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Personal extends CI_Controller {

	public function __Construct() {
		parent::__construct();
	//user control		
	if ($this->session->userdata('logged_in') == TRUE)
    {  $session_data = $this->session->userdata('logged_in');
	} else { //If no session, redirect to login page
     redirect('admin/login', 'refresh');}
	}

	
	public function index() {
	
		$this -> load -> model('Personal_model');
		$data['allpersonal'] = $this -> Personal_model -> list_personal();
		/*//$data[$allpages->id];
		 //	echo '<pre>';
		 //print_r ( $data);
		 //echo '</pre>';	*/
		$this -> load -> view('admin/personal/personal_html.php', $data);
	

	
	
	}

	
	function logout()
  {
    $this->session->unset_userdata('logged_in');
    //session_destroy();
	    $this->session->sess_destroy();
   redirect('admin/login', 'refresh');
  }
  
  
	public function add() {

		/*$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg';
		$config['encrypt_name'] = true;

		$config['max_size'] = '10000';

		$config_img['image_library'] = 'gd2';

		$config_img['create_thumb'] = TRUE;
		$config_img['maintain_ratio'] = TRUE;
		$config_img['width'] = 75;
		$config_img['height'] = 50;*/

		$config_img='';
		// empty $msg variable
		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		$data1[] = "";
		// load necessary libraries
		
		




		
	
		

						if (!empty($_FILES['single_file']['name'])) {

			$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = true;

			$config['max_size'] = '1000';
			/*
			 $config['max_width']  = '1024';
			 $config['max_height']  = '768';*/

			$this -> load -> library('upload', $config);

			if (!$this -> upload -> do_upload('single_file'))// input name (type file)
			{

				//array('error' => $this->upload->display_errors());

				$data['err'] = $this -> upload -> display_errors();

			} else {
				#$data = array('upload_data' => $this->upload->data()); // default all
				$data1[] = $this -> upload -> data('single_file');
	//	echo '<pre>';print_r ($data1 );	echo '<pre/>'; $config_img = base_url() . 'uploads/' . $data1[0]['file_name'];
					 $config_img = $data1[1]['file_name'];

			}
		}
		
		$this->_validation(); // Load the validation rules and fields
		
		if ($this -> form_validation -> run() !== FALSE) {

			$this -> load -> model('Personal_model');

		

			$data['msg'] = $this -> Personal_model -> add_personal($config_img);

		}

		//şehirler gelir
		$this -> load -> model('General_model');
		$data['city'] = $this -> General_model -> list_city();

		//bölümler gelir
		$data['positions'] = $this -> General_model -> list_position();
		$this -> load -> view('admin/personal/add_personal_html.php', $data);

	}

	
	function _validation(){
	
	// set validation rules
		$this -> form_validation -> set_rules('iname', 'Ad', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('surname', 'Soyadı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_series', 'Kimlik seri no', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_inumber', 'Kimlik Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_FatherName', 'Baba adı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_MotherName', 'Anne adı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_BornPlace', 'Doğum yeri', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('email_address', 'Email adresi', 'valid_email|required|trim');
		//email
		
		

		$this -> form_validation -> set_rules('i_LawCivil', 'Medeni Hali', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_neighborhood', 'Mahalle-köy', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_face_no', 'Cild Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_FamilyNumber', 'Aile Sıra Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_order_no', 'Sıra no', 'required|trim|numeric');

		$this -> form_validation -> set_rules('i_RegNo', 'Kayıt Numarası', 'required|trim|numeric');

		$this -> form_validation -> set_rules('p_SskNo', 'Ssk Numarası', 'required|trim|numeric');

		$this -> form_validation -> set_rules('i_TcNo', 'Tc Kimlik Numarası', 'required|xss_clean|trim|numeric');
		//
		$this -> form_validation -> set_rules('i_IdentifyLocation', 'Verildiği yer', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_whyGive', 'Veriliş nedeni', 'required|xss_clean|trim');

			$this->form_validation->set_rules('i_GiveDate','kayıt tarihi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('date01', 'İşe başlama tarihi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('date02', 'İşden ayrılma tarihi', 'xss_clean|trim');

		$this -> form_validation -> set_rules('adress_1', 'Adres 1', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('adress_2', 'Adres 2', 'xss_clean|trim');

		$this -> form_validation -> set_rules('gsm_number', 'Telefon Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('home_number', 'Ev numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('gsm_number2', 'Telefon Numarası 2', 'xss_clean|trim|numeric');

		$this -> form_validation -> set_rules('personal_page_gsm_number2', 'Cep Numarası 2', 'xss_clean|trim');
		
		$this -> form_validation -> set_rules('alternative_number', 'Ulaşılabilecek kişi Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('personal_email_address', 'Kişisel email adresi', 'required|xss_clean|trim');
		
		$this -> form_validation -> set_rules('email_address', 'Email adresi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('p_register_number', 'Sicil Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('w_salary', 'Maaş', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('p_give_why', 'İşten ayrılma nedeni', 'xss_clean|trim');

		$this -> form_validation -> set_rules('notes2', 'Notlar', 'xss_clean|trim');

		$this -> form_validation -> set_rules('date03', 'Doğum tarihi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_city', 'Şehir', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_town', 'İlçe', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('position_id', 'Pozisyon', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('section_id', 'Bölüm', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_religion', 'Dini', 'required|xss_clean|trim');
		//dini
		$this -> form_validation -> set_rules('adress_city', 'İl', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('adress_town', 'İlçe', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('alternative_number_who', 'Alternatif Numara sahibi ', 'required|xss_clean|trim');
		
				//dini
		//	$this->form_validation->set_rules('status_','durumu', 'required|xss_clean|trim');
		
			//	$this->validation->set_fields($fields);

	
		
		
	}
	
	
	public function update() {
			$config_img='';
		// empty $msg variable
		$data['msg'] = '';
		$data['err'] = '';
		$data['lastid'] = '';
		// load necessary libraries
		
		

		
$this->_validation(); // Load the validation rules and fields
		if ($this -> form_validation -> run() !== FALSE) {

			$this -> load -> model('Personal_model');
			
	 if (!empty($_FILES['single_file']['name'])) {

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = true;

			$config['max_size'] = '1000';
			
			 /* $config['max_width']  = '1024';
			    $config['max_height']  = '768';*/

			$this -> load -> library('upload', $config);

			if (!$this -> upload -> do_upload('single_file'))// input name (type file)
			{

				//array('error' => $this->upload->display_errors());

				$data['err'] = $this -> upload -> display_errors();

			} else {
				#$data = array('upload_data' => $this->upload->data()); // default all
				$data1[] = $this -> upload -> data('single_file');
// $config_img = base_url() . 'uploads/' . $data1[0]['file_name'];
					$config_img = $data1[0]['file_name'];

			}
	 } else { 
	 
	 $config_img =$this -> input -> post('pic_backup', TRUE);
//#-fix #bug #error  burası geçici bir çözüm aslında veritabnından kontrol etmeliydi sistem bunu ...
	 }
		
			
			$this -> Personal_model -> update_personal($config_img);

			//$data['msg'] = "<p class='success'>Bilgi güncellendi</p>";
		}

		$this -> load -> model('Personal_model');
		$this -> load -> model('General_model');
		$data['personals'] = $this -> Personal_model -> get_personal();

		//print_r($data['personals']);
		// list  in parent town dropdown  *****şehirler gelir

		$data['city'] = $this -> General_model -> list_city();

		$data['towns'] = $this -> General_model -> list_town();

		//bölümler gelir
		$data['positions'] = $this -> General_model -> list_position();
		//posizyonlar
		$data['sections'] = $this -> General_model -> list_section();

		
		// render HTML
		$this -> load -> view('admin/personal/edit_personal_html.php', $data);

	}

	public function delete() {
		// load the delete page model
		$this -> load -> model('Personal_model');

		// if no page ID in url
		if ($this -> uri -> segment(3) === FALSE) {redirect('admin/personal/');
		}

		// model delete function
		$query = $this -> Personal_model -> delete();

		// check returned
		switch($query) {
			case 1 :
				echo "silinme sorunu var";
				break;
			case 2 :
				redirect('admin/personal/');
				break;
			case 3 :
				echo "silinmedi bir sorun oluştu";
		}

	}

}
?>