<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{


    public function __construct(){
        parent::__construct();
    }

    public function add_usuario($data)
    {
        
        $this->db->insert('usuarios', $data);
    }

    public function list_usuarios()
    {
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
        
    }
}






