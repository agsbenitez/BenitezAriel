<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inicio extends CI_Controller {

	
	
	public function index()

	{
		$loadSections = ['base/menu', 'pages/landing', 'base/fotoGalery', 'base/foot', 'base/footer']; 
		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
			
		
	}

	public function comercializacion(){
		

		$loadSections = ['base/menu', 'pages/comercializacion', 'base/fotoGalery',  'base/foot', 'base/footer']; 

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
	}


	public function nosotros()
	{
		$loadSections = ['base/menu', 'pages/nosotros', 'base/fotoGalery', 'base/foot', 'base/footer']; 
		
		$data['titulo']='Le Motocycliste'; 

		$this->load->view('base/encabezado', $data);
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
	}


	public function contacto()
	{
		$loadSections = ['base/menu', 'pages/contact', 'base/fotoGalery', 'base/foot', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};

	}

	public function terminos()
	{
		$loadSections = ['base/menu', 'pages/terminos', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};

	}

	public function	registro_view()
	{
		$loadSections = ['base/menu', 'pages/registro', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
		
	}

	public function error404(){
		$loadSections = ['base/menu', 'pages/error404', 'base/fotoGalery', 'base/foot', 'base/footer'];

		$data['titulo']='Le Motocycliste'; 
		$this->load->view('base/encabezado', $data);
		
		foreach($loadSections as $sections){
			$this->load->view($sections);
		};
	}


	

}
