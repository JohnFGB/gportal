<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// FUNCTION LOGIN
	public function index()
	{
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password','Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data = [
				'title' => 'Gportal - Login'
			];
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else{
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {

			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin/dashboard');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('failed','<div class="alert alert-danger" role="alert">
					Wrong password!
				  </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('failed','<div class="alert alert-danger" role="alert">
				Email has not activated!
			  </div>');
				redirect('auth');
			}
		} else{
			$this->session->set_flashdata('failed','<div class="alert alert-danger" role="alert">
			Email is not registered!
		  </div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email already use'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password to short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data = [
				'title' => 'Gportal - Daftar'
			];
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_BCRYPT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
			Registration Success,Please Login!
		  </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
		You have been log out!
	  </div>');
		redirect('auth');
	}
	public function blok()
	{
		$this->load->view('404');
	}

}
