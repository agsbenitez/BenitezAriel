
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('perfil_model');
    }

    function fetch_data(){
        $data = $this->perfil_model->make_query();
        $array = array();
        foreach($data as $row){
            $array[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($array);

    }

}

?>