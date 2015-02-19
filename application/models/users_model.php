<?php
class Users_model extends CI_Model {

	function __Construct()
    {
        parent::__Construct();
    }
	
	 function check_friends($username) {

        $this->db->order_by('username');
        /*$this->db->where('session_id !=', '');*/
        $this->db->where('username !=', $username);
        $query = $this->db->get('users');
        return $query->result();
    }

    function check_active_friends($session_id, $previous_time) {
        $this->db->where('session_id', $session_id);
        $this->db->where('last_activity >', $previous_time);
        $query = $this->db->get('ci_sessions');
        return $query->result();
    }

    function alert_new_message($username, $sender) {
        $this->db->where('username', $sender);
        $this->db->where('recipient', $username);
        $this->db->where('read', '0');
        $this->db->from('chat');
        $count = $this->db->count_all_results();
        return $count;
    }
}