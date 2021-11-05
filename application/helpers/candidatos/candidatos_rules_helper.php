<?php
// Reglas Generales
if (!function_exists('getReglas_candidato')) {
    function getReglas_candidato()
    {
        $CI = &get_instance();

        //validar si se va a guardar un registro nuevo o editar
        if( $id = $CI->input->post('usuario_id', TRUE) ) //editar
        {
            $is_unique_identification   =  '|check_identification_edit'; //Aquì en el helper se omite callback_
            $is_unique_email            =  '|check_email';
            $is_unique_celular          =  '|check_celular';
        }
        else
        {
            $is_unique_identification   =  '|check_identification';
            $is_unique_email            =  '|is_unique[usuarios.usuario_email]';
            $is_unique_celular          =  '|is_unique[usuarios.usuario_celular]';
        }

        return array(
            array(
                'field' => 'usuario_nombre',
                'label' => 'nombres',
                'rules' => 'required|trim|prep_for_form'
            ),
            array(
                'field' => 'usuario_apellido',
                'label' => 'apellidos',
                'rules' => 'required|trim|prep_for_form'
            ),
            array(
                'field' => 'usuario_tipodoc',
                'label' => 'tipo documento',
                'rules' => 'required|trim|prep_for_form'
            ),
            array(
                'field' => 'usuario_numdoc',
                'label' => 'número de documento',
                'rules' => 'required|trim|prep_for_form|is_numeric|integer'.$is_unique_identification
            ),
            array(
                'field' => 'usuario_genero',
                'label' => 'genero',
                'rules' => 'required|trim|prep_for_form'
            ),
            array(
                'field' => 'usuario_email',
                'label' => 'correo electrónico',
                'rules' => 'required|trim|prep_for_form|valid_email'.$is_unique_email
            ),
            array(
                'field' => 'usuario_celular',
                'label' => 'número de celular',
                'rules' => 'required|trim|prep_for_form|is_numeric|integer'.$is_unique_celular
            ),
            array(
                'field' => 'usuario_fechanacido',
                'label' => 'fecha de nacimiento',
                'rules' => 'trim|prep_for_form'
            ),
            array(
                'field' => 'userprofe_profesion[]',
                'label' => 'profesión',
                'rules' => 'required|trim|prep_for_form'
            ),
            array(
                'field' => 'lider_id',
                'label' => 'lider',
                'rules' => 'required|trim|prep_for_form'
            )
        );
    }
}

// Callback validation
function check_identification($usuario_numdoc)
{
    $CI = &get_instance();

    $condition = array(
        'usuario_tipodoc' => $CI->input->post('usuario_tipodoc', TRUE),
        'usuario_numdoc' => $usuario_numdoc
    );

    if( $CI->candidatos_model->getexistdata($condition) )
    {
        $CI->form_validation->set_message('check_identification', 'El %s ya existe en el sistema.');
        return FALSE;
    }
    return TRUE;
}

function check_identification_edit($usuario_numdoc)
{
    $CI = &get_instance();

    $condition = array(
        'usuario_id !=' => $CI->input->post('usuario_id', TRUE),
        'usuario_tipodoc' => $CI->input->post('usuario_tipodoc', TRUE),
        'usuario_numdoc' => $usuario_numdoc
    );

    if( $CI->candidatos_model->getexistdata($condition) )
    {
        $CI->form_validation->set_message('check_identification_edit', 'El %s ya existe en el sistema.');
        return FALSE;
    }
    return TRUE;
}

function check_email($usuario_email)
{
    $CI = &get_instance();
    
    $condition = array(
        'usuario_id !=' => $CI->input->post('usuario_id', TRUE),
        'usuario_email' => $usuario_email
    );

    if( $CI->candidatos_model->getexistdata($condition) )
    {
        $CI->form_validation->set_message('check_email', 'El %s ya existe en el sistema.');
        return FALSE;
    }
    return TRUE;
}

function check_celular($usuario_celular)
{
    $CI = &get_instance();

    $condition = array(
        'usuario_id !='     => $CI->input->post('usuario_id', TRUE),
        'usuario_celular'   => $usuario_celular
    );

    if( $CI->candidatos_model->getexistdata($condition) )
    {
        $CI->form_validation->set_message('check_celular', 'El %s ya existe en el sistema.');
        return FALSE;
    }
    return TRUE;
}
