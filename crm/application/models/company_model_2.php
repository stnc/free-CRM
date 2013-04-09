<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Company_model extends CI_Model {

	//var $name ='';

	//var $visible ='Yes';

	private $table_company = "company";

	private $res = '';

	function __construct() {

		parent::__construct();
		$this -> load -> helper('datetime');
	}

	function list_company() {
		$query = $this -> db -> get('company');
		if ($query -> num_rows() > 0) {
			return $query -> result();
		} else {
			return false;
		}
	}

	// function to insert page in database
	function add_company_model($picture) {
echo $picture;
		// assign values from $_POST to class variables
		$this -> company_authorized_name = $this -> input -> post('company_authorized_name', TRUE);

		$this -> company_authorized_lastname = $this -> input -> post('company_authorized_lastname', TRUE);

		$this -> company_webpage= $this -> input -> post('company_webpage', TRUE);

		$this -> company_commercial_name = $this -> input -> post('company_commercial_name', TRUE);

		$this -> company_name = $this -> input -> post('company_name', TRUE);

		$this -> company_type = $this -> input -> post('company_type', TRUE);

		$this -> company_referance_id = $this -> input -> post('company_referance_id', TRUE);

		$this -> company_sector_id = $this -> input -> post('company_sector_id', TRUE);

		$this -> firm_risk = $this -> input -> post('firm_risk', TRUE);

		$this -> tax_verge = $this -> input -> post('tax_verge', TRUE);

		$this -> relation_personal_id = $this -> input -> post('relation_personal_id', TRUE);

		$this -> tax_verge = $this -> input -> post('tax_verge', TRUE);

		$this -> tax_number = $this -> input -> post('tax_number', TRUE);

		
		$this -> i_IdentifyLocation = $this -> input -> post('i_IdentifyLocation', TRUE);

		$this -> i_whyGive = $this -> input -> post('i_whyGive', TRUE);

		$this -> i_GiveDate = tr_date_add($this -> input -> post('i_GiveDate', TRUE));

		$this -> adress_1 = $this -> input -> post('adress_1', TRUE);

		$this -> adress_2 = $this -> input -> post('adress_2', TRUE);

		$this -> company_gsm = $this -> input -> post('company_gsm', TRUE);

		$this -> company_phone = $this -> input -> post('company_phone', TRUE);

	
		
		$this -> company_fax = $this -> input -> post('company_page_company_fax', TRUE);

		$this -> alternative_number = $this -> input -> post('alternative_number', TRUE);

		$this -> company_authorized_email_address = $this -> input -> post('company_authorized_email_address', TRUE);

		$this -> company_company_authorized_email_address = $this -> input -> post('company_company_authorized_email_address', TRUE);

		$this -> p_SskNo = $this -> input -> post('p_SskNo', TRUE);

		$this -> p_register_number = $this -> input -> post('p_register_number', TRUE);

		$this -> w_salary = $this -> input -> post('w_salary', TRUE);

		$this -> w_datetime = tr_date_add($this -> input -> post('date01', TRUE));
		//işe başlama

		$this -> w_enddate = tr_date_add($this -> input -> post('date02', TRUE));

		$this -> i_BornDate = tr_date_add($this -> input -> post('date03', TRUE));

		//$this->w_enddate= $this->input->post('date02',TRUE);

		$this -> status_ = $this -> input -> post('status_', TRUE);

		//$this -> picture = $this -> input -> post('picture', TRUE);

		$this -> p_give_why = $this -> input -> post('p_give_why', TRUE);

		$this -> i_city = $this -> input -> post('i_city', TRUE);

		$this -> i_town = $this -> input -> post('i_town', TRUE);

		$this -> notes = $this -> input -> post('notes2', TRUE);

		$this -> picture = $picture;

		$this -> notes = $this -> input -> post('notes2', TRUE);

		$this -> position_id = $this -> input -> post('position_id', TRUE);

		$this -> section_id = $this -> input -> post('section_id', TRUE);

		$this -> alternative_number_who = $this -> input -> post('alternative_number_who', TRUE);

		$this -> adress_city = $this -> input -> post('adress_city', TRUE);

		$this -> adress_town = $this -> input -> post('adress_town', TRUE);

		$this -> company_sectors_id = $this -> input -> post('company_sectors_id', TRUE);
		$this -> i_LawCivil = $this -> input -> post('i_LawCivil', TRUE);
		//$this->article_date = time();

	
		$ok = $this -> db -> insert('company', $this);

		//}

		if ($ok) {

			
			$this -> res = $this -> db -> insert_id();
			//$data['lastid'] = $this->db->insert_id() ;

		}

		return $this -> res;

	}

	function update_company_model($pictures) {
		
		$id = $this -> uri -> segment(4);

		// get fileds from post
		$data = array('name' => $this -> input -> post('company_authorized_name', TRUE), 
		'company_authorized_lastname' => $this -> input -> post('company_authorized_lastname', TRUE), 
		'company_webpage' => $this -> input -> post('company_webpage', TRUE), 
		'company_commercial_name' => $this -> input -> post('company_commercial_name', TRUE), 
		'company_name' => $this -> input -> post('company_name', TRUE),
		'company_type' => $this -> input -> post('company_type', TRUE),
		'company_referance_id' => $this -> input -> post('company_referance_id', TRUE), 
		'company_sector_id' => $this -> input -> post('company_sector_id', TRUE),
		'firm_risk' => $this -> input -> post('firm_risk', TRUE), 
		'tax_verge' => $this -> input -> post('tax_verge',TRUE), 
		'relation_personal_id' => $this -> input -> post('relation_personal_id', TRUE),
		'tax_verge' => $this -> input -> post('tax_verge', TRUE), 
		'i_IdentifyLocation' => $this -> input -> post('i_IdentifyLocation', TRUE), 
		'i_whyGive' => $this -> input -> post('i_whyGive', TRUE),
		'i_GiveDate' => tr_date_add($this -> input -> post('i_GiveDate', TRUE)), 
		'adress_1' => $this -> input -> post('adress_1', TRUE),
		'adress_2' => $this -> input -> post('adress_2', TRUE), 
		'company_gsm' => $this -> input -> post('company_gsm', TRUE), 
		'company_phone' => $this -> input -> post('company_phone', TRUE), 
		'company_fax' => $this -> input -> post('company_page_company_fax', TRUE),
		'alternative_number' => $this -> input -> post('alternative_number', TRUE),
		'company_company_authorized_email_address' => $this -> input -> post('company_company_authorized_email_address', TRUE), 
		'picture' =>   $pictures,
		'company_authorized_email_address' => $this -> input -> post('company_authorized_email_address', TRUE), 
		'p_register_number' => $this -> input -> post('p_register_number', TRUE), 
		'w_salary' => $this -> input -> post('w_salary', TRUE),
		'adress_city' => $this -> input -> post('adress_city', TRUE), 
		'adress_town' => $this -> input -> post('adress_town', TRUE), 
		'w_datetime' => tr_date_add($this -> input -> post('date01', TRUE)), //işe başlama

		'w_enddate' => tr_date_add($this -> input -> post('date02', TRUE)),
		'i_BornDate' => tr_date_add($this -> input -> post('date03', TRUE)), 
		'status_' => $this -> input -> post('status_', TRUE),
		'i_city' => $this -> input -> post('i_city', TRUE),
		'i_town' => $this -> input -> post('i_town', TRUE),
		
		'p_give_why' => $this -> input -> post('p_give_why', TRUE),
		'tax_number' => $this -> input -> post('tax_number', TRUE), 
		'p_SskNo' => $this -> input -> post('p_SskNo', TRUE), 
		'position_id' => $this -> input -> post('position_id', TRUE), 
		'section_id' => $this -> input -> post('section_id', TRUE), 
		'company_sectors_id' => $this -> input -> post('company_sectors_id', TRUE),
		'i_LawCivil' => $this -> input -> post('i_LawCivil', TRUE),
		'alternative_number_who' => $this -> input -> post('alternative_number_who', TRUE),
		'notes' => $this -> input -> post('notes2', TRUE));

		$this -> db -> where('id', $id);
		$this -> db -> update('company', $data);
		//echo $this -> db -> last_query();
	}

	//edit de değerleri okur
	function get_company() {
		//$company_id = $this->db->escape($this->uri->segment(4));
		$company_id = (int)$this -> input -> post('id');
		$company_id = ($company_id) ? $company_id : $this -> uri -> segment(4);

		//$this->db->select('company.*,  section.id as  sid ');
		$this -> db -> select('company.*');
		$this -> db -> where('company.id', $company_id, '=');
		$this -> db -> from('company');
		//$this->db->join('section', 'section.id = company.section_id');
		//$this->db->join('town', 'town.id = company.i_town');
		$query = $this -> db -> get();

		return ($query -> result());

	}

	function delete() {

		$count = $this -> db -> get('company');

		if ($count -> num_rows() == 1) {

			return 1;

		} else {

			if ($this -> db -> delete('company', array('id' => $this -> uri -> segment(4)))) {

				return 2;

			} else {

				return 3;

			}

		}

	}

}
?>