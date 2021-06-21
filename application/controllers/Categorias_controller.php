<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_controller extends CI_Controller{
    /**
 * Tengo que hace la función para cargar y verificar la imagen. 
 * https://codeigniter.com/userguide3/libraries/file_uploading.html?highlight=upload
 * 
 * Ver el ejeplo del codigo de las docentes.
 * 
 * Hacer 
 * 
 */

    function __construct(){
        parent::__construct();
        $this->load->model('categorias_model');


    }

    


    function fetch_data(){

       //busco en el Modelo de Prodcutos 
        $data = $this->categorias_model->make_query();
                
        $array = array();
        foreach($data as $row){
            $array[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($array);
    }

    
}