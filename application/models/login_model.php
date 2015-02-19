<?php

class Login_model extends CI_Model {
	 
	function __Construct()
    {
        parent::__Construct();
    }
	
	 function authenticate($username, $password) {
        $query = $this->db->get_where(
                        'users', array(
						'username' => $username,
						'password' => sha1($password)));
        return $query->result();
    }

    function store_session($username, $session_id) {
        $data = array(
            'session_id' => $session_id
        );
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }

    function check_session($session_id, $username) {
        $query = $this->db->get_where(
                        'users', array(
						'session_id' => $session_id,
						'username' => $username));
        return $query->result();
    }
	function remove_session_id($username)
	{
		$data = array('session_id' => '');
        $this->db->where('username', $username);
        $this->db->update('users', $data);
	}

    function username_validate(){
        $username = $_GET['fieldValue'];

        $user = $this->db->where('username', $username)->get('users');

        if($user->num_rows() > 0)
            return false;
        else
            return true;
    }
    function register($userdata = array()){
        $this->db->insert('users', $userdata);
    }
	 
}