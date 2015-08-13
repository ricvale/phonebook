<?php

class Welcome_model extends CI_Model {
	
	function __construct()
	{
	}
	
	public function get_user($user_id)
	{	
		$q = $this
				->db
				->where ('user_id', $user_id)
				->limit(1)
				->get('users');

		$data = $q->row();

		if( !empty($data) ) {
			return $data;		
		}
		return false;

	}

	public function get_friends($user_id)
	{	
		$q = $this
				->db
				->where ('user', $user_id)
				//->limit(1)
				->get('friends');

		$data = $q->result_array();

		if( !empty($data) ) {
			return $data;		
		}
		return false;

	}
}

?>