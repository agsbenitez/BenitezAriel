<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model{

    //copiado del modelo de caetogorias haccer los cambio necesarios


    public function __construct(){
        parent::__construct();
    }

    
    // Funcion que hace la consulta
    function make_query(){
        
        $this->db->select('*');
        $this->db->from('perfil');        
        
        $query = $this->db->get();
        return $query->result_array();
    }

    //Función cuenta todos los registros
    function count_all_data(){
        $this->db->select("*");
        $this->db->from("perfil");
        $query = $this->db->get();
        return $query->num_rows();
    }

    //función que realiza el insert en la tabla
    function insert($data){
        $this->db->insert('perfil', $data);
    }

    //Busca un perfil
    function fetch_single_data($id){
        $this->db->where('id', $id);
        $query = $this->db->get('perfil');
        return $query->result_array();
    }

    //Actualiza un perfil
    function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update('perfil', $data);
    }

    //borra un perfil
    function delete($id){
        $this->db->where('id', $id);
        $this->db->update('perfil', array('baja' => 1));
    }

}