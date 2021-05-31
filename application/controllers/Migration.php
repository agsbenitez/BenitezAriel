<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
	}
	
	public function index()
	{
			
		if ($this->migration->current() === FALSE)
		{
				show_error($this->migration->error_string());
		}
		
		echo "Done";
	}
}