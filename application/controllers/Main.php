<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function index()

	{
		$this->load->view('webapp/login');
	}

	public function login()

	{
		$this->load->view('webapp/login');
	}

	public function logincheck() {
		if ($this->input->post('submit')) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$usertype = $this->input->post('usertype');
			$this->load->model('HomeModel');
			$this->load->library('session');
			if (empty($email) || empty($password) || empty($usertype)) {
				$this->session->set_flashdata('error', 'Please fill in all fields');
				redirect('login');
			}
			$admin = $this->HomeModel->loginAdmin($email, $password, $usertype);
			if ($admin) {
				$this->session->set_userdata('user_id', $admin->id);
				$this->session->set_userdata('user_type', 'admin');
				redirect('admin_dashboard');
			}
			$membadmin = $this->HomeModel->loginstaff($email, $password, $usertype);
			if ($membadmin) {
				$this->session->set_userdata('user_id', $membadmin->staff_id);
				$this->session->set_userdata('user_type', 'staff');
				redirect('dashboard'); 
			}
			$this->session->set_flashdata('error', 'Invalid email, password, or user type');
			redirect('login');
		} else {
			$this->load->view('login');
		}
	}










}
