<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class General_model extends CI_Model {

	private $table_town = "town";
	//private $table_section = "section";

	function __construct() {

		parent::__construct();
		$this -> load -> database();
	}

	//personeli listele	
	function list_personals() {
		$this -> db -> select('name,id,surname');
		$query = $this -> db -> get('personal');
		return $query -> result();
	}

	//pozisyonalrı departmanları listele	
	function list_position() {
		$query = $this -> db -> get('position');
		return $query -> result();
	}
	
	//bölümleri listele
	function list_section() {
		$query = $this -> db -> get('section');
		//$this->db->order_by('section','DESC');
		return $query -> result();
	}
	
	//şehirleri listele
	function list_city() {
		$query = $this -> db -> get('city');
		//	$this->db->order_by('town','ASC');
		return $query -> result();
	}

	//bölümler seçime göre
	function get_section_list($type) {
		$this -> db -> select('section,id');
		$this -> db -> where('position_id', $type, '=');
		$query = $this -> db -> get('section');
		return $query -> result();
	}

	//ajaxdan gelip gelmedigi eger ajaxdan geliyorsa ..
	function get_town_list($type) {
		$this -> db -> select('town,id');
		$this -> db -> where('city_id', $type, '=');
		$this -> db -> order_by('town', 'ASC');
		$query = $this -> db -> get($this -> table_town);
		return $query -> result();
	}

	/* kullanımda degil bu site   */
	function list_town() {
		$query = $this -> db -> get('town');
		//if ( $query->num_rows() > 0 ) { //	echo $this->db->last_query();
		return $query -> result();
		/*} else { return false; }*/
	}
	
	//sektörleri listele
	
	//şehirleri listele
	function list_sectors() {
		$this -> db -> select('*');
		
		$this->db->distinct();
		$this -> db -> order_by('title', 'ASC');
		$query = $this -> db -> get('sectors');
		//echo $this -> db -> last_query();
		return $query -> result();
	}
	

}
?>