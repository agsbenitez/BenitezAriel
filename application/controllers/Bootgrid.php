
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootgrid extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('bootgrid_model');
    }

    function index(){
        $this->load->view('pages/bootgrid');
    }

    function fetch_data(){
        $data = $this->bootgrid_model->make_query();
        $array = array();
        foreach($data as $row){
            $array[] = $row;
        }
        $output = array(
         'current'  => 1,
         'rowCount'  => 10,
         'total'   => intval($this->bootgrid_model->count_all_data()),
         'rows'   => $array
        );

        echo json_encode($output);
    }

    function action(){
        if($this->input->post('operation')){
            $data = array(
                'nombre'   => $this->input->post('nombre'),
                'apellido'  => $this->input->post('apellido'),
                'email'  => $this->input->post('email'),
                'usuario' => $this->input->post('usuario'),
                'password'   => $this->input->post('password'),
                'perfil' => $this->input->post('perfil')
            );
            if($this->input->post('operation') == 'Add'){
                $this->bootgrid_model->insert($data);
                echo 'Usuario Creado';
            }
            if($this->input->post('operation') == 'Edit'){
                $this->bootgrid_model->update($data, $this->input->post('employee_id'));
                echo 'Usuario Modificado';
            }
        }
    }

    function fetch_single_data(){
        if($this->input->post('id')){
            $data = $this->bootgrid_model->fetch_single_data($this->input->post('id'));
            foreach($data as $row){
                $output['nombre'] = $row['nombre'];
                $output['apellido'] = $row['apellido'];
                $output['email'] = $row['email'];
                $output['usuario'] = $row['usuario'];
                $output['perfil'] = $row['perfil_id'];
            }
            echo json_encode($output);
        }
    }

    function delete_data(){
        if($this->input->post('id'))
        {
            $this->bootgrid_model->delete($this->input->post('id'));
            echo 'Data Deleted';
        }
    }
}

?>