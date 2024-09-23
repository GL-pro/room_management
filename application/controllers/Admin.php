<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

}
