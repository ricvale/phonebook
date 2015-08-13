<?php

class Update_model extends CI_Model {
	
	function __construct()
	{
	}
	
	public function updatecontact($id, $column, $val)
	{	
		$data = array(
		        $column => $val
		);
		$this->db->where('user', $_SESSION['id']);
		$this->db->update('friends', $data, "id = $id");
	}
}
?>