<?php
class Chats_model extends CI_Model {

	function __Construct()
    {
        parent::__Construct();
    }
	
	  function get_new_messages($recipient) {
        $this->db->where('recipient', $recipient);
        $this->db->where('read', '0');
        $query = $this->db->get('chat');
        return $query->result();
    }

    function fetchchat($username, $recipient) {
        $this->db->order_by('time', 'desc');
        $this->db->where('username', $username);
        $this->db->where('recipient', $recipient);
        $this->db->or_where('username', $recipient);
        $this->db->where('recipient', $username);
        $query = $this->db->get('chat', 7);
        return $query->result();
    }

    function sendmessage($data) {
        $chat = array(
            'username' => $data['username'],
            'recipient' => $data['recipient'],
            'message' => $data['message']
        );
        $this->db->insert('chat', $chat);
    }

    function message_read($data) {
        $this->db->where('recipient', $data['username']);
        $this->db->where('username', $data['recipient']);
        $read = array(
            'read' => 1
        );
        $this->db->update('chat', $read);
    }

    function check_if_online($username) {
        $this->db->like('user_data', '"' . $username . '"');
        $query = $this->db->get('ci_sessions');
        return $query->result();
    }
	
    function get_buddy_image($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->result();
    }
}