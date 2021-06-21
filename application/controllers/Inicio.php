<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inicio extends CI_Controller {

	
	
	public function index()

	{

		$data = array('titulo' => 'Listado de Productos');
        
		$session_data = $this->session->userdata('logged_in');
    

        if ($session_data != null) {
            
            $data['perfil_id'] = $session_data['perfil_id'];
		
            $data['nombre'] = $session_data['nombre'];  
        }else{
            
            $data['perfil_id'] = 0;
		
            $data['nombre'] = "Visitante";
        }

		$loadSections = ['base/menuV2', 'pages/landing', 'base/fotoGalery', 'base/foot', 'base/footer']; 
		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
			
		
	}

	public function info(){
	 $this->load->view('pages/info');
	 
	}

	public function comercializacion(){


		$session_data = $this->session->userdata('logged_in');
    

        if ($session_data != null) {
            
            $data['perfil_id'] = $session_data['perfil_id'];
		
            $data['nombre'] = $session_data['nombre'];  
        }else{
            
            $data['perfil_id'] = 0;
		
            $data['nombre'] = "Visitante";
        }		
		

		$loadSections = ['base/menuV2', 'pages/comercializacion', 'base/fotoGalery',  'base/foot', 'base/footer']; 

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
	}


	public function nosotros()
	{

		
		$session_data = $this->session->userdata('logged_in');
    

        if ($session_data != null) {
            
            $data['perfil_id'] = $session_data['perfil_id'];
		
            $data['nombre'] = $session_data['nombre'];  
        }else{
            
            $data['perfil_id'] = 0;
		
            $data['nombre'] = "Visitante";
        }


		$loadSections = ['base/menuV2', 'pages/nosotros', 'base/fotoGalery', 'base/foot', 'base/footer']; 
		
		$data['titulo']='Le Motocycliste'; 

		$this->load->view('base/encabezado', $data);
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
	}


	public function contacto()
	{
		$session_data = $this->session->userdata('logged_in');
    

        if ($session_data != null) {
            
            $data['perfil_id'] = $session_data['perfil_id'];
		
            $data['nombre'] = $session_data['nombre'];  
        }else{
            
            $data['perfil_id'] = 0;
		
            $data['nombre'] = "Visitante";
        }
		$loadSections = ['base/menuV2', 'pages/contact', 'base/fotoGalery', 'base/foot', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};

	}

	public function terminos()
	{


		$session_data = $this->session->userdata('logged_in');
    

        if ($session_data != null) {
            
            $data['perfil_id'] = $session_data['perfil_id'];
		
            $data['nombre'] = $session_data['nombre'];  
        }else{
            
            $data['perfil_id'] = 0;
		
            $data['nombre'] = "Visitante";
        }

		$loadSections = ['base/menuV2', 'pages/terminos', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};

	}

	public function	registro_view()
	{


		$session_data = $this->session->userdata('logged_in');
    

        if ($session_data != null) {
            
            $data['perfil_id'] = $session_data['perfil_id'];
		
            $data['nombre'] = $session_data['nombre'];  
        }else{
            
            $data['perfil_id'] = 0;
		
            $data['nombre'] = "Visitante";
        }

		$loadSections = ['base/menuV2', 'pages/registro', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
		
	}

	public function error404(){


		$session_data = $this->session->userdata('logged_in');
    

        if ($session_data != null) {
            
            $data['perfil_id'] = $session_data['perfil_id'];
		
            $data['nombre'] = $session_data['nombre'];  
        }else{
            
            $data['perfil_id'] = 0;
		
            $data['nombre'] = "Visitante";
        }

		$loadSections = ['base/menuV2', 'pages/error404', 'base/fotoGalery', 'base/foot', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
	}


	

}
