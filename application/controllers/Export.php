<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

 class Export extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('Export_model','export');
 	}
 }


?>