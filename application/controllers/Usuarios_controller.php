<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index()
    {

         //Genero las reglas de validacion
        $this->load->library('form_validation');
		
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('pass1', 'Password', 'required');
        $this->form_validation->set_rules('pass2', 'Confirmación de Password', 'required|matches[pass1]');
		
        //Mensaje de error si no pasan las reglas
		$this->form_validation->set_message('required',
									'<div class="alert alert-danger">El campo %s es obligatorio</div>');
        $this->form_validation->set_message('valid_email',
									'<div class="alert alert-danger">El campo %s debe der un correo valido</div>');
		$this->form_validation->set_message('is_unique',
									'<div class="alert alert-danger">El campo %s ya existe</div>');
        $this->form_validation->set_message('matches',
                                    '<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');
		
		//Preparo los datos para guardar en la base, en caso de que pase la validacion

        $pass = $this->input->post('pass1',true);
        $nombre = ($this->input->post("nombre"));
        $apellido = ($this->input->post("apellido"));
        $email = ($this->input->post("email"));
        $pass1 = $pass;
        
        $data = [
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "email"=>$email,
            "usuario"=>$email,
            "pass"=>md5($pass1),
            "perfil_id"=>'2'
        ];

        
        //Si no pasa la validacion de datos
		if ($this->form_validation->run() == FALSE)
			{
                //Muestra la página de registro con el título de error
				$data = array('titulo' => 'Error de formulario');
				$loadSections = ['base/encabezado', 'base/menu', 'pages/registro', 'base/footer'];
//
		        foreach($loadSections as $sections){
			        $this->load->view($sections);
		        };		
			}
			
			else 	//Pasa la validacion
			{
                
				//Envio array al metodo insert para registro de datos
				$usuario = $this->usuario_model->add_usuario($data);

				//Redirecciono a la pagina de perfil
				redirect('login');
			}
            
    } 


    public function list_us(){

        //motodo que devuelve ellistado de usuarios via json
        $usuarios = $this->usuario_model->list_usuarios()->result_array();
        //$cantidad = $usuarios->num_rows();

        header("Content-Type: application/json");
        echo json_encode($usuarios);
     
        /* if ($cantidad > 0) {

            echo json_encode($usuarios, JSON_PRETTY_PRINT);
        } */
        
    }

    public function list_user(){

        //Muestra la página de listado de usuarios
		$data = array('titulo' => 'Listado de Usuarios');

        

        $session_data = $this->session->userdata('logged_in');
		
        /* foreach ($session_data as $key => $value) {
            echo $key;
            echo(": ");
            echo $value;
            echo(" ");
        } */

        $data['perfil_id'] = $session_data['perfil_id'];
		
        $data['nombre'] = $session_data['nombre'];
		
		
		$this->load->view('base/encabezado',$data);
        //$this->load->view('pages/bootgrid');

		$loadSections = ['base/menuV2', 'pages/usuarios/usuarios', 'base/footer'];
        
        foreach($loadSections as $sections){
		    $this->load->view($sections);
		};
    }

}