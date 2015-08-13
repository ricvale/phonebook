<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		session_start();

		parent::__construct();

		if ( !isset($_SESSION['id']) ){
			redirect('admin');
		}
	}
	public function index()
	{
		$this->load->model('welcome_model');

		$userRow = $this
					->welcome_model
					->get_user($_SESSION['id'])
					;

					if ($userRow !== false){


						//$userRow = $user;

					   // echo "<pre>";
					 	//print_r( $userRow );
					 	//echo"</pre>";
					 	//die("End................");

					}


		$result = $this
					->welcome_model
					->get_friends($_SESSION['id'])
					;

					if ($result !== false){

/*					    echo "<pre>";
						print_r( $res );
						echo"</pre>";
						die("End................");*/

					}

		

		$data = array( 'userRow' => $userRow, 'result' => $result ); 

		$this->load->view('welcome_message', $data);
	}
}
