<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produc_model extends CI_Model{


    public function __construct(){
        parent::__construct();
    }

    var $records_per_page = 10;
    var $start_from = 0;
    var $current_page_number = 1;

    // Funcion que hace la consulta
    function make_query(){
        if(isset($_POST["rowCount"])){
            $this->records_per_page = $_POST["rowCount"];
        }else{
            $this->records_per_page = 10;
        }
        if(isset($_POST["current"])){
            $this->current_page_number = $_POST["current"];
        }else{
            $this->current_page_number = 1;
        }

        $this->start_from = ($this->current_page_number - 1) * $this->records_per_page;
        $this->db->select("*");
        $this->db->from("produc");

        /*Realiza el filtrado segun id o descripcin */
        if(!empty($_POST["searchPhrase"])){
            $this->db->like('id', $_POST["searchPhrase"]);
            $this->db->or_like('descripcion', $_POST["searchPhrase"]);
        }

        if(isset($_POST["sort"]) && is_array($_POST["sort"])){
            foreach($_POST["sort"] as $key => $value){
                $this->db->order_by($key, $value);
            }
        }else{
            $this->db->order_by('id', 'DESC');
        }
        
        if($this->records_per_page != -1){
            $this->db->limit($this->records_per_page, $this->start_from);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    //Función cuenta todos los registros
    function count_all_data(){
        $this->db->select("*");
        $this->db->from("produc");
        $query = $this->db->get();
        return $query->num_rows();
    }

    //función que realiza el insert en la tabla
    function insert($data){


        $this->db->insert('produc', $data);
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
        $this->db->delete('produc');
    }

}