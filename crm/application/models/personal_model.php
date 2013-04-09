<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Personal_model extends CI_Model {

	//var $name ='';

	//var $visible ='Yes';

	private $table_personal = "personal";

	private $res = '';

	function __construct() {

		parent::__construct();
		$this -> load -> helper('datetime');
	}

	function list_personal() {
		$query = $this -> db -> get('personal');
		if ($query -> num_rows() > 0) {
			return $query -> result();
		} else {
			return false;
		}
	}

	// function to insert page in database
	function add_personal($picture) {
echo $picture;
		// assign values from $_POST to class variables
		$this -> name = $this -> input -> post('iname', TRUE);

		$this -> surname = $this -> input -> post('surname', TRUE);

		$this -> i_series = $this -> input -> post('i_series', TRUE);

		$this -> i_inumber = $this -> input -> post('i_inumber', TRUE);

		$this -> i_FatherName = $this -> input -> post('i_FatherName', TRUE);

		$this -> i_MotherName = $this -> input -> post('i_MotherName', TRUE);

		$this -> i_BornPlace = $this -> input -> post('i_BornPlace', TRUE);

		$this -> i_neighborhood = $this -> input -> post('i_neighborhood', TRUE);

		$this -> i_face_no = $this -> input -> post('i_face_no', TRUE);

		$this -> i_FamilyNumber = $this -> input -> post('i_FamilyNumber', TRUE);

		$this -> i_order_no = $this -> input -> post('i_order_no', TRUE);

		$this -> i_RegNo = $this -> input -> post('i_RegNo', TRUE);

		$this -> i_TcNo = $this -> input -> post('i_TcNo', TRUE);

		//
		$this -> i_IdentifyLocation = $this -> input -> post('i_IdentifyLocation', TRUE);

		$this -> i_whyGive = $this -> input -> post('i_whyGive', TRUE);

		$this -> i_GiveDate = tr_date_add($this -> input -> post('i_GiveDate', TRUE));

		$this -> adress_1 = $this -> input -> post('adress_1', TRUE);

		$this -> adress_2 = $this -> input -> post('adress_2', TRUE);

		$this -> gsm_number = $this -> input -> post('gsm_number', TRUE);

		$this -> home_number = $this -> input -> post('home_number', TRUE);

		$this -> p_blood_group = $this -> input -> post('p_blood_group', TRUE);
		
		$this -> gsm_number2 = $this -> input -> post('personal_page_gsm_number2', TRUE);

		$this -> alternative_number = $this -> input -> post('alternative_number', TRUE);

		$this -> email_address = $this -> input -> post('email_address', TRUE);

		$this -> personal_email_address = $this -> input -> post('personal_email_address', TRUE);

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

		$this -> i_religion = $this -> input -> post('i_religion', TRUE);
		$this -> i_LawCivil = $this -> input -> post('i_LawCivil', TRUE);
		//$this->article_date = time();

	
		$ok = $this -> db -> insert('personal', $this);

		//}

		if ($ok) {

			
			$this -> res = $this -> db -> insert_id();
			//$data['lastid'] = $this->db->insert_id() ;

		}

		return $this -> res;

	}

	function update_personal($pictures) {
		
		$id = $this -> uri -> segment(4);

		// get fileds from post
		$data = array('name' => $this -> input -> post('iname', TRUE), 
		'surname' => $this -> input -> post('surname', TRUE), 
		'i_series' => $this -> input -> post('i_series', TRUE), 
		'i_inumber' => $this -> input -> post('i_inumber', TRUE), 
		'i_FatherName' => $this -> input -> post('i_FatherName', TRUE),
		'i_MotherName' => $this -> input -> post('i_MotherName', TRUE),
		'i_BornPlace' => $this -> input -> post('i_BornPlace', TRUE), 
		'i_neighborhood' => $this -> input -> post('i_neighborhood', TRUE),
		'i_face_no' => $this -> input -> post('i_face_no', TRUE), 
		'i_FamilyNumber' => $this -> input -> post('i_FamilyNumber',TRUE), 
		'i_order_no' => $this -> input -> post('i_order_no', TRUE),
		'i_RegNo' => $this -> input -> post('i_RegNo', TRUE), 
		'i_IdentifyLocation' => $this -> input -> post('i_IdentifyLocation', TRUE), 
		'i_whyGive' => $this -> input -> post('i_whyGive', TRUE),
		'i_GiveDate' => tr_date_add($this -> input -> post('i_GiveDate', TRUE)), 
		'adress_1' => $this -> input -> post('adress_1', TRUE),
		'adress_2' => $this -> input -> post('adress_2', TRUE), 
		'gsm_number' => $this -> input -> post('gsm_number', TRUE), 
		'home_number' => $this -> input -> post('home_number', TRUE), 
		'gsm_number2' => $this -> input -> post('personal_page_gsm_number2', TRUE),
		'alternative_number' => $this -> input -> post('alternative_number', TRUE),
		'personal_email_address' => $this -> input -> post('personal_email_address', TRUE), 
		'p_blood_group' => $this -> input -> post('p_blood_group', TRUE), 
		'picture' =>   $pictures,
		'email_address' => $this -> input -> post('email_address', TRUE), 
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
		'i_TcNo' => $this -> input -> post('i_TcNo', TRUE), 
		'p_SskNo' => $this -> input -> post('p_SskNo', TRUE), 
		'position_id' => $this -> input -> post('position_id', TRUE), 
		'section_id' => $this -> input -> post('section_id', TRUE), 
		'i_religion' => $this -> input -> post('i_religion', TRUE),
		'i_LawCivil' => $this -> input -> post('i_LawCivil', TRUE),
		'alternative_number_who' => $this -> input -> post('alternative_number_who', TRUE),
		'notes' => $this -> input -> post('notes2', TRUE));

		$this -> db -> where('id', $id);
		$this -> db -> update('personal', $data);
		//echo $this -> db -> last_query();
	}

	//edit de değerleri okur
	function get_personal() {
		//$personal_id = $this->db->escape($this->uri->segment(4));
		$personal_id = (int)$this -> input -> post('id');
		$personal_id = ($personal_id) ? $personal_id : $this -> uri -> segment(4);
		/* $query = $this->db->query("SELECT * FROM personal WHERE id = ".$personal_id." ");return $query->result();*/

		//$this->db->select('personal.*,  section.id as  sid ');
		$this -> db -> select('personal.*');
		$this -> db -> where('personal.id', $personal_id, '=');
		$this -> db -> from('personal');
		//$this->db->join('section', 'section.id = personal.section_id');
		//$this->db->join('town', 'town.id = personal.i_town');
		$query = $this -> db -> get();

		return ($query -> result());

	}

	function delete() {

		$count = $this -> db -> get('personal');

		if ($count -> num_rows() == 1) {

			return 1;

		} else {

			if ($this -> db -> delete('personal', array('id' => $this -> uri -> segment(4)))) {

				return 2;

			} else {

				return 3;

			}

		}

	}

}
?>
