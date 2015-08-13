<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

	public function __construct() 
	{
		session_start();

		parent::__construct();

		if ( !isset($_SESSION['id']) ){
			die('please login');
			//redirect('admin');
		}
	}
	public function index()
	{
		$id_contact = $this->input->post('id_contact');

		$this->load->model('delete_model');

		$res = $this
					->delete_model
					->deletecontact($id_contact);

		if ($res !== false){
				echo 1;
		}else{ 
				echo $res;
			    }
		
	}
}
?>