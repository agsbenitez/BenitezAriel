<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller{


    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
    }
    
    

    public function index(){
        $loadSections = ['base/menu', 'pages/login', 'base/footer'];

        $data['titulo']='Login'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
		    $this->load->view($sections);
		};
    }

    public function login(){

        /*Reglas de Validacion*/
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email','Correo elecrónico', 'trim|required');
        $this->form_validation->set_rules('pass1','Pasword', 'trim|required|callback__valid_login');

        $this->form_validation->set_message('required',
                                            '<div class="alert alert-danger">El campo %s es requerido</div>');
		$this->form_validation->set_message('_valid_login',
                                            '<div class="alert alert-danger">El usuario o contraseña son incorrectos</div>');

           
        if ($this->form_validation->run() == FALSE) {
            
            $data = array('titulo' => 'Error de formulario');
				$loadSections = ['base/encabezado', 'base/menu', 'pages/login', 'base/footer'];
                foreach($loadSections as $sections){
			        $this->load->view($sections);
		        };
        } else {
            $session_data = $this->session->userdata('logged_in');
            redirect('us_logeado');
        }
    }

    function _valid_login(){

        $email = $this->input->POST('email');
        $password = $this->input->POST('pass1');
        
        
        
        $result = $this->login_model->valid_user($email, $password);
        if ($result) {
            
            $sess_array = array();
            
            foreach ($result as $row) {
                $sess_array = array('id'=>$row->id,
                                    'nombre' => $row->nombre,
                                    'apellido' => $row->apellido,
                                    'email' => $row->email,
                                    'usuario' => $row->usuario,
                                    'perfil_id' => $row->perfil_id);
                
                $this->session->set_userdata('logged_in', $sess_array);
            }

            return true;
        } else {
            $this->form_validation->set_message('check_database', '<div class="alert alert-danger">Usuario o Contraseña invalido</div>');
			return false;
        }
        
    }


    public function us_logeado(){
		
        $data['titulo']='Usuario Logueado'; 
		$loadSections = ['base/menuV2', 'pages/landing', 'base/fotoGalery', 'base/foot', 'base/footer']; 
		
		$session_data = $this->session->userdata('logged_in');
		
        $data['perfil_id'] = $session_data['perfil_id'];
		
        $data['nombre'] = $session_data['nombre'];
		
		
		$this->load->view('base/encabezado',$data);

		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
		
		}

        public function logout()
		{
			$this->session->unset_userdata('logged_in');
        	session_destroy();
			//Pagina que carga despues del logout
			redirect('Inicio');
		}


}