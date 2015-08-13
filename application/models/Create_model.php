<?php

class Create_model extends CI_Model {
	
	function __construct()
	{
	}
	
	public function createcontact($sessid)
	{	
		$data = array(
		   'name' => '' ,
		   'phone' => '' ,
		   'note' => '',
		   'user' => $sessid
		);

		$this->db->insert('friends', $data); 

		$new_fid = $this->db->insert_id();

		return $new_fid;
	}
}
?>