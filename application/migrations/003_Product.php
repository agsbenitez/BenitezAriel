<?php
class Migration_Product extends CI_Migration{
	
	public function up(){
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' =>TRUE
			),
			
			'descripcion' => array(
				'type' => 'VARCHAR',
				'constraint' => 90,
			),

            'cat_id' => array(
				'type' => 'INT',
                'null' => FALSE,
			),

            'price' => array(
				'type' => 'FLOAT',
                'null' => FALSE,
			),
            'image' => array(
				'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE,
			),
			
			
		));
		
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('produc');
	}
	
	public function down(){
		$this->dbforge->drop_table('produc');
	}
	
}