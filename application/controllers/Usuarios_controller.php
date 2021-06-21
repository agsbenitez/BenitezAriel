<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->model('cart_model');
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

    public function fetch_data(){
        //busco en el Modelo de Prodcutos 
        $data = $this->usuario_model->make_query();
                
        $array = array();
        foreach($data as $row){
            $array[] = $row;
        }
        echo json_encode($array);
    }
    

    public function action(){

        if($this->input->post('operation')){
            $pass = $this->input->post('password',true);
            $nombre = ($this->input->post("nombre"));
            $apellido = ($this->input->post("apellido"));
            $email = ($this->input->post("email"));
            $perfil = ($this->input->post("perfil"));

            
            $data = [
                "nombre"=>$nombre,
                "apellido"=>$apellido,
                "email"=>$email,
                "usuario"=>$email,
                "pass"=>md5($pass),
                "perfil_id"=>$perfil
            ];

            if (isset($_POST["bajaCheck"])) {
                $data["baja"] = 1;
            }else {
                $data["baja"] = 0;
            }
           
            if($this->input->post('operation') == 'Add'){
                $this->usuario_model->add_usuario($data);
                $response['success'] = 'Usuario Creado';
                header('Content-Type: application/json'); 
                echo json_encode($response);
            }

            if($this->input->post('operation') == 'Edit'){
                $this->usuario_model->update_usuario($data, $this->input->post('usuario_id'));
                $response['success'] = 'Usuario Modificado'; 
                header('Content-Type: application/json');
                echo json_encode($response);
            }
			
        }

    }

    public function delete_data(){
        if($this->input->post('id'))
        {
            $this->usuario_model->delete($this->input->post('id'));
            $response['success'] = 'Usuario Eliminado'; 
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }


    
    public function list_user(){
        if ($this->_veri_log()) {
            //Muestra la página de listado de usuarios
		$data = array('titulo' => 'Listado de Usuarios');

        $session_data = $this->session->userdata('logged_in');
		
        $data['perfil_id'] = $session_data['perfil_id'];
		
        $data['nombre'] = $session_data['nombre'];
		
		$this->load->view('base/encabezado',$data);
    
        $loadSections = ['base/menuV2', 'pages/usuarios/usuarios', 'base/footer'];
        
        foreach($loadSections as $sections){
		    $this->load->view($sections);
		}
        } else {
            
            redirect('login');
            
        }
    }


    public function mis_compras(){
        if ($this->_veri_log()) {
            //Muestra la página de listado de usuarios
		$data = array('titulo' => 'Listado de Compras');

        $session_data = $this->session->userdata('logged_in');
		
        $data['perfil_id'] = $session_data['perfil_id'];
		
        $data['nombre'] = $session_data['nombre'];
		
		$this->load->view('base/encabezado',$data);
    
        $loadSections = ['base/menuV2', 'pages/usuarios/mis_compras_list', 'base/footer'];
        
        foreach($loadSections as $sections){
		    $this->load->view($sections);
		}
        } else {
            
            redirect('login');
            
        }
    } 

    public function ver_mis_compras(){
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];
        $data = $this->cart_model->ver_compras_encabezado($id);
        echo json_encode($data);
    }


    public function ver_mis_compras_detail(){
        $id_compra = $_POST['id_compra'];
        //hago la consulta y de devulevo como un json
        $data = $this->cart_model->ver_compras_detail($id_compra);

        echo json_encode($data);

    }
    

}