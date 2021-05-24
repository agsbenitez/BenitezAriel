<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{


    public function __construct(){
        parent::__construct();
    }

    public function valid_user($email, $password)
    {
        $query = $this->db->get_where('usuarios', array('usuario'=>$email, 'pass'=>md5($password)), 1);
        
        if ($query->num_rows() == 1) {

            return $query->result();
        }
        else
        {
            return false;
        }
    }
}