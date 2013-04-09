<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//date_default_timezone_set('Europe/Istanbul');

class Signature_model extends CI_Model {

	private $table = 'signature';

	private $res = '';

	function __construct() {

		parent::__construct();
		$this -> load -> helper('datetime');
	}

	function list_signatures() {
		/*$query = $this->db->get('signature');
		 if ( $query->num_rows() > 0 ) {
		 return $query->result();	} else {return false;}*/

		$this -> db -> select(' 
signature_date,
signature_time,
explanation,
signature_out_date,
signature_out_time,
personal.name as name_,
signature.id as sid,
personal.surname,
personal.id as pid ');

		$this -> db -> from('signature');

		$this -> db -> join('personal', 'personal.id=signature.personal_id');

		$query = $this -> db -> get();

		//echo $this->db->last_query();
		return ($query -> result());
	}

	// function to insert page in database
	function add() {

		$table = 'signature';

		// assign values from $_POST to class variables
		$this -> personal_id = $this -> input -> post('pid', TRUE);

		$this -> signature_date = date("Y-n-j");

		$this -> signature_time = date("H:i:s");

		$this -> sign_ip_adress = $this -> input -> ip_address();

		$this -> explanation = $this -> input -> post('explanation', TRUE);

		$query = $this -> db -> get_where($table, array('personal_id' => $this -> personal_id, 'signature_date' => $this -> signature_date));

		if ($query -> num_rows() > 0) {
			$this -> res = "Bugün için daha önce imza girmişsiniz";
		} else {
			$ok = $this -> db -> insert($table, $this);

			if ($ok) {
				$this -> res = $this -> db -> insert_id();
			}
		}
		return $this -> res;

	}

	function update() {
		$table = 'signature';
		$id = $this -> uri -> segment(4);

		$data = array('personal_id' => $this -> input -> post('pid', TRUE), 'signature_date' => date("Y-n-j"), 'signature_time' => date("H:i:s"), 'sign_ip_adress' => $this -> input -> ip_address(), 'explanation' => $this -> input -> post('explanation', TRUE));

		$this -> db -> where('id', $id);
		$this -> db -> update($table, $data);

	}

	function get_signature() {
		$table = 'signature';
		$id = (int)$this -> input -> post('id');
		$id = ($id) ? $id : $this -> uri -> segment(4);
		$this -> db -> select($table . '.*');
		$this -> db -> where($table . '.id', $id, '=');
		$this -> db -> from($table);
		$query = $this -> db -> get();
		return ($query -> result());
	}

	function delete() {
		$table = 'signature';
		$count = $this -> db -> get($table);
		if ($count -> num_rows() == 1) {
			return 1;
		} else {
			if ($this -> db -> delete($table, array('id' => $this -> uri -> segment(4)))) {
				return 2;
			} else {
				return 3;
			}
		}
	}

}
?>