<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cars_accident_model extends CI_Model {

	//var $name ='';

	//var $visible ='Yes';

	private $table_cars = "cars";

	private $res = '';

	function __construct() {

		parent::__construct();
	
	}


	function list_accident_cars() {
		$query = $this -> db -> get('cars_accidents_info');
		if ($query -> num_rows() > 0) {
			return $query -> result();
		} else {
			return false;
		}
	}

	

	function add_car_accident() {

		$this -> accident_date = $this -> input -> post('accident_date', TRUE);

		$this -> repairs_price = $this -> input -> post('repairs_price', TRUE);

		$this -> comment = $this -> input -> post('comment', TRUE);

		$ok = $this -> db -> insert('cars_accidents_info', $this);
		if ($ok) {
			$this -> res = $this -> db -> insert_id();
		}
		return $this -> res;

	}

	function update_car_accident() {

		$id = $this -> uri -> segment(4);

		$data = array(
		'accident_date' => $this -> input -> post('accident_date', TRUE), 
		'repairs_price' => $this -> input -> post('repairs_price', TRUE), 
		'comment' => $this -> input -> post('comment', TRUE)
		);

		$this -> db -> where('id', $id);
		$this -> db -> update('cars_accidents_info', $data);
	}



	//edit de deðerleri okur


	function get_cars_accident() {
		$id = (int)$this -> input -> post('id');
		$id = ($id) ? $id : $this -> uri -> segment(4);
		$this -> db -> select('*');
		$this -> db -> where('cars_accidents_info.id', $id, '=');
		$this -> db -> from('cars_accidents_info');
		$query = $this -> db -> get();
		return ($query -> result());
	}

	

	function delete_accident() {

		$count = $this -> db -> get('cars_accidents_info');

		if ($count -> num_rows() == 1) {

			return 1;

		} else {

			if ($this -> db -> delete('cars_accidents_info', array('id' => $this -> uri -> segment(4)))) {

				return 2;

			} else {

				return 3;

			}
		}
	}

}
?>