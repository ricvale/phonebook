<?php

class Admin_model extends CI_Model {
	
	function __construct()
	{
	}
	public function verify_user($email, $password)
	{	
		$q = $this
				->db
				->where('email', $email)
				->where ('password', md5($password))
				->limit(1)
				->get('users');

		if($q->num_rows() > 0){
			return $q->row('user_id');
		}
		return false;

	}
}

?>