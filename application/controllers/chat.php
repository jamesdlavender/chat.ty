<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {

	function __Construct()
    {
        parent::__Construct();
		is_logged_in();
		$this->load->model('chats_model');
    }
	
	function index() {
        $ctr = 0;
		$this->load->helper('smiley');
        //get all chat messages from buddy
        $username = $this->session->userdata('username');
        $recipient = $this->session->userdata('recipient');
        $fetchchat = $this->chats_model->fetchchat($username, $recipient);
        $chatreverse = '';
        //reverse results of chat, bottom message is latest
        foreach ($fetchchat as $chatorig) {
            $chatreverse[$ctr]['username'] = $chatorig->username;
            $chatreverse[$ctr]['message'] = parse_smileys($chatorig->message, base_url()."assets/img/smileys/");
            $time = explode(' ', $chatorig->time);
            $reformat_time = date("g:i a", strtotime($time[1]));
            $chatreverse[$ctr]['time'] = $reformat_time;
            ++$ctr;
        }
        $data['chat'] = '';
        $data['buddy'] = $this->session->userdata('recipient');
        $buddyimage = $this->chats_model->get_buddy_image($this->session->userdata('recipient'));
        $data['buddyimage'] = $buddyimage[0]->image;
        //Display messages to view
        if (is_array($chatreverse)) {
            $users['username'] = $username;
            $users['recipient'] = $recipient;
            $this->chats_model->message_read($users);
            $data['chat'] = array_reverse($chatreverse);
        }
        $this->load->view('view_chat', $data);
    }
    function get_new_messages() {
        $result = $this->chats_model->get_new_messages($this->session->userdata('username'));
        $ctr = 0;
        $users = array();
        foreach ($result as $online) {
            $users[$ctr] = $online->username;
            ++$ctr;
        }		
        if ($ctr > 0) {
			$data['ctr'] = $ctr;
            $this->load->view('view_new_message', $data);
        } else {
            $this->load->view('view_no_message');
        }
    }

    function sendmessage() {
        $data['username'] = $this->session->userdata('username');
        $data['recipient'] =$this->session->userdata('recipient');
        $data['message'] = $this->input->post('message');		
        $this->chats_model->sendmessage($data);
    }

    function chatbuddy() {
        $this->session->set_userdata('recipient', $this->input->post('username'));
        $data['username'] = $this->session->userdata('username');
        $data['recipient'] = $this->session->userdata('recipient');
        $this->chats_model->message_read($data);
    }
    function close_buddy() {
        $this->session->unset_userdata('recipient');
    }

}

