<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class prize_model extends CI_Model {

	function __construct() {
		$this -> load -> database();
		$this -> load -> helper('datetime');
	}

	function position_get() {
		$this -> db -> select('*,personal.id as pst');
		$this -> db -> from('personal');
		$this -> db -> join('position', 'personal.position_id = position.id');
		$this -> db -> order_by('personal.position_id', 'asc');
		$this -> db -> order_by('personal.name', 'asc');

		$query = $this -> db -> get();
		//echo  $this->db->last_query();
		return $query -> result();
	}

	function prizes_get() {
		$this -> db -> select('*,prize.id as przid');
		$this -> db -> from('prize');
		$this -> db -> join('personal', 'personal.id = prize.personal_id');
		$this -> db -> join('position', 'position.id = personal.position_id');
		$this -> db -> order_by('personal.position_id', 'asc');
		$query = $this -> db -> get();
		//echo	$this->db->last_query();
		return $query -> result();
	}

	function insert_prize(/*$dataprize*/) {
		// assign values from $_POST to class variables
		$this -> personal_id = $this -> input -> post('personal_id', TRUE);

		$this -> prize_name = $this -> input -> post('prize_name', TRUE);

		$this -> prize_type = $this -> input -> post('prize_type', TRUE);

		$this -> prize_accept_place = $this -> input -> post('prize_accept_place', TRUE);

		$this -> prize_accept_date = tr_date_add($this -> input -> post('prize_accept_date', TRUE));

		$this -> prize_record_date = $this -> input -> post('prize_record_date', TRUE);

		/* $this->status = $this->input->post('status',TRUE); */

		$ok = $this -> db -> insert('prize', $this);

		if ($ok) {

			//$this->res = "Kay�tlar ba�ar� ile kaydedildi";
			$this -> res = $this -> db -> insert_id();
			//son id al�r
			//$data['lastid'] = $this->db->insert_id() ;
		}

		return $this -> res;

		////////////////////////

	}

	function update_prizes_get($przid) {
		$this -> db -> select('*');
		$this -> db -> from('prize');
		$this -> db -> join('personal', 'personal.id = prize.personal_id');
		$this -> db -> where('prize.id', $przid);
		$query = $this -> db -> get();

		return $query -> result();

	}

	function update_prize() {
		$prize_id = $this -> uri -> segment(4);

		$data = array('prize_name' => $this -> input -> post('prize_name', TRUE), 'prize_type' => $this -> input -> post('prize_type', TRUE), 'prize_accept_place' => $this -> input -> post('prize_accept_place', TRUE), 'prize_accept_date' => tr_date_add($this -> input -> post('prize_accept_date', TRUE)), 'prize_record_date' => date('Y-m-d'), );

		$this -> db -> where('id', $prize_id);

		$this -> db -> update('prize', $data);

	}

	function delete_prize() {
		$prizeid = $this -> uri -> segment(4);
		$this -> db -> where('id', $prizeid);
		$this -> db -> delete('prize');

	}

}
?>
