<?php

if (!function_exists('getReglas_login')) {
    function getReglas_login()
    {
        return array(
            array(
                'field' => 'username',
                'label' => 'usuario',
                'rules' => 'required|trim|alpha_numeric'
            ),
            array(
                'field' => 'password',
                'label' => 'contraseña',
                'rules' => 'required|trim'
            )
        );
    }
}