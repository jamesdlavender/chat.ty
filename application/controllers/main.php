<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __Construct()
    {
        parent::__Construct();
    }
	public function index()
	{
		$this->load->view('index');
	}
}

