<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __Construct()
    {
        parent::__Construct();
		is_logged_in();
    }
	public function index()
	{
		$this->load->view('main');
	}
}

