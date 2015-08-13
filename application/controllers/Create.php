<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

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
		header('Content-Type: text/plain; charset=utf-8');

		$this->load->model('create_model');

		$new_fid = $this
					->create_model
					->createcontact($_SESSION['id']);

				
		if ($new_fid > 0){
								$new_row='<tr><td><a href="#" data-name="name" data-type="text" class="contact" data-pk="'.$new_fid.'"></a></td> <td><a href="#" data-name="phone" data-type="text" class="contact" data-pk="'.$new_fid.'"></a></td> <td>'.date("Y/m/d h:i:s").'</a></td>  <td><a href="#" data-name="note" data-type="textarea" class="contact" data-pk="'.$new_fid.'"></a></td> <td><a href="#" class="deletecontact btn btn-xs btn-danger" rel="'.$new_fid.'"><span class="glyphicon glyphicon-remove"></span></a></td></tr>';


								echo $new_row;

						}else { 
							die('<tr><td colspan="5"><b style="color:red;"> Error create new friend ...</b></td></tr>');
						}
						



	






		
	}
}
