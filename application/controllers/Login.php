<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');
		$this->load->helper(array('auth/login_rules'));
	}

	public function index()
	{
		if ( $this->session->userdata('is_logged') ) {
			redirect('dashboard');
		}

		$this->load->view('login/index');
	}

	public function login_action()
	{
		if( strtolower($this->input->server('REQUEST_METHOD')) === "post" )
        {
			$rules = getReglas_login();
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters('<p class="text-left">', '</p>');
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('login/index');
			}
			else
			{
				$user = html_escape($this->input->post('username', TRUE));
				$pw = html_escape($this->input->post('password', TRUE));
				$pass = sha1($pw);

				if( !$resp = $this->login_model->validar_login($user, $pass) )
				{
					$this->session->set_flashdata('alert-danger-time', 'Usuario y/o contraseña invalidos');
                    redirect('login');
				}

				$vars = array(
					'id' => $resp->admin_id,
					'nickname' => $resp->admin_nombres.' '.$resp->admin_apellidos,
					'imgprofile' => $resp->admin_imagen,
					'is_logged' => TRUE
				);

				$this->session->set_userdata($vars);
				redirect('dashboard');
			}
		}
		else
		{
			redirect('login');
		}
	}

	function logout()
	{
		$vars = array('id','nickname','imgprofile','is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('login');
	}
}
