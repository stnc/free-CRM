<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class ajax_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		echo 'geçersiz';
	}

	//bölüm listesi
	function section_list() {
		if (isset($_GET) && isset($_GET['func'])) {
			$this -> load -> model('General_model');
			$sss = $this -> General_model -> get_section_list($_GET['type']);
			foreach ($sss as $r) {
				echo '<option value="' . $r -> id . '">' . $r -> section . '</option>';
			}
		}
	}

	//ilçe listesi
	function town_list() {
		if (isset($_GET) && isset($_GET['func'])) {
			$this -> load -> model('General_model');
			$arrCities = $this -> General_model -> get_town_list($_GET['type']);
			foreach ($arrCities as $cities) {
				echo '<option value="' . $cities -> id . '">' . $cities -> town . '</option>';
			}
		}
	}

}
