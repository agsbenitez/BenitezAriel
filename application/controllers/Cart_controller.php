<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_controller extends CI_Controller{

    function __construct(){
        parent::__construct();
        //$this->load->model('cart_model');


    }

    public function add(){
        if ($this->_veri_log()) {
            

            $producto_carr = array(
                'id'      => $this->input->post('id'),
                'qty'     => $this->input->post('stock'),
                'price'   => $this->input->post('price'),
                'name'    => $this->input->post('descripcion'),
                
            );
    
            $this->cart->insert($producto_carr);

            $data['response'] = "Pruducto Agregado Correctamente";

        }else{
            $data['response'] = "Debe estar logueado par comparar. Producto no Agregado";
        }

        header('Content-Type: application/json');
        echo  json_encode($data);
        

    }


    public function ver(){

        //echo json_encode($this->cart->contents());
        $array = array();
        foreach($this->cart->contents() as $row){
            $array[] = $row;
        };

        $data = array(
            'rows' => $array,
            'total' => $this->cart->total()
        );

        echo json_encode($data);
        
    }

    public function carrito_list(){
        $data = array('titulo' => 'Carrito');

        if ($this->_veri_log()) {
            
            
            $session_data = $this->session->userdata('logged_in');
            
            $data['perfil_id'] = $session_data['perfil_id'];
            
            $data['nombre'] = $session_data['nombre'];
            
            
            $this->load->view('base/encabezado',$data);
            
            $loadSections = ['base/menuV2', 'pages/carrito/carritoList', 'base/footer'];
            
            foreach($loadSections as $sections){
                $this->load->view($sections);
            };
        }else{
            $data['nombre'] = "invitado";
             $this->load->view('base/encabezado',$data);
            
            $loadSections = ['base/menuV2', 'pages/products/producCli', 'base/footer'];
            
            foreach($loadSections as $sections){
                $this->load->view($sections);
            };
        }
    }

        public function delete_item(){
            //Capturar el rowId que viene por post y atualizar el carro
            
            if ($this->_veri_log()) {
                
                //Borrar el item
                
            }else{
                
            }
        }

        
        

        public function modificar_item(){
            //Capturar el rowId que viene por post y la cantidad atualizar el carro
            
            $data = array(
                'rowid' => $_POST['rowid'],
                'qty' => $_POST['qty']
            );
            $this->cart->update($data);
           
        }




    private function _veri_log()
    	{
	    	if ($this->session->userdata('logged_in')) 
	    	{
	    		return TRUE;
	    	} else {
	    		return FALSE;
	    	}
    	}

}
