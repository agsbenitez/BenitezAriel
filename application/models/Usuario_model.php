<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{


    public function __construct(){
        parent::__construct();
    }

    function make_query(){
        
        $this->db->select('user.id, user.nombre, user.apellido, user.email, perfil.nombre as pNom');

        if (isset($_POST["baja"])) {
            if ($_POST["baja"]=="true") {
                $this->db->like('user.baja', 1);
            }else{
                $this->db->like('user.baja', 0);   
            }
            
        }

        $this->db->from('usuarios as user');
        $this->db->join('perfil as perfil', 'user.perfil_id = perfil.id');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_usuario($data)
    {
        
        $this->db->insert('usuarios', $data);
    }

    public function update_usuario($data, $id){
        $this->db->where('id', $id);
        $this->db->update('usuarios', $data);
    }

    public function delete($id){
        $data['baja'] = 1 ;
        $this->db->where('id', $id);
        $this->db->update('usuarios', $data);
    }

    public function list_usuarios()
    {
        $query = $this->db->get_where('usuarios', array('baja'=> 'No'));
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
        
    }
}






