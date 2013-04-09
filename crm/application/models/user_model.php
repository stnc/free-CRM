<?php
Class User_model extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('id, email_address, password');
		$this -> db -> from('settings');
		$this -> db -> where('email_address = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . SHA1($password) . "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}
}
?>