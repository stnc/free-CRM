<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

date_default_timezone_set('Europe/Istanbul');

class Movable_model extends CI_Model {

	//var $name ='';

	//var $visible ='Yes';

	private $table_personal = "personal";

	private $res = '';

	function __construct() {

		parent::__construct();
		$this -> load -> helper('datetime');
	}

	function list_movable() {
		/*	$query = $this->db->get('movable');
		 if ( $query->num_rows() > 0 ) {
		 return $query->result();
		 }
		 else {
		 return false;
		 }*/

		$this -> db -> select(' 
movable.*,
personal.name,personal.surname,
personal.surname,personal.id as pid ');

		$this -> db -> from('movable');

		$this -> db -> join('personal', 'personal.id=movable.personal_id');

		$query = $this -> db -> get();

		//echo $this->db->last_query();
		return ($query -> result());

	}

	// function to insert page in database
	function add() {

		// assign values from $_POST to class variables
		$this -> personal_id = $this -> input -> post('personal_id', TRUE);

		$this -> movable_number = $this -> input -> post('movable_number', TRUE);

		$this -> series_number = $this -> input -> post('series_number', TRUE);

		$this -> unit = $this -> input -> post('unit', TRUE);

		$this -> comment = $this -> input -> post('comment', TRUE);
		//tr_date_add

		$this -> give_date = tr_date_add($this -> input -> post('give_date', TRUE));

		$this -> take_date = tr_date_add($this -> input -> post('take_date', TRUE));

		$ok = $this -> db -> insert('movable', $this);

		if ($ok) {

			$this -> res = $this -> db -> insert_id();
			//$data['lastid'] = $this->db->insert_id() ;

		}

		return $this -> res;

	}

	function update() {

		$id = $this -> uri -> segment(4);

		$data = array('personal_id' => $this -> input -> post('personal_id', TRUE), 'movable_number' => $this -> input -> post('movable_number', TRUE), 'series_number' => $this -> input -> post('series_number', TRUE), 'unit' => $this -> input -> post('unit', TRUE), 'comment' => $this -> input -> post('comment', TRUE), 'give_date' => tr_date_add($this -> input -> post('give_date', TRUE)), //işe başlama

		'take_date' => tr_date_add($this -> input -> post('take_date', TRUE)));

		$this -> db -> where('id', $id);
		$this -> db -> update('movable', $data);

	}

	function get_movable() {
		$table = 'movable';
		$id = (int)$this -> input -> post('id');
		$id = ($id) ? $id : $this -> uri -> segment(4);
		/* $query = $this->db->query("SELECT * FROM personal WHERE id = ".$personal_id." ");return $query->result();*/
		$this -> db -> select($table . '.*');
		$this -> db -> where($table . '.id', $id, '=');
		$this -> db -> from($table);
		$query = $this -> db -> get();
		return ($query -> result());
	}

	function delete() {
		$count = $this -> db -> get('movable');
		if ($count -> num_rows() == 1) {
			return 1;
		} else {
			if ($this -> db -> delete('movable', array('id' => $this -> uri -> segment(4)))) {
				return 2;
			} else {
				return 3;
			}
		}
	}

}
?>
