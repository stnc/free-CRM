<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Company extends CI_Controller {

	public function __Construct() {
		parent::__construct();
	//user control		
	if ($this->session->userdata('logged_in') == TRUE)
    {  $session_data = $this->session->userdata('logged_in');
	} else { //If no session, redirect to login page
     redirect('admin/login', 'refresh');}
	}

	
	public function index() {
	
		$this -> load -> model('Company_model');
		$data['allcompany'] = $this -> Company_model -> list_company();
		/*//$data[$allpages->id];
		 //	echo '<pre>';
		 //print_r ( $data);
		 //echo '</pre>';	*/
		$this -> load -> view('admin/company/company_html.php', $data);
	

	
	
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
			$config['allowed_types'] = 'gif|jpg';
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

			$this -> load -> model('Company_model');

		

			$data['msg'] = $this -> Company_model -> add_company_model($config_img);

		}

		//şehirler gelir
		$this -> load -> model('General_model');
		$data['city'] = $this -> General_model -> list_city();

		
		//sektörler gelir
		$data['sectors'] = $this -> General_model -> list_sectors();
		
		//bölümler gelir
		$data['positions'] = $this -> General_model -> list_position();
		$this -> load -> view('admin/company/add_company_html.php', $data);

	}

	
	function _validation(){
	
	// set validation rules
		$this -> form_validation -> set_rules('company_authorized_name', 'Ad', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_authorized_lastname', 'Soyadı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_webpage', 'Kimlik seri no', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_commercial_name', 'Kimlik Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_name', 'Baba adı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_type', 'Anne adı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_referance_id', 'Doğum yeri', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_authorized_email_address', 'Email adresi', 'valid_email|required|trim');
			
	    $this -> form_validation -> set_rules('company_sector_id', 'Mahalle-köy', 'required|xss_clean|trim');
		
		$this -> form_validation -> set_rules('company_gsm', 'Telefon Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_phone', 'Ev numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_fax', 'Telefon Numarası 2', 'xss_clean|trim|numeric');

		$this -> form_validation -> set_rules('company_page_company_fax', 'Cep Numarası 2', 'xss_clean|trim');
		
	

		$this -> form_validation -> set_rules('company_company_authorized_email_address', 'Kişisel email adresi', 'required|xss_clean|trim');
		
		$this -> form_validation -> set_rules('company_authorized_email_address', 'Email adresi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_LawCivil', 'Medeni Hali', 'required|xss_clean|trim');



		$this -> form_validation -> set_rules('firm_risk', 'Cild Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('tax_verge', 'Aile Sıra Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('relation_personal_id', 'Sıra no', 'required|trim|numeric');

		$this -> form_validation -> set_rules('tax_verge', 'Kayıt Numarası', 'required|trim|numeric');

		$this -> form_validation -> set_rules('p_SskNo', 'Ssk Numarası', 'required|trim|numeric');

		$this -> form_validation -> set_rules('tax_number', 'Tc Kimlik Numarası', 'required|xss_clean|trim|numeric');
		//
		$this -> form_validation -> set_rules('i_IdentifyLocation', 'Verildiği yer', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_whyGive', 'Veriliş nedeni', 'required|xss_clean|trim');

		$this->form_validation->set_rules('i_GiveDate','kayıt tarihi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('date01', 'İşe başlama tarihi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('date02', 'İşden ayrılma tarihi', 'xss_clean|trim');

		$this -> form_validation -> set_rules('adress_1', 'Adres 1', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('adress_2', 'Adres 2', 'xss_clean|trim');



		$this -> form_validation -> set_rules('p_register_number', 'Sicil Numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('w_salary', 'Maaş', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('p_give_why', 'İşten ayrılma nedeni', 'xss_clean|trim');

		$this -> form_validation -> set_rules('notes2', 'Notlar', 'xss_clean|trim');

		$this -> form_validation -> set_rules('date03', 'Doğum tarihi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_city', 'Şehir', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_town', 'İlçe', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('position_id', 'Pozisyon', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('section_id', 'Bölüm', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_sectors_id', 'Dini', 'required|xss_clean|trim');
		//dini
		$this -> form_validation -> set_rules('adress_city', 'İl', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('adress_town', 'İlçe', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('alternative_number_who', 'Alternatif Numara sahibi ', 'required|xss_clean|trim');
		
	

	
		
		
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

			$this -> load -> model('Company_model');
			
			if (!empty($_FILES['single_file']['name'])) {

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg';
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
// $config_img = base_url() . 'uploads/' . $data1[0]['file_name'];
					$config_img = $data1[0]['file_name'];

			}
		}
			
			$this -> Company_model -> update_company_model($config_img);

			//$data['msg'] = "<p class='success'>Bilgi güncellendi</p>";
		}

		$this -> load -> model('Company_model');
		$this -> load -> model('General_model');
		$data['companys'] = $this -> Company_model -> get_company();

		//print_r($data['companys']);
		// list  in parent town dropdown  *****şehirler gelir

		$data['city'] = $this -> General_model -> list_city();

		$data['towns'] = $this -> General_model -> list_town();

		//bölümler gelir
		$data['positions'] = $this -> General_model -> list_position();
		//posizyonlar
		$data['sections'] = $this -> General_model -> list_section();

		
		// render HTML
		$this -> load -> view('admin/company/edit_company_html.php', $data);

	}

	public function delete() {
		// load the delete page model
		$this -> load -> model('Company_model');

		// if no page ID in url
		if ($this -> uri -> segment(3) === FALSE) {redirect('admin/company/');
		}

		// model delete function
		$query = $this -> Company_model -> delete();

		// check returned
		switch($query) {
			case 1 :
				echo "silinme sorunu var";
				break;
			case 2 :
				redirect('admin/company/');
				break;
			case 3 :
				echo "silinmedi bir sorun oluştu";
		}

	}

}
?>