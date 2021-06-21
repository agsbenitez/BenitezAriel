<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model{


    public function __construct(){
        parent::__construct();
    }


    public function insert_ventas($data){
        $this->db->insert('car_encabezado', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function insert_ventas_detalle($data){
        $this->db->insert('car_detalle', $data);
    }

    public function ver_compras_encabezado($id_usuario){
        $this->db->select('cc.id, cc.fecha_compra, cc.monto_total');
        
        
        $this->db->from('car_encabezado as cc');
        $this->db->join('usuarios as usuario', 'cc.usuario_id = usuario.id');
        $this->db->where('cc.usuario_id', $id_usuario);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ver_compras_detail($id_compra){
        $this->db->select('cd.id, cd.cantidad, p.descripcion, p.price' );
        
        
        $this->db->from('car_detalle as cd');
        $this->db->join('produc as p', 'cd.producto_id = p.id');
        $this->db->where('cd.cart_id', $id_compra);
        $query = $this->db->get();
        return $query->result_array();
    }
    

}