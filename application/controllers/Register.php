<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

	function __construct()
	{
		
		parent::__construct();

		session_start();

	}
	public function index(){

		if (isset($_SESSION['id'])){
			redirect('welcome');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[63]');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		
		if ( $this->form_validation->run() !== false ){
			//Then validation passed. Get the db
			//echo "valid passed";
			$this->load->model('register_model');

			$res = $this
						->register_model
						->insert_admin( 
							$this->input->post('username'), 
							$this->input->post('email'), 
							$this->input->post('password') 
							);

						if ($res !== false){
							//person has been registered

							//$_SESSION['id'] = $res;
							//redirect('welcome');

							redirect('admin');
						}
		}

		$this->load->view('register_view');
	}

}


?>