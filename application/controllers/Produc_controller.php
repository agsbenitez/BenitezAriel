<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produc_controller extends CI_Controller{
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
        $this->load->model('produc_model');
    }

    private function _veri_log(){
        if ($thid->session->userdata('logged_in')) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function index()
    {
        //if (_veri_log()) {
            $data = array('titulo' => 'Listado de Productos');
        
            $session_data = $this->session->userdata('logged_in');
        
            $data['perfil_id'] = $session_data['perfil_id'];
        
            $data['nombre'] = $session_data['nombre'];
        
        
		    $this->load->view('base/encabezado',$data);
            
		    $loadSections = ['base/menuV2', 'pages/products/produc', 'base/footer'];
            
            foreach($loadSections as $sections){
		        $this->load->view($sections);
		    };
        //}else{
            
        //    redirect('login');
            
        //}
                        
    }   


    function fetch_data(){
        //busco en el Modelo de Prodcutos 
        $data = $this->produc_model->make_query();


        $array = array();
        foreach($data as $row){
            $array[] = $row;
        }
        $output = array(
         'current'  => 1,
         'rowCount'  => 10,
         'total'   => intval($this->produc_model->count_all_data()),
         'rows'   => $array
        );

        echo json_encode($output);
    }

    function action(){
        if($this->input->post('operation')){
            $data = array(
                'descripcion'   => $this->input->post('descripcion'),
                'cat_id'  => $this->input->post('cat'),
                'price'  => $this->input->post('price'),
                'image'  => $this->input->post('image')
                
            );

            //hace control de consitencia antes de grabar.
            if($this->input->post('operation') == 'Add'){
                $this->produc_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit'){
                $this->produc_model->update($data, $this->input->post('id'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data(){
        if($this->input->post('id')){
            $data = $this->produc_model->fetch_single_data($this->input->post('id'));
            foreach($data as $row){
                $output['descripcion'] = $row['descripcion'];
                $output['cat_id'] = $row['cat_id'];
                $output['price'] = $row['price'];
                $output['image'] = $row['image'];

            }
            echo json_encode($output);
        }
    }

    function delete_data(){
        if($this->input->post('id'))
        {
            $this->produc_model->delete($this->input->post('id'));
            echo 'Data Deleted';
        }
    }
    
    

}