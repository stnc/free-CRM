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
		

		
		
		$this->_validation(); // Load the validation rules and fields
		
		if ($this -> form_validation -> run() !== FALSE) {

			$this -> load -> model('Company_model');

		

			$data['msg'] = $this -> Company_model -> add_company_model();

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
	

		$this -> form_validation -> set_rules('company_authorized_name', 'Yetkili ismi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_authorized_lastname', 'Yetkili soyadı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_webpage', 'Web sayfası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_commercial_name', 'Firma ticari ismi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_name', 'Firma Adı', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_type', 'Şirket türü', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_referance_id', 'Referans firma', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_authorized_email_address', 'Firma Email adresi', 'valid_email|required|trim');
			
	    $this -> form_validation -> set_rules('company_sector_id', 'Firma sektörü', 'required|xss_clean|trim');
		
		$this -> form_validation -> set_rules('company_gsm', 'Cep telefon numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_phone', 'Şirket numarası', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_fax', 'Fax Numarası ', 'xss_clean|trim|numeric');


		$this -> form_validation -> set_rules('company_company_authorized_email_address', 'Kişisel email adresi', 'required|xss_clean|trim');
		
		$this -> form_validation -> set_rules('company_authorized_email_address', 'Email adresi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('firm_risk', 'Risk durumu', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('tax_verge', 'Vergi dairesi', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('relation_personal_id', 'İlişkili kişi', 'required|trim|numeric');

		$this -> form_validation -> set_rules('tax_number', 'Vergi no', 'required|xss_clean|trim|numeric');

		$this -> form_validation -> set_rules('adress_1', 'Adres bilgileri', 'required|xss_clean|trim');

		//$this -> form_validation -> set_rules('adress_2', 'Adres 2', 'xss_clean|trim');

		$this -> form_validation -> set_rules('notes2', 'Notlar', 'xss_clean|trim');

		$this -> form_validation -> set_rules('i_city', 'Şehir', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('i_town', 'İlçe', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('position_id', 'Pozisyon', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('section_id', 'Bölüm', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('company_sectors_id', 'Sektörü', 'required|xss_clean|trim');
		//dini
		$this -> form_validation -> set_rules('adress_city', 'İl', 'required|xss_clean|trim');

		$this -> form_validation -> set_rules('adress_town', 'İlçe', 'required|xss_clean|trim');

		
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
			
			
			
			$this -> Company_model -> update_company_model();

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