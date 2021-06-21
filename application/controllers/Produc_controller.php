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

    private function _veri_log()
    	{
	    	if ($this->session->userdata('logged_in')) 
	    	{
	    		return TRUE;
	    	} else {
	    		return FALSE;
	    	}
    	}

    public function index()
    {
        if ($this->_veri_log()) {
            $data = array('titulo' => 'Listado de Productos');
        
            $session_data = $this->session->userdata('logged_in');
        
            $data['perfil_id'] = $session_data['perfil_id'];
        
            $data['nombre'] = $session_data['nombre'];
        
        
		    $this->load->view('base/encabezado',$data);
            
		    $loadSections = ['base/menuV2', 'pages/products/producV2', 'base/footer'];
            
            foreach($loadSections as $sections){
		        $this->load->view($sections);
		    };
        }else{
            
            redirect('login');
            
        }
        
    }

    
    public function  ver()
    {
        $data = array('titulo' => 'Listado de Productos');
        if ($this->_veri_log()) {
            
            
            $session_data = $this->session->userdata('logged_in');
            
            $data['perfil_id'] = $session_data['perfil_id'];
            
            $data['nombre'] = $session_data['nombre'];
            
            
	        $this->load->view('base/encabezado',$data);
            
	        $loadSections = ['base/menuV2', 'pages/products/producCli', 'base/footer'];
            
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

   


    public function fetch_data(){

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


    public function action(){

        //Esta función resibe la data via ajax(POST) y determina si es un alta o una mod
        //recibe el archiv disponible en EL Array $_FILES 
    
        if(!empty($_FILES['image']['name'])){

            $imagename = basename($_FILES['image']['name']);
            
                        
            $data = array(
                'descripcion' => $this->input->post('descripcion'),
                'cat_id' => $this->input->post('cat'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock')
            );

            $data['image'] = $imagename;
        

            //se verifica que recina una operacion a relizar
            if($this->input->post('operation')){

                //si es add va a grabar a la base
                if($this->input->post('operation') == 'Add'){
                    //envia la data al modelo para insertar la info
                    $this->produc_model->insert($data);
                    //Cargo Imagena pedal

                    $uploadDir = 'assets/img/productos/';
                    $targetFilePath = $uploadDir . $imagename; 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    $allowTypes = array('jpg', 'png', 'jpeg'); 

                    if(in_array($fileType, $allowTypes)){ 
                        // Upload file to the server 
                        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){ 
                            $uploadedFile = $imagename; 
                        }else{ 
                            $data["response"] = "Se a encontrado un error al subir el archivo"; 
                        } 
                    }else{ 
                        $data["response"] = "Formato no aceptado"; 
                    } 
                    header('Content-Type: application/json');
                    echo json_encode($data);
                }
                //si es edit modifica
                if($this->input->post('operation') == 'Edit'){
                    //envia la data al modelo para hacer el update
                    $this->produc_model->update($data, $this->input->post('id'));
                    
                    //Cargo Imagena pedal

                    $uploadDir = 'assets/img/productos/';
                    $targetFilePath = $uploadDir . $imagename; 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    $allowTypes = array('jpg', 'png', 'jpeg'); 

                    if(in_array($fileType, $allowTypes)){ 
                        // Upload file to the server 
                        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){ 
                            $uploadedFile = $imagename; 
                        }else{ 
                            $data["response"] = "Se a encontrado un error al subir el archivo"; 
                        } 
                    }else{ 
                        $data["response"] = "Formato no aceptado"; 
                    } 
                    header('Content-Type: application/json');
                    echo json_encode($data);
                } 

            }

        }else{
            //devuelco el eerror que ni esta definida ala imagen
            $data['response'] = "No se ha recibido img";
            header('Content-Type: application/json');
            echo json_encode($data);
        }

        
    }

    public function fetch_single_data(){
        if($this->input->post('id')){
            $data = $this->produc_model->fetch_single_data($this->input->post('id'));
            foreach($data as $row){
                $output['descripcion'] = $row['descripcion'];
                $output['cat_id'] = $row['cat_id'];
                $output['price'] = $row['price'];
                $output['stock'] = $row['stock'];
                $output['image'] = $row['image'];

            }
            echo json_encode($output);
        }
    }

    public function delete_data(){
        if($this->input->post('id'))
        {
            $this->produc_model->delete($this->input->post('id'));
            echo 'Data Deleted';
        }
    }




    /**
	* Obtiene los datos del archivo imagen.
	* Permite archivos gif, jpg, png
	* Verifica si los datos son correcto en conjunto con la imagen y lo mueva al sevidor de ser posible
	*/
	public function _image_upload($file)
	{
        $this->load->library('upload');

        
        // Especifica la configuración para el archivo
        $config['upload_path'] = 'assets/img/productos';
    	$config['allowed_types'] = 'jpg|JPEG|png|jpeg';
    	$config['max_size'] = '2048';
    	$config['max_width'] = '1024';
    	$config['max_height'] = '768';      
         // Inicializa la configuración para el archivo 
        $this->upload->initialize($config);
        if ($this->upload->do_upload($file)){
            // Mueve archivo a la carpeta indicada en la variable $data
            $data = $this->upload->data();
            //lineas para hacer el debugvar_dump($data);
            //exit;
            return $data;
        }else{
            //Mensaje de error si no existe imagen correcta
            $data = $this->upload->display_errors();
            //lineas para hacer el debug var_dump($data);
            //exit;
            return $data;
        }
                   
	}  
    

}