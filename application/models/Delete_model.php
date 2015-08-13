<?php

class Delete_model extends CI_Model {
	
	function __construct()
	{
	}
	
	public function deletecontact($id_contact)
	{	
		$this->db->where('id', $id_contact);
		$this->db->delete('friends');
	}
}
?>