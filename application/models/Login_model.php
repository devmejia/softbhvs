<?php

class Login_model extends CI_Model
{
    function validar_login($usuario, $contraseña)
    {
        $data = $this->db->get_where('admins', array('admin_username' => $usuario, 'admin_password' => $contraseña), 1);
       if(!$data->row()) //sino obtiene registro
       {
           return false;
       }
       return $data->row();
    }

    /*function updatetokendb($table, $condition, $data)
    {
        $this->db->update($table, $data, $condition);
        if ($this->db->affected_rows() > 0)
        {   
            return true;
        }
        return false;
    }*/
}
