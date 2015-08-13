<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

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
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		
		if ( $this->form_validation->run() !== false ){
			//Then validation passed. Get the db
			//echo "valid passed";
			$this->load->model('admin_model');

			$res = $this
						->admin_model
						->verify_user( 
							$this->input->post('email'), 
							$this->input->post('password') 
							);

						if ($res !== false){
							//person has an account

							$_SESSION['id'] = $res;

							redirect('welcome');
						}
		}

		$this->load->view('login_view');
	}

	public function logout()
	{
		session_destroy();
		session_unset();
		redirect('admin');
	}
}


?>