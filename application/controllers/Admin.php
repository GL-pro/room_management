<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
	    $this->load->helper('url'); 
        $this->load->model('HomeModel');

		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		if (!$user_id || $user_type !== 'admin') {
			// If not logged in or not an membadmin, redirect to login page
			$this->session->set_flashdata('error', 'Unauthorized access. Please login.');
			redirect('unauthorized');
		}
    }


	public function admin_dashboard()
	{
        $data['menu']='admin_dashboard';
        $data['pagetitle']='DashBoard';

		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/dashboard/admin_dashboard');
		$this->load->view('webapp/admin/include/footer');
	}    

	public function admin_reservations()
	{
        $data['menu']='admin_reservations';
        $data['pagetitle']='DashBoard';

		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/reservations/admin_reservations');
		$this->load->view('webapp/admin/include/footer');
	}   

	public function admin_all_reservations()
	{
        $data['menu']='admin_all_reservations';
        $data['pagetitle']='DashBoard';

		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/reservations/admin_all_reservations');
		$this->load->view('webapp/admin/include/footer');
	}   

	public function admin_room_create()
	{
        $data['menu']='admin_room_create';
        $data['pagetitle']='DashBoard';

		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/room/admin_room_create');
		$this->load->view('webapp/admin/include/footer');
	}   

	public function admin_room_list()
	{
        $data['menu']='admin_room_list';
        $data['pagetitle']='DashBoard';

		$this->load->view('webapp/admin/include/header',$data);
		$this->load->view('webapp/admin/room/admin_room_list');
		$this->load->view('webapp/admin/include/footer');
	}   


    public function logout() {
        $this->session->unset_userdata('logged_in'); 
        $this->session->sess_destroy(); 
        redirect('login');
    }








}
