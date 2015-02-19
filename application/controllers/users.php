<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __Construct()
    {
        parent::__Construct();
		is_logged_in();
        $this->load->model('users_model');
    }

    function index() {
		$username = $this->session->userdata('username');
        $friends = $this->users_model->check_friends($username);
        $data['friends'] = '';
        $count = 0;
        $offline = '';
        if (count($friends) > 0) {
            foreach ($friends as $rows) {
                if (count($friends) > 0) {
                    $new_message = $this->users_model->alert_new_message($this->session->userdata('username'), $rows->username);
                    $data['new_message'][$count] = $new_message;
                    $data['friends'][$count] = $rows->username;
					if($rows->session_id !='')
					$data['online'][$count] = TRUE;
					else
					$data['online'][$count] = FALSE;
                    ++$count;
					
                }
            }
            if ($count == 0) {
                $offline = 'No contacts found.';
            }
        } else {
            $offline = 'No contacts found.';
        }
        echo $offline;
        $this->load->view('friends_list', $data);
    }
}

