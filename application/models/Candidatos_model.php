<?php

class Candidatos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
 
    var $table = 'usuarios';
    var $column_order = array(null, 'user.usuario_nombre', 'user.usuario_apellido', 'arc.archivo_pdf', 'full_namelider', 'profesion_nombre'); //set column field database for datatable orderable
    var $column_search = array('user.usuario_nombre', 'user.usuario_apellido', 'arc.archivo_pdf', 'lid.lider_nombre', 'lid.lider_apellido', 'pf.profesion_nombre'); //set column field database for datatable searchable 
    var $order = array('user.usuario_id' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('user.usuario_id, user.usuario_nombre, user.usuario_apellido');
        // $this->db->select('tdoc.tipodocumento_name');
        // $this->db->select('gen.abrevia_genero');
        $this->db->select('arc.archivo_pdf');
        $this->db->select('CONCAT(lid.lider_nombre, " ", lid.lider_apellido) AS full_namelider');
        $this->db->select('GROUP_CONCAT(DISTINCT pf.profesion_nombre ORDER BY pf.profesion_nombre ASC SEPARATOR ", " ) as profesion_nombre');
        $this->db->from($this->table .' user');
        // $this->db->join('tipodocumentos tdoc', 'user.usuario_tipodoc = tdoc.tipodocumento_id');
        // $this->db->join('generos gen', 'user.usuario_genero = gen.idgenero');
        $this->db->join('archivos arc', 'user.archivo_id = arc.archivo_id', 'left');
        $this->db->join('lideres lid', 'user.lider_id = lid.lider_id', 'left');
        $this->db->join('usuarios_profesiones up', 'user.usuario_id = up.userprofe_usuario_id', 'left');
        $this->db->join('profesiones pf', 'up.userprofe_profesion_id = pf.profesion_id', 'left');
        $this->db->group_by('user.usuario_id');

        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
           if(isset($_POST['search']['value'])) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->select('user.usuario_id, user.usuario_nombre, user.usuario_apellido');
        // $this->db->select('tdoc.tipodocumento_name');
        // $this->db->select('gen.abrevia_genero');
        $this->db->select('arc.archivo_pdf');
        $this->db->select('CONCAT(lid.lider_nombre, " ", lid.lider_apellido) AS full_namelider');
        $this->db->select('GROUP_CONCAT(DISTINCT pf.profesion_nombre ORDER BY pf.profesion_nombre ASC SEPARATOR ", " ) as profesion_nombre');
        $this->db->from($this->table .' user');
        // $this->db->join('tipodocumentos tdoc', 'user.usuario_tipodoc = tdoc.tipodocumento_id');
        // $this->db->join('generos gen', 'user.usuario_genero = gen.idgenero');
        $this->db->join('archivos arc', 'user.archivo_id = arc.archivo_id', 'left');
        $this->db->join('lideres lid', 'user.lider_id = lid.lider_id', 'left');
        $this->db->join('usuarios_profesiones up', 'user.usuario_id = up.userprofe_usuario_id', 'left');
        $this->db->join('profesiones pf', 'up.userprofe_profesion_id = pf.profesion_id', 'left');
        $this->db->group_by('user.usuario_id');
        return $this->db->count_all_results();
    }

    public function getexistdata($condition)
    {
        $this->db->select('usuario_id');
        $this->db->from('usuarios');
        $this->db->where($condition);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
    }

    public function getCandidatoById($id)
    {
        
        $this->db->select('user.usuario_id, user.usuario_nombre, user.usuario_apellido, user.usuario_numdoc, user.usuario_email, user.usuario_celular, user.usuario_fechanacido');
        $this->db->select('tdoc.tipodocumento_id, tdoc.tipodocumento_name');
        $this->db->select('gen.idgenero, gen.abrevia_genero');
        $this->db->select('arc.archivo_id, arc.archivo_pdf');
        $this->db->select('lid.lider_id, CONCAT(lid.lider_nombre, " ", lid.lider_apellido) AS full_namelider');
        $this->db->select('GROUP_CONCAT(DISTINCT pf.profesion_id ORDER BY pf.profesion_id ASC SEPARATOR ", " ) as profesion_id, GROUP_CONCAT(DISTINCT pf.profesion_nombre ORDER BY pf.profesion_nombre ASC SEPARATOR ", " ) as profesion_nombre');
        $this->db->from($this->table .' user');
        $this->db->join('tipodocumentos tdoc', 'user.usuario_tipodoc = tdoc.tipodocumento_id');
        $this->db->join('generos gen', 'user.usuario_genero = gen.idgenero');
        $this->db->join('archivos arc', 'user.archivo_id = arc.archivo_id', 'left');
        $this->db->join('lideres lid', 'user.lider_id = lid.lider_id', 'left');
        $this->db->join('usuarios_profesiones up', 'user.usuario_id = up.userprofe_usuario_id', 'left');
        $this->db->join('profesiones pf', 'up.userprofe_profesion_id = pf.profesion_id', 'left');
        $this->db->where('user.usuario_id', $id);
        $this->db->group_by('user.usuario_id');
        $data = $this->db->get();

        if( !$data->row() )
        {
            return false;
        }
        return $data->row();
    }

    function getTiposDocumentos()
    {
        $data = $this->db->get('tipodocumentos');
       if( !$data->result() )
       {
           return false;
       }
       return $data->result();
    }

    function getGeneros()
    {
        $data = $this->db->get('generos');
       if( !$data->result() )
       {
           return false;
       }
       return $data->result();
    }

    function getLideres()
    {
        $this->db->order_by('lider_nombre', 'ASC');
        $data = $this->db->get('lideres');
       if( !$data->result() )
       {
           return false;
       }
       return $data->result();
    }

    function getProfesiones()
    {
        $this->db->order_by('profesion_nombre', 'ASC');
        $data = $this->db->get('profesiones');
       if( !$data->result() )
       {
           return false;
       }
       return $data->result();
    }

    function guardarCandidato($archivo, $candidato, $profesiones)
    {
        $this->db->trans_begin();

        $this->db->insert('archivos', $archivo);
        $archivo_id = $this->db->insert_id();

        $candidato['archivo_id'] = $archivo_id;
        $this->db->insert('usuarios', $candidato);
        $id_candidato = $this->db->insert_id();

        foreach ($profesiones as $profesion) 
        {
            $this->db->insert('usuarios_profesiones', array(      
                'userprofe_profesion_id' => $profesion,      
                'userprofe_usuario_id' => $id_candidato      
             ));  
        }

        if ($this->db->trans_status() === FALSE){      
            $this->db->trans_rollback();      
            return FALSE;    
         }else{      
            $this->db->trans_commit();    
            return TRUE;    
         }  
    }

    public function actualizarCandidato($iduser, $archivo, $candidato, $profesiones)
    {
        $this->db->trans_begin();

        $this->db->update( 'archivos', $archivo, array('archivo_id' => $candidato['archivo_id']) );

        $this->db->update( 'usuarios', $candidato, array('usuario_id' => $iduser) );

        $this->db->where('userprofe_usuario_id', $iduser);
        $this->db->delete('usuarios_profesiones');

        foreach ($profesiones as $profesion) 
        {
            $this->db->insert('usuarios_profesiones', array(      
                'userprofe_profesion_id' => $profesion,      
                'userprofe_usuario_id' => $iduser      
             ));  
        }

        if ($this->db->trans_status() === FALSE){      
            $this->db->trans_rollback();      
            return FALSE;    
         }else{      
            $this->db->trans_commit();    
            return TRUE;    
         }  
    }

    function borrarCandidato($id)
    {
        if( !$this->db->delete('usuarios', array('usuario_id' => $id)) )
        {
           return FALSE;
        }
        return TRUE;
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
