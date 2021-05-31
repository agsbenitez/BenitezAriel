<?php
class Migration_Cat_Product extends CI_Migration{
	
	public function up(){
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' =>TRUE
			),
			
			'descripcion' => array(
				'type' => 'VARCHAR',
				'constraint' => 90,
			),
			
			
		));
		
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('cat_produc');
	}
	
	public function down(){
		$this->dbforge->drop_table('cat_produc');
	}
	
}