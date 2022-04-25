<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	//Halaman login

	public function index()
	{
		//validasi
		$this->form_validation->set_rules('username','Adminname','required',
			array( 'required'	=> '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
			array( 'required'	=> '%s harus diisi'));

		if($this->form_validation->run()){
			$username  = $this->input->post('username');
			$password  = $this->input->post('password');

			//proses ke libraries login
			$this->login_admin->login($username,$password);
		}
		//end validasi
		
		$data=array('title'   =>'Login Administrator');
		$this->load->view('login/list', $data, FALSE);
	}
	// fungsi logout
	public function logout()
	{
		$this->login_admin->logout();
	}

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
?>