<?php

class Register_model extends CI_Model {
	
	function __construct()
	{
	}
	
	public function insert_admin($username, $email, $password)
	{	
		$data = array(
		   'username' => $username,
		   'email' => $email,
		   'password' => md5($password)
		);

		$this->db->insert('users', $data); 

		$new_fid = $this->db->insert_id();

		return $new_fid;
	}
}
?>