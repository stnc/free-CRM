<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cars_model extends CI_Model {

	//var $name ='';

	//var $visible ='Yes';

	private $table_cars = "cars";

	private $res = '';

	function __construct() {

		parent::__construct();
		$this -> load -> helper('datetime');
	}

	function list_cars() {
		$query = $this -> db -> get('cars');
		if ($query -> num_rows() > 0) {
			return $query -> result();
		} else {
			return false;
		}
	}

	

	function add_car() {

		// assign values from $_POST to class variables
		$this -> license_plate = $this -> input -> post('license_plate', TRUE);

		$this -> delivery_km = $this -> input -> post('delivery_km', TRUE);

		$this -> back_to_km = $this -> input -> post('back_to_km', TRUE);

		$this -> total_accident = $this -> input -> post('total_accident', TRUE);

		$this -> total_equivalent = $this -> input -> post('total_equivalent', TRUE);

		$this -> notes = $this -> input -> post('notes', TRUE);

		$this -> delivery_date = tr_date_add($this -> input -> post('delivery_date', TRUE));

		$this -> back_to_date = tr_date_add($this -> input -> post('back_to_date', TRUE));

		$this -> first_accident_date = tr_date_add($this -> input -> post('first_accident_date', TRUE));

		$this -> last_accident_date = tr_date_add($this -> input -> post('last_accident_date', TRUE));

		$ok = $this -> db -> insert('cars', $this);

		if ($ok) {

			//$this->res = "Kayıtlar başarı ile kaydedildi";
			$this -> res = $this -> db -> insert_id();
			//$data['lastid'] = $this->db->insert_id() ;

		}

		return $this -> res;

	}

	



	function update_car() {

		$car_id = $this -> uri -> segment(4);

		$data = array('license_plate' => $this -> input -> post('license_plate', TRUE), 'delivery_km' => $this -> input -> post('delivery_km', TRUE), 'back_to_km' => $this -> input -> post('back_to_km', TRUE), 'total_accident' => $this -> input -> post('total_accident', TRUE), 'total_equivalent' => $this -> input -> post('total_equivalent', TRUE), 'delivery_date' => tr_date_add($this -> input -> post('delivery_date', TRUE)), 'back_to_date' => tr_date_add($this -> input -> post('back_to_date', TRUE)), 'first_accident_date' => tr_date_add($this -> input -> post('first_accident_date', TRUE)), 'last_accident_date' => tr_date_add($this -> input -> post('last_accident_date', TRUE)), 'notes' => $this -> input -> post('notes', TRUE));

		$this -> db -> where('id', $car_id);
		$this -> db -> update('cars', $data);

	}

	//edit de değerleri okur
	function get_cars() {
		//$personal_id = $this->db->escape($this->uri->segment(4));
		$id = (int)$this -> input -> post('id');
		$id = ($id) ? $id : $this -> uri -> segment(4);
		$this -> db -> select('cars.*');
		$this -> db -> where('cars.id', $id, '=');
		$this -> db -> from('cars');
		//echo $this->db->last_query();
		$query = $this -> db -> get();

		return ($query -> result());

	}

	

	function delete() {

		$count = $this -> db -> get('cars');

		if ($count -> num_rows() == 1) {

			return 1;

		} else {

			if ($this -> db -> delete('cars', array('id' => $this -> uri -> segment(4)))) {

				return 2;

			} else {

				return 3;

			}
		}
	}

	

}
?>