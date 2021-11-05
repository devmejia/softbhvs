<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model('Login_model');
		// $this->load->library('form_validation');
		// $this->load->helper(array('auth/login_rules'));
        if ( !$this->session->userdata('is_logged') ) {
			redirect('login');
		}
	}

    public function index()
	{
        $getview['view'] = 'Dashboard';
        $getview['itemview'] = 'dashboard';
        // $getview['menu'] = $this->appset->getMenuAdmin();

		$this->load->view('includes/header', $getview);
        $this->load->view('dashboard/index');
        $this->load->view('includes/footer', $getview);
	}
}