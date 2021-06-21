<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_controller extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('cart_model');


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

    public function modificar_item(){
        
        $data = array(
            'rowid' => $_POST['rowid'],
            'qty' => $_POST['qty']
        );
        $this->cart->update($data);
       
    }
    
    
    public function save_purchase(){
        /**Debo obtener el id de clientey generar la data para el cabezado y guardar el detalle */
        $data = array();
        $session_data = $this->session->userdata('logged_in');
        
        $data = [
            'usuario_id' => $session_data['id'],
            'fecha_compra' => date('Y-m-d'),
            'monto_total' => $this->cart->total()
        ];

        $id = $this->cart_model->insert_ventas($data);
 
        /**Debo obtener el id de la cabecera y el detalle en el formato de la tabla */
        $data_productos = array();
        foreach($this->cart->contents() as $row){
            $data_productos = [
                'cart_id' => $id,
                'producto_id' => $row['id'],
                'cantidad' => $row['qty']  
            ];
             $this->cart_model->insert_ventas_detalle($data_productos);
        };

        $this->cart->destroy();
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
