<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model{


    public function __construct(){
        parent::__construct();
    }

    
    // Funcion que hace la consulta
    function make_query(){
        
        

        //$this->start_from = ($this->current_page_number - 1) * $this->records_per_page;
        $this->db->select('*');
        $this->db->from('cat_produc');        
        
        $query = $this->db->get();
        return $query->result_array();
    }

    //Función cuenta todos los registros
    function count_all_data(){
        $this->db->select("*");
        $this->db->from("cat_produc");
        $query = $this->db->get();
        return $query->num_rows();
    }

    //función que realiza el insert en la tabla
    function insert($data){


        $this->db->insert('cat_produc', $data);
    }

    //Busca un registro
    function fetch_single_data($id){
        $this->db->where('id', $id);
        $query = $this->db->get('produc');
        return $query->result_array();
    }

    //Actualiza un usuario
    function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update('produc', $data);
    }

    //borra un usuario
    function delete($id){
        $this->db->where('id', $id);
        $this->db->update('produc', array('baja' => 1));
    }

}