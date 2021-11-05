<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatos extends CI_Controller {

	function __construct()
	{
		parent::__construct();

        if ( !$this->session->userdata('is_logged') ) {
			redirect('login');
		}

		$this->load->model('candidatos_model');
		$this->load->library('form_validation');
		$this->load->helper(array('candidatos/candidatos_rules'));
	}

    public function index()
	{
        $getview['view'] = 'Listar candidatos';
        $getview['itemview'] = 'listcandidatos';

		$this->load->view('includes/header', $getview);
        $this->load->view('candidatos/list');
        $this->load->view('includes/footer', $getview);
	}

    public function add()
	{
        $getview['view'] = 'Agregar candidato';
        $getview['itemview'] = 'addcandidatos';

        $data = array(
            'all_tiposdocumentos' 	=> $this->candidatos_model->getTiposDocumentos(),
			'all_generos'  			=> $this->candidatos_model->getGeneros(),
			'all_lideres'			=> $this->candidatos_model->getLideres(),
			'all_profesiones' 		=> $this->candidatos_model->getProfesiones()
        );

		$this->load->view('includes/header', $getview);
        $this->load->view('candidatos/add', $data);
        $this->load->view('includes/footer', $getview);
	}

    public function store()
	{
        if( strtolower($this->input->server('REQUEST_METHOD')) === "post" )
        {
			$rules = getReglas_candidato();
			$this->form_validation->set_rules($rules);
			if ( empty($_FILES['archivo_pdf']['name']) ) 
			{	
    			$this->form_validation->set_rules('archivo_pdf', 'hoja de vida', 'required');
			}

			$this->form_validation->set_error_delimiters('<p class="col-form-label">', '</p>');
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->add();
			}
			else
			{

				$this->load->library('upload');

				$archivo_pdf = false;

				if ( @$_FILES['archivo_pdf']['name'] ) 
				{
					$config['upload_path']     = './archivos/hoja_de_vida/';
					$config['allowed_types'] = 'pdf';
					$config['max_size']         = '40000';
					$config['file_name']     = 'name';
					$config['encrypt_name']     = true;
					$this->upload->initialize($config);
					if ( $this->upload->do_upload('archivo_pdf') ) 
					{
						$archivo_pdf = html_escape($this->upload->data('file_name'));
					} else {
						$error =  $this->upload->display_errors();
                		$this->session->set_flashdata('alert-danger',"Error al cargar el archivo en el sistema! ".$error);
						redirect('candidatos/add');
					}
				}

				if( $archivo_pdf )
				{
					$archivo = array(
						'archivo_pdf' => $archivo_pdf
					);

					$candidato = array(
						'usuario_nombre'		=>	$this->input->post('usuario_nombre', TRUE),
						'usuario_apellido'		=>	$this->input->post('usuario_apellido', TRUE),
						'usuario_tipodoc'		=>	$this->input->post('usuario_tipodoc', TRUE),
						'usuario_numdoc'		=>	$this->input->post('usuario_numdoc', TRUE),
						'usuario_genero'		=>	$this->input->post('usuario_genero', TRUE),
						'usuario_email'			=>	$this->input->post('usuario_email', TRUE),
						'usuario_celular'		=>	$this->input->post('usuario_celular', TRUE),
						'usuario_fechanacido'	=>	$this->input->post('usuario_fechanacido', TRUE),
						'lider_id'				=>	$this->input->post('lider_id', TRUE)
					);

					$profesiones = array();
					$profesiones = $this->input->post('userprofe_profesion', TRUE);

					if( !$this->candidatos_model->guardarCandidato($archivo, $candidato, $profesiones) )
					{
						$this->session->set_flashdata('alert-danger', 'Error al guardar el candidato en el sistema!');
                    	redirect('candidatos/add');
					}

					$this->session->set_flashdata('alert-success', 'Candidato guardado con éxito.');
					redirect('candidatos/add');
				}

				$this->session->set_flashdata('alert-danger', 'Error, intente mas tarde!');
                redirect('candidatos/add');
			}
		}
		else
		{
			redirect('candidatos/add');
		}
	}

    public function edit($id)
	{
		$getview['view'] = 'Editar candidato';
        $getview['itemview'] = 'editcandidatos';

		$data = array(
            'all_tiposdocumentos' 	=> $this->candidatos_model->getTiposDocumentos(),
			'all_generos'  			=> $this->candidatos_model->getGeneros(),
			'all_lideres'			=> $this->candidatos_model->getLideres(),
			'all_profesiones' 		=> $this->candidatos_model->getProfesiones(),
			'profile' 				=> $this->candidatos_model->getCandidatoById($id)
        );

		$this->load->view('includes/header', $getview);
        $this->load->view('candidatos/edit', $data);
        $this->load->view('includes/footer', $getview);
	}
    
    public function update()
	{
		if( strtolower($this->input->server('REQUEST_METHOD')) === "post" )
        {
			$this->load->library('upload');

			$id = $this->input->post('usuario_id', TRUE);

			$rules = getReglas_candidato();
			$this->form_validation->set_rules($rules);
			
			$this->form_validation->set_error_delimiters('<p class="col-form-label">', '</p>');

			if ($this->form_validation->run() === FALSE)
			{
				$data = array(
					'all_tiposdocumentos' 	=> $this->candidatos_model->getTiposDocumentos(),
					'all_generos'  			=> $this->candidatos_model->getGeneros(),
					'all_lideres'			=> $this->candidatos_model->getLideres(),
					'all_profesiones' 		=> $this->candidatos_model->getProfesiones(),
					'profile' 				=> $this->candidatos_model->getCandidatoById($id),
					'edition'				=> true
				);

				if( $this->input->post('view_edit') )
				{
					$getview['view'] = 'Editar candidato';
					$getview['itemview'] = 'editcandidatos';

					$this->load->view('includes/header', $getview);
					$this->load->view('candidatos/edit', $data);
					$this->load->view('includes/footer', $getview);
				}
				else
				{
					$getview['view'] = 'Perfil candidato';
					$getview['itemview'] = 'profilecandidatos';
						
					$this->load->view('includes/header', $getview);
					$this->load->view('candidatos/profile', $data);
					$this->load->view('includes/footer', $getview);		
				}
			}
			else
			{
				$candidato = $this->candidatos_model->getCandidatoById($id);
				if($candidato)
				{

					$this->load->library('upload');

					$hv = $candidato->archivo_pdf;

					if ( @$_FILES['archivo_pdf']['name'] ) 
					{
						$config['upload_path']     = './archivos/hoja_de_vida/';
						$config['allowed_types'] = 'pdf';
						$config['max_size']         = '40000';
						$config['file_name']     = 'name';
						$config['encrypt_name']     = true;
						$this->upload->initialize($config);

						if ( $this->upload->do_upload('archivo_pdf') ) 
						{
							if (!empty($hv) ) {
								unlink('archivos/hoja_de_vida/' . $hv);
							}
							$hv = $this->upload->data('file_name');
						} 
						else 
						{
							$error =  $this->upload->display_errors();
					
							$data = array(
								'all_tiposdocumentos' 	=> $this->candidatos_model->getTiposDocumentos(),
								'all_generos'  			=> $this->candidatos_model->getGeneros(),
								'all_lideres'			=> $this->candidatos_model->getLideres(),
								'all_profesiones' 		=> $this->candidatos_model->getProfesiones(),
								'profile' 				=> $this->candidatos_model->getCandidatoById($id),
								'edition'				=> true,
								'error_file'			=> $error
							);

							if( $this->input->post('view_edit') )
							{
								$getview['view'] = 'Editar candidato';
								$getview['itemview'] = 'editcandidatos';

								$this->load->view('includes/header', $getview);
								$this->load->view('candidatos/edit', $data);
								$this->load->view('includes/footer', $getview);
							}
							else
							{
								$getview['view'] = 'Perfil candidato';
								$getview['itemview'] = 'profilecandidatos';
									
								$this->load->view('includes/header', $getview);
								$this->load->view('candidatos/profile', $data);
								$this->load->view('includes/footer', $getview);		
							}
						}
					}

					$archivo = array('archivo_pdf' => $hv);

					$candidato = array(
						'usuario_nombre'		=>	$this->input->post('usuario_nombre', TRUE),
						'usuario_apellido'		=>	$this->input->post('usuario_apellido', TRUE),
						'usuario_tipodoc'		=>	$this->input->post('usuario_tipodoc', TRUE),
						'usuario_numdoc'		=>	$this->input->post('usuario_numdoc', TRUE),
						'usuario_genero'		=>	$this->input->post('usuario_genero', TRUE),
						'usuario_email'			=>	$this->input->post('usuario_email', TRUE),
						'usuario_celular'		=>	$this->input->post('usuario_celular', TRUE),
						'usuario_fechanacido'	=>	$this->input->post('usuario_fechanacido', TRUE),
						'lider_id'				=>	$this->input->post('lider_id', TRUE),
						'archivo_id' 			=> 	$candidato->archivo_id
					);

					$profesiones = array();
					$profesiones = $this->input->post('userprofe_profesion', TRUE);

					if( !$this->candidatos_model->actualizarCandidato($id, $archivo, $candidato, $profesiones) )
					{
						$this->session->set_flashdata('alert-danger', 'Error al actualizar el candidato en el sistema!');
						redirect('candidatos/viewprofile/'.$id);
					}
					$this->session->set_flashdata('alert-success', 'Candidato actualizado con éxito.');
					redirect('candidatos/viewprofile/'.$id);
				}
				$this->session->set_flashdata('alert-danger', 'Error, intente mas tarde!');
                redirect('candidatos/viewprofile/'.$id);
			}
		}
	}

    public function delete()
	{
		$csrf_name = $this->security->get_csrf_token_name();
		$csrf_hash = $this->security->get_csrf_hash();

		if( $this->input->post('code_user', TRUE) )
		{
			// $id = $this->input->post('code_user', TRUE);
			// $query = $this->candidatos_model->borrarCandidato($id);

			// if(!$query)
			// {
				// $req = array(
				// 	'code' => 403,
				// 	'csrf_name' => $csrf_name,
				// 	'csrf_hash' => $csrf_hash
				// );
			// }
			// else
			// {
			 	$req = array(
			 		'code' => '200'
			 	);
			// }

			$req['token'] = $csrf_hash; 

			echo json_encode($req);
			exit();
		}
	}

	public function viewprofile($id)
	{
		$getview['view'] = 'Perfil candidato';
        $getview['itemview'] = 'profilecandidatos';

		$data = array(
            'all_tiposdocumentos' 	=> $this->candidatos_model->getTiposDocumentos(),
			'all_generos'  			=> $this->candidatos_model->getGeneros(),
			'all_lideres'			=> $this->candidatos_model->getLideres(),
			'all_profesiones' 		=> $this->candidatos_model->getProfesiones(),
			'profile' 				=> $this->candidatos_model->getCandidatoById($id)
        );

		$this->load->view('includes/header', $getview);
        $this->load->view('candidatos/profile', $data);
        $this->load->view('includes/footer', $getview);
	}

	public function ajax_getcandidatos()
    {
		$csrf_name = $this->security->get_csrf_token_name();
		$csrf_hash = $this->security->get_csrf_hash(); 
        $list = $this->candidatos_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $candidato) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = ucwords(strtolower($candidato->usuario_nombre));
            $row[] = ucwords(strtolower($candidato->usuario_apellido));

			$items = explode(',', $candidato->profesion_nombre);
			$badge = "";
			foreach ($items as $key => $value) {
				$badge .= "<label class='label label-info'>".$value."</label>";
			}

            $row[] = $badge;

			if( is_file('./archivos/hoja_de_vida/'.$candidato->archivo_pdf) 
			&& file_exists('./archivos/hoja_de_vida/'.$candidato->archivo_pdf) )
			{
				$row[] = "<a href='".base_url('archivos/hoja_de_vida/'.$candidato->archivo_pdf)."' target='_blank'><i class='fa fa-file-pdf-o text-danger'></i></a>";
			}
			else
			{
				$row[] = "";
			}

			$row[] = ucwords(strtolower($candidato->full_namelider));
			
            $row[] = "<div class='text-center'>
				<div class='btn-group btn-group-sm'>
					<a href='".base_url('candidatos/viewprofile/'.$candidato->usuario_id)."' class='btn btn-info waves-effect waves-light'><span class='fa fa-eye'></span></a>
					<a href='".base_url('candidatos/edit/'.$candidato->usuario_id)."' class='btn btn-warning waves-effect waves-light'><span class='icofont icofont-ui-edit'></span></a>
					<button data-id='{$candidato->usuario_id}' class='btn btn-danger waves-effect waves-light btnBorrar'><span class='icofont icofont-ui-delete'></span></button>
				</div>
			</div>";
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($this->candidatos_model->count_all()),
            "recordsFiltered" => intval($this->candidatos_model->count_filtered()),
            "data" => $data
        );
		$output['token'] = $csrf_hash;
		echo json_encode($output);
		exit();
    }
}