<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	/**
	 *
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

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
		//header('Content-Type: text/plain; charset=utf-8');

		$id = $this->input->post('pk');
		$column = $this->input->post('name');
		$val = $this->input->post('value');

		$this->load->model('update_model');

		$res = $this
					->update_model
					->updatecontact($id, $column, $val);

/*		if ($res !== false){
							//echo 1234567;
						}else { 
							//echo false;
						}*/
		
	}
}
?>